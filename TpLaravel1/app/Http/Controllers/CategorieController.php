<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Log;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();

        return view("components.navigation", compact("categories"));
    }

    public function dashboard(){
        $categories = Categorie::all();
        return view("dashboard", compact("categories"));
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
        Categorie::create([
            "name" => $request->nCate,
            "created_id" => Auth::user()->id,
            "updated_by" => Auth::user()->id
        ]);

        Log::create([
            "name" => "CREATION CATEGORIE",
            "text" => "Ajout : ".$request->nCate,
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

        Categorie::find($request->idcat)->delete();
        Log::create([
            "name" => "SUPPRESSION Categorie",
            "text" => "Suppression de la catégorie n° : ".$request->idcat,
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
        $categorie = Categorie::find($id);
        $articles = Article::all();
        return view("categorie", compact("categorie", "articles"));
    }


}
