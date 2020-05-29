@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>your quizzes</h1>
        </div>
        <div class="row">
            <a href="{{route('quiz.create')}}" class="btn btn-success">create</a>
        </div>
        @foreach($data as $d)
            <div class="row">
                <div class="card w-75 mt-2">
                    <h2 class="card-title">{{$d->name}}</h2>
                    <div class="card-body">
                        <div class="row">
                            <a href="{{route('quiz.edit',$d->id)}}" class="btn btn-warning col">edit</a>
                            <a href="{{route('quiz.show',$d->id)}}" class="btn btn-success col">view</a>
                            <form action="{{route('quiz.destroy',$d->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger col">remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
