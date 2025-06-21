<div class="max-w-3xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-zinc-800 dark:text-white mb-6">Tambah Ulasan</h1>

    <form wire:submit.prevent="submit" class="space-y-4 bg-white dark:bg-zinc-800 p-6 rounded-lg shadow">

        <div>
            <label class="block mb-1 text-sm font-medium text-zinc-700 dark:text-zinc-300">User</label>
            <select wire:model.defer="userId" class="w-full px-4 py-2 border rounded-lg dark:bg-zinc-900 dark:border-zinc-700 dark:text-white">
                <option value="">Pilih User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('userId') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-zinc-700 dark:text-zinc-300">Wisata</label>
            <select wire:model.defer="wisataId" class="w-full px-4 py-2 border rounded-lg dark:bg-zinc-900 dark:border-zinc-700 dark:text-white">
                <option value="">Pilih Wisata</option>
                @foreach($wisatas as $wisata)
                    <option value="{{ $wisata->id }}">{{ $wisata->nama_wisata }}</option>
                @endforeach
            </select>
            @error('wisataId') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-zinc-700 dark:text-zinc-300">Rating (1–5)</label>
            <select wire:model.defer="rating" class="w-full px-4 py-2 border rounded-lg dark:bg-zinc-900 dark:border-zinc-700 dark:text-white">
                <option value="">Pilih Rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            @error('rating') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-zinc-700 dark:text-zinc-300">Isi Ulasan</label>
            <textarea wire:model.defer="ulasan" class="w-full px-4 py-2 border rounded-lg dark:bg-zinc-900 dark:border-zinc-700 dark:text-white"></textarea>
            @error('ulasan') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
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
