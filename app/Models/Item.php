<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'init_date',
        'last_date',
        'condition',
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //un usuario puede publicar muchos articulos
    public function photo()
    {
        return $this->hasOne(Photo::class);
    }
}
