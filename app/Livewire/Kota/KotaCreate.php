<?php

namespace App\Livewire\Kota;

use Livewire\Component;
use App\Models\Kota;

class KotaCreate extends Component
{
    public $nama_kota;
    public $successMessage;
    public function store() // Ubah dari submit() ke store()
    {
        $this->validate([
            'nama_kota' => 'required|string|max:255',
        ]);

        Kota::create([
            'nama_kota' => $this->nama_kota,
        ]);

        session()->flash('message', 'Kota berhasil ditambahkan.');
        $this->redirect(route('kota.index'), navigate: true);
    }
    public function resetForm()
    {
        $this->nama_kota = '';
        $this->successMessage = '';
    }
    public function mount()
    {
        $this->resetForm();
    }
    public function render()
    {
        return view('livewire.kota.kota-create');
    }
}
