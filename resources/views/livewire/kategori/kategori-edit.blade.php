<div>
    <h1>Edit Kategori</h1>

    <form wire:submit.prevent="update">
        <div>
            <label for="nama_kategori">Nama Kategori:</label><br>
            <input type="text" wire:model="nama_kategori" id="nama_kategori" required>
            @error('nama_kategori')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Perbarui</button>
    </form>

    <a href="{{ route('kategori.index') }}">← Kembali</a>
</div>
