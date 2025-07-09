<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('images/logo SMA 19.jpeg') }}" alt="Logo" class="block h-20 w-auto">
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nama -->
            <div>
                <x-label for="nama" value="Nama Lengkap" />
                <x-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus />
            </div>

            <!-- NISN -->
            <div class="mt-4">
                <x-label for="nisn" value="NISN" />
                <x-input id="nisn" class="block mt-1 w-full" type="text" name="nisn" :value="old('nisn')" required />
            </div>

            <!-- Gmail -->
            <div class="mt-4">
                <x-label for="email" value="Gmail" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="Password" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Password Confirmation -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="Konfirmasi Password" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    Daftar
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
