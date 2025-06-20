<?php

namespace App\Livewire\Pages;

use App\Models\Wisata;
use App\Models\Ulasan;
use Livewire\Component;

class DetailWisata extends Component
{
    public $wisataId;
    public $wisata;

    public $ulasan;
    public $rating;

    public function mount($wisataId)
    {
        $this->wisataId = $wisataId;
        $this->loadWisata();
    }

    public function simpanUlasan()
    {
        $this->validate([
            'ulasan' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Ulasan::create([
            'wisata_id' => $this->wisataId,
            'ulasan' => $this->ulasan,
            'rating' => $this->rating,
            'user_id' => auth()->id(), // kalau pakai user login
        ]);

        session()->flash('success', 'Ulasan berhasil ditambahkan.');

        $this->reset('ulasan', 'rating');
        $this->loadWisata();
    }

    protected function loadWisata()
    {
        $this->wisata = Wisata::with(['kota', 'ulasans'])->findOrFail($this->wisataId);
    }

    public function getRatingStatsProperty()
    {
        $ratings = $this->wisata->ulasans()
            ->selectRaw('rating, COUNT(*) as count')
            ->groupBy('rating')
            ->pluck('count', 'rating');

        $total = $ratings->sum();
        $stats = [];

        for ($i = 5; $i >= 1; $i--) {
            $count = $ratings[$i] ?? 0;
            $percentage = $total > 0 ? ($count / $total) * 100 : 0;
            $stats[$i] = [
                'count' => $count,
                'percentage' => $percentage,
            ];
        }

        return $stats;
    }

    public function render()
    {
        return view('livewire.pages.detail-wisata', [
            'wisata' => $this->wisata,
            'ulasans' => $this->wisata->ulasans()->latest()->take(5)->get(),
            'ratingStats' => $this->ratingStats,
        ]);
    }
}
