@extends('master')

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Dashboard</a>
    <p class="float-right mt-2"> <a href="{{ url('edit')}}" class="text-success" style="color:!important;">Change
            password</a></p>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
        aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" style="float:right"> Welcome: {{ ucfirst(Auth()->user()->name) }} </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('logout') }}"> Logout </a>
            </li>
        </ul>
    </div>


    </div>
</nav>

<form action="" method="post">

    <div class="form-group">
        <div class="row mt-5">
            <div class="col-lg-6">

                <label>city</label>
                <input type="text" name="city" placeholder="enter your city"
                    value="{{ ucfirst(Auth()->user()->city) }}">
            </div>
            <div class="row mt-6">
                <div class="col-lg-12">
                    <label>state</label>
                    <input type="text" name="state" placeholder="enter your state"
                        value="{{ ucfirst(Auth()->user()->state) }}">
                </div>
            </div>
            <div class="row mt-5">

                <div class="col-lg-12">

                    <a href="{{url('editpage')}}/{{$productlist}}" class="btn btn-primary">Edit</a>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="text-align:center;">

                <a href="{{url('listpage')}}/{{$productlist}}" class="btn btn-danger">show your details</a>
            </div>

        </div>





</form>


@endsection
