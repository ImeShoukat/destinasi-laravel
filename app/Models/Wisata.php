<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_wisata',
        'deskripsi',
        'biaya_masuk',
        'kategori_id',
        'kota_id',
        'gambar',];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function ulasans()
    {
        return $this->hasMany(Ulasan::class);
        
    }

    public function getRouteKeyName()
    {
        return 'nama_wisata';
    }
    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('nama_wisata', 'like', '%' . request('search') . '%');
        }

        if ($filters['kategori'] ?? false) {
            $query->whereHas('kategori', function ($query) {
                $query->where('nama_kategori', request('kategori'));
            });
        }

        if ($filters['kota'] ?? false) {
            $query->whereHas('kota', function ($query) {
                $query->where('nama_kota', request('kota'));
            });
        }
    }
    public function scopeSortByRating($query)
    {
        return $query->withCount('ulasans')
                     ->orderBy('ulasans_count', 'desc');
    }
    public function scopeSortByPrice($query)
    {
        return $query->orderBy('harga_tiket', 'asc');
    }
    public function getThumbnailAttribute()
{
    return $this->gambar
        ? asset('storage/' . $this->gambar)
        : asset('images/default.jpg');
}
}
