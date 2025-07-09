<?php

namespace App\Http\Controllers;
use App\Models\Eskul;
use App\Models\PendaftaranEskul;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PendaftaranEskulController extends Controller
{
    public function index_admin(Request $request)
{
    $query = PendaftaranEskul::with('eskul');

    if ($request->filled('eskul')) {
        $query->whereHas('eskul', function ($q) use ($request) {
            $q->where('nama_eskul', $request->eskul);
        });
    }

    $pendaftarans = $query->get();

    return view('admin.pendaftaran.index', compact('pendaftarans'));
}

    public function index_siswa()
    {
        $pendaftarans = PendaftaranEskul::with('eskul')->get();
        return view('siswa.pendaftaran.index', compact('pendaftarans'));
    }

    public function create()
    {
        
        $eskuls = Eskul::all();
        return view('siswa.pendaftaran.create', compact('eskuls'));
    }

  public function store(Request $request)
{
    $request->validate([
        'eskul_id' => 'required|exists:eskuls,id',
        'no_telepon' => 'required',
        'nama' => 'required',
        'nisn' => 'required',
        'kelas' => 'required',
        'tgl_lahir' => 'required',
        'jenis_kelamin' => 'required'
    ]);

    $userId = Auth::id();

    // Cek apakah siswa sudah pernah mendaftar ke eskul yang sama
    $sudahTerdaftar = PendaftaranEskul::where('user_id', $userId)
                        ->where('eskul_id', $request->eskul_id)
                        ->exists();

    if ($sudahTerdaftar) {
        return redirect()->back()->with('error', 'Kamu sudah mendaftar eskul ini.');
    }

    // Jika belum terdaftar, lanjutkan menyimpan
    PendaftaranEskul::create([
        'user_id' => $userId,
        'eskul_id' => $request->eskul_id,
        'no_telepon' => $request->no_telepon,
        'nama' => $request->nama,
        'nisn' => $request->nisn,
        'kelas' => $request->kelas,
        'tgl_lahir' => $request->tgl_lahir,
        'jenis_kelamin'=> $request->jenis_kelamin
    ]);

    return redirect()->route('siswa.jadwal.index')->with('success', 'Pendaftaran berhasil!');
}


    public function edit(Request $request, $id) 
    {
        $pendaftarans = PendaftaranEskul::find($id);
        $eskuls = Eskul::all();
        return view('admin.pendaftaran.edit', compact(['pendaftarans', 'eskuls']));
    }

    public function update(Request $request, $id)
    {
        $pendaftaran = PendaftaranEskul::find($id);
        $pendaftaran->update($request->except('_token'));

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran eskul berhasil terupdate');
    }

    public function destroy(Request $request, $id)
    {
        PendaftaranEskul::find($id)->delete();

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran eskul berhasil terhapus');
    }

    public function jadwal()
    {
         $user = Auth::user();
        $jadwal = PendaftaranEskul::where('user_id', $user->id)->with('eskul')->get();
        return view('siswa.jadwal.index', compact('jadwal','user'));
    }
    public function cetakPDF(Request $request)
{
    $nama_eskul = $request->input('eskul');

    $query = PendaftaranEskul::with('eskul');

    if ($nama_eskul) {
        $query->whereHas('eskul', function ($q) use ($nama_eskul) {
            $q->where('nama_eskul', $nama_eskul);
        });
    }

    $pendaftarans = $query->get();

    // Ambil informasi tambahan dari eskul jika difilter
    $pembina = null;
    $jadwal = null;
    if ($nama_eskul && $pendaftarans->isNotEmpty()) {
        $eskul = $pendaftarans->first()->eskul;
        $pembina = $eskul->pembina ?? null;
        $jadwal = $eskul->jadwal ?? null;
    }

    // Kirim semua ke view
    $pdf = Pdf::loadView('admin.pendaftaran.cetak', compact(
        'pendaftarans',
        'nama_eskul',
        'pembina',
        'jadwal'
    ));

    return $pdf->download('laporanEskul.pdf');
}

}
