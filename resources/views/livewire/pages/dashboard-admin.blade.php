<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-zinc-800 dark:text-white mb-8">Dashboard Admin</h1>

    {{-- Ringkasan Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        {{-- Wisata --}}
        <x-dashboard.card title="Wisata" count="{{ $totalWisata }}" color="blue" />
        {{-- Kategori --}}
        <x-dashboard.card title="Kategori" count="{{ $totalKategori }}" color="green" />
        {{-- Kota --}}
        <x-dashboard.card title="Kota" count="{{ $totalKota }}" color="purple" />
        {{-- User --}}
        <x-dashboard.card title="User" count="{{ $totalUser }}" color="rose" />
    </div>

    {{-- Terbaru --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Wisata Terbaru --}}
        <div class="bg-white dark:bg-zinc-900 p-5 rounded-xl shadow border dark:border-zinc-700">
            <h2 class="text-xl font-semibold text-zinc-800 dark:text-white mb-4">🆕 Wisata Terbaru</h2>
            <ul class="space-y-3">
                @foreach($wisataBaru as $wisata)
                    <li class="p-3 bg-zinc-50 dark:bg-zinc-800 rounded-lg">
                        <p class="text-zinc-800 dark:text-white font-medium">{{ $wisata->nama_wisata }}</p>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ $wisata->created_at->diffForHumans() }}</p>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Komentar Terbaru --}}
        <div class="bg-white dark:bg-zinc-900 p-5 rounded-xl shadow border dark:border-zinc-700">
            <h2 class="text-xl font-semibold text-zinc-800 dark:text-white mb-4">💬 Komentar Terbaru</h2>
            <ul class="space-y-3">
                @foreach($komentarBaru as $ulasan)
                    <li class="p-3 bg-zinc-50 dark:bg-zinc-800 rounded-lg">
                        <p class="text-zinc-700 dark:text-zinc-200 italic">“{{ \Illuminate\Support\Str::limit($ulasan->komentar, 60) }}”</p>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">
                            oleh <span class="font-medium">{{ $ulasan->user->name ?? 'User' }}</span> 
                            - {{ $ulasan->created_at->diffForHumans() }}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
