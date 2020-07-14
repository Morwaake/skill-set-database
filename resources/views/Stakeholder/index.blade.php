<!DOCTYPE html>
<html lang="en">
<head>
  <title>Skill Holder Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 125%;
    }

    body{
      background-color : grey;
    }  
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Skill Set Database</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li class="active"><a href="#section1">Dashboard</a></li>
        <li><a href="#">Add Details</a></li>
        <li><a href="#">Add Course</a></li>
        <li><a href="#">View Details</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
@if(session()->has('message'))
                     <div class="alert alert-danger mx-auto mt-3 text-center">
                     {{session()->get('message')}}
                     </div>
                    @endif
    @if(session()->has('message1'))
      <div class="alert alert-primary mx-auto mt-3 text-center">
      {{session()->get('message')}}
      </div>
    @endif
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Skill Set Database</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#" >{{ Auth::user()->name }}'s Dashboard</a></li>
        <li><a href="{{ route('profile') }}">Add Details</a></li>
        <li><a href="{{ route('myProfile') }}">View Details</a></li>
        <li><a href="{{ route('holders') }}">View All Skill Holder</a></li>
        <li>
            <div >
                <a  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
      </ul>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Search For People With Your Skills Of Interest :</h4>
        <form action="{{route('results')}}" method="post">
        @csrf
        <div class="col-md-3">
            <input class="form-control form-control-dark w-100" type="text" name="name"placeholder="enter course name " aria-label="search">
          </div>
          <div class="col-md-3">
          <select id="select" name="category" class="form-control form-control-dark w-100">
              <option value="">skill category</option>
              <option value="Web Development">Web Development</option>
              <option value="Programming">Programming</option>
              <option value="Database">Database</option>
              <option value="Data Analysis">Data Analysis</option>
            </select>
          </div>
          <div class="col-md-3">
          <select id="select" name="level"  class="form-control form-control-dark w-100">
          <option value="">choose level..</option>
          <option value="fundamental awarness">Fundamental Awarness</option>
          <option value="limited experience">Limited Experience</option>
          <option value="intermediate">Intermediate</option>
          <option value="advanced"> Advanced</option>
          <option value="expert"> Expert</option>
        </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
              </form>
      </div>
      <hr>
      <div class="row">
      
      <div class="text-center"><h4>RECENTLY ADDED SKILLS HOLDERS</h4></div>
            @foreach($recentlyApproved  as $recentlyApproved)
        <div class="col-sm-3  ">
          <div class="well d-inline-block bg-info">
            <h4>{{ $recentlyApproved->first_name }} </h4>
            <p>{{ $recentlyApproved->category }}</p> 
          </div>
        </div>
            @endforeach
            <div class="col-sm-3">
          <div class="well">
            <h4>Kealeboga</h4>
            <p>Web Design</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Jacob</h4>
            <p>Cyber Security</p> 
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
      <div class="col-sm-6">
          <div class="well">
          <table class="w3-table w3-striped w3-white">
          <tr>
            <td>.</td>
            <td><h4>LEADER BOARD</h4></td>
            <td><i>.</td>
          </tr>
          <tr>
            <td></td>
            <td>NAME </td>
            <td><i>SCORE</i></td>
          </tr>
            @foreach($leaderboards  as $leaderboards)
          <tr>
            <td></td>
            <td>{{ $leaderboards->first_name }}</td>
            <td><i>{{ $leaderboards->rank_points }}</i></td>
          </tr>
          @endforeach
          <tr>
            <td></td>
            <td>Kealeboga</td>
            <td><i>10</i></td>
          </tr>
          <tr>
            <td></i></td>
            <td>Bob</td>
            <td><i>9</i></td>
          </tr>
          <tr>
            <td></i></td>
            <td>Mkay</td>
            <td><i>9</i></td>
          </tr>
          <tr>
            <td></td>
            <td>Pantsi</td>
            <td><i>5 </i></td>
          </tr>
          <tr>
            <td></i></td>
            <td>Amos</td>
            <td><i>3</i></td>
          </tr>
        </table>
    </div>
  </div>
  <div class="col-sm-6">
          <div class="well">
          <table class="w3-table w3-striped w3-white">
          <tr>
          <td><i></i></td>
            <td><h4>Skill Category</h4></td>
            <td><i><h4>Quantity</h4></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-database w3-text-red w3-large"></i></td>
            <td>Database </td>
            <td><i>{{$numberOfDatabase}}</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-desktop w3-text-yellow w3-large"></i></td>
            <td>Programming</td>
            <td><i>{{$numberOfProgramming}}</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
            <td>Web Design</td>
            <td><i>{{$numberOfWeb}}</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-wifi w3-text-blue w3-large"></i></td>
            <td>Networks</td>
            <td><i>{{$numberOfNetworks}}</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-desktop w3-text-red w3-large"></i></td>
            <td>AI and Machine..</td>
            <td><i>{{$numberOfAI}}</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
            <td>Application Development</td>
            <td><i>10</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
            <td>Data Analysis</td>
            <td><i>22</i></td>
          </tr>
        </table>
    </div>
  </div>
</div>

</body>
</html>
