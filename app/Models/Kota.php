<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kota extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kota'];

    public function wisatas()
    {
        return $this->hasMany(Wisata::class);
    }

    public function getRouteKeyName()
    {
        return 'nama_kota';
    }
}
