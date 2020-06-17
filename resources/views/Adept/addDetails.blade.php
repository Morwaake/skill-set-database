@extends('layouts.app')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@section('content')
<div>
   <div class="container my-auto">
		<div >
		    <div class="card">
		        <div class="card-body ">
		            <div class="row">
		                <div class="col-md-10">
		                    <h4 class='bg-secondary text-center'>Your Profile</h4>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form method="post" action="{{route('addProfileDetails')}}">
                            @csrf
                              <div class="form-group row">
                                <label for="name" class="col-2 col-form-label">First Name</label> 
                                <div class="col-8">
                                  <input id="name" name="firstname" placeholder="First Name" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-2 col-form-label">Last Name</label> 
                                <div class="col-8">
                                  <input id="lastname" name="lastName" placeholder="Last Name" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="text" class="col-2 col-form-label">Address*</label> 
                                <div class="col-8">
                                  <input id="text" name="address" placeholder="Address " class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="select" class="col-2 col-form-label">City/Location</label> 
                                <div class="col-8">
                                  <select id="select" name="city" class="custom-select">
                                    <option value="Gaborone">Gaborone</option>
                                    <option value="Maun">Maun</option>
                                    <option value="Francistown">Francistown</option>
                                    <option value="Palapye">Palapye</option>
                                    <option value="Gantsi">Gantsi</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="email" class="col-2 col-form-label">Email*</label> 
                                <div class="col-8">
                                  <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="date" class="col-2 col-form-label">Date of Birth</label> 
                                <div class="col-8">
                                  <input id="dob" name="dob" placeholder="Date of birth" class="form-control here" required="required" type="date">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="website" class="col-2 col-form-label">Phone Number</label> 
                                <div class="col-8">
                                  <input id="phone" name="phoneNumber" placeholder="cell number" class="form-control here" type="text">
                                </div>
                              </div>
                              
                              
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                <button type="submit" class="btn btn-primary">Add Details</button>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
		            
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection