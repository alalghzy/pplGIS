<?php

namespace App\Http\Controllers;

use App\Models\Karang;
use App\Models\Post;
use Illuminate\Http\Request;

class KarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.lamanKarang', compact('posts'));
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
    public function show(Karang $karang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karang $karang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karang $karang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karang $karang)
    {
        //
    }
}
