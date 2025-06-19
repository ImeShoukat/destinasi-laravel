<div class="max-w-7xl mx-auto px-4 py-8 space-y-8">
    <h1 class="text-3xl font-bold text-zinc-800 dark:text-white mb-8">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
         <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 p-5 rounded-xl shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">Total Wisata</p>
                    <h2 class="text-3xl font-bold text-zinc-800 dark:text-white">{{ $totalWisata }}</h2>
                </div>
                <div class="bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 p-2 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M8 16l4-4-4-4m8 8l-4-4 4-4" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 p-5 rounded-xl shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">Total Kategori</p>
                    <h2 class="text-3xl font-bold text-zinc-800 dark:text-white">{{ $totalKategori }}</h2>
                </div>
                <div class="bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 p-2 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 10h18M3 6h18M9 14h6" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 p-5 rounded-xl shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">Total Kota</p>
                    <h2 class="text-3xl font-bold text-zinc-800 dark:text-white">{{ $totalKota }}</h2>
                </div>
                <div class="bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300 p-2 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 8v4l3 3" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 p-5 rounded-xl shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">Total User</p>
                    <h2 class="text-3xl font-bold text-zinc-800 dark:text-white">{{ $totalUser }}</h2>
                </div>
                <div class="bg-rose-100 dark:bg-rose-900 text-rose-600 dark:text-rose-300 p-2 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5.121 17.804A9.955 9.955 0 0112 15c2.071 0 3.985.632 5.533 1.709M12 7a4 4 0 110 8 4 4 0 010-8z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-zinc-800 p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold mb-4 text-zinc-700 dark:text-white flex items-center gap-2">
                <span class="text-blue-600">🆕</span> Wisata Terbaru
            </h2>
            <ul class="space-y-3">
                @forelse($wisataBaru as $wisata)
                    <li class="border p-3 rounded-lg dark:border-zinc-700">
                        <p class="text-zinc-800 dark:text-white font-medium">{{ $wisata->nama_wisata }}</p>
                        <p class="text-sm text-zinc-500">{{ $wisata->created_at->diffForHumans() }}</p>
                    </li>
                @empty
                    <p class="text-sm text-zinc-500">Tidak ada data wisata baru.</p>
                @endforelse
            </ul>
        </div>

        <div class="bg-white dark:bg-zinc-800 p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold mb-4 text-zinc-700 dark:text-white flex items-center gap-2">
                <span class="text-blue-600">💬</span> Komentar Terbaru
            </h2>
            <ul class="space-y-3">
                @forelse($komentarBaru as $ulasan)
                    <li class="border p-3 rounded-lg dark:border-zinc-700">
                        <p class="text-zinc-800 dark:text-white">"{{ $ulasan->ulasan }}"</p>
                        <p class="text-sm text-zinc-500">oleh {{ $ulasan->user->name ?? '-' }} – {{ $ulasan->created_at->diffForHumans() }}</p>
                    </li>
                @empty
                    <p class="text-sm text-zinc-500">Belum ada komentar terbaru.</p>
                @endforelse
            </ul>
        </div>
    </div>
</div>
