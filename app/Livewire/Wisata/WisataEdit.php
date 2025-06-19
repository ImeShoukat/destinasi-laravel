<?php

namespace App\Livewire\Wisata;

use Livewire\Component;
use App\Models\Wisata;
use App\Models\Kategori;
use App\Models\Kota;

class WisataEdit extends Component
{
    public $wisataId, $nama_wisata, $kategori_id, $kota_id, $deskripsi, $gambar;
    public $kategoris, $kotas;
    public function mount($wisataId)
    {
        $this->wisataId = $wisataId;
        $this->kategoris = Kategori::all();
        $this->kotas = Kota::all();

        $wisata = Wisata::findOrFail($this->wisataId);
        $this->nama_wisata = $wisata->nama_wisata;
        $this->kategori_id = $wisata->kategori_id;
        $this->kota_id = $wisata->kota_id;
        $this->deskripsi = $wisata->deskripsi;
        $this->gambar = $wisata->gambar;
    }
    public function update()
    {
        $this->validate([
            'nama_wisata' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'kota_id' => 'required|exists:kotas,id',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $wisata = Wisata::findOrFail($this->wisataId);
        $wisata->update([
            'nama_wisata' => $this->nama_wisata,
            'kategori_id' => $this->kategori_id,
            'kota_id' => $this->kota_id,
            'deskripsi' => $this->deskripsi,
            'gambar' => $this->gambar ? $this->gambar->store('wisata', 'public') : $wisata->gambar,
        ]);

        session()->flash('message', 'Wisata updated successfully.');
        $this->redirect(route('wisata.index'), navigate: true);
    }
    public function delete()
    {
        $wisata = Wisata::findOrFail($this->wisataId);
        $wisata->delete();  
        session()->flash('message', 'Wisata deleted successfully.');
        $this->redirect(route('wisata.index'), navigate: true);
    }
    public function render()
    {
        return view('livewire.wisata.wisata-edit');
    }
}
