<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\Contact;
use App\Models\Advertise;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->user()->id;
        $posts = \App\Models\Post::with('user')->paginate(3);
        $categories = \App\Models\Category::get();
        $advertise = \App\Models\Advertise::inRandomOrder()->first();
        return view('home', compact('posts','categories','advertise'));
    }

    public function add() {
        $categories = \App\Models\Category::get();
        return view('add_post', compact('categories'));
    }

    public function store() {
        $id = auth()->user()->id;
        $validatedData = request()->validate([
        'image' => 'required',
        'title' => 'required',
        'post' => 'required',
        'category' => 'required',
        ]);
        $post = new Post;
        $post->user_id = $id;
        $post->title = request()->title;
        $post->post = request()->post;
        if(request()->hasFile('image')) {
            $file = time().'.'.request()->image->extension();
           $post->image = 'storage/assets/'.$file;
           request()->image->move(storage_path('app/public/assets'), $file);
         }
        $post->save();
        $post->categories()->attach(request()->category);
        return redirect()->to("home");
    }

    public function edit($id) {

        $post_category=[];
        $categories = \App\Models\Category::get();
        $post = \App\Models\Post::find($id);
        foreach($post->categories as $category)
        {
            array_push($post_category, $category->id);

        }
        return view('add_post', compact('categories', 'post','post_category'));
    }

    public function update($id) {
        $validatedData = request()->validate([
        'title' => 'required',
        'post' => 'required',
        'category' => 'required',
        ]);
        $post = \App\Models\Post::find($id); 

       $post->title = request()->title;

       $post->post = request()->post;
       if(request()->hasFile('image')) {
            $file = time().'.'.request()->image->extension();
           $post->image = 'storage/assets/'.$file;
           request()->image->move(storage_path('app/public/assets'), $file);
         }
       $post->update();
       $post->categories()->sync(request()->category);
       return redirect()->to("home");
    }

    public function delete($id) {
        $post = \App\Models\Post::find($id);
        $post->delete();
        $post->categories()->detach();
        return redirect()->to("home");
    }

    public function view_blog($id) {

        $comments = \App\Models\Comment::where('post_id',$id)->get();
        $contacts = \App\Models\Contact::where('post_id',$id)->get();
        $loginID = auth()->user()->id;
        $post = \App\Models\Post::with('user')->find($id);
        return view('blog_post', compact('post','loginID','contacts','comments'));
    }

    public function author_posts($user_id) {
        $posts = \App\Models\Post::where('user_id',$user_id)->get();
        return view('author_posts', compact('posts'));
    }

    public function contact($id) {
        $post = \App\Models\Post::with('user')->find($id);
        //$post_id = $post->id;
        //$user_name = $post->user->name;
        return view('contact',compact('post')); 
    }

    public function contact_upload($id) {
        $validatedData = request()->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'suggestion' => 'required',
        ]);
        $contact = new Contact;
        $contact->name = request()->name;
        $contact->email= request()->email;
        $contact->phone = request()->phone;
        $contact->suggestion = request()->suggestion;
        $contact->post_id = $id;
        $contact->save();
        return redirect()->to("blog_post/$id");
    }

    public function advertise() {
        return view('advertise');
    }

    public function ad_store() {
        $validatedData = request()->validate([
        'image' => 'required',
        'text' => 'required',
        'url' => 'required',
        ]);
        $ad = new Advertise;
        $ad->text = request()->text;
        $ad->ad_url = request()->url;
        if(request()->hasFile('image')) {
            $file = time().'.'.request()->image->extension();
           $ad->image = 'storage/assets/'.$file;
           request()->image->move(storage_path('app/public/assets'), $file);
         }
        $ad->save();
        return redirect()->to("home");
    }
    
    public function comment($id) {
        $validatedData = request()->validate([
        'comment' => 'required',
        ]);
        $comment = new Comment;
        $comment->comment = request()->comment;
        $comment->post_id = $id;
        $comment->save();
        return redirect()->to("blog_post/$id");

    }

}
