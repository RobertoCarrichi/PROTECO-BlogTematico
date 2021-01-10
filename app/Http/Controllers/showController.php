<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\User;
use App\Comentario;

class showController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = Articulo::findOrFail($id);
        $autor = User::findOrFail($articulo->author_id);
        $comentarios = Comentario::all();
        return view('publicacion',['articulo' => $articulo,'autor' => $autor,'comentarios' => $comentarios]);
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('profile',['user' => $user]);
    }
}
