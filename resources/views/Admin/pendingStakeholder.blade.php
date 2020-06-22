@extends('layouts.app')

@section('content')
<div class="tContainer">
        <div class="card" style="align-content:center;">
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
                        @foreach($details as $pendings)
                            <tr>
                            <th scope="row">{{ $pendings->id }}</th>
                            <td>{{ $pendings->s_name }}</td>
                            <td>{{ $pendings->email }}</td>
                            <td>{{ $pendings->number }}</td>
                            <td><a href="{{route('PendingStakeholders',$pendings->id)}}" class="btn btn-primary" >Approve</a></td>
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
