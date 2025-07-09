<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Selamat Datang -->
          <div class="mb-10 text-center bg-green-100 bg-opacity-50 p-6 rounded-lg shadow-md max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Selamat datang di SMAN 19 Kabupaten Tangerang</h1>
            <p class="text-gray-600 text-lg">Tempat berkembang dan berprestasi bersama</p>
        </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md">
                        <img src="{{ asset('images/Futsal.jpeg') }}" alt="Portofolio 1" class="w-full h-30 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">Futsal</h3>
                            <p class="text-gray-600">This Is my team</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md">
                        <img src="{{ asset('images/Badminton.jpeg') }}" alt="Portofolio 2" class="w-full h-30 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">Badminton</h3>
                            <p class="text-gray-600">This is my badminton</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md">
                        <img src="{{ asset('images/Paskibra.jpeg') }}" alt="Portofolio 3" class="w-full h-30 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">Paskibra</h3>
                            <p class="text-gray-600">This is my paskibra</p>
                        </div>
                    </div>

                    <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md">
                        <img src="{{ asset('images/pramuka.jpeg') }}"  alt="Portofolio 3" class="w-full h-30 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">Pramuka</h3>
                            <p class="text-gray-600">This is my pramuka</p>
                        </div>
                    </div>

                    <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md">
                        <img src="{{ asset('images/silat.jpeg') }}"  alt="Portofolio 3" class="w-full h-30 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">Silat</h3>
                            <p class="text-gray-600">This is my silat</p>
                        </div>
                    </div>

                    <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md">
                        <img src="{{ asset('images/Volly.jpeg') }}"  alt="Portofolio 3" class="w-full h-30 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">Volly</h3>
                            <p class="text-gray-600">This is my volly</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
