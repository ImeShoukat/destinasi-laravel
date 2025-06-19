<div class="max-w-3xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-zinc-800 dark:text-white mb-6">Edit Kategori</h1>

    @if (session()->has('message'))
        <div class="mb-4 text-green-700 bg-green-100 px-4 py-2 rounded shadow">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="update" class="space-y-4 bg-white dark:bg-zinc-800 p-6 rounded-lg shadow">
        <div>
        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200 mb-1">Nama Kategori</label>    
        <input type="text" wire:model="nama_kategori" defer="nama_kategori"id="nama_kategori" required class="w-full px-4 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 focus:outline-none focus:ring focus:border-blue-500 dark:bg-zinc-900 dark:text-white">
            @error('nama_kategori')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('kategori.index') }}" wire:navigate
               class="text-sm text-zinc-600 hover:text-zinc-800 dark:text-zinc-300 dark:hover:text-white transition">
                ← Kembali
            </a>

            <button type="submit"
                    wire:loading.attr="disabled"
                    wire:target="store"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium shadow transition flex items-center gap-2">
                <span wire:loading.remove wire:target="store">Simpan</span>
                <svg wire:loading wire:target="store"
                     class="w-4 h-4 animate-spin text-white"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v2m0 12v2m8-8h-2M6 12H4m13.657-6.343l-1.414 1.414M6.343 17.657l-1.414 1.414M17.657 17.657l-1.414-1.414M6.343 6.343L4.929 7.757"/>
                </svg>
            </button>
        </div>
    </form>

    
</div>
