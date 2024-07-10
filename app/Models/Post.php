<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','descrption','user_id',
    ];
    public function user(){   // One to Many (Inverse) / Belongs To relationshi
        return $this->belongsTo(User::class);
    }
}
