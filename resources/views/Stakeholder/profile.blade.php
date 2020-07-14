<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}




</style>
</head>
<body>

<h2 style="text-align:center">{{$profile->s_name}} Profile Card</h2>

<div class="card">
  <img src="{{ asset('/frontend/img/usericons.png') }}" alt="John" style="width:100%">
  <h1>{{$profile->s_name}}</h1>
  <p class="title">{{$profile->email}}, {{$profile->number}}</p>
  <p>{{$profile->city}},{{$profile->location}}</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  <a href="{{route('stakeholder')}}" class="btn btn danger float-right">Back</a>
    <a href="{{route('showEditForm',$profile->id)}}" class="btn btn-primary ">Edit</a>
</div>

</body>
</html>