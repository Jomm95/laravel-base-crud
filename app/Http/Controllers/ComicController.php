<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comic.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            //definisco delle validazioni utilizzando il metodo validate di request
            $request->validate(
                //array associativo con validazioni
                [
                'title' =>'required|max:255',
                'description' =>'required|max:255',
                'thumb' =>'required|url|max:255',
                'price' =>'required|numeric|min:1',
                'series' =>'required|max:255',
                'sale_date' =>'required|date|',
                'type' =>'required|max:255|',
                ]
            );

            // salvo in data array associativo con dati inseriti nel form
            $data = $request->all();
            //nuova istanza comic da salvare nel DB
            $newComic = new Comic();
            
            $newComic->fill($data);
            $newComic->save();
    
            return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic) //dependency injection
    {
        return view('comic.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comic.edit' , compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        //definisco delle validazioni utilizzando il metodo validate di request
        $request->validate([
            //array associativo con validazioni
            'title' =>'required|max:255',
            'description' =>'required|max:255',
            'thumb' =>'required|url|max:255',
            'price' =>'required|numeric|min:1',
            'series' =>'required|max:255',
            'sale_date' =>'required|date|',
            'type' =>'required|max:255|',
        ]);

        //recupero dati form
        $data = $request->all();

        // faccio update con i data
        $comic->update($data);

        $comic->save();

        //definisco pagina ri return: la pagina con il comic modificato
        return redirect()->route('comic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comic.index')->with('status', 'Cancellazione avvenuta con successo!');
    }
}
