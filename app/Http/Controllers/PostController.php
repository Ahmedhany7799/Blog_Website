<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $postsFromDB=Post::all();
//$AllPosts=[
//    ['id'=>1,'Name'=>'hello','PostedBy'=>'ahmed','CreatedAt'=>'2024-4-2 10:03:20 PM'],
//    ['id'=>2,'Name'=>'DART','PostedBy'=>'mahmoud','CreatedAt'=>'2024-3-21 1:30:40 AM'],
//    ['id'=>3,'Name'=>'PHP','PostedBy'=>'ali','CreatedAt'=>'2023-12-2 5:32:55 AM'],

   // ];
return view("posts.index",
['info'=>$postsFromDB]);
    }

    public function show(Post $post)
    {
        $Posts=[
            ['postId'=>1,'Name'=>'Ahmed Hany','email'=>'ahmed@a.com','CreatedAt'=>'2024-4-2 10:03:20 PM','img'=>"https://media.kenanaonline.com/photos/1238481/1238481174/gallery_1238481174.jpg?1442758476",'title'=>'Cristiano Ronaldo','descriptions'=>"The best of all time in the world!",],
            ['postId'=>2,'Name'=>'mahmoud reda','email'=>'mahmoud@a.com','CreatedAt'=>'2024-4-2 10:03:20 PM','img'=>"https://media.kenanaonline.com/photos/1238481/1238481174/gallery_1238481174.jpg?1442758476",'title'=>'Cristiano Ronaldo','descriptions'=>"The best of all time in the world!",],
            ['postId'=>3,'Name'=>'Ali nabil','email'=>'ali@a.com','CreatedAt'=>'2024-4-2 10:03:20 PM','img'=>"https://media.kenanaonline.com/photos/1238481/1238481174/gallery_1238481174.jpg?1442758476",'title'=>'Cristiano Ronaldo','descriptions'=>"The best of all time in the world!",],


        ];
      //  $singlePostfromDB=Post::find($postId); //model object  (the best Used)

       // $singlePostfromDB=Post::where('id',$postId)->first();// model object (stop when condition completed for once)

        //$singlePostfromDB=Post::where('id',$postId)->get();// collection object ( excuted when all is achieved)

        //$singlePost=['postId'=>1,'Name'=>'Ahmed Hany','email'=>'ahmed@a.com','CreatedAt'=>'2024-4-2 10:03:20 PM','img'=>"https://media.kenanaonline.com/photos/1238481/1238481174/gallery_1238481174.jpg?1442758476",'title'=>'Cristiano Ronaldo','descriptions'=>"The best of all time in the world!",];

        return view("posts.show",['info'=>$post]);
}

    public function create()
    {
        $userfromDB=User::all();
        return view("posts.create",['users'=>$userfromDB]);
}

    public function store()
    {
///validation code if exist

        request()->validate([
           'title'=>['required','min:3'],
           'descriptions'=>['required','min:5'],
            'post_creator'=>['required','exists:users,id'],
        ]);




        // 1- store the user data in variables

        $data=request()->all();
//return $data;
        $title=request()->title;
        $descriptions=request()->descriptions;
        $postCreator=request()->post_creator;

        //dd($title.$descriptions,$postCreator,$data);
        // 2- store the userdata in database
///الطريقه الاولي
        $post= new Post(); //1- خدنا object من المودل الي اسمه Post

$post-> title =$title;

        $post-> descriptions =$descriptions;
        $post-> user_id =$postCreator;
//        $post-> email ='Me@m.com';


        //2- خدنا القيم الي خزنا ف المتغيرات ف اول خطوخ خالص ف ال create وخزناا ف الاوبجكت من المودل

        $post-> save();  //3- نحفظ الي اتعمل

///الطريقه الثانيه

     //   Post::create([
        //    'title'=>$title,
        //    'descriptions'=>$descriptions
      //  ]);
        // 3- redirection in the home page
        return to_route("posts.index");
    }

    public function edit(Post $post)
    {
        $userfromDB=User::all();
        return view("posts.edit",['users'=>$userfromDB,'postdetailed'=>$post]);
    }
    public function update($postid)
    {
        request()->validate([
            'title'=>['required','min:3'],
            'descriptions'=>['required','min:5'],
            'post_creator'=>['required','exists:users,id'],
        ]);
        // 1- store the user data in variables

        $title=request()->title;
        $descriptions=request()->descriptions;
        $postCreator=request()->post_creator;

        //dd($title.$descriptions,$postCreator,$data);
        // 2- update the userdata in database


        //step 1:- select the row with id
        //step 2:- update it


        $singlePostfromDB=Post::findOrfail($postid);
        $singlePostfromDB->update([
            'title'=>$title,
            'descriptions'=>$descriptions,
            'user_id' =>$postCreator,

        ]);

        // 3- redirection in the show page
        return to_route("post.show",$postid);
    }

    public function destroy($postid)
    {


        // 1- delete the userdata in database

        //step 1:- select the row with id
        //step 2:- delete it
        $singlePost=Post::find($postid);

$singlePost->delete();

        // 3- redirection in the home page
        return to_route("posts.index");
    }
}

