@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>your quizzes</h1>
        </div>
        <div class="row">
            <a href="{{route('quiz.create')}}" class="btn btn-success">create</a>
        </div>
        <div class="row">

        </div>
    </div>
@endsection
