@extends('layouts.app')

@section('content')
<div class="Container">
        <div class="mt-3 card col-9 mx-auto" style="align-content:center;">
        @if(isset($details))
                <table class="table">
                <h5 class="card-header mt-3">Pending courses</h5>
                <thead class="thead-dark mt-2">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
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
                    <div>
                        <h1 class="mt-5 text-center">No Pending courses!!!</h1>
                    </div>
                    @endif
                </tbody>
                </table>
                <div class="card-footer">
                    <a href="/admin" class="cool"><button class="but btn btn-danger">BACK</button></a>
                </div>
            </div>
</div>

@endsection
