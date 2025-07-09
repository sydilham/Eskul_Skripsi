<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Eskul') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="p-6" action="{{ route('admin.eskul.update', $eskuls->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base/7 font-semibold text-gray-900">Informasi Eskul</h2>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="nama_eskul" class="block text-sm/6 font-medium text-gray-900">Nama Eskul</label>
                                <div class="mt-2">
                                    <input type="text" name="nama_eskul" id="nama_eskul"
                                        value="{{ old('nama_eskul', $eskuls->nama_eskul) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="tempat" class="block text-sm/6 font-medium text-gray-900">Tempat</label>
                                <div class="mt-2">
                                    <input type="text" name="tempat" id="tempat"
                                        value="{{ old('tempat', $eskuls->tempat) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="pembina" class="block text-sm/6 font-medium text-gray-900">Pembina</label>
                                <div class="mt-2">
                                    <input type="text" name="pembina" id="pembina"
                                        value="{{ old('pembina', $eskuls->pembina) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="jadwal" class="block text-sm/6 font-medium text-gray-900">Jadwal Eskul</label>
                                <div class="mt-2">
                                    <input type="date" name="jadwal" id="jadwal"
                                        value="{{ old('jadwal', $eskuls->jadwal) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 focus:outline-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('admin.eskul.index') }}" class="rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Cancel</a>

                        <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus:outline-indigo-600">
                            Update
                        </button>
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>


</x-app-layout>