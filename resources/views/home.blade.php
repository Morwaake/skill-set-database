@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <a class="btn btn-secondary" href="#"role="button">ADD PROFILE DETAILS</a>
                    <a class="btn btn-secondary" href="#" role="button">ADD SKILL</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
