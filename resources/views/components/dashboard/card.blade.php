@props(['title', 'value', 'icon', 'color'])

@php
    $bg = match($color) {
        'blue' => 'bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300',
        'green' => 'bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300',
        'purple' => 'bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300',
        'rose' => 'bg-rose-100 dark:bg-rose-900 text-rose-600 dark:text-rose-300',
        default => 'bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300',
    };
@endphp

<div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 p-5 rounded-xl shadow-sm hover:shadow-md transition">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ $title }}</p>
            <h2 class="text-3xl font-bold text-zinc-800 dark:text-white">{{ $value }}</h2>
        </div>
        <div class="{{ $bg }} p-2 rounded-full">
            {!! $icon !!}
        </div>
    </div>
</div>
