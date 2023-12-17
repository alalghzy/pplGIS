<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Karang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karangs = Karang::with('post')->get()->sortBy(function($karang) {
            return $karang->post->nama;
        });

        $karang = Karang::all();
        $post = Post::with('karangs')->get();

        $posts = Post::orderBy('nama', 'asc')->get();

        $postsCount = Post::count();
        $karangsCount = Karang::count();

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

        return view('home.home', compact('postsCount', 'seriesData', 'karangs', 'labels', 'posts', 'karang', 'post', 'karangsCount'));

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

        $notif = User::get()->whereIn('status', [ 'Tidak Ada']);
        $hasNullStatus = $notif->contains('status', 'Tidak Ada');

        return view('home.dataDetail', compact('post', 'posts', 'chartData', 'hasNullStatus', 'karangsData'));
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
    public function destroy(string $id)
    {
        //
    }
}
