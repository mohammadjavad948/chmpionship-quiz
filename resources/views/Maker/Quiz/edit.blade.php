@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>edit quiz</h1>
        </div>
        <div class="row">
            <form action="{{route('quiz.update',$data->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">quiz name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{$data->name}}">
                </div>
                <button type="submit" class="btn btn-success">create</button>
            </form>
        </div>
    </div>
@endsection

