<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Karang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karangs = Karang::with('post')->get()->sortBy(function($karang) {
            return $karang->post->nama;
        });

        $karang = Karang::all();
        $post = Post::with('karangs')->get();

        $posts = Post::orderBy('nama', 'asc')->get();

        $postsCount = Post::count();
        return view('home.home', compact('postsCount', 'karangs', 'posts', 'karang','post'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
