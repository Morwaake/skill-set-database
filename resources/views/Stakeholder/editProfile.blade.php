@extends('layouts.app')


@section('content')
<div class="container shadow-sm p-3 mb-5 mt-5 rounded bg-light">
    <div class="p-3 mb-2 bg-secondary text-white text-center"><h4>ADD PROFILE DETAILS</h4></div>
        <form method="post" action ="{{route('editFunction')}}">
            @csrf
            <div>
            <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Name (company or personal)*</label>
        <input type="text" name ="s_name"class="form-control" id="inputEmail4" value="{{$stakeholder->s_name}}">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Email *</label>
        <input type="email" name ="email" class="form-control" id="inputPassword4" value="{{$stakeholder->email}}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Address *</label>
        <input type="text" name ="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{$stakeholder->address}}">
    </div>
    <div class="form-group">
        <label for="inputAddress2">location (ward)</label>
        <input type="text" name ="location"class="form-control" id="inputAddress2" placeholder="{{$stakeholder->location}}" value="{{$stakeholder->location}}">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <select id="inputState" name ="city" class="form-control">
        <option selected>{{$stakeholder->city}}</option>
        <option value="Gaborone">Gaborone</option>
        <option value="Maun">Maun</option>
        <option value="Francistown">Francistown</option>
        <option value="Palapye">Palapye</option>
        <option value="Gantsi">Gantsi</option>
      </select>
        </div>
        <div class="form-group col-md-2">
        <label for="inputZip">Contact: </label>
        <input type="text"name ="country_code" class="form-control" id="inputZip "placeholder="code">
        </div>
        <div class="form-group col-md-4">
        <label for="inputState">.</label>
        <input type="text" name ="number"class="form-control" id="inputZip "value="{{$stakeholder->number}}">
        </div>
    </div>
                <a class="btn btn-danger  float-right" href="{{ URL::previous() }}">Back</a>
                <input type="hidden" value="{{$stakeholder->id}}" name="id" >
                <button type="submit" class="btn btn-primary">Add Details</button>
            </div>
        </form>
    </div>
</div>

@endsection