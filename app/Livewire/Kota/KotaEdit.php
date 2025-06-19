<?php

namespace App\Livewire\Kota;

use Livewire\Component;
use App\Models\Kota;

class KotaEdit extends Component
{
    public $kotaId;
    public $nama_kota;
    
    public function mount($kotaId)
    {
        $this->kotaId = $kotaId;
        $kota = Kota::findOrFail($this->kotaId);
        $this->nama_kota = $kota->nama_kota;
    }
    public function update()
    {
        $this->validate([
            'nama_kota' => 'required|string|max:255',
        ]);

        $kota = Kota::findOrFail($this->kotaId);
        $kota->update([
            'nama_kota' => $this->nama_kota,
        ]);

        session()->flash('message', 'Kota updated successfully.');
        $this->redirect(route('kota.index'), navigate: true);
    }
    public function delete()
    {
        $kota = Kota::findOrFail($this->kotaId);
        $kota->delete();
        session()->flash('message', 'Kota deleted successfully.');
        $this->redirect(route('kota.index'), navigate: true);
    }
    public function resetInputFields()
    {
        $this->nama_kota = '';
    }

    public function render()
    {
        return view('livewire.kota.kota-edit');
    }
}
