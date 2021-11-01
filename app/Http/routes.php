<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('articles.index');

Route::get('/articles', function (){
    $articles = \App\Models\Articles::all();

    return view('articles.index',
        [
            'articles'=>$articles,
        ]);
})->name('articles.index');


Route::get('/articles/create', function (){
    return view('articles.create');
})->name('articles.create');

Route::post('/articles', function (\Illuminate\Http\Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'text' => 'required|min:20',
    ]);

    if ($validator->fails()) {
        return redirect(route('articles.create'))
            ->withInput()
            ->withErrors($validator);
    }

    $article = new App\Models\Articles();
    $article->name = $request->name;
    $article->text = $request->text;
    $article->save();

    return redirect(route('articles.index'));

})->name('articles.store');

Route::delete('/articles/{article}', function (\App\Models\Articles $article){
    $article->delete();
    return redirect(route('articles.index'));
})->name('articles.delete');

Route::get('/articles/{article}/edit', function (\App\Models\Articles $article){
    return view('articles.edit', [
        'article'=>$article,
    ]);
})->name('articles.edit');

Route::put('/articles/{article}',function (\Illuminate\Http\Request $request, \App\Models\Articles $article){
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'text' => 'max:200',
    ]);

    if ($validator->fails()) {
        return redirect(route('articles.edit', $article->id))
            ->withInput()
            ->withErrors($validator);
    }

    $article->name = $request->name;
    $article->text = $request->text;
    $article->save();

    return redirect(route('articles.index'));

})->name('articles.update');
