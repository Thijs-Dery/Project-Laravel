<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $news = new News();
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->user_id = Auth::id();
        if ($request->hasFile('cover_image')) {
            $imageName = time().'.'.$request->cover_image->extension();  
            $request->cover_image->move(public_path('images'), $imageName);
            $news->cover_image = $imageName;
        }
        $news->published_at = now();
        $news->save();

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $news = News::findOrFail($id);
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        if ($request->hasFile('cover_image')) {
            $imageName = time().'.'.$request->cover_image->extension();  
            $request->cover_image->move(public_path('images'), $imageName);
            $news->cover_image = $imageName;
        }
        $news->published_at = now();
        $news->save();

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }
}
