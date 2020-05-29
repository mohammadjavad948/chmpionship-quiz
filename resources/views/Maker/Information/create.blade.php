@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>add data</h1>
        </div>
        <div class="row">
            <form action="{{route('information.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="file">picture</label>
                    <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-success">create</button>
            </form>
        </div>
    </div>
@endsection


