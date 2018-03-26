@extends('layouts/main')

@section('content')
<center>
<!--update message -->
@if(session()->has('msg'))
    <div class="alert alert-success">
        {{ session()->get('msg') }}
    </div>
@endif
    <div class="container">
    <div class="col-md-5">
        <div class="form-area">  
            <form role="form" method="post" action="{{ route('views.update', $contact->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <br style="clear:both">
                        <h3 style="margin-bottom: 25px; text-align: center;">Edit Contact</h3>
                        <div class="form-group">
                            <input type="text" class="form-control"  name="name" placeholder="Full Name" value="{{ $contact->name}}">
                            @if ($errors->has('name'))
                                <strong style="color:red">{{$errors->first('name')}}</strong>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{$contact->phone}}">
                            @if ($errors->has('phone'))
                                <strong style="color:red">{{$errors->first('phone')}}</strong>
                            @endif
                        </div>

            <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</center>

@endsection
