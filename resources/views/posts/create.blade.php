@extends('layouts.app')

@section('title') Create @endsection

@section('content')



{{--//دي هتظهر الايرور علي حسب الvalidation الي كتبته automatic--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Create Post Form -->
    <center>


<form method="POST" action="{{route("posts.store")}}">
    @csrf


        <span class="input-group-text" id="basic-addon1">Text</span>
        <input  class="input-group mb-3 mt-2" type="text" name="title"   aria-describedby="basic-addon1">





        <span class="input-group-text">Textarea</span>
        <textarea  class="input-group mb-2 mt-2" name="descriptions" aria-label="With textarea"></textarea>


    <div class="mb-3">
        <label  class="form-label">Post Creator</label>
        <select name="post_creator" class="form-control">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <button  class="btn btn-success mt-5">Submit</button>

</form>
</center>
@endsection
