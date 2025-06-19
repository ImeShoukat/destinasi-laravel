<?php

namespace App\Livewire\Wisata;

use Livewire\Component;
use App\Models\Wisata;
use App\Models\Kategori;
use App\Models\Kota;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class WisataEdit extends Component
{
    use WithFileUploads;

    public $wisataId, $nama_wisata, $kategori_id, $kota_id, $deskripsi;
    public $gambar, $oldGambar;
    public $kategoris, $kotas;

    public function mount($wisataId)
    {
        $this->wisataId = $wisataId;
        $this->kategoris = Kategori::all();
        $this->kotas = Kota::all();

        $wisata = Wisata::findOrFail($this->wisataId);
        $this->nama_wisata = $wisata->nama_wisata;
        $this->kategori_id = $wisata->kategori_id;
        $this->kota_id = $wisata->kota_id;
        $this->deskripsi = $wisata->deskripsi;
        $this->oldGambar = $wisata->gambar; // simpan path lama untuk ditampilkan dan jika tidak diubah
    }

    public function update()
    {
        $this->validate([
            'nama_wisata' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'kota_id' => 'required|exists:kotas,id',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $wisata = Wisata::findOrFail($this->wisataId);

        if ($this->gambar) {
            // hapus gambar lama (opsional)
            if ($wisata->gambar && Storage::disk('public')->exists($wisata->gambar)) {
                Storage::disk('public')->delete($wisata->gambar);
            }
            $gambarPath = $this->gambar->store('wisata', 'public');
        } else {
            $gambarPath = $wisata->gambar;
        }

        $wisata->update([
            'nama_wisata' => $this->nama_wisata,
            'kategori_id' => $this->kategori_id,
            'kota_id' => $this->kota_id,
            'deskripsi' => $this->deskripsi,
            'gambar' => $gambarPath,
        ]);

        session()->flash('message', 'Wisata berhasil diperbarui.');
        return redirect()->route('wisata.index');
    }

    public function delete()
    {
        $wisata = Wisata::findOrFail($this->wisataId);
        if ($wisata->gambar && Storage::disk('public')->exists($wisata->gambar)) {
            Storage::disk('public')->delete($wisata->gambar);
        }
        $wisata->delete();

        session()->flash('message', 'Wisata berhasil dihapus.');
        return redirect()->route('wisata.index');
    }

    public function render()
    {
        return view('livewire.wisata.wisata-edit');
    }
}
