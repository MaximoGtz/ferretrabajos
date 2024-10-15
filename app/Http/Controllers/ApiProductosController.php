<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ApiProductosController extends Controller
{
    public function index(){
        $response = Http::get('https://rickandmortyapi.com/api/character/4,2,5,1,232,254,300,20,123,122,98,193');
        if($response->successful()){
            // dd($response->object());

            return view('/tareapis/catalogo')->with('personajes', $response->object());
        }
    }
    public function show($id){
        $response = Http::get('https://rickandmortyapi.com/api/character/'.$id);
        if($response->successful()){
            // dd($response->object());

            return view('/tareapis/detalle')->with('personaje', $response->object());
        }
        return "Error". $response->status();
    }
}
