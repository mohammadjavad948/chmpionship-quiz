@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$name}}</h1>
            <a href="{{route('quiz.reset')}}" class="btn btn-danger">reset quiz</a>
        </div>
            <div class="row">
                <div class="card w-75 mt-2">
                    <h2 class="card-title">{{$first->name}}</h2>
                    <div class="card-body">
                        <img src="{{$first->picture_url}}" alt="{{$first->name}}" style="width: 80%">
                    </div>
                    <div class="card-body">
                        <form action="{{route('quiz.next')}}" method="post">
                            @csrf
                            <input type="hidden" name="select" value="first">
                            <input type="hidden" name="id" value="{{$first->id}}">
                            <button type="submit" class="btn btn-success">select</button>
                        </form>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="card w-75 mt-2">
                <h2 class="card-title">{{$second->name}}</h2>
                <div class="card-body">
                    <img src="{{$second->picture_url}}" alt="{{$second->name}}" style="width: 80%">
                </div>
                <div class="card-body">
                    <form action="{{route('quiz.next')}}" method="post">
                        @csrf
                        <input type="hidden" name="select" value="second">
                        <input type="hidden" name="id" value="{{$second->id}}">
                        <button type="submit" class="btn btn-success">select</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

