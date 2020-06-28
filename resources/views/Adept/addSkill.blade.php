@extends('layouts.app')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@section('content')
<div>
   <div class="container my-auto">
   @if(session()->has('message'))
                     <div class="alert alert-danger mx-auto">
                     {{session()->get('message')}}
                     </div>
                    @endif
                    <div>
		<div >
		    <div class="card mt-4 col-md-10 mx-auto">
		        <div class="card-body ">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4 class='card-header text-center'>ADD YOUR COURSE</h4>
		                    <hr>
		                </div>
                      @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form method="post" action="{{route('addSkills')}}" enctype="multipart/form-data">
                        @csrf
                              <div class="form-group row">
                                <label for="select" class="col-2 col-form-label">Category *</label> 
                                <div class="col-8">
                                  <select id="select" name="category" class="custom-select">
                                    <option value="Web Development">Web Development</option>
                                    <option value="Programming">Programming</option>
                                    <option value="Database">Database</option>
                                    <option value="Data Analysis">Data Analysis</option>
                                    <option value="Networks">Networks</option>
                                    <option value="Application_Development">Application Development</option>
                                    <option value="AI_and_machine_learning">AI and Machine Learning</option>
                                    <option value="Cybersecurity">Cybersecurity</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-2 col-form-label">Course Name *</label> 
                                <div class="col-8">
                                  <input id="name" name="name" placeholder="course name" class="form-control here" type="text" required>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="select" class="col-2 col-form-label">Level *</label> 
                                <div class="col-8">
                                  <select id="select" required name="level" class="custom-select">
                                    <option value="fundamental awarness">Fundamental Awarness</option>
                                    <option value="limited experience">Limited Experience</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="advanced"> Advanced</option>
                                    <option value="expert"> Expert</option>
                                  </select>
                                </div>
                              </div> 
                              <div class="form-group row">
                                <label for="name" class="col-2 col-form-label">Place where course completed *</label> 
                                <div class="col-8">
                                  <input name="obtained" placeholder="eg University of Botswana or Bootcamp" class="form-control here" type="text" require>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-2 col-form-label">Year of Course Completion *</label> 
                                <div class="col-8">
                                  <input id="name" name="year" placeholder="eg 2019" class="form-control here" type="date" required>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="Proof" class="col-2 col-form-label">Proof *</label> 
                                <div class="col-8">
                                <input id="file-upload" required type="file" name="proof" accept="image/*" onchange="readURL(this);">
                                </div>
                              </div>                         
                              <div class="form-group row">
                                <div class="button-4 col-md-12 mt-3">
                                <a class="btn btn-danger  float-right" href="{{ URL::previous() }}">Back</a>
                                <button type="submit" class="btn btn-primary ">Add Skill</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
   function readURL(input, id) {
     id = id || '#file-image';
     if (input.files &amp;&amp; input.files[0]) {
         var reader = new FileReader();
 
         reader.onload = function (e) {
             $(id).attr('src', e.target.result);
         };
 
         reader.readAsDataURL(input.files[0]);
         $('#file-image').removeClass('hidden');
         $('#start').hide();
     }
  }
 </script>
@endsection