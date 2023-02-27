<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function home(){
        return view('pert3prak1.home');
   }

   public function product(){
      return view('pert3prak1.product');
   }

   public function news($key){
      if($key=='news'){
         return view('pert3prak1.news');
      }else{
         echo "Keyword Salah";
      }
   }

   public function programs(){
      return view('pert3prak1.programs');
   }

   public function about(){
      return view('pert3prak1.about');
   }
   public function index(){
      return view('pert3prak1.kontak');
   }

   
}
