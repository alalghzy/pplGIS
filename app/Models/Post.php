<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $primaryKey = 'id_post';

    protected $guarded = ['id_post'];

    // protected $fillable = [
    //     'nama',
    //     'image',
    //     'deskripsi',
    //     'latitude',
    //     'longitude',
    //     'kedalaman'
    // ];

    public function karangs()
    {
        return $this->hasMany(Karang::class);
    }
}
