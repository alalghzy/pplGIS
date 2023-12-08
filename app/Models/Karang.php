<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karang extends Model
{
    use HasFactory, Notifiable;


    protected $guarded = ['id'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
