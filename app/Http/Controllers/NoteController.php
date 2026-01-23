<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
// use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage ;

use function Laravel\Prompts\note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $notes=Note::get();
        $notes=Note::paginate(2);
         return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        //
        // Note::create($request->validated());
        $data=$request->validated();
        if ($request->hasFile('image')) {
            # code...
            $path=$request->file('image')->store('photos_articles', 'public');
            $data['image']=$path;
        }
        $data['client_id']=auth('client')->id();
        Note::create($data);
        return redirect()->route('notes.index')->with('success','la note a ete cree avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
        return view('notes.show',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        //
        // $note->update($request->validated());
        $data=$request->validated();
        if ($request->hasFile('image')) {
            # code...
            if ($note->image) {
                # code...
                Storage::disk('public')->delete($note->image);
            }
            $path=$request->file('image')->store('photos_articles', 'public');
            $data['image']=$path;
        }
        $note->update($data);
        return redirect()->route('notes.index')->with('success','la mise a jour a ete faite  avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
        $note->delete();
         return redirect()->route('notes.index')->with('success','le produit a ete supprime  avec success');

    }
}
