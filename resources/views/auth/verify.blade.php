@extends('layouts.app')

@section('content')
<style>
    body{
        x background-color: #d2cddf;;
    }
    .custom-card {
        background-color: #f1f3f5;
        border-radius: 10px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding: 20px;
    }

    .custom-card-header {
        background-color: #3490dc;
        color: #645353;
        font-size: 24px;
        padding: 10px 0;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .custom-card-body {
        font-size: 18px;
        padding: 20px;
    }

    .success-alert {
        background-color: #28a745;
        color: #fff;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 20px;
    }

    .resend-link {
        font-size: 18px;
        color: #3490dc;
        text-decoration: underline;
    }
</style>

<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card custom-card mx-auto">
                <div class="card-header custom-card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body custom-card-body">
                    @if (session('resent'))
                        <div class="alert success-alert" role="alert">
                            {{ __('Silahkan refresh email anda') }}
                        </div>
                    @endif

                    <p>{{ __('Sebelum masuk, mohon cek email untuk verifikasi!') }}</p>
                    <p>{{ __('Jika belum menerima email, klik link dibawah ini:') }}</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 resend-link">{{ __('klik diisini jika email tidak terkirim') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
