<div class="max-w-xl mx-auto px-4 py-6">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-zinc-800 dark:text-zinc-100">Edit Ulasan</h1>
        <a href="{{ url()->previous() }}"
           class="inline-flex items-center gap-2 text-sm bg-zinc-200 hover:bg-zinc-300 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-zinc-800 dark:text-white font-medium px-4 py-2 rounded-lg transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
    </div>

    <form wire:submit.prevent="update" class="space-y-4">
        <div>
            <label class="block mb-1 text-sm font-medium text-zinc-700 dark:text-zinc-300">Komentar</label>
            <textarea wire:model.defer="komentar" class="w-full px-4 py-2 border rounded-lg dark:bg-zinc-900 dark:border-zinc-700 dark:text-white"></textarea>
            @error('komentar') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-zinc-700 dark:text-zinc-300">Rating (1 - 5)</label>
            <input type="number" wire:model.defer="rating" min="1" max="5" class="w-full px-4 py-2 border rounded-lg dark:bg-zinc-900 dark:border-zinc-700 dark:text-white">
            @error('rating') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
