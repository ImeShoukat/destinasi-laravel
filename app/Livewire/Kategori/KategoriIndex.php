<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kategori;


class KategoriIndex extends Component
{
    use WithPagination;
    
    public function delete(Kategori $kategori)
    {
        $kategori->delete();
        session()->flash('message', 'Kategori berhasil dihapus.');
        return redirect()->route('kategori.index');
    }
    public function confirmDelete(Kategori $kategori)
    {
        $this->dispatchBrowserEvent('confirm-delete', [
            'kategoriId' => $kategori->id,
            'kategoriName' => $kategori->nama_kategori,
        ]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'kategoriList.*.nama_kategori' => 'required|string|max:255',
        ]);
    }
    public function render()
    {
        return view('livewire.kategori.kategori-index', [
            'kategoris' => Kategori::paginate(10)
        ]);
    }
}

