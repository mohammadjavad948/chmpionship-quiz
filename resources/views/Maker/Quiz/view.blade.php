@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$name}}</h1>
        </div>
        @foreach($data as $d)
            <div class="row">
                <div class="card w-75 mt-2">
                    <h2 class="card-title">{{$d->name}}</h2>
                    <div class="card-body">
                        <img src="{{$d->picture_url}}" alt="{{$d->name}}" style="width: 80%">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

