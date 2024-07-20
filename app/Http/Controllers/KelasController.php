<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\ValidatedData;

use function PHPUnit\Framework\returnSelf;

class ProdiController extends Controller
{
    public function index()
    {
        $data = ['nama' => 'fajar', 'foto' =>'pomnas.jpeg']; 
        $kelas = Kelas::all();
        return view('kelas.index', compact ('data', 'kelas')); 
    }

    public function create()
    {
        $data = ['nama' => 'fajar', 'foto' =>'pomnas.jpeg']; 
        return view('kelas.create', compact(['data']));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'nama_kelas' => 'required|unique:kelas|max:255'
            ],
            [
                'nama_kelas.required' => 'Nama kelas harus diisi',
                'nama_kelas.unique' => 'Nama kelas sudah ada',
                'nama_kelas.max' => 'Nama kelas maksimal 255 karakter'
            ]
        );
            Kelas::create($validateData);
            flash()->success('Data Berhasil Ditambahkan');
            return redirect ('/kelas');
    }

    public function edit(String $id)
    {
        $data = ['nama' => 'fajar', 'foto' =>'pomnas.jpeg']; 
        $kelas = kelas::find($id);
        return view('kelas.edit', compact(['data', 'kelas']));
    }

    public function update(Request $request, string $id)
    {
        $validateData = $request->validate(
            [
                'nama_kelas' => 'required|unique:kelas|max:255'
            ],
            [
                'nama_kelas.required' => 'Nama kelas harus diisi',
                'nama_kelas.unique' => 'Nama kelas sudah ada',
                'nama_kelas.max' => 'Nama kelas maksimal 255 karakter'
            ]
        );
        Kelas::where('id', $id)->update($validateData);
        flash()->success('Data Berhasil diedit');
        return redirect('/kelas');
    }

    public function destroy(string $id)
    {
        Kelas::destroy($id);
        flash()->success('Data Berhasil dihapus');
        return redirect('/kelas');
    }
}