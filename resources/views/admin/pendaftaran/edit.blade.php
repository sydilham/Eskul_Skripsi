<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pendaftaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="p-6" action="{{ route('admin.pendaftaran.update', $pendaftarans->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base font-semibold text-gray-900">Informasi Pribadi</h2>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="nama" class="block text-sm font-medium text-gray-900">Nama</label>
                                    <input type="text" name="nama" id="nama" value="{{ old('nama', $pendaftarans->nama) }}" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="nisn" class="block text-sm font-medium text-gray-900">NISN</label>
                                    <input type="text" name="nisn" id="nisn" value="{{ old('nisn', $pendaftarans->nisn) }}" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="kelas" class="block text-sm font-medium text-gray-900">Kelas</label>
                                    <input type="text" name="kelas" id="kelas" value="{{ old('kelas', $pendaftarans->kelas) }}" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-900">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-Laki" {{ old('jenis_kelamin', $pendaftarans->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', $pendaftarans->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="tgl_lahir" class="block text-sm font-medium text-gray-900">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir', $pendaftarans->tgl_lahir) }}" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>

                                <div class="col-span-full">
                                    <label for="no_telepon" class="block text-sm font-medium text-gray-900">No Telepon</label>
                                    <input type="text" name="no_telepon" id="no_telepon" value="{{ old('no_telepon', $pendaftarans->no_telepon) }}" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="eskul_id" class="block text-sm font-medium text-gray-900">Eskul</label>
                                    <select id="eskul_id" name="eskul_id" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="">-- Pilih Eskul --</option>
                                        @foreach($eskuls as $eskul)
                                            <option value="{{ $eskul->id }}" {{ old('eskul_id', $pendaftarans->eskul_id) == $eskul->id ? 'selected' : '' }}>
                                                {{ $eskul->nama_eskul }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('admin.pendaftaran.index') }}" class="rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow ring-1 ring-gray-300 hover:bg-gray-50">Cancel</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                            Update
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
