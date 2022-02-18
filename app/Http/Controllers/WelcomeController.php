<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
	public function index() {
        if(isset(request()->term)) {
        $posts= Post::query();
        if (request('term')) {
            $posts->where('title', 'Like', '%' . request('term') . '%');
        }

        $searchResults = $posts->orderBy('id', 'DESC')->paginate(3);
        return view('welcome', compact('searchResults'));
    }
    else {
        $posts = \App\Models\Post::with('user')->get();
		return view('welcome', compact('posts'));
	}
	}

	public function list() {
		$categories = \App\Models\Category::get();
		return view('categories', compact('categories'));
	}

	public function add() {
		//return request();
		$validatedData=request()->validate(['name'=> 'required',]);

		$category = new Category;
		$category->name = request()->name;
		$category->save();

		return redirect()->to("categories");	
	}

	public function edit($id) {
		//return request();
		$categories = \App\Models\Category::get();
		$category_edit = \App\Models\Category::find($id);
		return view('categories', compact('category_edit','categories'));
	}

	public function update($id) {
		$category = \App\Models\Category::find($id); 
        $category->name = request()->name;
        $category->update();
        return redirect()->to("categories");
	}

	public function delete($id) {
		$category = \App\Models\Category::get();
		$category = \App\Models\Category::find($id);
		$category->delete();
		return redirect()->to("categories");
	}

}