<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\RegistrationDetail;
use App\Models\TestParameter;
use Illuminate\Http\Request; 
use App\Models\Patient;
use App\Models\Doctor;
use carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\RegistrationSample;
use App\Models\SampleType;


class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $registrations = Registration::with(
        'patient',
        'doctor',
        'details'
    )->get();

    return view(
        'registrations.index',
        compact('registrations')
    );
}

    /**
     * Show the form for creating a new resource.
     */

   public function create()
{
    $patients = Patient::orderBy('nama')->get();

    $doctors = Doctor::orderBy('nama')->get();

    $tests = TestParameter::where(
        'is_print',
        1
    )
    ->orderBy('nama_test')
    ->get();

    return view(
        'registrations.create',
        compact(
            'patients',
            'doctors',
            'tests'
        )
    );
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $today = Carbon::today();

    $prefix = 'LAB' . $today->format('ymd');

    $lastRegistration = Registration::whereDate(
        'created_at',
        $today
    )->latest()->first();

    if ($lastRegistration) {

        $lastNumber = (int) substr(
            $lastRegistration->no_reg,
            -4
        );

        $sequence = str_pad(
            $lastNumber + 1,
            4,
            '0',
            STR_PAD_LEFT
        );

    } else {

        $sequence = '0001';

    }

    $noReg = $prefix . $sequence;

    $registration = Registration::create([

        'no_reg' => $noReg,

        'patient_id' => $request->patient_id,

        'doctor_id' => $request->doctor_id,

        'status' => $request->status

    ]);

    /*
    |--------------------------------------------------------------------------
    | Simpan Detail Pemeriksaan
    |--------------------------------------------------------------------------
    */

    foreach ($request->tests ?? [] as $testId) {

        $test = TestParameter::with('sampleType')
            ->find($testId);

        RegistrationDetail::create([

            'registration_id' => $registration->id,

            'test_parameter_id' => $test->id,

            'price' => $test->price,

            'status' => 'ORDERED'

        ]);

    }

    /*
    |--------------------------------------------------------------------------
    | Group Sample Type
    |--------------------------------------------------------------------------
    */

    $details = RegistrationDetail::with(
        'testParameter.sampleType'
    )
    ->where('registration_id', $registration->id)
    ->get();

    $groups = [];

    foreach ($details as $detail) {

        if (!$detail->testParameter->sampleType) {
            continue;
        }

        $sample = $detail->testParameter->sampleType;

        $groups[$sample->id][] = $detail;

    }

    /*
    |--------------------------------------------------------------------------
    | Generate Barcode
    |--------------------------------------------------------------------------
    */

    foreach ($groups as $sampleTypeId => $items) {

        $sample = SampleType::find($sampleTypeId);

       $registrationSample = RegistrationSample::create([

    'registration_id' => $registration->id,

    'sample_type_id' => $sample->id,

    'sample_no' => $sample->barcode_code,

    'barcode' => $registration->no_reg .
                 $sample->barcode_code,

    'status' => 'WAITING'

]);

        /*
        |--------------------------------------------------------------------------
        | Update Detail
        |--------------------------------------------------------------------------
        */

        foreach ($items as $detail) {

            $detail->update([

                'registration_sample_id'
                    => $registrationSample->id

            ]);

        }

    }

    return redirect('/registrations');

}

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $registration = Registration::findOrFail($id);

    $registration = Registration::with(
    'details'
)->findOrFail($id);

    $patients = Patient::orderBy('nama')->get();

    $doctors = Doctor::orderBy('nama')->get();

    $tests = TestParameter::orderBy('nama_test')->get();

    return view(
        'registrations.edit',
        compact(
            'registration',
            'patients',
            'doctors',
            'tests'
        )
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $registration = Registration::findOrFail($id);

    $registration->update([

        'patient_id' => $request->patient_id,

        'doctor_id' => $request->doctor_id,

        'status' => $request->status

    ]);

    RegistrationDetail::where(
        'registration_id',
        $registration->id
    )->delete();

    foreach($request->tests ?? [] as $testId)
    {
        $test = TestParameter::find($testId);

        RegistrationDetail::create([

            'registration_id' => $registration->id,

            'test_parameter_id' => $test->id,

            'price' => $test->price,

            'status' => 'ORDERED'

        ]);
    }

    return redirect('/registrations');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $registration = Registration::findOrFail($id);

    $registration->delete();

    return redirect('/registrations');
}
public function invoice($id)
{
    $registration = Registration::with(
        'patient',
        'doctor',
        'details.testParameter'
    )->findOrFail($id);

    $filename =
        $registration->no_reg . '_' .
        $registration->patient->norm . '_' .
        strtoupper($registration->patient->nama);

    $filename = str_replace(
        ' ',
        '_',
        $filename
    );

    $pdf = Pdf::loadView(
        'registrations.invoice_pdf',
        compact('registration')
    );

    return $pdf->stream(
        $filename.'.pdf'
    );
}
}

