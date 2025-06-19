<div class="max-w-xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-6 text-zinc-800 dark:text-zinc-100">Edit User</h1>

    <form wire:submit.prevent="update" class="space-y-4">
        <div>
            <label class="block mb-1 text-sm font-medium text-zinc-700 dark:text-zinc-300">Nama</label>
            <input type="text" wire:model.defer="name" class="w-full px-4 py-2 border rounded-lg dark:bg-zinc-900 dark:border-zinc-700 dark:text-white">
            @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-zinc-700 dark:text-zinc-300">Email</label>
            <input type="email" wire:model.defer="email" class="w-full px-4 py-2 border rounded-lg dark:bg-zinc-900 dark:border-zinc-700 dark:text-white">
            @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-zinc-700 dark:text-zinc-300">Password Baru (Opsional)</label>
            <input type="password" wire:model.defer="password" placeholder="Kosongkan jika tidak diubah"
                   class="w-full px-4 py-2 border rounded-lg dark:bg-zinc-900 dark:border-zinc-700 dark:text-white">
            @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="flex items-center justify-between">
            <a href="{{ route('user.index') }}" wire:navigate
               class="text-sm text-zinc-600 hover:text-zinc-800 dark:text-zinc-300 dark:hover:text-white transition">
                ← Kembali
            </a>

            <button type="submit" wire:loading.attr="disabled"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium shadow transition">
                <span wire:loading.remove>Update</span>
                <span wire:loading>Sedang meng-update...</span>
            </button>
    </form>
</div>
