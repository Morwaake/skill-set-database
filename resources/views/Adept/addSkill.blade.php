@extends('layouts.app')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@section('content')
<div>
   <div class="container my-auto">
		<div >
		    <div class="card ">
		        <div class="card-body ">
		            <div class="row">
		                <div class="col-md-10">
		                    <h4 class='bg-secondary text-center'>ADD YOUR SKILL</h4>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form method="post" action="{{route('addSkills')}}">
                        @csrf
                              <div class="form-group row">
                                <label for="name" class="col-2 col-form-label">Skill Name *</label> 
                                <div class="col-8">
                                  <input id="name" name="name" placeholder="Skill Name" class="form-control here" type="text" required>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="select" class="col-2 col-form-label">Category *</label> 
                                <div class="col-8">
                                  <select id="select" name="category" class="custom-select">
                                    <option value="Web Development">Web Development</option>
                                    <option value="Programming">Programming</option>
                                    <option value="Database">Database</option>
                                    <option value="Data Analysis">Data Analysis</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="select" class="col-2 col-form-label">Work Experince on Skill *</label> 
                                <div class="col-8">
                                  <select id="select" name="experience" required class="custom-select">
                                    <option value="No experience">No experience</option>
                                    <option value="Some Experience">Some Experience</option>
                                    <option value="Experienced">Experienced</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-2 col-form-label">Place Where Skill Obtained *</label> 
                                <div class="col-8">
                                  <input id="obtain" name="obtained" required placeholder="Name of School or Bootcamp" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="select" class="col-2 col-form-label">Level *</label> 
                                <div class="col-8">
                                  <select id="select" required name="level" class="custom-select">
                                    <option value="beginner">Beginner</option>
                                    <option value="professional">Professional</option>
                                  </select>
                                </div>
                              </div>  
                              <div class="form-group row">
                                <label for="Proof" class="col-2 col-form-label">Proof *</label> 
                                <div class="col-8">
                                  <input type="file" id="proof" name="link" required class="form-control here" >
                                </div>
                              </div>                           
                              <div class="form-group row">
                                <div class="button-4 col-8">
                                <button type="submit" class="btn btn-secondary">Add Skill</button>
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