<?php

namespace App\Models;

use App\Models\User;
use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class notes extends Model
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
