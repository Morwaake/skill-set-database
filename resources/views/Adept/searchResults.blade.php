<!DOCTYPE html>
<html>
 <head>
  <title>Course results</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>body{
      background-color : ;
      font-size: 1.5rem;
    }</style>
 </head>
 <body>
  <br />
  <div class="container">
   <div class="card ">
   
   <div class="card-header text-center"><h3>Search Results</h3></div>
    <div class="card-body">
    
     <div class="table-responsive">
      <table class="table table-striped ">
       <thead class="thead-dark">
        <tr>
         <th >Course Name</th>
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