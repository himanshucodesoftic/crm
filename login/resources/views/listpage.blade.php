<html>
<head>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <!-- <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

</head>
<body>



<div class="row">
  <div class="col-sm-8" >
    <div class="card">
      <div class="card-body" style="box-shadow: 5px 10px #888888;">
        <!-- <h5 class="card-title">Special title treatment</h5> -->
        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
     




<div class="row">
<div class="col-md-8">
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Confirm pasword</th>
                <th>city</th>
                <th>State</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$crud->id}}</td>
                <td>{{$crud->email}}</td>
                <td>{{$crud->confirmpassword}}</td>
                <td>{{$crud->city}}</td>
                <td>{{$crud->state}}</td>
                 
              
                <td>
                <form action="/task/{{ $crud->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button>Delete Task</button>
        </form
      </td>
            </tr>

        <tfoot>
            <tr>
            <th>Name</th>
                <th>Email</th>
                <th>Confirm pasword</th>
                <th>city</th>
                <th>State</th>
                <th>Delete</th>            </tr>
        </tfoot>
    </table>
    </div>
    </div>
    </div>
    </div>
  </div>

</div>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script>
  $(function(){
    $(document).ready(function() {
    $('#example').DataTable();
} );
  })
  </script>
  <script>
$(document).ready(function(){
 $('.delete_form').on('submit', function(){
  if(confirm("Are you sure you want to delete it?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
</script>
</body>
</html>
