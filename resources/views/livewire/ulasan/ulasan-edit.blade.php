<div class="max-w-xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-zinc-800 dark:text-white mb-6">Edit Ulasan</h1>

    <form wire:submit.prevent="update" class="space-y-4">
        <div>
            <label class="block mb-1 text-sm font-medium text-zinc-700 dark:text-zinc-300">Ulasan</label>
            <textarea wire:model.defer="ulasan" class="w-full px-4 py-2 border rounded-lg dark:bg-zinc-900 dark:border-zinc-700 dark:text-white"></textarea>
            @error('ulasan') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-zinc-700 dark:text-zinc-300">Rating (1 - 10)</label>
            <input type="number" wire:model.defer="rating" min="1" max="10" class="w-full px-4 py-2 border rounded-lg dark:bg-zinc-900 dark:border-zinc-700 dark:text-white">
            @error('rating') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('ulasan.index') }}" wire:navigate
               class="text-sm text-zinc-600 hover:text-zinc-800 dark:text-zinc-300 dark:hover:text-white transition">
                ← Kembali
            </a>
            <button type="submit" wire:target="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium shadow transition">
                Simpan
            </button>
        </div>
    </form>
</div>
