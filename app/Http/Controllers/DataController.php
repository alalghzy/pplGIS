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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => 'required|min:5',
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi' => 'required|min:5',
            'latitude'  => 'required|min:5',
            'longitude' => 'required|min:5',
        ]);

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
            'deskripsi'     => $request->deskripsi,
            'latitude'   => $request->latitude,
            'longitude'   => $request->longitude,
        ]);

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
            'nama'     => 'required',
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi'     => 'required',
            'latitude'   => 'required',
            'longitude'   => 'required',
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
                'deskripsi'     => $request->deskripsi,
                'latitude'      => $request->latitude,
                'longitude'     => $request->longitude,
            ]);
        } else {

            $post->update([
                'nama'     => $request->nama,
                'deskripsi'     => $request->deskripsi,
                'latitude'   => $request->latitude,
                'longitude'   => $request->longitude,
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
