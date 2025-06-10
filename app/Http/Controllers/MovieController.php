<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public function homepage()
    {
        $movies = Movie::latest()->paginate(6);
        // dd($movies);
        return view('layouts.home', compact('movies'));
    }
    public function index()
    {
        $movies = Movie::with('category')->paginate(10);
        return view('movies.index', ['movies' => $movies]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('movies.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $slug = Str::slug($request->title);

        // Tambahkan slug ke dalam request
        $request->merge(['slug' => $slug]);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:movies',
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer',
            'actors' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $slug = Str::slug($request->title);

        $cover = null;

        // Proses upload file cover
        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image')->store('covers', 'public');


        }

        //simpan ke tabel
        Movie::create(
            [
                'title' => $validated['title'],
                'slug' => $slug,
                'synopsis' => $validated['synopsis'],
                'category_id' => $validated['category_id'],
                'year' => $validated['year'],
                'actors' => $validated['actors'],
                'cover_image' => $cover,

            ]

        );
        return redirect('/movie')->with('sucsess', 'Movie saved successfully');

    }

    public function edit(Movie $movie)
    {
        $categories = Category::all();
        return view('movies.edit', compact('movie', 'categories'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:movies' . $movie->id,
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer',
            'actors' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
    $filename = $request->file('cover_image')->store('covers', 'public');
    $validated['cover_image'] = $filename;
}





        // Proses file baru jika ada
        // if ($request->hasFile('cover_image')) {
        //     $filename = time() . '_' . $request->file('cover_image')->getClientOriginalName();
        //     $request->file('cover_image')->move(public_path('images'), $filename);
        //     $validated['cover_image'] = $filename;
        // }

        $movie->update($validated);

        return redirect()->route('movie.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movie.index')->with('success', 'Movie deleted successfully.');
    }

    public function detail($id, $slug)
    {
        $movie = Movie::find($id);
        return view('layouts.detailmovie', compact('movie'));
    }

    public function delete($id, $slug)
    {
        if (Gate::allows('delete')){
            echo "Delete movie $id" ;
        }else{
            abort(403);
        }
    }


}
