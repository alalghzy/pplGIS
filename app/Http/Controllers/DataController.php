<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get posts
        $posts = Post::latest()->get();

        return view('admin.lamanData', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function deleteImage(string $id)
    {
        // Get post by ID
        $post = Post::findOrFail($id);

        // Check if the post has an associated image
        if ($post->image) {
            // Delete the image file
            Storage::delete('public/posts/' . $post->image);

            // Update the post to remove the reference to the deleted image
            $post->update(['image' => '']);

            // Redirect back or to any other route as needed
            return redirect()->back()->with('message', 'Gambar berhasil dihapus!');
        }

        // If no image is associated, redirect with a message
        return redirect()->back()->with('message', 'Data tidak memiliki gambar!');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => 'required|unique:posts,nama',
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'latitude'  => 'required|numeric',
            'longitude' => 'required|numeric',
            'kedalaman' => 'required|numeric',
        ]);
//check if image is uploaded
if ($request->hasFile('image')) {

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            if ($validator->fails()) {
                return back()
                    ->with('failed', 'Data gagal ditambahkan!')
                    ->withInput()
                    ->withErrors($validator);
            }

            // Cek jika latitude dan longitude sama
            $existingPost = Post::where('latitude', $request->latitude)
                ->where('longitude', $request->longitude)
                ->first();

            if ($existingPost) {
                return back()
                    ->with('failed', 'Data koordinat sudah ada!')
                    ->withInput();
            }

            //create post
            Post::create([
                'nama'     => $request->nama,
                'image'     => $image->hashName(),
                'latitude'   => $request->latitude,
                'longitude'   => $request->longitude,
                'kedalaman'   => $request->kedalaman,
            ]);
} else {

    if ($validator->fails()) {
        return back()
            ->with('failed', 'Data gagal ditambahkan!')
            ->withInput()
            ->withErrors($validator);
    }

    // Cek jika latitude dan longitude sama
    $existingPost = Post::where('latitude', $request->latitude)
        ->where('longitude', $request->longitude)
        ->first();

    if ($existingPost) {
        return back()
            ->with('failed', 'Data koordinat sudah ada!')
            ->withInput();
    }

    //create post
    Post::create([
        'nama'     => $request->nama,
        'image'     => '',
        'latitude'   => $request->latitude,
        'longitude'   => $request->longitude,
        'kedalaman'   => $request->kedalaman,
    ]);
}


        // Redirect to index
        return back()->with('message', 'Data berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find post by 'id_post' or throw an exception if not found
        $post = Post::findOrFail($id);

        // Render view with post
        return view('admin.lamanTabel', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required|unique:posts,nama',
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'latitude'   => 'required|numeric',
            'longitude'   => 'required|numeric',
            'kedalaman' => 'required|numeric',
        ]);

        // // Cek jika latitude dan longitude sama
        // $existingPost = Post::where('latitude', $request->latitude)
        //     ->where('longitude', $request->longitude)
        //     ->first();

        // if ($existingPost) {
        //     return back()
        //         ->with('failed', 'Data koordinat sudah ada!')
        //         ->withInput();
        // }

        //get post by ID
        $post = Post::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/' . $post->image);

            //update post with new image
            $post->update([
                'image'         => $image->hashName(),
                'nama'          => $request->nama,
                'latitude'      => $request->latitude,
                'longitude'     => $request->longitude,
                'kedalaman'     => $request->kedalaman,
            ]);
        } else {

            $post->update([
                'nama'     => $request->nama,
                'latitude'   => $request->latitude,
                'longitude'   => $request->longitude,
                'kedalaman'  => $request->kedalaman,
            ]);
        }

        //redirect to index
        return redirect()->route('tabel.index')->with('message', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get post by ID
        $post = Post::findOrFail($id);


        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('tabel.index')->with('message', 'Data berhasil dihapus!');
    }

    // public function multipleDelete(Request $request)
    // {
    //     $ids = $request->ids;
    //     Post::whereIn('id_post', explode(",", $ids))->delete();

    //     return response()->json(['status' => true, 'message' => 'Data berhasil disimpan!']);
    // }
}
