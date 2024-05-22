<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'tags',
        'id_category',
    ];
    public function category()
    {
        return $this->belongsTo(category::class, 'id_category');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'id_user_creator');
    }
}
