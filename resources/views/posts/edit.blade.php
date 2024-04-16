@extends('layouts.app')

@section('title') Edit @endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <center>

        <form method="POST" action="{{route("posts.update",$postdetailed->id)}}">
            @csrf
@method("PUT");
        <span class="input-group-text" id="basic-addon1">Text</span>
            <input  class="input-group mb-3 mt-2" type="text" name="title" value="{{$postdetailed->title}}"  aria-describedby="basic-addon1">





            <span class="input-group-text">Textarea</span>
            <textarea  class="input-group mb-2 mt-2" name="descriptions" aria-label="With textarea">{{$postdetailed->descriptions}}</textarea>



            <div class="mb-3">
                <label  class="form-label">Post Creator</label>
                <select name="post_creator" class="form-control">
                    @foreach($users as $user)
                        <option @if($user->id==$postdetailed->user_id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <button  class="btn btn-primary mt-5">update</button>

        </form>
    </center>
@endsection
