<?php

namespace App\Livewire\Wisata;

use Livewire\Component;
use App\Models\Wisata;
use App\Models\Kategori;
use App\Models\Kota;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class WisataCreate extends Component
{
    use WithFileUploads;
    
    public $nama_wisata, $kategori_id, $kota_id, $biaya_masuk, $deskripsi, $gambar;
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
            'biaya_masuk' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPath = $this->gambar ? $this->gambar->store('wisata', 'public') : null;

        Wisata::create([
            'nama_wisata' => $this->nama_wisata,
            'kategori_id' => $this->kategori_id,
            'kota_id' => $this->kota_id,
            'biaya_masuk' => $this->biaya_masuk,
            'deskripsi' => $this->deskripsi,
            'gambar' => $gambarPath,
        ]);

        session()->flash('message', 'Wisata berhasil ditambahkan.');
        $this->redirect(route('wisata.index'), navigate: true);
    }
    
    public function render()
    {
        return view('livewire.wisata.wisata-create');
    }
}