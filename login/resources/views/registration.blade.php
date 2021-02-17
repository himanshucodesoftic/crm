
@extends('master')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
            <form method="post" action=" {{ url('user-store') }} ">
                <div class="card shadow mb-4" >
                    <div class="car-header bg-success pt-2" >
                        <div class="card-title font-weight-bold text-white text-center" style="boder:2px solid red">  User Registration </div>
                    </div>

                    <div class="card-body">

                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif

<div class="row">
<div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name"> First Name </label>
                            <input type="text" name="name" id="first_name" class="form-control" placeholder="Enter First Name" value="{{ old('first_name') }}"/>
                            {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="email"> E-mail </label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter E-mail" value="{{ old('email') }}"/>
                            {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
                        </div>

                        </div>
                        </div>
                        
<div class="row">
<div class="col-md-6">

<div class="form-group">
                            <label for="password"> Password </label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="{{ old('password') }}"/>
                            {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
                        </div>
</div>
<div class="col-md-6">
<div class="form-group">
                            <label for="confirm_password"> Confirm Password </label>
                            <input type="password" name="confirmpassword" id="confirm_password" class="form-control" placeholder="Confirm Password" value="{{ old('confirm_password') }}">
                            {!! $errors->first('confirmpassword', '<small class="text-danger">:message</small>') !!}
                        </div>

</div>
</div>
                       
                      
<div class="row">


<div class="col-md-6">
<div class="form-group">
                            <label for="phone"> username</label>
                            <input type="text" id="txt_username" name="txt_username" class="form-control" placeholder="Enter Username" />
   <!-- Response -->
   <span id="error_email"></span>
                           
                        </div>

</div>
<div class="col-md-6">

<div class="form-group">
                            <label for="phone"> city</label>

                            
                            <input type="text" name="city" id="city" class="form-control" placeholder="Enter your city" value="{{ old('city') }}">
                            {!! $errors->first('city', '<small class="text-danger">:message</small>') !!}
                        </div>

</div>
</div>
                        

                       

                      

                        <div class="form-group">
                            <label for="phone"> state</label>
                            <input type="phone" name="state" id="state" class="form-control" placeholder="Enter your state" value="{{ old('state') }}">
                            {!! $errors->first('username', '<small class="text-danger">:message</small>') !!}
                        </div>

                    </div>

                    <div class="card-footer d-inline-block">
                        <button type="submit" class="btn btn-success" id="register"> Register </button>
                    <p class="float-right mt-2"> Already have an account?  <a href="{{ url('user-login')}}" class="text-success"> Login </a> </p>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
</div>




@endsection

