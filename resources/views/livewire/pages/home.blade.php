<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Filter Pencarian
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Cari Wisata
                    </label>
                    <input 
                        type="text" 
                        wire:model.live="search" 
                        placeholder="Nama wisata..."
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                </div>

                {{-- Filter Kota --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Pilih Kota
                    </label>
                    <select 
                        wire:model.live="filterKota"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                        <option value="">Semua Kota</option>
                        @foreach($kotas as $kota)
                            <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Filter Harga --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        Harga Maksimal
                    </label>
                    <input 
                        type="number" 
                        wire:model.live="biayaMax" 
                        placeholder="Contoh: 50000"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                </div>

                {{-- Reset Button --}}
                <div class="flex items-end">
                    <button 
                        wire:click="$set('search', ''); $set('filterKota', ''); $set('biayaMax', '')"
                        class="w-full bg-gray-500 text-white py-3 px-4 rounded-lg hover:bg-gray-600 transition-colors"
                    >
                        Reset Filter
                    </button>
                </div>
            </div>

            {{-- Active Filters Display --}}
            @if($search || $filterKota || $biayaMax)
                <div class="mt-4 flex flex-wrap gap-2">
                    <span class="text-sm text-gray-600">Filter aktif:</span>
                    @if($search)
                        <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">
                            Pencarian: {{ $search }}
                        </span>
                    @endif
                    @if($filterKota)
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                            Kota: {{ $kotas->find($filterKota)?->nama_kota }}
                        </span>
                    @endif
                    @if($biayaMax)
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                            Max: Rp {{ number_format($biayaMax, 0, ',', '.') }}
                        </span>
                    @endif
                </div>
            @endif
        </div>

        {{-- Results Count --}}
        <div class="mb-6">
            <p class="text-gray-600">
                Menampilkan <span class="font-semibold">{{ $wisatas->count() }}</span> destinasi wisata
                @if($search || $filterKota || $biayaMax) berdasarkan filter @endif
                diurutkan berdasarkan rating tertinggi
            </p>
        </div>

        {{-- Loading State --}}
        <div wire:loading class="text-center py-8">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
            <p class="mt-2 text-gray-600">Memuat data...</p>
        </div>

        {{-- Wisata Grid --}}
        <div wire:loading.remove>
            @if($wisatas->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($wisatas as $index => $wisata)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                            {{-- Ranking Badge & Image --}}
                            <div class="relative">
                                @if($wisata->gambar)
                                    <img 
                                        src="{{ asset('storage/' . $wisata->gambar) }}" 
                                        alt="{{ $wisata->nama_wisata }}"
                                        class="w-full h-48 object-cover"
                                    >
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                
                                {{-- Ranking Badge --}}
                                <div class="absolute top-3 left-3 bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                                    #{{ $index + 1 }}
                                </div>
                                
                                {{-- Rating Badge --}}
                                <div class="absolute top-3 right-3 bg-black bg-opacity-50 text-white px-2 py-1 rounded-lg text-sm">
                                    <svg class="inline w-4 h-4 text-yellow-400 fill-current mr-1" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    {{ number_format($wisata->rata_rating, 1) }}
                                </div>
                            </div>

                            <div class="p-4">
                                {{-- Nama Wisata --}}
                                <h3 class="text-lg font-bold text-gray-800 mb-2">
                                    {{ $wisata->nama_wisata }}
                                </h3>
                                
                                {{-- Lokasi --}}
                                <div class="flex items-center text-gray-600 mb-2">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="text-sm">{{ $wisata->kota->nama_kota }}</span>
                                </div>

                                {{-- Deskripsi --}}
                                @if($wisata->deskripsi)
                                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                        {{ Str::limit($wisata->deskripsi, 100) }}
                                    </p>
                                @endif

                                <div class="flex items-center justify-between mb-4">
                                    {{-- Harga --}}
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-green-600 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                        <span class="text-sm font-semibold {{ $wisata->biaya_masuk == 0 ? 'text-green-600' : 'text-gray-700' }}">
                                            @if($wisata->biaya_masuk == 0)
                                                Gratis
                                            @else
                                                Rp {{ number_format($wisata->biaya_masuk, 0, ',', '.') }}
                                            @endif
                                        </span>
                                    </div>
                                    
                                    {{-- Rating Display --}}
                                    <div class="flex items-center bg-yellow-50 px-2 py-1 rounded-lg">
                                        <svg class="w-4 h-4 text-yellow-500 fill-current mr-1" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span class="text-sm font-bold text-yellow-700">
                                            {{ number_format($wisata->rata_rating, 1) }}
                                        </span>
                                        <span class="text-xs text-gray-500 ml-1">
                                            ({{ $wisata->ulasans->count() }})
                                        </span>
                                    </div>
                                </div>

                                {{-- Action Button --}}
                                <button 
                                    wire:navigate href="{{ route('wisata.detail', $wisata->id) }}"
                                    class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-2 px-4 rounded-lg hover:from-blue-600 hover:to-indigo-700 transition-all duration-200 font-medium"
                                >
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                {{-- No Results --}}
                <div class="text-center py-12">
                    <div class="text-6xl mb-4">🔍</div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">
                        Tidak ada hasil ditemukan
                    </h3>
                    <p class="text-gray-600 mb-4">
                        Coba ubah filter pencarian Anda
                    </p>
                    <button
                        wire:click="$set('search', ''); $set('filterKota', ''); $set('biayaMax', '')"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors"
                    >
                        Reset Semua Filter
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- {{-- Footer --}}
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-gray-300">
                © {{ date('Y') }} Wisata Indonesia. Jelajahi keindahan Nusantara.
            </p>
        </div>
    </footer> -->
</div>