<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
	public function category($id) {
		if(\App\Models\Category::find($id)) {
		$posts = \App\Models\Post::with('categories','user')->whereHas('categories', function($q) use ($id){
            $q->where('id', $id);
        })->get();;
		//return $posts;

		return view('category',compact('posts'));
	}
	else

		abort(404);
	}
}