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
      height: 100%;
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
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Skill Set Database</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Dashboard</a></li>
        <li><a href="#">Add Details</a></li>
        <li><a href="#">View Details</a></li>
        <li><a href="{{ route('holders') }}">View All Skill Holder</a></li>
        <li>
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
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
          <select id="select" required name="level"  class="form-control form-control-dark w-100">
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
        <div class="col-sm-3  ">
          <div class="well d-inline-block bg-info">
            <h4>Highest Skill: </h4>
            <p>39 mins 39 mins</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Total Points</h4>
            <p>39 mins</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Sessions</h4>
            <p>10 Million</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Bounce</h4>
            <p>30%</p> 
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-4">
          <div class="well">
          
            <p class="text-center"><h4> first_name</h4></p> 
            <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i> address,</p> 
            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>Phone</p> 
            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>email</p> 
          </div>
          
        </div>
        <div class="col-sm-8">
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
            <td><i>39 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-desktop w3-text-yellow w3-large"></i></td>
            <td>Programming</td>
            <td><i>39 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
            <td>Web Design</td>
            <td><i>39 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-wifi w3-text-blue w3-large"></i></td>
            <td>Networks</td>
            <td><i>39 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-algorithms w3-text-red w3-large"></i></td>
            <td>AI and Machine..</td>
            <td><i>39 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
            <td>Application Development</td>
            <td><i>39 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
            <td>Data Analysis</td>
            <td><i>39 mins</i></td>
          </tr>
        </table>
    </div>
  </div>
</div>

</body>
</html>
