<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;

class KategoriEdit extends Component
{
    public $nama_kategori;
    public $successMessage; 
    public function mount(Kategori $kategori)
    {
        $this->nama_kategori = $kategori->nama_kategori;
    }
    public function update(Kategori $kategori)
    {
        $this->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori->update([
            'nama_kategori' => $this->nama_kategori,
        ]);

        session()->flash('message', 'Kategori berhasil diperbarui.');
        return redirect()->route('kategori.index');
    }
    public function render()
    {
        return view('livewire.kategori.kategori-edit');
    }
}
