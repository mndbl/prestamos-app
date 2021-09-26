<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion'];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}
