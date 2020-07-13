<!DOCTYPE html>
<html>
<head>
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"-->
    <style>

        .card
        {
            box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.8);
            max-width: 400px;
            margin: auto;
            text-align:left;
            font-family:Calibri;
        }
        .name
        {
            align-self: center;
        }
        .rounded-circle
        {
            align-self: center;
            width: 40%;
        }
        .para
        {
            margin-left:5%;
        }
        #but
        {
            margin-left:30%;
        }

    </style>
</head>
<title>Projects Repository</title>

<link rel="stylesheet" href="{{ asset('/frontend/css/W3.css') }}">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="{{ asset('/frontend/css/side.css') }}">
<body class="w3-light-grey">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- Top container -->
<header class="header">
    <div class="w3-bar w3-top w3-blue w3-large" style="z-index:4">
        <nav class="navbar navbar-toggleable-md navbar-light pt-0 pb-0 ">
            <a href="/" class="nav-link active w3-bar-item w3-button w3-hover-blue w3-wide"><div><i class="fa fa-database" aria-hidden="true"></i> {{config('app.name')}}</div></a>            <!--/button-->

            <!--button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button-->
            <!--div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown"-->
                <ul class="navbar-nav">
                    <!--li class="nav-item dropdown messages-menu">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-success bg-success"></span>
                        </a>

                    <li class="nav-item dropdown notifications-menu">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-warning bg-warning"></span>
                        </a>

                    </li-->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                          

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
                </ul>

        </nav>
    </div>
</header>
<hr>
<br>
<h2 style="text-align:center"></h2>
<div class="card">
    <div class="card-header alt bg-dark">
    <img src="{{ asset('/frontend/img/14.jpg') }}"   class="rounded-circle"  alt="Pic" >
    <h3 class="name">Name</h3>
        <p class="para"> <div> <i class="fa fa-envelope" aria-hidden="true"></i> Email </div>
        <p class="para"> <div>  <i class="fa fa-phone" aria-hidden="true"></i>  Phoneuser()</div>
        <p class="para"><div><i class="fa fa-user-circle" aria-hidden="true"></i> Gender : Male</div>
        <p class="para"><div><i class="fa fa-lock" aria-hidden="true"></i> Interests</div>
        <p class="para"><div><i class="fa fa-id-card-o" aria-hidden="true"></i> Identity</div>
        <p class="para"><div><i class="fa fa-graduation-cap" aria-hidden="true"></i> Program </div>
    <div style="margin: 24px 0;">
        <a href="" class="btn btn-primary" id="but">Edit Profile</a>
    </div>
    <a href="/student" class="btn btn-outline-light">Cancel</a>
    </div></div>

</body>
<hr>
<footer class="container-fluid">
    <p class="text-right small">@Student Projects And Problem Set Repository</p>
</footer>
<hr>
</html>


