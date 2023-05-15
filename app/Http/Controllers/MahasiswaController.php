<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;
use App\Models\Mahasiswa;
use App\Models\MahasiswaModel;
use App\Models\NilaiKhs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = MahasiswaModel::with('kelas')->get();
        return view('mahasiswa.mahasiswa')
            ->with('mhs', $mhs);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = KelasModel::all();
        return view('mahasiswa.create_mhs', ['kelas' => $kelas])
            ->with('url_form', url('/mahasiswa'));
    }

    /**
     * Store a newly created resource in storasge.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kelas_id' => 'required',
            'jk' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'hp' => 'required|digits_between:6,15',
            'alamat' => 'required|string|max:255',
        ]);

        $image_name = $request->file('foto')->store('images', 'public');

        MahasiswaModel::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'foto' => $image_name,
            'kelas_id' => $request->kelas_id,
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
        ]);
        return redirect('mahasiswa')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mhs = MahasiswaModel::find($id);
        return view('mahasiswa.show_mhs')
            ->with('mhs', $mhs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = MahasiswaModel::find($id);
        $kelas = KelasModel::all();
        return view('mahasiswa.create_mhs')
            ->with('mhs', $mahasiswa)
            ->with('kelas', $kelas)
            ->with('url_form', url('/mahasiswa/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // 'nullable' agar tidak error saat edit data tanpa mengganti '
            'kelas_id' => 'required',
            'jk' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'hp' => 'required|digits_between:6,15',
            'alamat' => 'required|string|max:255',
        ]);
      
        $image_name = $request->file('foto')->store('images', 'public');
        
        MahasiswaModel::where('id', $id)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'foto' => $image_name,
            'kelas_id' => $request->kelas_id,
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
        ]);
        return redirect('mahasiswa')
            ->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MahasiswaModel::where('id', $id)->delete();
        return redirect('mahasiswa')
            ->with('Success', 'Mahasiswa Berhasil Dihapus');
    }
}
