<?php

namespace App\Http\Controllers;

use App\Models\KeluargaModel;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $keluarga = KeluargaModel::all();
        return view('keluarga.keluarga')
            -> with('keluarga', $keluarga);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keluarga.create_keluarga')
            ->with('url_form', url('/keluarga'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|unique:keluarga,nik|max:12',
            'nama' => 'required|string|max:50',
            'agama' => 'required|string',
            'peran' => 'required|string'
        ]);

        KeluargaModel::create($request->all());
        return redirect('keluarga')
            ->with('success', 'Keluarga Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KeluargaModel  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function show(KeluargaModel $keluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KeluargaModel  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        $keluarga = KeluargaModel::find($nik);
        return view('keluarga.create_keluarga')
            ->with('keluarga', $keluarga)
            ->with('url_form', url('/keluarga/'.$nik));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KeluargaModel  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'agama' => 'required|string',
            'peran' => 'required|string'
        ]);
      
        $data = KeluargaModel::where('nik', $nik)->update($request->except('_token', '_method'));
        return redirect('keluarga')
            ->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KeluargaModel  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        KeluargaModel::where('nik', $nik)->delete();
        return redirect('keluarga')
            ->with('Success', 'Keluarga Berhasil Dihapus');
    }
}
