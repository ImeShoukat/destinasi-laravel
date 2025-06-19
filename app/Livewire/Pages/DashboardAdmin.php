<?php

namespace App\Livewire\Pages;

use App\Models\Wisata;
use App\Models\Kategori;
use App\Models\Kota;
use App\Models\User;
use App\Models\Ulasan;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public function render()
    {
        return view('livewire.pages.admin', [
        'totalWisata' => Wisata::count(),
        'totalKategori' => Kategori::count(),
        'totalKota' => Kota::count(),
        'totalUser' => User::count(),
        'wisataBaru' => Wisata::latest()->take(3)->get(),
        'komentarBaru' => Ulasan::with('user')->latest()->take(3)->get(),
    ]);
    }
}
