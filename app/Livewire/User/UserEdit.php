<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;

class UserEdit extends Component
{
    public $userId, $name, $email;
    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
        ];
    }
    public function mount($userId)
    {
        $this->userId = $userId;
        $user = User::findOrFail($this->userId);
        $this->name = $user->name;
        $this->email = $user->email;
    }
    public function update()
    {
        $this->validate();

        $user = User::findOrFail($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'User updated successfully.');
        $this->redirect(route('user.index'), navigate: true);
    }
    public function delete()
    {
        $user = User::findOrFail($this->userId);
        $user->delete();
        session()->flash('message', 'User deleted successfully.');
        $this->redirect(route('user.index'), navigate: true);
    }
    public function render()
    {
        return view('livewire.user.user-edit');
    }
}
