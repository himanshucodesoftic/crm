@extends('master')

@section('content')
<div class="form-group">

    <div class="row">
        <div class="col-md-6">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>city</th>
                        <th>Age</th>
                        <th>State</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
              
                    <tr>
                        <td>{{$crud->name}}</td>
                        <td>{{$crud->username}}</td>
                        <td>{{$crud->city}}</td>
                        <td>{{$crud->state}}</td>
                        <td><a href="{{('/destroy/{id}')}}" class="btn btn-danger">Delete</a></td>
                        <td>$320,800</td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                    <th>Name</th>
                        <th>Username</th>
                        <th>city</th>
                        <th>Age</th>
                        <th>State</th>
                        <th>Salary</th>
                  
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
