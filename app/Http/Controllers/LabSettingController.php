<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabSetting;

class LabSettingController extends Controller
{
    public function edit()
    {
        $setting = LabSetting::first();

        if (!$setting) {

            $setting = LabSetting::create([

                'lab_name' => 'LABKU',

                'address' => '-'

            ]);
        }

        return view(
            'lab_settings.edit',
            compact('setting')
        );
    }

    public function update(Request $request)
    {
        $setting = LabSetting::first();

        $data = $request->validate([

            'lab_name' => 'required',

            'address' => 'required',

            'city' => 'nullable',

            'province' => 'nullable',

            'postal_code' => 'nullable',

            'phone' => 'nullable',

            'email' => 'nullable|email',

            'website' => 'nullable',

            'director' => 'nullable',

            'footer_invoice' => 'nullable',

            'footer_result' => 'nullable',

            'invoice_prefix' => 'required',

            'registration_prefix' => 'required',

        ]);

        if ($request->hasFile('logo')) {

            $logo = $request
                ->file('logo')
                ->store('logo', 'public');

            $data['logo'] = $logo;
        }

        $setting->update($data);

        return back()
            ->with(
                'success',
                'Setting berhasil disimpan'
            );
    }
}