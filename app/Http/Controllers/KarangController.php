<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Karang;
use Illuminate\Http\Request;
use App\Exports\KarangExport;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class KarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karangs = Karang::with('post')->get()->sortBy(function($karang) {
            return $karang->post->nama;
        });

        $posts = Post::orderBy('nama', 'asc')->get();

        $notif = User::get()->whereIn('status', [ 'Tidak Ada']);
        $hasNullStatus = $notif->contains('status', 'Tidak Ada');

        return view('dist.lamanKarang', compact('karangs', 'posts', 'hasNullStatus'));
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
            'post_id'       => 'required|exists:posts,id|unique:karangs,post_id',
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
                ->with('failed',  $validator->errors()->first())
                ->withInput()
                ->withErrors($validator);
        }

        // Menghitung total persentase
        $totalPercentage = $request->algae + $request->abiotik + $request->biota_lain + $request->karang_hidup + $request->karang_mati;

        // Validasi total persentase tidak boleh lebih dari 100
        if ($totalPercentage > 100) {
            return back()->with('failed', 'Total persentase lebih dari 100%')->withInput();
        }
        if ($totalPercentage < 100) {
            return back()->with('failed', 'Total persentase kurang dari 100%')->withInput();
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
    public function update(Request $request, string $id)
    {

        $user = Auth::user()->name;

        $validator = Validator::make($request->all(), [
            'post_id'       => 'required|exists:posts,id|unique:karangs,post_id,' . $id,
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
                ->with('failed',  $validator->errors()->first())
                ->withInput()
                ->withErrors($validator);
        }

        // Menghitung total persentase
        $totalPercentage = $request->algae + $request->abiotik + $request->biota_lain + $request->karang_hidup + $request->karang_mati;

        // Validasi total persentase tidak boleh lebih dari 100
        if ($totalPercentage > 100) {
            return back()->with('failed', 'Total persentase lebih dari 100%')->withInput();
        }
        if ($totalPercentage < 100) {
            return back()->with('failed', 'Total persentase kurang dari 100%')->withInput();
        }

        // Update data ke database
        $karang = Karang::findOrFail($id);
        $karang->update([
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

        return redirect()->route('karang.index')->with('message', 'Data berhasil diperbarui');
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

    public function delete_all(Request $request)
    {
        try {
            // Ambil array ID yang akan dihapus dari request
            $idsToDelete = $request->input('ids');

            // Periksa apakah array ID tidak kosong sebelum melakukan penghapusan
            if (!empty($idsToDelete)) {
                // Hapus data berdasarkan ID
                Karang::whereIn('id', $idsToDelete)->delete();

                return response()->json(['status' => true, 'message' => 'Data berhasil dihapus.']);
            } else {
                return response()->json(['status' => false, 'message' => 'Tidak ada ID yang diberikan untuk penghapusan.']);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['status' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function laporan()
    {
        $karangs = Karang::with('post')->get()->sortBy(function($karang) {
            return $karang->post->nama;
        });

        $notif = User::get()->whereIn('status', [ 'Tidak Ada']);
        $hasNullStatus = $notif->contains('status', 'Tidak Ada');

        return view('dist.lamanLaporan', compact('karangs', 'hasNullStatus'));
    }

    public function export()
    {
        return Excel::download(new KarangExport, 'data-karang-' . Carbon::now()->timestamp. '.xlsx');
    }

    public function download()
    {
        $karangs = Karang::with('post')->get()->sortBy(function($karang) {
            return $karang->post->nama;
        });

        $notif = User::get()->whereIn('status', [ 'Tidak Ada']);
        $hasNullStatus = $notif->contains('status', 'Tidak Ada');

        return view('dist.downloads.pdf', compact('karangs', 'hasNullStatus'));
    }

}
