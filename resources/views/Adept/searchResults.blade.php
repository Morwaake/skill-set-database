<!DOCTYPE html>
<html>
 <head>
  <title>Course results</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>body{
      background-color : grey;
    }</style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 class="text-center">Search Results</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search Results Data</div>
    <div class="panel-body">
     <div class="table-responsive">
      <h3 class="text-center">Total Data : {{$numberOfResults}} <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Course Name</th>
         <th>level</th>
         <th>Where it is offered</th>
         
        </tr>
       </thead>
       <tbody>
       @if(isset($details))
                        @foreach($details as $data)
                            <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->level }}</td>
                            <td>{{ $data->obtained }}</td>
                            </tr>
                        @endforeach
                    @else
                    <h1 class="mt-5">No indivisuals found matching criteria. Try to search again!!!</h1>
                    @endif
         
       </tbody>
      </table>
     </div>
    </div>    
   </div>
  </div>
 </body>
</html>