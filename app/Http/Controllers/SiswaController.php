<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = ['nama' => '', 'foto' => 'MYMOOD.jpg'];
        $siswa = Siswa::with('kelas')->get();
        return view('siswa.index', compact(['data', 'siswa']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = ['nama' => '', 'foto' => 'MYMOOD.jpg'];
        $kelas = Kelas::all();
        return view('siswa.create', compact(['data', 'kelas']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate(
            [
                'nisn' => 'required|unique:siswa|max:255',
                'nama' => 'required|max:255',
                'kelas_id' => 'required',
                'no_hp' => 'required|max:255',
                'alamat' => 'required|max:255',
                'foto' => 'image|file|max:2048'
            ],
            [
                'nisn.required' => 'NISN harus diisi',
                'nisn.unique' => 'NISN sudah ada',
                'nisn.max' => 'NISN maksimal 255 karakter',
                'nama.required' => 'Nama harus diisi',
                'kelas_id.required' => 'Kelas harus diisi',
                'no_hp.required' => 'No Hp harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'foto.image' => 'Tolong upload file foto',
                'foto.max' => 'Ukuran foto maksimal 2MB'
            ]
        );
        if ($request->file('foto')) {
            $validateData['foto'] = $request->file('foto')->store('img');
        }
        $validateData['password'] = Hash::make($validateData['nisn']);
        Siswa::create($validateData);
        flash()->success('Data Berhasil ditambah');
        return redirect('/siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = ['nama' => '', 'foto' => 'MYMOOD.jpg'];
        $siswa = Siswa::find($id);
        $kelas = Kelas::all();
        return view('siswa.edit', compact(['data', 'siswa', 'kelas']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate(
            [
                'nisn' => 'required|max:255',
                'nama' => 'required|max:255',
                'kelas_id' => 'required',
                'no_hp' => 'required|max:255',
                'alamat' => 'required|max:255',
                'foto' => 'image|file|max:2048'
            ],
            [
                'nisn.required' => 'NIM harus diisi',
                'nisn.unique' => 'NIM sudah ada',
                'nisn.max' => 'NIM maksimal 255 karakter',
                'nama.required' => 'Nama harus diisi',
                'kelas_id.required' => 'Prodi harus diisi',
                'no_hp.required' => 'No Hp harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'foto.image' => 'Tolong upload file foto',
                'foto.max' => 'Ukuran foto maksimal 2MB'
            ]
        );

        $siswa = Siswa::find($id);
        if ($request->file('foto')) {
            if ($siswa->foto) {
                Storage::delete($siswa->foto);
            }
            $validateData['foto'] = $request->file('foto')->store('img');
        }
        $validateData['password'] = Hash::make($validateData['nisn']);
        Siswa::where('nisn', $id)->update($validateData);
        flash()->success('Data Berhasil diedit');
        return redirect('/siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $siswa = Siswa::find($id);
        if ($siswa->foto) {
            Storage::delete($siswa->foto);
        }
        Siswa::destroy($id);
        flash()->success('Data Berhasil dihapus');
        return redirect('/Siswa');
    }
}