@extends('layouts.app')

@section('content')
<div class="tContainer">
        <div class="card mt-4 ml-4 mr-4" style="align-content:center;">
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Postal Address</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($details))
                        @foreach($details as $searchResults)
                            <tr>
                            <td>{{ $searchResults->first_name }}</td>
                            <td>{{ $searchResults->last_name }}</td>
                            <td>{{ $searchResults->email }}</td>
                            <td>{{ $searchResults->Phone }}</td>
                            <td>{{ $searchResults->address }}</td>
                            <td><a href="#" class="btn btn-primary" >View Profile Details</a></td>
                            </tr>
                        @endforeach
                    @else
                    <h1 class="mt-5">No indivisuals found matching criteria. Try to search again!!!</h1>
                    @endif
                </tbody>
                </table>
                <div class="row justify-content-center">
                    <a href="{{route('stakeholder')}}" class="cool"><button class="but btn btn-danger">BACK</button></a>
                </div>
            </div>
</div>

@endsection
