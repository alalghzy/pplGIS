<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->whereIn('status', ['Petani', 'Pembimbing'])->paginate(50);
        return view('dist.lamanPengguna', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|',
            'email'      => 'required|unique:users,email',
            'status'     => 'required|',
            'password'   => 'required|',
        ]);

        if ($validator->fails()) {
            return back()
                ->with('failed', 'Data gagal ditambahkan!')
                ->withInput()
                ->withErrors($validator);
        }

        User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'status'        => $request->status,
            'password'      => $request->password,
        ]);

        return back()->with('message', 'Data berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|unique:users,name,' . $id,
            'email'      => 'required|unique:users,email,' . $id,
            'status'     => 'required|',
        ]);

        if ($validator->fails()) {
            return back()
                ->with('failed', 'Data gagal ditambahkan!')
                ->withInput()
                ->withErrors($validator);
        }

        $post = User::findOrFail($id);

        $post->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'status'        => $request->status,
        ]);

        return redirect()->route('data-pengguna.index')->with('message', 'Data berhasil diedit!');
    }

    public function destroy(string $id)
    {
        $post = User::findOrFail($id);
        $post->delete();

        return redirect()->route('data-pengguna.index')->with('message', 'Data berhasil dihapus!');
    }

    public function delete_all(Request $request)
    {
        $ids = $request->ids;
        $deletedRows = User::whereIn('id', explode(",", $ids))->delete();

        if ($deletedRows > 0) {
            return response()->json(['status' => true, 'message' => 'Data berhasil dihapus!']);
        } else {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan atau gagal dihapus.']);
        }
    }

    public function profil($id)
    {
        $data = User::find($id);
        return view('mahasiswa.profil', compact(['data']));
    }

    public function update_profil(Request $request, $id)
    {
        $data = User::find($id);

        $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'jurusan' => 'required',
            'username' => 'required',
            'password' => 'required|min:5|',
            'profil'  => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Periksa apakah gambar profil baru diunggah
        if ($request->hasFile('profil')) {
            // Jika gambar profil baru diunggah, hapus yang lama
            $file = $data->profil;
            File::delete($file);

            // Unggah gambar profil baru
            $namafile = $request->profil->getClientOriginalName();
            $request->profil->move('profle_picture/', $namafile);

            // Perbarui profil dengan gambar baru
            $data->profil = 'profle_picture/' . $namafile;
        }

        // Perbarui informasi profil lainnya
        $data->name = $request->name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        // $data->jurusan = $request->jurusan;
        $data->username = $request->username;
        $data->password = Hash::make($request->password);

        // Simpan perubahan
        if ($data->save()) {
            return redirect()->back()->with('sukses', 'Data Berhasil Diganti');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate profil');
        }
    }
}
