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
                    <div>
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
                                <label for="select" class="col-2 col-form-label">Level *</label> 
                                <div class="col-8">
                                  <select id="select" required name="level" class="custom-select">
                                    <option value="beginner">Beginner</option>
                                    <option value="professional">Professional</option>
                                  </select>
                                </div>
                              </div> 
                              <!--<input id="file-upload" type="file" name="fileUpload" accept="image/*" onchange="readURL(this);">
                              <label for="file-upload" id="file-drag">
                                  <img id="file-image" src="#" alt="Preview" class="hidden">
                                  <div id="start" >
                                      <i class="fa fa-download" aria-hidden="true"></i>
                                      <div>Select a file or drag here</div>
                                      <div id="notimage" class="hidden">Please select an image</div>
                                      <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                                      <br>
                                      <span class="text-danger">{{ $errors->first('fileUpload') }}</span>
                                  </div>
                            
                              </label> 
                              <div class="form-group row">
                                <label for="Proof" class="col-2 col-form-label">Proof *</label> 
                                <div class="col-8">
                                  <input type="file" id="proof" name="link" required class="form-control here" >
                                </div>
                              </div>-->                         
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