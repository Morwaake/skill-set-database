@extends('layouts.app')

@section('content')
<div class="tContainer">
        <div class="card" style="align-content:center;">
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($details))
                        @foreach($details as $pendingcourses)
                            <tr>
                            <th scope="row">{{ $pendingcourses->id }}</th>
                            <td>{{ $pendingcourses->name }}</td>
                            <td>{{ $pendingcourses->category }}</td>
                            <td>{{ $pendingcourses->level }}</td>
                            <td><a href="{{route('approvePending',$pendingcourses->id)}}" class="btn btn-primary" >Approve</a></td>
                            </tr>
                        @endforeach
                    @else
                    <h1 class="mt-5">No Properties found matching criteria. Try to search again!!!</h1>
                    @endif
                </tbody>
                </table>
                <div class="row justify-content-center">
                    <a href="#" class="cool"><button class="but btn btn-danger">BACK</button></a>
                </div>
            </div>
</div>

@endsection
