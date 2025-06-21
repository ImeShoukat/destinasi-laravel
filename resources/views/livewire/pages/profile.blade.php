@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Profil Saya</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Photo --}}
        <div class="flex items-center space-x-4">
            <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="w-16 h-16 rounded-full object-cover">
            <div>
                <label class="block text-sm font-medium text-gray-700">Foto Profil</label>
                <input type="file" name="photo" class="mt-1 text-sm text-gray-600">
                @error('photo') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Name --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-input w-full mt-1 border-gray-300 rounded">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Email --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-input w-full mt-1 border-gray-300 rounded" readonly>
        </div>

        {{-- Phone --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">No HP</label>
            <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}" class="form-input w-full mt-1 border-gray-300 rounded">
            @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Address --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" name="address" value="{{ old('address', auth()->user()->address) }}" class="form-input w-full mt-1 border-gray-300 rounded">
            @error('address') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Bio --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Tentang Saya</label>
            <textarea name="bio" rows="4" class="form-textarea w-full mt-1 border-gray-300 rounded">{{ old('bio', auth()->user()->bio) }}</textarea>
            @error('bio') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Submit --}}
        <div class="text-right">
            <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
