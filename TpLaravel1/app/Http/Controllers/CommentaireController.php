<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController
{
    public function index($id)
    {

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
        Commentaire::create([
            "text" => $request->cText,
            "UserID" => Auth::user()->id,
            "ArticleID" => $request->nid

        ]);

        Log::create([
            "name" => "CREATION COMMENTAIRE",
            "text" => "Ajout : ".$request->cText,
            "UserID" => Auth::user()->id
        ]);

        return back();
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
    public function destroy(Request $request)
    {
        Commentaire::find($request->idcom)->delete();
        Log::create([
            "name" => "SUPPRESSION COMMENTAIRE",
            "text" => "Suppression du commentaire n° : ".$request->idcom,
            "UserID" => Auth::user()->id
        ]);
        return back();
    }


    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAllById($id){
        $commentaires = Commentaire::where("id",$id)->get();
        return view("article", compact( "commentaires"));
    }
}
