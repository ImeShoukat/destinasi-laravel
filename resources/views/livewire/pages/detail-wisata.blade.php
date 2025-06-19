<div class="min-h-screen bg-gray-50">
    {{-- Navigation --}}
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" class="flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Beranda
                </a>
                <span class="text-gray-400">•</span>
                <span class="text-gray-600">{{ $wisata->nama_wisata }}</span>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 py-8">
        {{-- Hero Section --}}
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8">
            <div class="md:flex">
                {{-- Image --}}
                <div class="md:w-1/2">
                    @if($wisata->gambar)
                        <img 
                            src="{{ asset('storage/' . $wisata->gambar) }}" 
                            alt="{{ $wisata->nama_wisata }}"
                            class="w-full h-64 md:h-96 object-cover"
                        >
                    @else
                        <div class="w-full h-64 md:h-96 bg-gradient-to-br from-blue-100 to-indigo-200 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-gray-500">Gambar tidak tersedia</p>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Info --}}
                <div class="md:w-1/2 p-8">
                    <div class="flex items-start justify-between mb-4">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $wisata->nama_wisata }}</h1>
                        @if($wisata->ulasans->count() > 0)
                            <div class="flex items-center bg-yellow-100 px-3 py-2 rounded-lg">
                                <svg class="w-5 h-5 text-yellow-500 fill-current mr-1" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="text-lg font-bold text-yellow-700">{{ number_format($wisata->rata_rating, 1) }}</span>
                            </div>
                        @endif
                    </div>

                    {{-- Location --}}
                    <div class="flex items-center text-gray-600 mb-6">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-lg">{{ $wisata->kota->nama_kota }}</span>
                    </div>

                    {{-- Price --}}
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                            <div>
                                <p class="text-sm text-green-600 font-medium">Biaya Masuk</p>
                                <p class="text-2xl font-bold text-green-800">
                                    @if($wisata->biaya_masuk == 0)
                                        Gratis
                                    @else
                                        Rp {{ number_format($wisata->biaya_masuk, 0, ',', '.') }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Quick Stats --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                            <p class="text-2xl font-bold text-blue-600">{{ $wisata->ulasans->count() }}</p>
                            <p class="text-sm text-blue-800">Total Ulasan</p>
                        </div>
                        <div class="text-center p-4 bg-purple-50 rounded-lg">
                            <p class="text-2xl font-bold text-purple-600">
                                @if($wisata->ulasans->count() > 0)
                                    {{ number_format($wisata->rata_rating, 1) }}/5
                                @else
                                    -
                                @endif
                            </p>
                            <p class="text-sm text-purple-800">Rating Rata-rata</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-8">
                {{-- Description --}}
                @if($wisata->deskripsi)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Tentang {{ $wisata->nama_wisata }}</h2>
                        <p class="text-gray-700 leading-relaxed">{{ $wisata->deskripsi }}</p>
                    </div>
                @endif

                {{-- Reviews Section --}}
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">
                            Ulasan ({{ $wisata->ulasans->count() }})
                        </h2>
                        
                        {{-- Filter & Sort --}}
                        <div class="flex space-x-3">
                            <select wire:model.live="filterRating" class="text-sm border border-gray-300 rounded-lg px-3 py-2">
                                <option value="">Semua Rating</option>
                                <option value="5">5 Bintang</option>
                                <option value="4">4 Bintang</option>
                                <option value="3">3 Bintang</option>
                                <option value="2">2 Bintang</option>
                                <option value="1">1 Bintang</option>
                            </select>
                            
                            <select wire:model.live="sortBy" class="text-sm border border-gray-300 rounded-lg px-3 py-2">
                                <option value="terbaru">Terbaru</option>
                                <option value="terlama">Terlama</option>
                                <option value="rating_tinggi">Rating Tertinggi</option>
                                <option value="rating_rendah">Rating Terendah</option>
                            </select>
                        </div>
                    </div>

                    {{-- Reviews List --}}
                    @if($ulasans->count() > 0)
                        <div class="space-y-4">
                            @foreach($ulasans as $ulasan)
                                <div class="border-b border-gray-200 pb-4 last:border-b-0">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                                                {{ strtoupper(substr($ulasan->nama_pengulas, 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">{{ $ulasan->nama_pengulas }}</p>
                                                <p class="text-sm text-gray-500">{{ $ulasan->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-4 h-4 {{ $i <= $ulasan->rating ? 'text-yellow-400 fill-current' : 'text-gray-300' }}" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-gray-700">{{ $ulasan->komentar }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <p class="text-gray-500">Belum ada ulasan. Jadilah yang pertama memberikan ulasan!</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                {{-- Rating Overview --}}
                @if($wisata->ulasans->count() > 0)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Rating & Ulasan</h3>
                        
                        <div class="text-center mb-6">
                            <div class="text-4xl font-bold text-gray-900 mb-1">{{ number_format($wisata->rata_rating, 1) }}</div>
                            <div class="flex justify-center mb-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= round($wisata->rata_rating) ? 'text-yellow-400 fill-current' : 'text-gray-300' }}" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                            <p class="text-gray-600">Berdasarkan {{ $wisata->ulasans->count() }} ulasan</p>
                        </div>

                        <div class="space-y-2">
                            @foreach($ratingStats as $rating => $stats)
                                <div class="flex items-center space-x-3">
                                    <span class="text-sm text-gray-600 w-8">{{ $rating }}★</span>
                                    <div class="flex-1 bg-gray-200 rounded-full h-2">
                                        <div class="bg-yellow-400 h-2 rounded-full" style="width: {{ $stats['percentage'] }}%"></div>
                                    </div>
                                    <span class="text-sm text-gray-600 w-8">{{ $stats['count'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Add Review Form --}}
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Tulis Ulasan</h3>
                    
                    @if (session()->has('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form wire:submit="submitUlasan">
                        {{-- Name --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                            <input 
                                type="text" 
                                wire:model="nama_pengulas"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Masukkan nama Anda"
                            >
                            @error('nama_pengulas') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        {{-- Rating --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                            <div class="flex space-x-1">
                                @for($i = 1; $i <= 5; $i++)
                                    <button 
                                        type="button"
                                        wire:click="$set('rating', {{ $i }})"
                                        class="focus:outline-none"
                                    >
                                        <svg class="w-6 h-6 {{ $i <= $rating ? 'text-yellow-400 fill-current' : 'text-gray-300 hover:text-yellow-400' }} transition-colors" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    </button>
                                @endfor
                            </div>
                            @error('rating') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        {{-- Comment --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ulasan</label>
                            <textarea 
                                wire:model="ulasan"
                                rows="4"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Ceritakan pengalaman Anda..."
                            ></textarea>
                            <p class="text-xs text-gray-500 mt-1">{{ strlen($ulasan) }}/500 karakter</p>
                            @error('ulasan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <button 
                            type="submit"
                            class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-2 px-4 rounded-lg hover:from-blue-600 hover:to-indigo-700 transition-all duration-200 font-medium"
                            wire:loading.attr="disabled"
                        >
                            <span wire:loading.remove>Kirim Ulasan</span>
                            <span wire:loading>Mengirim...</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>