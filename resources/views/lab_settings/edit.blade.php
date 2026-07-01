@extends('layouts.app')

@section('content')

<div class="container">

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">

                Setting Laboratorium

            </h4>

        </div>

        <div class="card-body">

            <form action="/lab-setting"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-8">

                        <div class="mb-3">

                            <label>Nama Laboratorium</label>

                            <input type="text"
                                   name="lab_name"
                                   class="form-control"
                                   value="{{ old('lab_name',$setting->lab_name) }}"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label>Alamat</label>

                            <textarea
                                name="address"
                                rows="3"
                                class="form-control">{{ old('address',$setting->address) }}</textarea>

                        </div>

                        <div class="row">

                            <div class="col-md-4">

                                <div class="mb-3">

                                    <label>Kota</label>

                                    <input type="text"
                                           name="city"
                                           class="form-control"
                                           value="{{ old('city',$setting->city) }}">

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="mb-3">

                                    <label>Provinsi</label>

                                    <input type="text"
                                           name="province"
                                           class="form-control"
                                           value="{{ old('province',$setting->province) }}">

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="mb-3">

                                    <label>Kode Pos</label>

                                    <input type="text"
                                           name="postal_code"
                                           class="form-control"
                                           value="{{ old('postal_code',$setting->postal_code) }}">

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-4">

                                <div class="mb-3">

                                    <label>Telepon</label>

                                    <input type="text"
                                           name="phone"
                                           class="form-control"
                                           value="{{ old('phone',$setting->phone) }}">

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="mb-3">

                                    <label>Email</label>

                                    <input type="email"
                                           name="email"
                                           class="form-control"
                                           value="{{ old('email',$setting->email) }}">

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="mb-3">

                                    <label>Website</label>

                                    <input type="text"
                                           name="website"
                                           class="form-control"
                                           value="{{ old('website',$setting->website) }}">

                                </div>

                            </div>

                        </div>

                        <div class="mb-3">

                            <label>Direktur</label>

                            <input type="text"
                                   name="director"
                                   class="form-control"
                                   value="{{ old('director',$setting->director) }}">

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label>Prefix Registrasi</label>

                                    <input type="text"
                                           name="registration_prefix"
                                           class="form-control"
                                           value="{{ old('registration_prefix',$setting->registration_prefix) }}">

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label>Prefix Invoice</label>

                                    <input type="text"
                                           name="invoice_prefix"
                                           class="form-control"
                                           value="{{ old('invoice_prefix',$setting->invoice_prefix) }}">

                                </div>

                            </div>

                        </div>

                        <div class="mb-3">

                            <label>Footer Invoice</label>

                            <textarea
                                name="footer_invoice"
                                rows="3"
                                class="form-control">{{ old('footer_invoice',$setting->footer_invoice) }}</textarea>

                        </div>

                        <div class="mb-3">

                            <label>Footer Hasil</label>

                            <textarea
                                name="footer_result"
                                rows="3"
                                class="form-control">{{ old('footer_result',$setting->footer_result) }}</textarea>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="card">

                            <div class="card-header">

                                Logo Laboratorium

                            </div>

                            <div class="card-body text-center">

                                @if($setting->logo)

                                    <img src="{{ asset('storage/'.$setting->logo) }}"
                                         id="preview"
                                         style="max-width:220px;">

                                @else

                                    <img src="https://placehold.co/220x220?text=LOGO"
                                         id="preview">

                                @endif

                                <hr>

                                <input type="file"
                                       class="form-control"
                                       name="logo"
                                       id="logo">

                            </div>

                        </div>

                    </div>

                </div>

                <hr>

                <button class="btn btn-primary">

                    Simpan Setting

                </button>

            </form>

        </div>

    </div>

</div>

<script>

document.getElementById('logo').onchange=function(e){

    const reader=new FileReader();

    reader.onload=function(){

        document.getElementById('preview').src=reader.result;

    }

    reader.readAsDataURL(e.target.files[0]);

}

</script>

@endsection