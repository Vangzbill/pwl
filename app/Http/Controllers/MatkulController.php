<?php

namespace App\Http\Controllers;

use App\Models\MatkulModel;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $matkul = MatkulModel::all();
        return view('matkul.matkul')
            -> with('matkul', $matkul);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matkul.create_matkul')
            ->with('url_form', url('/matkul'));
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
            'nama_matkul' => 'required|string|max:50',
            'sks' => 'required|string|max:2'
        ]);

        MatkulModel::create($request->all());
        return redirect('matkul')
            ->with('success', 'Mata Kuliah Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatkulModel  $matkul
     * @return \Illuminate\Http\Response
     */
    public function show(MatkulModel $matkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatkulModel  $matkul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matkul = MatkulModel::find($id);
        return view('matkul.create_matkul')
            ->with('matkul', $matkul)
            ->with('url_form', url('/matkul/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MatkulModel  $matkul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_matkul' => 'required|string|max:50',
            'sks' => 'required|string|max:2'
        ]);
      
        $data = MatkulModel::where('id', $id)->update($request->except('_token', '_method'));
        return redirect('matkul')
            ->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatkulModel  $matkul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MatkulModel::where('id', $id)->delete();
        return redirect('matkul')
            ->with('Success', 'Mata Kuliah Berhasil Dihapus');
    }
}
