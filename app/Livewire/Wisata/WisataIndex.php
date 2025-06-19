<?php

namespace App\Livewire\Wisata;

use Livewire\Component;

class WisataIndex extends Component
{
    public $wisatas;
    public function mount()
    {
        $this->wisatas = \App\Models\Wisata::all();
    }
    public function delete($wisataId)
    {
        $wisata = \App\Models\Wisata::findOrFail($wisataId);
        $wisata->delete();
        
        session()->flash('message', 'Destinasi deleted successfully.');
        $this->redirect(route('wisata.index'), navigate: true);
    }
    public function confirmDelete($wisataId)
    {
        $this->dispatchBrowserEvent('confirm-delete', ['wisataId' => $wisataId]);
    }
    public function edit($wisataId)
    {
        return redirect()->route('wisata.edit', ['wisataId' => $wisataId]);
    }
    public function create()
    {
        return redirect()->route('wisata.create');
    }
    public function render()
    {
        return view('livewire.wisata.wisata-index');
    }
}
