<?php

namespace App\Http\Controllers;
use App\Models\HobbyModel;

use Illuminate\Http\Request;

class HobbyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $hobby = HobbyModel::all();
        return view('hobby.hobby')
            -> with('hobby', $hobby);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hobby.create_hobby')
            ->with('url_form', url('/hobby'));
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
            'nama' => 'required|string|max:50',
            'alasan' => 'required|string'
        ]);

        HobbyModel::create($request->all());
        return redirect('hobby')
            ->with('success', 'Hobby Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HobbyModel  $hobby
     * @return \Illuminate\Http\Response
     */
    public function show(HobbyModel $hobby)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HobbyModel  $hobby
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hobby = HobbyModel::find($id);
        return view('hobby.create_hobby')
            ->with('hobby', $hobby)
            ->with('url_form', url('/hobby/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HobbyModel  $hobby
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'alasan' => 'required|string'
        ]);
      
        $data = HobbyModel::where('id', $id)->update($request->except('_token', '_method'));
        return redirect('hobby')
            ->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HobbyModel  $hobby
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HobbyModel::where('id', $id)->delete();
        return redirect('hobby')
            ->with('Success', 'Hobby Berhasil Dihapus');
    }
}

