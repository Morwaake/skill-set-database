@extends('layouts.app')

<link rel="stylesheet" href="/css/dashboards.css">
<script src="js/dashboards.js"></script>

@section('content')

      <main id="offCanvas" class="mm-page">
      <div class="wrapper">
      <div id="contentHeader">
        <div class="container-fluid">
        <form method="post" action="{{route('results')}}">
        @csrf
          <div class="row justify-content-between">
          
            <div class="col-md-2">
            <input class="form-control form-control-dark w-100" type="text" name="name"placeholder="enter skill name " aria-label="search">
            </div>
            <div class="col-md-2">
            <select id="select" name="category" class="custom-select">
              <option value="">skill category</option>
              <option value="Web Development">Web Development</option>
              <option value="Programming">Programming</option>
              <option value="Database">Database</option>
              <option value="Data Analysis">Data Analysis</option>
            </select>
            </div>
            <div class="col-md-2">
            <select id="select" required name="level" class="custom-select">
              <option value="">skill level..</option>
              <option value="beginner">Beginner</option>
              <option value="professional">Professional</option>
            </select>
            </div>
            <div >
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          </form>
        </div>
      </div><!-- end contentHeader -->
    <h2 class='bg-secondary text-center'>Features</h2>
      <div id="content">
      <section class='statis text-center'>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3"><a href="{{route('profile')}}">
              <div class="box bg-danger">
                 
                  <p class="lead">ADD PROFILE</p>
                </div></a>
              </div>
              <div class="col-md-3"><a href="#">
                <div class="box bg-info">

                  
                  <p class="lead">VIEW PROFILE</p>
                </div></a>
              </div>
              <div class="col-md-3"><a href="#">
                <div class="box bg-danger">
                 
                  
                  <p class="lead">VIEW ADEPTS</p>
                </div>
              </div></a>
              <div class="col-md-3"><a href="#">
                <div class="box bg-success">
                  
                  
                  <p class="lead">SKILLS ANALYSIS</p>
                </div>
              </div></a>
            </div>
          </div>
        
        </div>
        </section>
      </div><!-- end content -->
    </main>

    <footer>
        <div>
            <h5>Contact Us</h5>
            <p>(123)456 789</p>
            <p>skill-setDatabase@gmail.com</p>
        </div>
        <p class="mt-3">&copy Copyright Skill-Set Database 2020</p>
    </footer>
    @endsection