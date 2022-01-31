<?php

namespace App\Http\Controllers;

use App\Comic;

use Illuminate\Http\Request;

use Illuminate\Support\Str;



class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::orderBy('id','desc')->paginate(5);
        return view('comics.index',compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationData(),$this->validationErrors());
        $data = $request->all();
        $new_comic = new Comic();
        $data['slug'] = $this->createSlug($data['title']);
        $new_comic->fill($data);
        $new_comic->save();
        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        if($comic){
            return view('comics.show',compact('comic'));
        }
        abort(404, 'fumetto non presente nel db');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        if($comic){
            return view('comics.edit',compact('comic'));
        }
        abort(404, 'fumetto non presente nel db');
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Comic $comic)
    {

        $request->validate($this->validationData(),$this->validationErrors());
        $data = $request->all();

        $data['slug'] = $this->createSlug($data['title']);
        $comic->update($data);

        return redirect()->route('comics.show', $comic);
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
        return redirect()->route('comics.index')->with('deleted',"il fumetto $comic->title è stato eliminato");
    }
    private function createSlug($string){
        return Str::slug($string,'-');
    }

    private function validationData(){
        return[
            'title' => 'required|max:50|min:2',
            'type' => 'required|max:50|min:2',
            'thumb' => 'required|max:255',
            'price' => 'required|numeric|min:1'
        ];
    }
    private function validationErrors(){
        return[
           'title.required' => 'il titolo è un campo obbligatorio',
           'title.max' => 'il numero di caratteri per il nome del fumetto consentito è di :max caratteri',
           'title.min' => 'il numero di caratteri per il nome del fumetto consentito è di :min caratteri',
           'type.required' => 'il tipo di fumetto è un campo obbligatorio',
           'type.max' => 'Il numero di caratteri per il tipo consentito è di :max caratteri',
           'type.min' => 'Il numero minimo di caratteri per il tipo è di :min caratteri',
           'price.numeric' => 'Il prezzo deve essere un numero',
           'price.required' => 'Il prezzo è obbligatorio',
           'price.min' => 'Il prezzo deve essere di minimo 1 minuto',
           'thumb.required' => "L'immagine è un campo obbligatorio",
           'thumb.max' => "L'url dell'immagine non può contenere più di 255 caratteri",
        ];
    }
}
