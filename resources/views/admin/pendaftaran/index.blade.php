<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pendaftaran') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                                <div class="flex items-center justify-end mb-4">
                    <form action="{{ route('admin.laporan.cetak') }}" method="GET" class="flex space-x-2 mb-4 justify-end">
    <select name="eskul" class="border rounded px-2 py-1 text-sm">
        <option value="">Pilih Eskul</option>
@foreach(\App\Models\Eskul::all() as $eskulItem)
    <option value="{{ $eskulItem->nama_eskul }}" {{ request('eskul') == $eskulItem->nama_eskul ? 'selected' : '' }}>
        {{ $eskulItem->nama_eskul }}
    </option>
@endforeach

    </select>
    <button type="submit" class="bg-indigo-600 text-white text-sm px-4 py-2 rounded hover:bg-indigo-500">
        Cetak Laporan
    </button>
</form>

                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">NISN</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">No Telepon</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Tanggal Lahir</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Eskul</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Nama Pembina</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Jadwal</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Tempat</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($pendaftarans as $index => $pendaftaran)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $pendaftaran->nama}}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $pendaftaran->nisn }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $pendaftaran->kelas }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $pendaftaran->no_telepon }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $pendaftaran->jenis_kelamin }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $pendaftaran->tgl_lahir }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ optional($pendaftaran->eskul)->nama_eskul ?? '-' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ optional($pendaftaran->eskul)->pembina ?? '-' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ optional($pendaftaran->eskul)->jadwal ?? '-' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ optional($pendaftaran->eskul)->tempat ?? '-' }}</td>
                                    <td class="px-6 py-4 text-sm text-indigo-600 hover:text-indigo-900">
                                        <a href="{{ route('admin.pendaftaran.edit', $pendaftaran->id) }}">Edit</a>
                                        |
                                        <form action="{{ route('admin.pendaftaran.destory', $pendaftaran->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada data ekstrakurikuler.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#4f46e5'
            });
        </script>
    @endif


</x-app-layout>