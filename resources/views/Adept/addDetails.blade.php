@extends('layouts.app')


@section('content')
<div class="container shadow-sm p-3 mb-5 rounded bg-light">
    <div class="p-3 mb-2 bg-secondary text-white text-center"><h4>ADD PROFILE DETAILS</h4></div>
    <form method="post" action ="{{route('addProfileDetails')}}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">First Name *</label>
        <input type="text" require name ="firstname"class="form-control" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Last Name *</label>
        <input type="text" require name ="lastName" class="form-control" id="inputPassword4">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Address *</label>
        <input type="text" require name ="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Date of Birth</label>
        <input type="date" require name ="dob"class="form-control" id="inputAddress2" >
    </div>
    <div class="form-group">
        <label for="inputAddress2">Phone</label>
        <input type="text" require name ="phoneNumber"class="form-control" id="inputAddress2" placeholder="number">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <select require id="inputState" name ="city" class="form-control">
        <option selected>Choose...</option>
        <option value="Gaborone">Gaborone</option>
        <option value="Maun">Maun</option>
        <option value="Francistown">Francistown</option>
        <option value="Palapye">Palapye</option>
        <option value="Gantsi">Gantsi</option>
      </select>
        </div>
        <div class="form-group col-md-6">
        <label for="inputState">Email</label>
        <input type="email" require name ="email"class="form-control" id="inputZip "placeholder="email">
        </div>
    </div>
    <div>
    <button type="submit" class="btn btn-primary">Add Details</button>
    <a class="btn btn-danger btn-sm pull-right" href="#">Back</a>
    </div>
    </form>
</div>
@endsection