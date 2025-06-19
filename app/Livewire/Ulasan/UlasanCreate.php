<?php
namespace App\Livewire\Ulasan;

use App\Models\Wisata;
use Livewire\Component;
use App\Models\Ulasan;
use App\Models\User;

class UlasanCreate extends Component
{
    public $wisataId;
    public $userId;
    public $rating;
    public $ulasan; 

    protected function rules()
    {
        return [
            'userId' => 'required|exists:users,id',
            'wisataId' => 'required|exists:wisatas,id',
            'rating' => 'required|integer|min:1|max:10',
            'ulasan' => 'required|string|max:255',
        ];
    }

    public function submit()
    {
        $this->validate();

        Ulasan::create([
            'wisata_id' => $this->wisataId,
            'user_id' => $this->userId,
            'rating' => $this->rating,
            'ulasan' => $this->ulasan,
        ]);

        session()->flash('message', 'Ulasan berhasil ditambahkan.');

        return redirect()->route('ulasan.index', ['wisataId' => $this->wisataId]);
    }

    public function resetFields()
    {
        $this->rating = null;
        $this->ulasan = '';
    }

    public function render()
    {
        return view('livewire.ulasan.ulasan-create', [
            'wisatas' => Wisata::all(),
            'users' => User::all(),
        ]);
    }
}
