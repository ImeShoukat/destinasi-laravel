<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;

class KategoriEdit extends Component
{
    public $nama_kategori;
    public $kategoriId; 

    public function mount($kategoriId)
    {
        $this->kategoriId = $kategoriId;
        $kategori = Kategori::findOrFail($kategoriId);
        $this->nama_kategori = $kategori->nama_kategori;
    }

    public function update()
    {
        $this->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($this->kategoriId);
        $kategori->update([
            'nama_kategori' => $this->nama_kategori,
        ]);

        session()->flash('message', 'Kategori berhasil diperbarui.');
        $this->redirect(route('kategori.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.kategori.kategori-edit');
    }
}
