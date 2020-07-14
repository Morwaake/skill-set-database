@extends('layouts.app')


@section('content')
<div class="container shadow-sm p-5 mt-5 mb-4 col-md-8 bg-light rounded">
    <div class="p-3 mb-2 card-header text-center"><h4>ADD PROFILE DETAILS</h4></div>
    <form method="post" action ="{{route('editFunctions')}}">
    @csrf
    <div class="form-row">
    foreach{{$adept as $adept}}
        <div class="form-group col-md-6 ">
        <label for="inputEmail4">First Name *</label>
        <input type="text" require name ="firstname"class="form-control" id="inputEmail4"value="{{$adept->first_name}}">
        </div>
        <div class="form-group col-md-6 ">
        <label for="inputPassword4">Last Name *</label>
        <input type="text" require name ="lastName" class="form-control" id="inputPassword4" value="{{$adept->last_name}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Physical Address *</label>
            <input type="text" require name ="address" class="form-control" id="inputAddress" value="{{$adept->address}}">
        </div>

        <div class="form-group col-md-6">
            <label for="inputAddress">Place Worked At For Experience </label>
            <input type="text" require name ="place_worked" class="form-control" id="inputAddress" value=" {{$adept->place_worked}}">
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Work Done There </label>
            <input type="text" require name ="work_done" class="form-control" id="inputAddress" value="{{$adept->work_done}}">
        </div>
        <div class="form-group col-md-3">
            <label for="inputAddress">Year Started working</label>
            <input type="date" require name ="year_started_working" class="form-control" id="inputAddress"value="{{$adept->year_started_working}}">
        </div>
        <div class="form-group col-md-3">
            <label for="inputAddress">Year Ended working</label>
            <input type="date" require name ="year_ended_working" class="form-control" id="inputAddress"value="{{$adept->year_ended_working}}" >
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress2">Date of Birth</label>
            <input type="date" require name ="dob"class="form-control" id="inputAddress2" value="{{$adept->dob}}">
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress2">Phone</label>
            <input type="text" require name ="phoneNumber"class="form-control" id="inputAddress2" value="{{$adept->phoneNumber}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <select require id="inputState" name ="city" class="form-control ">
        <option selected value="{{$adept->city}}">Choose...</option>
        <option value="Gaborone">Gaborone</option>
        <option value="Maun">Maun</option>
        <option value="Francistown">Francistown</option>
        <option value="Palapye">Palapye</option>
        <option value="Gantsi">Gantsi</option>
      </select>
        </div>
        <div class="form-group col-md-6">
        <label for="inputState">Email</label>
        <input type="email" require name ="email"class="form-control" id="inputZip "value="{{$adept->email}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group ">
            <p>Languages</p>
                <input type="checkbox" class=" ml-4" id="setswana" name="languages" value="Setsawna">
                <label for="setswana" class="ml-2"> Setswana</label>
                <input type="checkbox" class=" ml-4"id="English" name="languages" value="English">
                <label for="english"> English</label>
                <input type="checkbox"class=" ml-4" id="Spanish" name="languages" value="Spanish">
                <label for="spanish"> Spanish</label>
        </div>
    </div>

    @endforeach
    <div>
    <a class="btn btn-danger  float-right" href="{{ URL::previous() }}">Back</a>
    <input type="hidden" value="{{$adept->id}}" name="id" >
    <button type="submit" class="btn btn-primary">Add Update</button>
    </div>
    </form>
</div>
@endsection