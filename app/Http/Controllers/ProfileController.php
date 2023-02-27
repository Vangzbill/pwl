<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $data = [
            'nama' => 'Sabilla Luthfi Rahmadhan',
            'kelas' => 'TI-2B',
            'absen' => 22
        ];
        return view('pert3prak2.profile')
            ->with('data' , $data);
    }
}
