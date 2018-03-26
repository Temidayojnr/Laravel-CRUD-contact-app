@extends('layouts/main')

@section('content')
<center>
    <div class="container">
    <div class="col-md-5">
        <div class="form-area">  
            <form role="form" method="post" action="{{ route('views.store') }}">
            {{ csrf_field() }}
            <br style="clear:both">
                        <h3 style="margin-bottom: 25px; text-align: center;">Contact Form</h3>
                        <div class="form-group">
                            <input type="text" class="form-control"  name="name" placeholder="Full Name" value="{{ old('name')}}">
                            @if ($errors->has('name'))
                                <strong style="color:red">{{$errors->first('name')}}</strong>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{old('phone')}}">
                            @if ($errors->has('phone'))
                                <strong style="color:red">{{$errors->first('phone')}}</strong>
                            @endif
                        </div>

            <button type="submit" class="btn btn-primary pull-right">Create</button>
            </form>
        </div>
    </div>
</center>

@endsection

