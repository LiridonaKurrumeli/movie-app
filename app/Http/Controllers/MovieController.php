<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return response()->json($movies);
    }
    public function store(StoreMovieRequest $request)
    {
        $movie = new Movie();

        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->category_id = $request->category_id;
        $movie->file = $request->file;
        $movie->thumbnail = $request->thumbnail;
        $movie->rating = $request->rating;
        $movie->serie_id = $request->serie_id;
        $movie->date = $request->date;

        $movie->save();


    }
    public function show($id)
    {
        $movie = new Movie();
        $movie = Movie::findOrFail($id);
        return response()->json($movie);

    }
    public function destroy($id)
    {
        $movie = new Movie();
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return response()->json(['mesage' => 'Movie was deleted']);

    }
    public function update(UpdateMovieRequest $request, $id)
    {
        $movie = Movie::findOrFail($id);

        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->category_id = $request->category_id;

        $movie->file = $request->file;
        $movie->thumbnail = $request->thumbnail;
        $movie->rating = $request->rating;
        $movie->serie_id = $request->serie_id;
        $movie->date = $request->date;


        $movie->save();

        return response()->json([
            'message' => 'Movie was updated'
        ]);
    }

}
