<?php

namespace App\Http\Controllers;

use App\Models\Karang;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karangs = Karang::all();
        $posts = Post::all();
        return view('dist.lamanKarang', compact('karangs','posts'));
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
            'stasiun'     => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->with('failed', 'Data gagal ditambahkan!')
                ->withInput()
                ->withErrors($validator);
        }

        Karang::create([
            'stasiun'        => $request->stasiun,
        ]);
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
