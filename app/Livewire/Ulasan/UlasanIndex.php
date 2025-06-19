<?php

namespace App\Livewire\Ulasan;

use Livewire\Component;
use App\Models\Ulasan;

class UlasanIndex extends Component
{
    public $ulasans;

    public function mount()
    {
        $this->fetchUlasans();
    }

    public function fetchUlasans()
    {
        $this->ulasans = Ulasan::with(['user', 'wisata'])->get();
    }

    public function delete($ulasanId)
    {
        $ulasan = Ulasan::findOrFail($ulasanId);
        $ulasan->delete();

        session()->flash('message', 'Ulasan berhasil dihapus.');
        $this->fetchUlasans();
    }

    public function edit($ulasanId)
    {
        $this->redirect(route('ulasan.edit', ['ulasanId' => $ulasanId]), navigate: true);
    }

    public function create()
    {
        $this->redirect(route('ulasan.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.ulasan.ulasan-index', [
            'ulasans' => $this->ulasans
        ]);
    }
}
