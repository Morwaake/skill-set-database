@extends('layouts.app')

@section('content')
<div class="tContainer">
        <div class="card ml-5 mr-5 mt-5" style="align-content:center;">
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @if(isset($details))
                        @foreach($details as $profileBrief)
                            <tr>
                            <th scope="row">{{$profileBrief->id }}</th>
                            <td>{{$profileBrief->first_name }}</td>
                            <td>{{$profileBrief->email }}</td>
                            <td>{{$profileBrief->Phone }}</td>
                            <td><a href="{{route('moreUserDetails',$profileBrief->id }}" class="btn btn-primary" >More DetaILS</a></td>
                            </tr>
                        @endforeach
                @else
                    <h1 class="mt-5">No Pending stakeholders to Approve!!!</h1>
                @endif
                </tbody>
                </table>
                <div class="row justify-content-center">
                    <a href="{{ URL::previous() }}" class="cool"><button class="but btn btn-danger">BACK</button></a>
                </div>
            </div>
</div>

@endsection