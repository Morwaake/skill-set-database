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
                              <!--div class="form-group row">
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
                              </div-->
                              <fieldset class="tabcontent" id="">
                                      <span id="result"></span>
                                    <table class="table table-bordered table-striped" id="">
                                          <thead>
                                            <tr>
                                                <th >Add Skill details</th>
                                                <th >Action</th>
                                            </tr>
                                          </thead>
                                          <tbody class="skill">

                                          </tbody>
                                          <tfoot>
                                              
                                          </tfoot>
                                    </table>
                                </fieldset> 
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

        $(document).ready(function(){

            var count = 1;

            dynamic_field(count);

            function dynamic_field(number)
            {
                html = '<tr>';
                	   html += '<td> <div class="form-group row">'
                           html += ' <label for="select" class="col-2 col-form-label">Category *</label>' 
                           html += ' <div class="col-8">'
                           html += ' <select id="select" name="category[]" class="custom-select">'
                           html += '         <option value="Web_Design">Web_Development</option>'
                           html += '         <option value="Programming">Programming</option>'
                           html += '         <option value="Database">Database</option>'
                           html += '         <option value="Data_Analysis">Data Analysis</option>'
                           html += '         <option value="Networks">Networks</option>'
                           html += '         <option value="Application_Development">Application Development</option>'
                           html += '         <option value="AI_and_machine_learning">AI and Machine Learning</option>'
                           html += '         <option value="Cybersecurity">Cybersecurity</option>'
                           html += '       </select>'
                           html += '     </div>'
                           html += ' </div>'
                           html += '   <div class="form-group row">'
                           html += '     <label for="name" class="col-2 col-form-label">Course Name *</label>' 
                           html += '     <div class="col-8">'
                           html += '       <input id="name" name="name[]" placeholder="course name" class="form-control here" type="text" required>'
                           html += '     </div>'
                           html += '   </div>'
                           html += '   <div class="form-group row">'
                           html += '      <label for="select" class="col-2 col-form-label">Level *</label> '
                           html += '      <div class="col-8">'
                           html += '        <select id="select" required name="level[]" class="custom-select">'
                           html += '          <option value="fundamental awarness">Fundamental Awarness</option>'
                           html += '          <option value="limited experience">Limited Experience</option>'
                           html += '          <option value="intermediate">Intermediate</option>'
                           html += '          <option value="advanced"> Advanced</option>'
                           html += '          <option value="expert"> Expert</option>'
                           html += '        </select>'
                           html += '      </div>'
                           html += '    </div> '
                           html += '    <div class="form-group row">'
                           html += '      <label for="name" class="col-2 col-form-label">Place where course completed *</label>' 
                           html += '      <div class="col-8">'
                           html += '       <input name="obtained[]" placeholder="eg University of Botswana or Bootcamp" class="form-control here" type="text" require>'
                           html += '    </div>'
                           html += '   </div>'
                           html += '   <div class="form-group row">'
                           html += '     <label for="name" class="col-2 col-form-label">Year of Course Completion *</label> '
                           html += '     <div class="col-8">'
                           html += '       <input id="name" name="year[]" placeholder="eg 2019" class="form-control here" type="date" required>'
                           html += '     </div>'
                           html += '   </div>'
                           html += '   <div class="form-group row">'
                           html += '     <label for="Proof" class="col-2 col-form-label">Proof *</label>' 
                           html += '     <div class="col-8">'
                           html += '     <input type="hidden" value="0" name="status" >'
                           html += '     <input id="file-upload" required type="file" name="proof[]" accept="image/*" onchange="readURL(this);">'
                           html += '     </div>'
                           html += '   </div> </td>  '        

                if(number > 1)
                {
                    html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                    $('.skill').append(html);
                }
                else
                {
                    html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                    $('.skill').html(html);
                }
            }

            $(document).on('click', '#add', function(){
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function(){
                count--;
                $(this).closest("tr").remove();
            });

        });
    </script>

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