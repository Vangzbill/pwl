<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;
use App\Models\Mahasiswa;
use App\Models\MahasiswaModel;
use App\Models\NilaiKhs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.mahasiswa');
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
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',
        ];

        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false, // jika true maka modal akan tertutup
                'message' => 'Data gagal ditambahkan. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mhs = MahasiswaModel::create($request->all());
        return response()->json([
            'status' => ($mhs),
            'message' => ($mhs)? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan',
            'data' => null
        ]);
    }

    public function store_old(Request $request)
    {
       
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            // 'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            // 'kelas_id' => 'required',
            // 'jk' => 'required|in:L,P',
            // 'tempat_lahir' => 'required|string|max:50',
            // 'tanggal_lahir' => 'required|date',
            'hp' => 'required|digits_between:6,15',
            // 'alamat' => 'required|string|max:255',
        ]);

        $image_name = $request->file('foto')->store('images', 'public');

        MahasiswaModel::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            // 'foto' => $image_name,
            // 'kelas_id' => $request->kelas_id,
            // 'jk' => $request->jk,
            // 'tempat_lahir' => $request->tempat_lahir,
            // 'tanggal_lahir' => $request->tanggal_lahir,
            'hp' => $request->hp,
            // 'alamat' => $request->alamat,
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
        $mahasiswa = MahasiswaModel::find($id);
        
        if ($mahasiswa) {
            return response()->json($mahasiswa);
            
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }


    public function show_old($id)
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
        // $kelas = KelasModel::all();
        return view('mahasiswa.create_mhs')
            ->with('mhs', $mahasiswa)
            // ->with('kelas', $kelas)
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
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',
        ];

        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal diedit. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mhs = MahasiswaModel::where('id', $id)->update($request->except('_token', '_method'));

        return response()->json([
            'status' => ($mhs),
            'modal_close' => $mhs,
            'message' => ($mhs)? 'Data berhasil diedit' : 'Data gagal diedit',
            'data' => null
        ]);
    }


    public function update_old(Request $request, $id)
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
    public function destroy($id){
        $mhs = MahasiswaModel::where('id', $id)->delete();
        return response()->json([
            'status' => ($mhs),
            'message' => ($mhs)? 'Data berhasil dihapus' : 'Data gagal dihapus',
            'data' => null
        ]);
    }
    public function destroy_old($id)
    {
        MahasiswaModel::where('id', $id)->delete();
        return redirect('mahasiswa')
            ->with('Success', 'Mahasiswa Berhasil Dihapus');
    }

    public function cetak_pdf($id){
        $mhs = MahasiswaModel::find($id);
        $khs = NilaiKhs::where('mhs_id', $id)->get();
        $pdf = PDF::loadView('mahasiswa.cetak_pdf', ['mhs' => $mhs, 'khs' => $khs]);
        return $pdf->stream();
    }
    
    public function data(){
       $data = MahasiswaModel::selectRaw('id, nim, nama, hp');

       return DataTables::of($data)->addIndexColumn()->make(true);
    }
}
