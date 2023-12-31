<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Karang;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $usersCount = User::whereIn('status', ['Petani', 'Pembimbing'])->count();
        $postsCount = Post::count();
        $karangsCount = Karang::count();

        $karangs = Karang::with('post')->get();

        $seriesData = [
            'karang_hidup' => [],
            'karang_mati' => [],
            'algae' => [],
            'biota_lain' => [],
            'abiotik' => [],
        ];

        $labels = [
            'nama' => [],
        ];

        foreach ($karangs as $karang) {
            $labels['nama'][] = $karang->post->nama;
            $seriesData['karang_hidup'][] = $karang->karang_hidup;
            $seriesData['karang_mati'][] = $karang->karang_mati;
            $seriesData['algae'][] = $karang->algae;
            $seriesData['biota_lain'][] = $karang->biota_lain;
            $seriesData['abiotik'][] = $karang->abiotik;
        }

        // Urutkan nama stasiun berdasarkan abjad
        sort($labels['nama'], SORT_STRING);

        $notif = User::get()->whereIn('status', [ 'Tidak Ada']);
        $hasNullStatus = $notif->contains('status', 'Tidak Ada');

        return view('dist.dashboard', compact('postsCount', 'usersCount', 'karangsCount', 'seriesData', 'karangs', 'labels', 'hasNullStatus',  ));
    }

    public function cek_login()
    {
        $status = Auth::user()->status;

        if ($status == 'Tidak Ada') {
            Auth::logout();
            return redirect()->back()->with('cek_login', 'Harap menunggu konfirmasi dari Admin!');
        } else {
            return redirect()->route('dashboard.index')->with('success', 'Kamu berhasil login!');
        }
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
    public function destroy(Request $request)
    {
        //
    }
}
