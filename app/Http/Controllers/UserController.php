<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->whereIn('status', ['Petani', 'Pembimbing', 'Tidak Ada'])->paginate(50);
        $hasNullStatus = $users->contains('status', 'Tidak Ada');

        return view('dist.lamanPengguna', compact('users', 'hasNullStatus'));
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
        $notif = User::get()->whereIn('status', [ 'Tidak Ada']);
        $hasNullStatus = $notif->contains('status', 'Tidak Ada');
        return view('dist.lamanProfil', compact('data', 'hasNullStatus'));
    }

    public function update_profil(Request $request, $id)
    {
        $data = User::find($id);

        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email',
        ]);

        if ($validator->fails()) {
            return back()
                ->with('failed', 'Profil akun tidak dapat diubah!')
                ->withInput()
                ->withErrors($validator);
        }

        // Perbarui informasi profil lainnya
        $data->name = $request->name;
        $data->email = $request->email;

        // Simpan perubahan
        if ($data->save()) {
            return redirect()->back()->with('message', 'Data berhasil diganti!');
        } else {
            return redirect()->back()->with('failed', 'Gagal mengubah profil!');
        }
    }

    public function update_foto_profil(Request $request, $id)
    {
        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'profil' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return back()
                ->with('failed', 'Gagal mengunggah foto!')
                ->withInput()
                ->withErrors($validator);
        }

        // Periksa apakah gambar profil baru diunggah
        if ($request->hasFile('profil')) {
            // Jika gambar profil baru diunggah, hapus yang lama
            $oldFile = $user->profil;
            if ($oldFile) {
                // Gunakan Storage untuk menghapus file
                Storage::delete($oldFile);
            }

            // Buat nama file baru berdasarkan email pengguna
            $namafile = $user->email . '.' . $request->profil->getClientOriginalExtension();

            // Unggah gambar profil baru ke direktori public/profile_picture
            $request->profil->move('profile_picture/', $namafile);

            // Perbarui profil dengan gambar baru
            $user->profil = 'profile_picture/' . $namafile;
        }

        // Simpan perubahan
        if ($user->save()) {
            return redirect()->back()->with('message', 'Foto profil berhasil diganti!');
        } else {
            return redirect()->back()->with('failed', 'Gagal mengubah foto profil!');
        }
    }

    public function deleteImage(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->profil) {
            // Gunakan Storage untuk menghapus file
            Storage::delete('profile_picture/' . $user->image);

            // Kosongkan field profil pada tabel User
            $user->update(['profil' => null]);

            return redirect()->back()->with('message', 'Foto profil berhasil dihapus!');
        }

        return redirect()->back()->with('failed', 'Data tidak memiliki foto profil!');
    }

    public function updatePassword(Request $request, $userId)
    {
        $validator = Validator::make($request->all(), [
            'old_password'     => 'required',
            'new_password'     => 'required|min:5|different:old_password',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = User::find($userId);

        if ($validator->fails()) {
            return back()
                ->with('failed', 'Gagal mengubah password!')
                ->withInput()
                ->withErrors($validator);
        }

        // Validasi password lama
        if (Hash::check($request->input('old_password'), $user->password)) {
            // Validasi password baru tidak boleh sama dengan password lama
            if ($request->input('old_password') === $request->input('new_password')) {
                return redirect()->back()->with('failed', 'Password baru tidak boleh sama dengan password lama!');
            }

            // Password lama valid, update password baru
            $user->password = bcrypt($request->input('new_password'));
            $user->save();

            return redirect()->back()->with('message', 'Password berhasil diperbarui!');
        } else {
            // Password lama tidak valid
            return redirect()->back()
                ->withErrors(['old_password' => 'Password lama tidak valid.'])
                ->with('failed', 'Gagal mengubah password!');
        }
    }



}
