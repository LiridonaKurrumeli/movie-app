<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index()
    {
        $series = Serie::all();
        return response()->json($series);
    }
    public function store(StoreSerieRequest $request)
    {
        $serie = new Serie();

        $serie->name = $request->name;
        $serie->description = $request->description;

        $serie->save();


    }
    public function show($id)
    {
        $serie = new Serie();
        $serie = Serie::findOrFail($id);
        return response()->json($serie);

    }
    public function destroy($id)
    {
        $serie = new Serie();
        $serie = Serie::findOrFail($id);
        $serie->delete();
        return response()->json(['mesage' => 'category was deleted']);

    }
    public function update(UpdateSerieRequest $request, $id)
    {
        $serie = \App\Models\Serie::findOrFail($id);

        $serie->name = $request->name;
        $serie->description = $request->description;
        $serie->update();
        return response()->json([
            'message' => 'user was updated'
        ]);
}
}
