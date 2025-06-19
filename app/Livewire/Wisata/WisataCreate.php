<?php

namespace App\Livewire\Wisata;

use Livewire\Component;
use App\Models\Wisata;
use App\Models\Kategori;
use App\Models\Kota;

class WisataCreate extends Component
{
    public $nama_wisata, $kategori_id, $kota_id, $deskripsi;
    public $kategoris, $kotas;
    public function mount()
    {
        $this->kategoris = Kategori::all();
        $this->kotas = Kota::all();
    }
    public function store()
    {
        $this->validate([
            'nama_wisata' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'kota_id' => 'required|exists:kotas,id',
            'deskripsi' => 'required|string',
        ]);

        Wisata::create([
            'nama_wisata' => $this->nama_wisata,
            'kategori_id' => $this->kategori_id,
            'kota_id' => $this->kota_id,
            'deskripsi' => $this->deskripsi,
        ]);

        session()->flash('message', 'Wisata created successfully.');
        $this->redirect(route('wisata.index'), navigate: true);
    }
    public function render()
    {
        return view('livewire.wisata.wisata-create');
    }
}
