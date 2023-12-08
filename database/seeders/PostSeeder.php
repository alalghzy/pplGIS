<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postsData = [
            [
                'nama'      => 'Stasiun 1',
                'latitude'  => '-3.8249197093011498',
                'longitude' => '102.16513234033364',
                'kedalaman' => '10',
                'image'     => '',
            ],
            [
                'nama'      => 'Stasiun 2',
                'latitude'  => '-3.825149268882268',
                'longitude' => '102.16596656105001',
                'kedalaman' => '10',
                'image'     => '',
            ],
            [
                'nama'      => 'Stasiun 3',
                'latitude'  => '-3.826648734720949',
                'longitude' => '102.1821998996779',
                'kedalaman' => '7',
                'image'     => '',
            ],
            [
                'nama'      => 'Stasiun 4',
                'latitude'  => '-3.834249410929355',
                'longitude' => '102.1821989106438',
                'kedalaman' => '7',
                'image'     => '',
            ],
            [
                'nama'      => 'Stasiun 5',
                'latitude'  => '-3.8426829203087096',
                'longitude' => '102.18219971547123',
                'kedalaman' => '3',
                'image'     => '',
            ],
            [
                'nama'      => 'Stasiun 6',
                'latitude'  => '-3.842932292346885',
                'longitude' => '102.18203280482658',
                'kedalaman' => '3',
                'image'     => '',
            ],
            [
                'nama'      => 'Stasiun 7',
                'latitude'  => '-3.848166080458698',
                'longitude' => '102.18496659729925',
                'kedalaman' => '10',
                'image'     => '',
            ],
            [
                'nama'      => 'Stasiun 8',
                'latitude'  => '-3.83008096925011',
                'longitude' => '102.17558127889303',
                'kedalaman' => '5',
                'image'     => '',
            ],
        ];
        foreach ($postsData as $postData) {
            Post::updateOrcreate($postData);
        }
    }
}
