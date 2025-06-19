<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;

class UserIndex extends Component
{
    public $users;
    public function mount()
    {
        $this->users = User::all();
    }
    public function delete($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        
        session()->flash('message', 'User deleted successfully.');
        return redirect()->route('user.index');
    }
    public function confirmDelete($userId)
    {
        $this->dispatchBrowserEvent('confirm-delete', ['userId' => $userId]);
    }
    public function edit($userId)
    {
        return redirect()->route('user.edit', ['userId' => $userId]);
    }
    public function create()
    {
        return redirect()->route('user.create');
    }
    public function render()
    {
        return view('livewire.user.user-index');
    }
}
