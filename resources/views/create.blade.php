@extends('layouts.app')

@section('content')



<div class="row">
    <div class="col-md-6 col-md-offset-3" id="form_container">
        <h2>Contact Us</h2>
        <p>
           Please send your message below. We will get back to you at the earliest!
        </p>
        <form role="form" method="post" action="@if(isset($todo)) {{route('update', $todo->id)}} @else {{route('store')}}@endif" id="reused_form">
        <div class="row">
                <div class="col-sm-6 form-group">
                    <label for="title">
                        Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$todo->title ?? ''}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="message">
                        Message:</label>
                    <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7">{{$todo->message ?? ''}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    <label for="email">
                        Email:</label>
                    <input type="email" class="form-control" id="email" name="email"  value="{{$todo->email ?? ''}}" >
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12 form-group">
                    <button type="submit" class="btn btn-lg btn-default pull-right" >Send →</button>
                </div>
            </div>
            @csrf
        </form>
    </div>
</div>
@endsection
@include('includes/errors')
