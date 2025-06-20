<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;


class KategoriCreate extends Component
{
    public $nama_kategori;
    public $successMessage;
    public function store() 
    {
        $this->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $this->nama_kategori,
        ]);

        session()->flash('message', 'Kategori berhasil ditambahkan.');
        return redirect()->route('kategori.index');
    }
    public function resetForm()
    {
        $this->nama_kategori = '';
        $this->successMessage = '';
    }
    public function mount()
    {
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.kategori.kategori-create');
    }
}
