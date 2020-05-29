@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>add data</h1>
        </div>
        @if(session('success') == true)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>file saved!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <form enctype="multipart/form-data" action="{{route('information.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="file">picture</label>
                    <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <div class="form-group">
                    <label for="quiz">select your quiz</label>
                    <select name="quiz" id="quiz" class="form-control">
                        @foreach($data as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">create</button>
            </form>
        </div>
    </div>
@endsection


