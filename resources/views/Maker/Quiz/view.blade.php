@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$name}}</h1>
        </div>
        @if(session('success') == true)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>card removed!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @foreach($data as $d)
            <div class="row">
                <div class="card w-75 mt-2">
                    <h2 class="card-title">{{$d->name}}</h2>
                    <div class="card-body">
                        <img src="{{$d->picture_url}}" alt="{{$d->name}}" style="width: 80%">
                    </div>
                    <div class="card-body">
                        <form action="{{route('information.destroy',$d->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">remove</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

