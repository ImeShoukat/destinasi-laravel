<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
// Wisata
use App\Livewire\Wisata\WisataIndex;
use App\Livewire\Wisata\WisataCreate;
use App\Livewire\Wisata\WisataEdit;

// Kategori
use App\Livewire\Kategori\KategoriIndex;
use App\Livewire\Kategori\KategoriCreate;
use App\Livewire\Kategori\KategoriEdit;

// Kota
use App\Livewire\Kota\KotaIndex;
use App\Livewire\Kota\KotaCreate;
use App\Livewire\Kota\KotaEdit;

// User
use App\Livewire\User\UserIndex;
use App\Livewire\User\UserCreate;
use App\Livewire\User\UserEdit;

// Ulasan
use App\Livewire\Ulasan\UlasanIndex;
use App\Livewire\Ulasan\UlasanCreate;
use App\Livewire\Ulasan\UlasanEdit;

Route::get('/', function () {
    return redirect()->route('wisata.index');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});
Route::get('/wisata', WisataIndex::class)->name('wisata.index');
Route::get('/wisata/create', WisataCreate::class)->name('wisata.create');
Route::get('/wisata/{wisataId}/edit', WisataEdit::class)->name('wisata.edit');

Route::get('/kategori', KategoriIndex::class)->name('kategori.index');
Route::get('/kategori/create', KategoriCreate::class)->name('kategori.create');
Route::get('/kategori/{kategoriId}/edit', KategoriEdit::class)->name('kategori.edit');

Route::get('/kota', KotaIndex::class)->name('kota.index');
Route::get('/kota/create', KotaCreate::class)->name('kota.create');
Route::get('/kota/{kotaId}/edit', KotaEdit::class)->name('kota.edit');

Route::get('/user', UserIndex::class)->name('user.index');
Route::get('/user/create', UserCreate::class)->name('user.create');
Route::get('/user/{userId}/edit', UserEdit::class)->name('user.edit');

Route::get('/ulasan', UlasanIndex::class)->name('ulasan.index');
Route::get('/ulasan/create', UlasanCreate::class)->name('ulasan.create');
Route::get('/ulasan/{ulasanId}/edit', UlasanEdit::class)->name('ulasan.edit');
require __DIR__.'/auth.php';
