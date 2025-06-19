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
    public $komentar;

    public function mount($ulasanId)
    {
        $ulasan = Ulasan::findOrFail($ulasanId);

        // Optional: Lindungi agar hanya user pemilik bisa edit
        if ($ulasan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $this->ulasanId = $ulasan->id;
        $this->wisataId = $ulasan->wisata_id;
        $this->rating = $ulasan->rating;
        $this->komentar = $ulasan->komentar;
    }

    protected function rules()
    {
        return [
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:255',
        ];
    }

    public function update()
    {
        $this->validate();

        $ulasan = Ulasan::findOrFail($this->ulasanId);

        // Optional: Cek kepemilikan
        if ($ulasan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $ulasan->update([
            'rating' => $this->rating,
            'komentar' => $this->komentar,
        ]);

        session()->flash('message', 'Ulasan berhasil diperbarui.');
        return redirect()->route('ulasan.index', ['wisataId' => $this->wisataId]);
    }

    public function delete()
    {
        $ulasan = Ulasan::findOrFail($this->ulasanId);

        // Optional: Cek kepemilikan
        if ($ulasan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

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
