<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compte extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'login', 'password', 'avatar'];

    public function formations()
    {
        return $this->hasMany(formation::class, 'compte_id');
    }
}
