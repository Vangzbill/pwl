<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('template');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function products(){
        echo "<ul>
                <li><a href='https://www.educastudio.com/category/marbel-edu-games'>Product 1</a></li>
                <li><a href='https://www.educastudio.com/category/marbel-and-friends-kids-games'>Product 2</a></li>
                <li><a href='https://www.educastudio.com/category/riri-story-books'>Product 3</a></li>
                <li><a href='https://www.educastudio.com/category/kolak-kids-songs'>Product 4</a></li>
            </ul>";
    }

    public function news($key){
        if($key=='news'){
            echo "
                <ul>
                    <li><a href='https://www.educastudio.com/news'>News 1</a></li>
                    <li><a href='https://www.educastudio.com/news/educa-studio-berbagi-untuk-warga-sekitar-terdampak-covid-19'>News 2</a></li>
                </ul>";
        }else{
            echo "Keyword Salah";
        }
    }

    public function programs(){
        echo "<ul>
                <li><a href='https://www.educastudio.com/program/karir'>Program 1</a></li>
                <li><a href='https://www.educastudio.com/program/magang'>Program 2</a></li>
                <li><a href='https://www.educastudio.com/program/kunjungan-industri'>Program 3</a></li>
            </ul>";
    }

    public function about(){
        echo "<h2>Tentang kami</h2><br>
             <a href='https://www.educastudio.com/about-us'>Website ini dibuat untuk kebutuhan</a>";
    }

    
}
