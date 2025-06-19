<div class="max-w-3xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-zinc-800 dark:text-white mb-6">Tambah Wisata</h1>

    <form wire:submit.prevent="store" class="space-y-4 bg-white dark:bg-zinc-800 p-6 rounded-lg shadow">
        <div>
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200 mb-1">Nama Wisata</label>
            <input type="text" wire:model.defer="nama_wisata" class="w-full px-4 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white focus:outline-none focus:ring focus:border-blue-500">
            @error('nama_wisata') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200 mb-1">Kategori</label>
            <select wire:model.defer="kategori_id" class="w-full px-4 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white focus:outline-none">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
            @error('kategori_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200 mb-1">Kota</label>
            <select wire:model.defer="kota_id" class="w-full px-4 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white focus:outline-none">
                <option value="">-- Pilih Kota --</option>
                @foreach($kotas as $kota)
                    <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                @endforeach
            </select>
            @error('kota_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200 mb-1">Biaya Masuk</label>
            <input type="number" wire:model.defer="biaya_masuk" class="w-full px-4 py-2 border rounded-lg dark:bg-zinc-900 dark:border-zinc-700 dark:text-white focus:outline-none">
            @error('biaya_masuk') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200 mb-1">Deskripsi</label>
            <textarea wire:model.defer="deskripsi" rows="4" class="w-full px-4 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white focus:outline-none"></textarea>
            @error('deskripsi') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('wisata.index') }}" wire:navigate class="text-sm text-zinc-600 hover:text-zinc-800 dark:text-zinc-300 dark:hover:text-white transition">← Kembali</a>
            <button type="submit" wire:target="store" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium shadow transition">Simpan</button>
        </div>
    </form>
</div>
