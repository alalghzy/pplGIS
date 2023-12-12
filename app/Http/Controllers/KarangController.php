<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Karang;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        return view('dist.lamanKarang', compact('karangs', 'posts'));
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
            'post_id'       => 'required|exists:posts,id',
            'user_id'       => 'required|exists:users,id',
            'algae'         => 'required|numeric',
            'abiotik'       => 'required|numeric',
            'biota_lain'    => 'required|numeric',
            'acb'           => 'required|numeric',
            'acd'           => 'required|numeric',
            'ace'           => 'required|numeric',
            'acs'           => 'required|numeric',
            'act'           => 'required|numeric',
            'cb'            => 'required|numeric',
            'cf'            => 'required|numeric',
            'ce'            => 'required|numeric',
            'cm'            => 'required|numeric',
            'cs'            => 'required|numeric',
            'cmr'           => 'required|numeric',
            'chl'           => 'required|numeric',
            'cme'           => 'required|numeric',
            'dc'            => 'required|numeric',
            'dca'           => 'required|numeric',
            'karang_hidup'  => 'required|numeric',
            'karang_mati'   => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()
                ->with('failed', 'Data gagal ditambahkan!')
                ->withInput()
                ->withErrors($validator);
        }

        // Simpan data ke database
        Karang::create([
            'post_id'       => $request->post_id,
            'user_id'       => $request->user_id,
            'algae'         => $request->algae,
            'abiotik'       => $request->abiotik,
            'biota_lain'    => $request->biota_lain,
            'acb'           => $request->acb,
            'acd'           => $request->acd,
            'ace'           => $request->ace,
            'acs'           => $request->acs,
            'act'           => $request->act,
            'cb'            => $request->cb,
            'cf'            => $request->cf,
            'ce'            => $request->ce,
            'cm'            => $request->cm,
            'cs'            => $request->cs,
            'cmr'           => $request->cmr,
            'chl'           => $request->chl,
            'cme'           => $request->cme,
            'dc'            => $request->dc,
            'dca'           => $request->dca,
            'karang_hidup'  => $request->karang_hidup,
            'karang_mati'   => $request->karang_mati,
        ]);

        return redirect()->route('karang.index')->with('message', 'Data berhasil ditambahkan');
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
    public function destroy(string $id)
    {
        $post = Karang::findOrFail($id);

        $post->delete();

        return redirect()->route('karang.index')->with('message', 'Data berhasil dihapus!');
    }
}
