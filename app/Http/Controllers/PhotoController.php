<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::orderBy('created_at', 'desc')->paginate(20);

        return view('photo.index', ['photos' => $photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => ['required', 'image'],
            'caption' => 'max:255',
            'location' => 'max:125',
        ]);

        $img = $request->file('image')->store('photo', 'public');

        $data['image'] = $img;
        $data['user_id'] = auth()->user()->id;

        Photo::create($data);

        return redirect('/photos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Photo $photo)
    {
        if ($request->user()->cannot('update', $photo)) {
            abort(403);
        }

        return view('photo.edit', ['photo' => $photo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        if ($request->user()->cannot('update', $photo)) {
            abort(403);
        }

        $data = $request->validate([
            'caption' => 'max:255',
            'location' => 'max:125',
        ]);

        $photo->update($data);

        return redirect('/photos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Photo $photo)
    {
        if ($request->user()->cannot('delete', $photo)) {
            abort(403);
        }

        $photo->delete();

        return redirect('/photos');
    }
}
