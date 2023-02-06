@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="text-center">
                        <a href="/pondokjoyo" class="btn btn-primary">Pondokjoyo</a>
                        <a href="/mundurejo" class="btn btn-primary">Mundurejo</a>
                        <a href="/register" class="btn btn-secondary">Daftar Pengguna Baru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
