<?php

namespace App\Livewire\Ulasan;

use Livewire\Component;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Auth;

class UlasanEdit extends Component
{
    public $ulasanId;
    public $wisataId;
    public $rating;
    public $ulasan;

    public function mount($ulasanId)
    {
        $ulasan = Ulasan::findOrFail($ulasanId);

        $this->ulasanId = $ulasan->id;
        $this->wisataId = $ulasan->wisata_id;
        $this->rating = $ulasan->rating;
        $this->ulasan = $ulasan->ulasan;
    }

    protected function rules()
    {
        return [
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string|max:255',
        ];
    }

    public function update()
    {
        $this->validate();

        $ulasan = Ulasan::findOrFail($this->ulasanId);

        $ulasan->update([
            'rating' => $this->rating,
            'ulasan' => $this->ulasan,
        ]);

        session()->flash('message', 'Ulasan berhasil diperbarui.');
        return redirect()->route('ulasan.index', ['wisataId' => $this->wisataId]);
    }

    public function delete()
    {
        $ulasan = Ulasan::findOrFail($this->ulasanId);

        $ulasan->delete();

        session()->flash('message', 'Ulasan berhasil dihapus.');
        return redirect()->route('ulasan.index', ['wisataId' => $this->wisataId]);
       
    }

    public function resetFields()
    {
        $this->rating = null;
        $this->komentar = '';
    }

    public function render()
    {
        return view('livewire.ulasan.ulasan-edit');
    }
}
