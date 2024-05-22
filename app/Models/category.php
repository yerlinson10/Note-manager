<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'color'
    ];

    public function notes()
    {
        return $this->hasMany(task::class, 'id_category');
    }
}
