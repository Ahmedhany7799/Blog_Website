
@extends('layouts.app')

@section('title') Show @endsection

@section('content')
<div class="card" style="width: 18rem;margin-left: 200px;margin-top: 50px">
    <img src={{$info->img}}

     class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$info->title}}</h5>
        <p class="card-text">{{$info->descriptions}}</p>
    </div>
</div>




<div class="card" style="margin-top: 50px;margin-outside:20">
    <h5 class="card-header">Post info</h5>
    <div class="card-body">
        <h5 class="card-title">{{$info->title}}</h5>
        <p class="card-text">{{$info->descriptions}}</p>
    </div>
</div>

<div class="card" style="margin-top: 50px">
    <h5 class="card-header">Person info</h5>
    <div class="card-body">
        <h5 class="card-title">{{$info->user?$info->user->name:"Not found"}}</h5>
        <p class="card-text">{{$info->user?$info->user->email:"Not found"}}</p>
        <p class="card-text">{{$info->created_at}} </p>

    </div>
</div>

{{--@endforeach--}}
@endsection
