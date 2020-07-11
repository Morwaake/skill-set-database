@extends('layouts.app')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@section('content')

<div class="col-md-4">
    <div class="card shadow-sm p-3 mb-5 ">
    <img src="{{ asset('/frontend/img/usericon.png') }}"   class="rounded-circle"  alt="Pic" >
    @foreach($details  as $profile)
    <div class="card-body text-center">
    <hr>
        <h5 class="card-title">{{$profile->s_name}}</h5>
        <p class="card-text">{{$profile->email}}</p>
        <p class="card-text">{{$profile->number}}</p>
        <p class="card-text">{{$profile->city}}</p>
    </div>
    @endforeach
    <hr>
    <br>
    <div>
    <a href="{{route('stakeholder')}}" class="btn btn danger float-right">Back</a>
    <a href="{{route('showEditForm',$profile->id)}}" class="btn btn-primary ">Edit</a>
    </div>
    </div>
</div>

@endsection
