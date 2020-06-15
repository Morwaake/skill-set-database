@extends('layouts.app')

<link rel="stylesheet" href="/css/dashboards.css">
<script src="js/dashboards.js"></script>

@section('content')

      <main id="offCanvas" class="mm-page">
      <div class="wrapper">
      <div id="contentHeader">
        <div class="container-fluid">
          <div class="row justify-content-between">
            <div class="col-md-8">
            <input class="form-control form-control-dark w-100" type="text" placeholder="enter skill " aria-label="search">
            </div>
            <div class="col-md-4 text-right">
              <a class="btn btn-success btn-sm ml-1" href="#">Search</a>
              <!--<a class="btn btn-success btn-sm pull-right" href="#">Save</a>-->
            </div>
          </div>
        </div>
      </div><!-- end contentHeader -->
    <h2 class='bg-secondary text-center'>Features</h2>
      <div id="content">
      <section class='statis text-center'>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3"><a href="{{route('addAdeptDetailsForm')}}">
              <div class="box bg-danger">
                 
                  <p class="lead">ADD PROFILE</p>
                </div>
              </div>
              <div class="col-md-3"></a>
                <div class="box bg-info">

                  
                  <p class="lead">VIEW PROFILE</p>
                </div>
              </div>
              <div class="col-md-3"><a href="{{route('addSkill')}}">
                <div class="box bg-danger">
                 
                  
                  <p class="lead">ADD SKILL</p>
                </div>
              </div></a>
              <div class="col-md-3">
                <div class="box bg-success">
                  
                  
                  <p class="lead">SKILLS ANALYSIS</p>
                </div>
              </div>
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

