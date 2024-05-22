<?php

namespace App\Models;

use App\Models\notes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->hasMany(notes::class, 'id_category');
    }
}
