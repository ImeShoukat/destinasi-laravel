<div class="max-w-3xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-zinc-800 dark:text-white mb-6">Tambah Kategori</h1>

    <form wire:submit.prevent="store" class="space-y-4 bg-white dark:bg-zinc-800 p-6 rounded-lg shadow">
        <div>
            <label for="nama_kategori" class="block text-sm font-medium text-zinc-700 dark:text-zinc-200 mb-1">Nama Kategori</label>
            <input type="text" id="nama_kategori" wire:model.defer="nama_kategori" required
                   class="w-full px-4 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white focus:outline-none focus:ring focus:border-blue-500">
            @error('nama_kategori')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('kategori.index') }}" wire:navigate
               class="text-sm text-zinc-600 hover:text-zinc-800 dark:text-zinc-300 dark:hover:text-white transition">
                ← Kembali
            </a>

            <button type="submit" wire:loading.attr="disabled"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium shadow transition">
                <span wire:loading.remove>Simpan</span>
                <span wire:loading>Sedang menyimpan...</span>
            </button>
        </div>
    </form>
</div>
