<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Post;

class WelcomeController extends Controller 
{

     /**
     * After each action redirects to the home
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $posts = DB::table('posts')->orderBy('publication_date','desc')->get();
        return view('welcome')->with('posts', $posts);
    }

    /**
     * Display the specified post resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if ($post){
            return view('posts/show')->with('post', $post);
        } else {
            return redirect($this->redirectTo)->with('error', 'Post does not exist.');
        }
    }

}
