<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('permission:view articles', only:['index']),
            new Middleware('permission:edit articles', only:['edit']),
            new Middleware('permission:create articles', only:['create']),
            new Middleware('permission:delete articles', only:['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(20);
        return view('articles.list', compact('articles'));
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
    public function store(ArticleRequest $request)
    {
        Article::create($request->validated());

        return redirect()->route('articles.list')
            ->with('success', 'Success!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->update($request->validated());

        return redirect()->route('articles.list')->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.list')->with('success', 'Deleted successfully.');
    }

    // public function destroy(Request $request)
    // {
    //     // $article = Article::find($request->id);
    //     // if ($article === null) {
    //     //     session()->flash('error', 'Data not found.');
    //     //     return response()->json([
    //     //         'status' => false
    //     //     ]);
    //     // }

    //     // Tại sao dùng withTrashed()?
    //     // Article::find(...) chỉ lấy bản ghi chưa bị soft delete
    //     // Article::withTrashed()->find(...) lấy cả bản ghi đã bị soft delete hoặc vừa khôi phục
    //     $article = Article::withTrashed()->find($request->id);
    //     if ($article === null || $article->trashed()) {
    //         session()->flash('error', 'Data not found.');
    //         return response()->json([
    //             'status' => false
    //         ]);
    //     }

    //     $article->delete();
    //     session()->flash('success', 'Delete successfully!');
    //     return response()->json([
    //         'status' => true
    //     ]);
    // }
}
