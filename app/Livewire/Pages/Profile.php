<?php

namespace App\Livewire\Pages;

class Profile extends Component
{
    
    public function render()
    {
        return view('livewire.pages.profile')
            ->layout('layouts.app', ['title' => 'Profile']);
    }
}
