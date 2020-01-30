@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/todo" class="btn btn-primary"> Create ToDo </a>

  


                    @if(isset($todo))
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                            <tbody>
                                    @foreach($todo as $val)
                                        <tr>
                                            <th scope="row">{{$val->id}}</th>
                                            <td scope="row">{{$val->title}}</td>
                                            <td scope="row"><a href="{{route('show', $val->id)}}" class="btn btn-success">Edit</a></td>
                                            <td scope="row"><a href="{{route('delete', $val->id)}}" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    @endforeach
                    @else
                        <h2> No To Do Set </h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
