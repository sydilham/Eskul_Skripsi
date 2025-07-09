<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pendaftaran') }}
        </h2>
    </x-slot>
    @if (session('error'))
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Gagal!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    </div>
@endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="p-6" action="{{ route('siswa.pendaftaran.store') }}" method="POST">
                    @csrf

                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base font-semibold text-gray-900">Isi Data Diri</h2>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <div class="sm:col-span-3">
                                    <label for="nama" class="block text-sm font-medium text-gray-900">Nama</label>
                                    <input type="text" name="nama" id="nama" value="{{ Auth::user()->nama }}" readonly class="mt-2 block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900">
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="nisn" class="block text-sm font-medium text-gray-900">NISN</label>
                                    <input type="text" name="nisn" id="nisn" value="{{ Auth::user()->nisn }}" readonly class="mt-2 block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900">
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="kelas" class="block text-sm font-medium text-gray-900">Kelas</label>
                                    <input type="text" name="kelas" id="kelas" class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900">
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-900">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="mt-2 block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900">
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="tgl_lahir" class="block text-sm font-medium text-gray-900">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900">
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="no_telepon" class="block text-sm font-medium text-gray-900">No Telepon</label>
                                    <input type="text" name="no_telepon" id="no_telepon" class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900">
                                </div>

                            </div>

                            <h2 class="text-base font-semibold text-gray-900 mt-10">Pilih Eskul</h2>

                            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="eskul_id" class="block text-sm font-medium text-gray-900">Eskul</label>
                                    <select name="eskul_id" id="eskul_id" class="mt-2 block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900">
                                        <option value="">-- Pilih Eskul --</option>
                                        @foreach($eskuls as $eskul)
                                            <option value="{{ $eskul->id }}"
                                                data-tempat="{{ $eskul->tempat }}"
                                                data-pembina="{{ $eskul->pembina }}"
                                                data-jadwal="{{ $eskul->jadwal }}">
                                                {{ $eskul->nama_eskul }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="tempat" class="block text-sm font-medium text-gray-900">Tempat</label>
                                    <input type="text" id="tempat" readonly class="mt-2 block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900">
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="pembina" class="block text-sm font-medium text-gray-900">Pembina</label>
                                    <input type="text" id="pembina" readonly class="mt-2 block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900">
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="jadwal" class="block text-sm font-medium text-gray-900">Jadwal</label>
                                    <input type="text" id="jadwal" readonly class="mt-2 block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900">
                                </div>
                            </div>

                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <button type="reset" class="text-sm text-gray-600 hover:text-gray-900">Cancel</button>
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-md text-sm font-semibold">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- JS Untuk Auto Fill Eskul --}}
    <script>
        document.getElementById('eskul_id').addEventListener('change', function () {
            let selected = this.options[this.selectedIndex];
            document.getElementById('tempat').value = selected.getAttribute('data-tempat') || '';
            document.getElementById('pembina').value = selected.getAttribute('data-pembina') || '';
            document.getElementById('jadwal').value = selected.getAttribute('data-jadwal') || '';
        });
    </script>
</x-app-layout>
