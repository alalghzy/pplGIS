<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Karang;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class KarangSeeder extends Seeder
{
    public function run()
    {
        foreach ($this->getKarangData() as $karangData) {
            // Ambil post dan user yang sesuai
            $post = Post::find($karangData['post_id']);
            $user = User::find($karangData['user_id']);

            // Buat Karang dan atur relasinya
            $karang = Karang::updateOrCreate($karangData);
            $karang->post()->associate($post);
            $karang->user()->associate($user);
            $karang->save();
        }
    }

    private function getKarangData()
    {
        return [
            [
                'post_id'       => '1',
                'user_id'       => '1',
                'algae'         => '0',
                'abiotik'       => '2.52',
                'biota_lain'    => '0',
                'karang_hidup'  => '22.14',
                'karang_mati'   => '75.34',
                'acb'           => '2.88',
                'acd'           => '0.86',
                'ace'           => '0',
                'acs'           => '0',
                'act'           => '12.82',
                'cb'            => '0.00',
                'cf'            => '1.04',
                'ce'            => '2.18',
                'cm'            => '2.36',
                'cs'            => '0.00',
                'cmr'           => '0.00',
                'chl'           => '0.00',
                'cme'           => '0.00',
                'dc'            => '38.64',
                'dca'           => '36.80',
            ],
            [
                'post_id'       => '2',
                'user_id'       => '1',
                'algae'         => '0',
                'abiotik'       => '8.88',
                'biota_lain'    => '0',
                'karang_hidup'  => '51',
                'karang_mati'   => '40.12',
                'acb'           => '6.24',
                'acd'           => '5.26',
                'ace'           => '3.06',
                'acs'           => '1.08',
                'act'           => '14.06',
                'cb'            => '0',
                'ce'            => '13.06',
                'cf'            => '0.26',
                'cm'            => '7.98',
                'cs'            => '0.00',
                'cmr'           => '0.00',
                'chl'           => '0.00',
                'cme'           => '0.00',
                'dc'            => '10.42',
                'dca'           => '29.70',
            ],
            [
                'post_id'       => '7',
                'user_id'       => '1',
                'algae'         => '20.14',
                'abiotik'       => '12.2',
                'biota_lain'    => '0.24',
                'karang_hidup'  => '66.76',
                'karang_mati'   => '0.66',
                'acb'           => '18.92',
                'acd'           => '0.34',
                'ace'           => '0.00',
                'acs'           => '0.00',
                'act'           => '0.22',
                'cb'            => '0',
                'ce'            => '16.18',
                'cf'            => '5.98',
                'cm'            => '6.50',
                'cs'            => '0.00',
                'cmr'           => '0.00',
                'chl'           => '0.00',
                'cme'           => '18.62',
                'dc'            => '0.00',
                'dca'           => '0.66',
            ],
        ];
    }
}
