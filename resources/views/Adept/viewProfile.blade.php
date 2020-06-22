@extends('layouts.app')
<link href="/css/viewProfile" rel="stylesheet" id="bootstrap-css">

@section('content')
<div class="container shadow-sm p-3 mb-5 rounded bg-light">
    <div class="card p-3 mb-5 rounded bg-light d-flex justify-content-center">
        <div class="profile-img">
            <img src="http://res.cloudinary.com/alxcrmr/image/upload/v1507358490/man_ejcwnb.jpg" alt="" class="rounded mx-auto d-block" style="width: 500px">
        </div>
        
        <div class="row">
            <div class="col-sm text-secondary">
                <h3>NAME</h3>
                </div>
                <div class="col-sm text-secondary">
                <H4>ADDRESS</H4>
                </div>
                <div class="col-sm text-secondary">
                <H3>CONTACT</H3>
            </div>
        </div>
        <div class="d-flex justify-content-center">
        <div class="about-section">
            <h2>About</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultrices tincidunt libero,
                 vel efficitur nunc suscipit eu. Fusce eleifend eget dui vel ornare. Ut faucibus lorem nec 
                 tincidunt blandit. In blandit odio eu libero sodales, vitae luctus
            lectus convallis.</p>
        </div>
        
    </div>
    <div class="row">
            <div>
            <button type="button" class="btn btn-dark btn-lg">More</button></div>
            <div class="text-right"> <button type="button" class="btn btn-danger btn-lg text-right">back</button></div>
            
            </div>
</div>

@endsection