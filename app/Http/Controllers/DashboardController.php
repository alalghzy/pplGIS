<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Karang;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

        return view('dist.dashboard', compact('postsCount', 'usersCount', 'karangsCount', 'seriesData', 'karangs', 'labels'));
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
