<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    use HasFactory;
    protected $fillable = ['designation', 'image', 'description', 'fichier', 'compte_id'];

    public function compte()
    {
        return $this->belongsTo(compte::class, 'compte_id');
    }
}
