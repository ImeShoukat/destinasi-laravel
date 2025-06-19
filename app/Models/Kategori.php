<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Kategori extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kategori'];
    public function wisatas()
    {
        return $this->hasMany(Wisata::class);
    } 
    public function getRouteKeyName()
    {
        return 'nama_kategori';
    }
    
}
