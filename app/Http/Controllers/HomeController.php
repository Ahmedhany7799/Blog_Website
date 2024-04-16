<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

  public  function firstAction()
    {
        $message="Welcome to first day in laravel ";
        $a=['ahmed',245,false];

        return view('/home',
        ['w'=>$message,
            'a'=>$a
        ]
        );

    }


    public function greet()
    {
        echo "Welcome yaa m3l3m";
    }
}
