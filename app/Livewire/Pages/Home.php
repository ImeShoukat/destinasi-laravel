<?php

namespace App\Livewire\Pages;

use App\Models\Wisata;
use App\Models\Kota;
use Livewire\Component;

class Home extends Component
{
    public $search = '';
    public $filterKota = '';
    public $biayaMax = '';

    public function render()
    {
        $kotas = Kota::orderBy('nama_kota')->get();

        $wisatas = Wisata::with(['kota', 'ulasans'])
            ->when($this->search, fn($q) =>
                $q->where('nama_wisata', 'like', '%' . $this->search . '%'))
            ->when($this->filterKota, fn($q) =>
                $q->where('kota_id', $this->filterKota))
            ->when($this->biayaMax, fn($q) =>
                $q->where('biaya_masuk', '<=', $this->biayaMax))
            ->get()
            ->map(function ($wisata) {
                // Hitung rata-rata rating
                $wisata->rata_rating = $wisata->ulasans->count() > 0 
                    ? $wisata->ulasans->avg('rating') 
                    : 0;
                return $wisata;
            })
            ->sortByDesc('rata_rating')
            ->values(); // Reset array keys
        return view('livewire.pages.home', compact('wisatas', 'kotas'));
    }
}
