<div class="max-w-6xl mx-auto px-4 py-6">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-semibold text-zinc-800 dark:text-zinc-100">Manajemen User</h1>
        <a href="{{ route('user.create') }}" wire:navigate
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg shadow transition duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah User
        </a>
    </div>

    @if(session()->has('message'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 rounded-lg shadow">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white dark:bg-zinc-800 shadow-md rounded-xl overflow-x-auto">
        <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700">
            <thead class="bg-zinc-100 dark:bg-zinc-700">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-zinc-600 dark:text-zinc-300">No</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-zinc-600 dark:text-zinc-300">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-zinc-600 dark:text-zinc-300">Email</th>
                    <th class="px-6 py-3 text-center text-sm font-medium text-zinc-600 dark:text-zinc-300">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                @forelse($users as $index => $user)
                    <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-700">
                        <td class="px-6 py-4 text-sm text-zinc-800 dark:text-zinc-200">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-zinc-900 dark:text-white">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-sm text-zinc-700 dark:text-zinc-300">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('user.edit', $user->id) }}" wire:navigate
                               class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-3 py-1 rounded shadow transition">
                                Edit
                            </a>
                            <button onclick="if(confirm('Apakah Anda yakin ingin menghapus user ini?')) { @this.delete({{ $user->id }}) }"
                            class="inline-block bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1 rounded shadow transition">
                            Hapus
                        </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-zinc-500 dark:text-zinc-400 text-sm">Belum ada data user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
