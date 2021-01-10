<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comentario = new Comentario();
        $comentario->user_id = auth()->user()->id;
        $comentario->user_name = auth()->user()->name;
        $comentario->article_id = $request->article_id;
        $comentario->comment = $request->comment;
        $comentario->save();
        return redirect('show.show',$request->article_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $comentario = Comentario::findOrFail($id);
        // return view('',['comentario' => $comentario]);
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
        $comentario = Comentario::findOrFail($id);
        $comentario->user_id = auth()->user()->id;
        $comentario->user_name = auth()->user()->name;
        $comentario->article_id = $request->article_id;
        $comentario->comment = $request->comment;
        $comentario->update();
        return redirect('show.show',$comentario->article_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();

        return redirect('show.show',$comentario->article_id);
    }
}
