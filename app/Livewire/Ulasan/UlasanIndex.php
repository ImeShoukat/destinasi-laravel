<?php

namespace App\Livewire\Ulasan;

use Livewire\Component;
use App\Models\Ulasan;

class UlasanIndex extends Component
{
    public $wisataId;
    public $ulasans;

    public function mount($wisataId)
    {
        $this->wisataId = $wisataId;
        $this->fetchUlasans();
    }

    public function fetchUlasans()
    {
        $this->ulasans = Ulasan::with(['user', 'wisata'])
            ->where('wisata_id', $this->wisataId)
            ->get();
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
        return redirect()->route('ulasan.edit', ['ulasanId' => $ulasanId]);
    }

    public function create()
    {
        return redirect()->route('ulasan.create', ['wisataId' => $this->wisataId]);
    }

    public function render()
    {
        return view('livewire.ulasan.ulasan-index');
    }
}
