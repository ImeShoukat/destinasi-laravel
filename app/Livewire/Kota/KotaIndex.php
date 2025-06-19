<?php

namespace App\Livewire\Kota;

use Livewire\Component;
use App\Models\Kota;

class KotaIndex extends Component
{
    public $kotas; 
    public function mount()
    {
        $this->kotas = Kota::all();
    }
    public function delete($kotaId)
    {
        $kota = Kota::findOrFail($kotaId);
        $kota->delete();
        
        session()->flash('message', 'Kota deleted successfully.');
        $this->redirect(route('kota.index'), navigate: true);
    }
    public function confirmDelete($kotaId)
    {
        $this->dispatchBrowserEvent('confirm-delete', ['kotaId' => $kotaId]);
    }
    public function render()
    {
        return view('livewire.kota.kota-index');
    }
}
