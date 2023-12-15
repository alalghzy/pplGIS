<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Karang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $post = Post::with('karangs')->get();
        $posts = Post::all();
        $stasiun = Post::orderBy('nama', 'asc')->get();

        $users = User::latest()->whereIn('status', ['Petani', 'Pembimbing', 'Tidak Ada'])->paginate(50);
        $hasNullStatus = $users->contains('status', 'Tidak Ada');

        return view('dist.lamanStasiun', compact('stasiun', 'post', 'posts', 'hasNullStatus'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function deleteImage(string $id)
    {

        $post = Post::findOrFail($id);

        if ($post->image) {

            Storage::delete('public/posts/' . $post->image);

            $post->update(['image' => '']);

            return redirect()->back()->with('message', 'Gambar berhasil dihapus!');
        }

        return redirect()->back()->with('message', 'Data tidak memiliki gambar!');
    }


    public function store(Request $request)
    {
        $user = Auth::user()->name;
        $validator = Validator::make($request->all(), [
            'nama'      => 'required|unique:posts,nama',
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'latitude'  => 'required|numeric',
            'longitude' => 'required|numeric',
            'kedalaman' => 'required|numeric|min:0',
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            if ($validator->fails()) {
                return back()
                    ->with('failed', 'Data gagal ditambahkan!')
                    ->withInput()
                    ->withErrors($validator);
            }

            $existingPost = Post::where('latitude', $request->latitude)
                ->where('longitude', $request->longitude)
                ->first();

            if ($existingPost) {
                return back()
                    ->with('failed', 'Data koordinat sudah ada!')
                    ->withInput()
                    ->withErrors($validator);
            }

            Post::create([
                'nama'          => $request->nama,
                'image'         => $image->hashName(),
                'latitude'      => $request->latitude,
                'longitude'     => $request->longitude,
                'kedalaman'     => $request->kedalaman,
                'pengguna'      => $user,
            ]);
        } else {

            if ($validator->fails()) {
                return back()
                    ->with('failed', 'Data gagal ditambahkan!')
                    ->withInput()
                    ->withErrors($validator);
            }

            $existingPost = Post::where('latitude', $request->latitude)
                ->where('longitude', $request->longitude)
                ->first();

            if ($existingPost) {
                return back()
                    ->with('failed', 'Data koordinat sudah ada!')
                    ->withInput()
                    ->withErrors($validator);
            }

            Post::create([
                'nama'           => $request->nama,
                'image'          => '',
                'latitude'       => $request->latitude,
                'longitude'      => $request->longitude,
                'kedalaman'      => $request->kedalaman,
                'pengguna'       => $user,
            ]);
        }

        return back()->with('message', 'Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        $post = Post::with('karangs')->findOrFail($id);
        $posts = Post::all();

        // Mengambil data dari tabel karangs
        $karangsData = $post->karangs->first();

        // Menyusun data untuk dikirim ke view
        $chartData = null;

        // Pastikan $karangsData tidak null sebelum mengambil nilai-nilai spesifik
        if ($karangsData) {
            $chartData = [
                'karang_hidup'  => $karangsData->karang_hidup,
                'karang_mati'   => $karangsData->karang_mati,
                'algae'         => $karangsData->algae,
                'abiotik'       => $karangsData->abiotik,
                'biota_lain'    => $karangsData->biota_lain,
            ];
        }

        return view('dist.lamanDetail', compact('post', 'posts', 'chartData'));
    }



    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $user = Auth::user()->name;

        $validator = Validator::make($request->all(), [
            'nama'      => 'required|unique:posts,nama,' . $id,
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'latitude'  => 'required|numeric',
            'longitude' => 'required|numeric',
            'kedalaman' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return back()
                ->with('failed', 'Data gagal ditambahkan!')
                ->withInput()
                ->withErrors($validator);
        }

        $existingPost = Post::where('latitude', $request->latitude)
            ->where('longitude', $request->longitude)
            ->where('id', '!=', $id)
            ->first();

        if ($existingPost) {
            return back()
                ->with('failed', 'Data koordinat sudah ada!')
                ->withInput();
        }

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            Storage::delete('public/posts/' . $post->image);

            $post->update([
                'image'         => $image->hashName(),
                'nama'          => $request->nama,
                'latitude'      => $request->latitude,
                'longitude'     => $request->longitude,
                'kedalaman'     => $request->kedalaman,
                'pengguna'      => $user,
            ]);
        } else {

            $post->update([
                'nama'          => $request->nama,
                'latitude'      => $request->latitude,
                'longitude'     => $request->longitude,
                'kedalaman'     => $request->kedalaman,
                'pengguna'      => $user,
            ]);
        }

        return redirect()->route('stasiun.index')->with('message', 'Data berhasil diedit!');
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('stasiun.index')->with('message', 'Data berhasil dihapus!');
    }

    public function delete_all(Request $request)
    {
        $ids = $request->ids;
        $deletedRows = Post::whereIn('id', explode(",", $ids))->delete();

        if ($deletedRows > 0) {
            return response()->json(['status' => true, 'message' => 'Data berhasil dihapus!']);
        } else {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan atau gagal dihapus.']);
        }
    }
}
