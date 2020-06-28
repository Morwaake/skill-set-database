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
                   
                            <tr>
                            <th scope="row">ziga</th>
                            <td>@gmail.com</td>
                            <td>77777777</td>
                            <td>11111111</td>
                            <td><a href="#" class="btn btn-primary" >Approve</a></td>
                            </tr>
                    
                </tbody>
                </table>
                <div class="row justify-content-center">
                    <a href="#" class="cool"><button class="but btn btn-danger">BACK</button></a>
                </div>
            </div>
</div>

@endsection
