<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">

    {{-- SIDEBAR --}}
    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('home') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist.group :heading="__('Menu')" class="grid">
            @auth
                @if (auth()->user()->role === 'admin')
                    <flux:navlist.item icon="home" :href="route('dashboard.admin')" :current="request()->routeIs('dashboard.admin')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="map" :href="route('wisata.index')" :current="request()->routeIs('wisata.*')" wire:navigate>
                        {{ __('Wisata') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="tag" :href="route('kategori.index')" :current="request()->routeIs('kategori.*')" wire:navigate>
                        {{ __('Kategori') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="users" :href="route('kota.index')" :current="request()->routeIs('kota.*')" wire:navigate>
                        {{ __('Kota') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="users" :href="route('user.index')" :current="request()->routeIs('user.*')" wire:navigate>
                        {{ __('User') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="star" :href="route('ulasan.index', ['wisataId' => 1])" :current="request()->routeIs('ulasan.*')" wire:navigate>
                        {{ __('Ulasan') }}
                    </flux:navlist.item>
                @endif
            @endauth
        </flux:navlist.group>

        <flux:spacer />

        @auth
        {{-- DESKTOP USER DROPDOWN --}}
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile
                :name="auth()->user()->name"
                :initials="auth()->user()->initials()"
                icon:trailing="chevrons-up-down"
            />
            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5">
                            <span class="relative flex h-8 w-8 overflow-hidden rounded-lg">
                                <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>
                            <div class="flex-1">
                                <span class="block font-semibold truncate">{{ auth()->user()->name }}</span>
                                <span class="text-xs truncate">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
        @endauth
    </flux:sidebar>

    {{-- HEADER (MOBILE & ATAS) --}}
    <flux:header class="lg:flex lg:justify-end lg:items-center lg:px-6 lg:py-3">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
        <flux:spacer />

        @auth
        {{-- MOBILE USER DROPDOWN --}}
        <flux:dropdown position="top" align="end">
            <flux:profile
                :initials="auth()->user()->initials()"
                icon-trailing="chevron-down"
            />
            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5">
                            <span class="relative flex h-8 w-8 overflow-hidden rounded-lg">
                                <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>
                            <div class="flex-1">
                                <span class="block font-semibold truncate">{{ auth()->user()->name }}</span>
                                <span class="text-xs truncate">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
        @endauth

        @guest
        {{-- LOGIN / REGISTER BUTTON --}}
        <div class="flex items-center gap-3">
            <a href="{{ route('login') }}" class="text-sm font-medium text-zinc-800 dark:text-white hover:underline">
                Login
            </a>
            <a href="{{ route('register') }}" class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline">
                Register
            </a>
        </div>
        @endguest
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>
</html>
