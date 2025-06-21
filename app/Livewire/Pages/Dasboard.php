<?php
namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public function mount()
    {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('dashboard.admin'); 
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard')
            ->layout('layouts.app', ['title' => 'Dashboard']);
    }
}
