<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

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
        \Log::info('Store method called');
        
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|date',
        ]);

        $validatedData['user_id'] = \Auth::id();

        \Log::info('Validated Data:', $validatedData);

        try {
            $news = News::create($validatedData);
            \Log::info('News Created:', $news->toArray());
            return redirect()->route('news.index')->with('success', 'News created successfully.');
        } catch (\Exception $e) {
            \Log::error('Error creating news:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to create news.');
        }
    }
}



