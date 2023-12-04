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
                'deskripsi' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'latitude'  => '-3.8249033185862666',
                'longitude' => '102.16513061758329',
                'kedalaman' => '10',
                'image'     => '',
            ],
            [
                'nama'      => 'Stasiun 2',
                'deskripsi' => 'Stasiun 2 asd as da sd as da sd as da sdasd',
                'latitude'  => '-3.8249033185862666',
                'longitude' => '102.16513061758329',
                'kedalaman' => '10',
                'image'     => '',
            ],
            [
                'nama'      => 'Stasiun 3',
                'deskripsi' => '3 asda wdka dka skdkasdkajks daksjd asda',
                'latitude'  => '-3.826648734720949',
                'longitude' => '102.1821998996779',
                'kedalaman' => '7',
                'image'     => '',
            ],
            [
                'nama'      => 'Stasiun 4',
                'deskripsi' => 'kata 4 itu kata straias asd4 adaklah statis iasnd as',
                'latitude'  => '-3.834249410929355',
                'longitude' => '102.1821989106438',
                'kedalaman' => '7',
                'image'     => '',
            ],
            [
                'nama'      => 'Stasiun 5',
                'deskripsi' => 'Sasa sdas tasusa 5 adladah astsaiuan mantapa s',
                'latitude'  => '-3.8426829203087096',
                'longitude' => '102.18219971547123',
                'kedalaman' => '3',
                'image'     => '',
            ],
            [
                'nama'      => 'Stasiun 6',
                'deskripsi' => '6 asdlashja sstasiun elok tenanas d',
                'latitude'  => '-3.842932292346885',
                'longitude' => '102.18203280482658',
                'kedalaman' => '3',
                'image'     => '',
            ],
            [
                'nama'      => 'Stasiun 7',
                'deskripsi' => '7 merupaakans tasisun stasj mantap jawatya',
                'latitude'  => '-3.848166080458698',
                'longitude' => '102.18496659729925',
                'kedalaman' => '10',
                'image'     => '',
            ],
            [
                'nama'      => 'Stasiun 8',
                'deskripsi' => 'Stasiun 8 merupakan stasiun yang oke punya olang mantap berul a',
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
