<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Post;
use App\Models\PostImage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->except(['page']);
        foreach($filter as $index => $value) {
            if($value == '' || $value == null || $index == 'sort') {
                unset($filter[$index]);
            }
        }

        $posts = new Post();
        $posts = $posts->where($filter);

        if ($request->has('sort') && $request->sort != null) {
            $sort = explode(',', $request->input('sort'));
            $posts = $posts->orderBy($sort[0], $sort[1]);
        } else{
            $posts = $posts->orderBy('created_at', 'desc');
        }

        $posts = $posts->paginate(50);

        $postimage = PostImage::all();

        return view('posts.index', compact('posts','postimage','filter'));
    }

    public function store(Request $request)
    {
        try {
            $data = $data = $request->except(['_token', 'imagefile']);
            $post = Post::create($data);

            // Upload image
            if($request->has('imagefile')) {
                foreach($request->file('imagefile') as $file) {
                    $file_name = uniqid().'_'.preg_replace('/\s+/', '_', $file->getClientOriginalName());
                    $file_mime = $file->getClientMimeType();
                    $file->storeAs('public/post/', $file_name);
                    PostImage::create([
                        'postid' => $post->id,
                        'created_by' => $post->id,
                        'mime_type' => $file_mime,
                        'name' => $file_name
                    ]);
                }
            }
        return redirect('/')->with('success', 'Post Submitted.');

        } catch(\Exception $e) {
            dd($e);
            return back()->with('error', $e->getMessage())->withInput();
        }
    }


    public function form()
    {
        return view('posts.form');
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $posts = Post::where('name', 'LIKE', "%$query%")
                    ->orWhere('description', 'LIKE', "%$query%")
                    ->get();

        $postimage = PostImage::all();

        return view('posts.index', compact('posts','postimage'));
    }
}
