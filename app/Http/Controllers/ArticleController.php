<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //on récupère les articles du plus récent au plus ancien
        $articles = Article::where('user_id',auth()->id())->orderBy('created_at','desc')->get();
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        //1.Récupérer les données validées(excepté l'image)
        $data = $request->safe()->except(['image']);
//2.gestion del'image si présente
        if($request->hasFile('image')){
            $path = $request->file('image')->store(path: 'articles', options: 'public');
            //Ajoute le chemin de l'image aux données à sauvegarder
            $data['image_path'] = $path;
        }
        //3. Création de l'article via la relation
        //cela remplit automatiquement le champ user_id avec l'id de l'utilisateur authentifié
        $article = $request->user()->articles()->create($data);

        //4. Redirection vers la liste des articles avec message de succès
        return redirect()->route('articles.index')->with('success', 'Article crée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
