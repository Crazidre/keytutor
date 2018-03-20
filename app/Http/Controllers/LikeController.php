<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LikeController extends Controller
{
    public function like( Request $request ,  $model) {

        auth()->user()->like($model); 

        return 'liked.'; 

    }

    public function unlike( Request $request ,  $model) {

        auth()->user()->unlike($model); 

        return 'unliked'; 

    }
}
