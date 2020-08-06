@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('clinics.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="clinic_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('名前') }}</label>

                            <div class="col-md-6">
                                <input id="clinic_name" type="text" class="form-control @error('clinic_name') is-invalid @enderror"
                                    name="clinic_name" value="{{ old('clinic_name') }}" required autocomplete="clinic_name" autofocus>

                                @error('clinic_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postal_code"
                                class="col-md-4 col-form-label text-md-right">{{ __('郵便番号') }}</label>

                            <div class="col-md-6">
                                <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                    name="postal_code" value="{{ old('postal_code') }}" required autocomplete="postal_code">

                                @error('postal_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pref"
                                class="col-md-4 col-form-label text-md-right">{{ __('県') }}</label>

                            <div class="col-md-6">
                                <input id="pref" type="text" class="form-control @error('pref') is-invalid @enderror"
                                    name="pref" value="{{ old('pref') }}" required autocomplete="pref">

                                @error('pref')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city"
                                class="col-md-4 col-form-label text-md-right">{{ __('市') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                    name="city" value="{{ old('city') }}" required autocomplete="city">

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="town"
                                class="col-md-4 col-form-label text-md-right">{{ __('町') }}</label>

                            <div class="col-md-6">
                                <input id="town" type="text" class="form-control @error('town') is-invalid @enderror"
                                    name="town" value="{{ old('town') }}" required autocomplete="town">

                                @error('town')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel"
                                class="col-md-4 col-form-label text-md-right">{{ __('電話番号') }}</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror"
                                    name="tel" value="{{ old('tel') }}" required autocomplete="tell">

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="site_url"
                                class="col-md-4 col-form-label text-md-right">{{ __('WEBサイト') }}</label>

                            <div class="col-md-6">
                                <input id="site_url" type="text" class="form-control @error('web_site') is-invalid @enderror"
                                    name="site_url" value="{{ old('site_url') }}">

                                {{-- @error('site_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}">

                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lat"
                                class="col-md-4 col-form-label text-md-right">{{ __('緯度') }}</label>

                            <div class="col-md-6">
                                <input id="lat" type="number" class="form-control @error('lat') is-invalid @enderror"
                                    name="lat" value="{{ old('lat') }}" required autocomplete="lat" step="0.00000000000001">

                                @error('lat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lng"
                                class="col-md-4 col-form-label text-md-right">{{ __('経度') }}</label>

                            <div class="col-md-6">
                                <input id="lng" type="number" class="form-control @error('lng') is-invalid @enderror"
                                    name="lng" value="{{ old('lng') }}" required autocomplete="lng" step="0.00000000000001">

                                @error('lng')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">登録する</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
