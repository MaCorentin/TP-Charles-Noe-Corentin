<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Commentaire;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class ArticlesController
{
    public function index($id)
    {
        $articles = Categorie::find($id)->categoryarticles;
        return view("categorie", compact("articles"));
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
        Article::create([
            "name" => $request->nArt,
            "description" => $request->nDesc,
            "CategoryID" => $request->idCat,
            "UserCreateID" => Auth::user()->id,
            "LastModifyUserID" => Auth::user()->id
        ]);

        Log::create([
            "name" => "CREATION ARTICLE",
            "text" => "Ajout : ".$request->nArt,
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
        Note::where('ArticleID', '=', $request->idArt)->delete();
        Commentaire::where('ArticleID', '=', $request->idArt)->delete();
        Article::find($request->idArt)->delete();

        Log::create([
            "name" => "SUPPRESSION ARTICLE",
            "text" => "Suppression du article n° : ".$request->idArt,
            "UserID" => Auth::user()->id
        ]);

        return back();
    }


    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getone($id){
        $article = Article::find($id);
        $notes = Note::all();
        $i=0;$somme=0;$MoyenneNote=0;

        foreach ($notes as $note) {
            if ($note->ArticleID == $id)
            {
                $somme += $note->note;
                $i++;
            }

        }
        if($i>0)
        {
            $MoyenneNote = $somme/$i;
        }

        $commentaires = Commentaire::all();
        $users = User::all();

        return view("article", compact( "article", "notes", "commentaires","users","MoyenneNote"));
    }
}
