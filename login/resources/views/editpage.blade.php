@extends('master')

@section('content')

<form action="{{url('admin/update_product')}}/{{$jp_obj['id']}}" method="post">

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
            <div class="row mt-6">

                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>

                </div>

            </div>


</form>

@endsection
