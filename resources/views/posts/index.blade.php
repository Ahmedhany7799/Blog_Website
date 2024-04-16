
@extends('layouts.app')
@section('title') Index @endsection
@section('content')
    <center><h1>Hello World!</h1>
        <a href="{{route("posts.create")}}">
            <div class="mt-5"><button type="button" class="btn btn-success">Add Post</button>
            </div>
        </a>
    </center>
<table class="table mt-5">

    <thead>

    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>

    </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach($info as $k=>$val)

    <tr>
        <th scope="row">{{$val->id}}</th>
        <td>{{$val->title}}</td>
        <td>{{$val->user?$val->user->name:"Not found"}}</td>
        <td>{{$val->created_at->format('y-m-d')}}</td>
        <td>

            <div>
               <a HREF="{{route("post.show",$val['id'])}}"> <button type="button" class="btn btn-primary">view</button></a>
                <a href="{{route("posts.edit",$val['id'])}}"> <button type="button" class="btn btn-secondary">edit</button></a>
<form style="display: inline;" method="POST" action="{{route("posts.destroy",$val['id'])}}">
    @csrf
    @method("DELETE")

    <button  type="submit" class="btn btn-danger"  onclick="myFunction()"  >delete</button>

    <script>
     function myFunction() {
            confirm("Are you sure to delete this post?");
        }
    </script>
</form>
            </div>
        </td>

    </tr>
    @endforeach
{{--    <tr>--}}
{{--        <th scope="row">2</th>--}}
{{--        <td>Jacob</td>--}}
{{--        <td>Thornton</td>--}}
{{--        <td>@fat</td>--}}
{{--        <td>--}}

{{--            <div>--}}
{{--                <button type="button" class="btn btn-primary">view</button>--}}
{{--                <button type="button" class="btn btn-secondary">edit</button>--}}
{{--                <button type="button" class="btn btn-danger">delete</button>--}}

{{--            </div>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <th scope="row">3</th>--}}
{{--        <td colspan="2">Larry the Bird</td>--}}
{{--        <td>@twitter</td>--}}
{{--        <td>--}}

{{--            <div>--}}
{{--                <button type="button" class="btn btn-primary">view</button>--}}
{{--                <button type="button" class="btn btn-secondary">edit</button>--}}
{{--                <button type="button" class="btn btn-danger">delete</button>--}}

{{--            </div>--}}
{{--        </td>--}}
{{--    </tr>--}}
    </tbody>
</table>

@endsection

