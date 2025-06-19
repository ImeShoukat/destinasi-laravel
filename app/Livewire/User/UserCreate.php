<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;


class UserCreate extends Component
{
    public $name, $email, $password, $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function store()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        session()->flash('message', 'User created successfully.');
        $this->redirect(route('user.index'), navigate: true);
    }   
        
    public function render()
    {
        return view('livewire.user.user-create');
    }
}
