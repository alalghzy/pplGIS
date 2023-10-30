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
                'nama'      => 'Terumbu Karang A',
                'deskripsi' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'latitude'  => '-3.83809251762342',
                'longitude' => '102.17922667477939',
            ],
            [
                'nama'      => 'Terumbu Karang B',
                'deskripsi' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.',
                'latitude'  => '-3.837767360073512',
                'longitude' => '102.17917437170449',
            ],
            [
                'nama'      => 'Terumbu Karang C',
                'deskripsi' => 'Nam id blandit lectus. Quisque nec vestibulum nibh. Donec vel malesuada metus, ac placerat est. Suspendisse ac erat at nisl blandit suscipit. Donec ac hendrerit augue, quis dapibus massa.',
                'latitude'  => '-3.83782484547381',
                'longitude' => '102.17984505764733',
            ],
            [
                'nama'      => 'Terumbu Karang D',
                'deskripsi' => 'orem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quam dui, rutrum id interdum vel, iaculis scelerisque lorem. Suspendisse quis luctus eros. Su',
                'latitude'  => '-3.8385688271250022',
                'longitude' => '102.1790028440104',
            ],
            [
                'nama'      => 'Terumbu Karang E',
                'deskripsi' => 'ltrices posuere cubilia curae; Suspendisse vel congue odio, id ullamcorper sem.',
                'latitude'  => '-3.838690593840628',
                'longitude' => '102.18042441482778',
            ],
            [
                'nama'      => 'Terumbu Karang F',
                'deskripsi' => 'Terumbu karang yang cantik nan keren',
                'latitude'  => '-3.837495635962222',
                'longitude' => '102.18104332744043',
            ],
            [
                'nama'      => 'Terumbu Karang G',
                'deskripsi' => 'uris sollicitudin, augu',
                'latitude'  => '-3.838542072668704',
                'longitude' => '102.18102979468024',
            ],
            [
                'nama'      => 'Terumbu Karang H',
                'deskripsi' => 'ctus. Duis sollicitudin erat vitae dui malesu',
                'latitude'  => '-3.83791646120046',
                'longitude' => '102.18106362658075',
            ],
            [
                'nama'      => 'Terumbu Karang I',
                'deskripsi' => 'lorem asdk asd',
                'latitude'  => '-3.8377791866803026',
                'longitude' => '102.1798795100627',
            ],
            [
                'nama'      => 'Terumbu Karang J',
                'deskripsi' => 'Phasellus cursus ris',
                'latitude'  => '-3.8374686311270234',
                'longitude' => '102.18132751540477',
            ],
            [
                'nama'      => 'Terumbu Karang K',
                'deskripsi' => 'tincidunt eros, sed rutrum erat ',
                'latitude'  => '-3.8387468590569482',
                'longitude' => '102.17826234521806',
            ],
            [
                'nama'      => 'Terumbu Karang L',
                'deskripsi' => 's fermentum, gravida bibendum nibh biben',
                'latitude'  => '-3.837536143213424',
                'longitude' => '102.17808641933537',
            ],
            [
                'nama'      => 'Terumbu Karang M',
                'deskripsi' => 's ac turpis egestas. Sed vel tell',
                'latitude'  => '-3.8392126916472673',
                'longitude' => '102.1814019455859',
            ],
            [
                'nama'      => 'Terumbu Karang N',
                'deskripsi' => '. Phasellus leo risus, comm',
                'latitude'  => '-3.8373156037114238',
                'longitude' => '102.18157561600856',
            ],
            [
                'nama'      => 'Terumbu Karang O',
                'deskripsi' => '. Pellentesque eu mi nec magna pos',
                'latitude'  => '-3.83919468846009',
                'longitude' => '102.17864802888394',
            ]
        ];
        foreach($postsData as $postData ){
            Post::updateOrcreate($postData);
        }
    }
}
