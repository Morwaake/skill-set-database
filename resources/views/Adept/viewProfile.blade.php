<!DOCTYPE html>
<html>
<title>View Details</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/viewProperty.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
.checked {
  color: orange;
}
</style>
<body class="w3-light-grey">
@foreach($profileBrief as $profileBrief)
<div ><p><h2 class='text-center'> Welcome {{$profileBrief-> first_name}} {{$profileBrief-> last_name}}</h2></p></div>

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-container">
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Designer</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>{{$profileBrief-> address}},{{$profileBrief-> city}}</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>{{$profileBrief-> email}}</p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>(+267) {{$profileBrief-> Phone}}</p>
          <hr>

          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
          @foreach ($topSkills as $rec)
          <p>{{ $rec->category }}</p>
          <div class="row ">
          <span class="fa fa-star checked ml-2"></span>
            <span class="fa fa-star checked ml-2"></span>
            <span class="fa fa-star checked ml-2"></span>
            <span class="fa fa-star ml-2"></span>
            <span class="fa fa-star"></span>
          </div>
          @endforeach
          <br>

          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages</b></p>
          <p>{{$profileBrief-> languages}}</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:100%"></div>
          </div>
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work Experience</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>{{$profileBrief-> place_worked}} /frontend web design</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>{{$profileBrief-> year_started_working}} - {{$profileBrief-> year_ended_working}}</h6>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Web Developer / something.com</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Mar 2012 - Dec 2014</h6>
          <hr>
        </div>
      </div>

      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Courses</h2>
          @foreach($allCourses as $allCourses)
        <div class="w3-container">
          <h5 class="w3-opacity"><b>{{$allCourses->name}} from {{$allCourses->obtained}}</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>{{$allCourses->year}}</h6>
          <p>This is a {{$allCourses->level}} level course in {{$allCourses->category}}</p>
          <hr>
        </div>
          @endforeach
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  @endforeach
  
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
<div>
    <h5>Contact Us</h5>
    <p>(123)456 789</p>
    <p>skill-setsDatabase@gmail.com</p>
</div>
        <p class="mt-3">&copy Copyright Skill - Sets Database</p>
</footer>

</body>
</html>
