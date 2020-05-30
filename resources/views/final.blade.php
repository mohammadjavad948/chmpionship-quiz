@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>winner is {{$data->name}}</h1>
            <a href="{{route('quiz.reset')}}" class="btn btn-danger">reset quiz</a>
        </div>
        <div class="row">
            <div class="card w-75 mt-2">
                <h2 class="card-title">{{$data->name}}</h2>
                <div class="card-body">
                    <img src="{{$data->picture_url}}" alt="{{$data->name}}" style="width: 80%">
                </div>
            </div>
        </div>
    </div>
@endsection


