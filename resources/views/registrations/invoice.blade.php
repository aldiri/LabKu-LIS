<!DOCTYPE html>
<html>
<head>

    <title>Invoice Registrasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

          <style>

@media print {

    .no-print{
        display:none !important;
    }

}

</style>

</head>

<body>

<div class="container mt-4">

    <div class="card">

        <div class="card-header">

            <h3>INVOICE PEMERIKSAAN LAB</h3>

        </div>

        <div class="card-body">

            <table class="table table-borderless">

                <tr>
                    <td width="200">No Registrasi</td>
                    <td>: {{ $registration->no_reg }}</td>
                </tr>

                <tr>
                    <td>No RM</td>
                    <td>: {{ $registration->patient->norm }}</td>
                </tr>

                <tr>
                    <td>Nama Pasien</td>
                    <td>: {{ $registration->patient->nama }}</td>
                </tr>

                <tr>
                    <td>Dokter Pengirim</td>
                    <td>: {{ $registration->doctor->nama }}</td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>: {{ strtoupper(str_replace('_',' ',$registration->status)) }}</td>
                </tr>

            </table>

            <hr>

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th width="50">No</th>

                        <th>Pemeriksaan</th>

                        <th width="150">
                            Harga
                        </th>

                    </tr>

                </thead>

                <tbody>

                @php
                    $total = 0;
                @endphp

                @foreach($registration->details as $detail)

                @php
                    $total += $detail->price;
                @endphp

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $detail->testParameter->nama_test }}
                    </td>

                    <td>
                        Rp {{ number_format($detail->price,0,',','.') }}
                    </td>

                </tr>

                @endforeach

                </tbody>

                <tfoot>

                    <tr>

                        <th colspan="2">
                            TOTAL
                        </th>

                        <th>
                            Rp {{ number_format($total,0,',','.') }}
                        </th>

                    </tr>

                </tfoot>

            </table>

            <div class="mt-4 no-print">

    <button
        onclick="window.print()"
        class="btn btn-primary">

        Cetak Invoice

    </button>

    <a href="/registrations"
       class="btn btn-secondary">

        Kembali

    </a>

</div>

        </div>

    </div>

</div>

</body>
</html>