<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::simplePaginate(10); 
        return view('notes.index')->with('notes', $notes ); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'file' => 'file|max:10000|required', 
            'title' => 'required|string|min:3',
            'price' => 'min:0|required|integer', 
        ]); 

            $request->file->store('/notes'); 

        Note::create([
            'file' => $request->file->hashName(),
            'title' => $request->title, 
            'user_id' => $request->user_id, 
            'price' => $request->price
        ]); 

        return 'Notes added'; 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return view('notes.view')->with('note' , $note ); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('notes.view')->with('note' , $note ); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $valid = $request->validate([
            'file' => 'file|max:10000|required', 
        ]); 

        $request->file->store('/notes'); 

        $note->update('file' , $request->file->hashName() ); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete(); 
    }
}
