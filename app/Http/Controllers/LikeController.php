<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function store(Request $request){
        Like::create([
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id
        ]);
    }
}
