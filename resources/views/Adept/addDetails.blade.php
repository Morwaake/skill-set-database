@extends('layouts.app')


@section('content')
<div class="container shadow-sm p-3 mb-5 rounded bg-light">
    <div class="p-3 mb-2 bg-secondary text-white text-center"><h4>ADD PROFILE DETAILS</h4></div>
    <form action="post" action ="{{route('addProfileDetails')}}">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">First Name *</label>
        <input type="text" name ="firstname"class="form-control" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Last Name *</label>
        <input type="email" name ="lastName" class="form-control" id="inputPassword4">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Address *</label>
        <input type="text" name ="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Date of Birth</label>
        <input type="date" name ="dob"class="form-control" id="inputAddress2" >
    </div>
    <div class="form-group">
        <label for="inputAddress2">Phone</label>
        <input type="text" name ="location"class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <select id="inputState" name ="city" class="form-control">
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
        <input type="text" name ="email"class="form-control" id="inputZip "placeholder="number">
        </div>
    </div>
    <div>
    <button type="submit" class="btn btn-primary">Add Details</button>
    <a class="btn btn-danger btn-sm pull-right" href="#">Back</a>
    </div>
    </form>
</div>

@endsection