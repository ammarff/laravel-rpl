<?php

namespace App\Http\Controllers;
use App\Http\Requests\ArtikelRequest;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    //
    public function index()
    {
        $artikel = Artikel::paginate(10);

        return view('artikels.index', [
            'artikel' => $artikel
        ]);
    }
    public function create()
    {
        return view('artikels.create');
    }

    public function store(ArtikelRequest $request)
    {
        $data = $request->all();

        // $data['picturePath'] = $request->file('picturePath')->store('assets/user', 'public');

        Artikel::create($data);

        return redirect()->route('users.index');
    }

    public function show(Artikel $artikel)
    {
        //
    }

    public function edit(Artikel $artikel)
    {
        return view('artikels.edit',[
            'item' => $artikel
        ]);
    }

    public function update(Request $request, Artikel $artikel)
    {
        $data = $request->all();

        if($request->file('picturePath'))
        {
            $data['picturePath'] = $request->file('picturePath')->store('assets/artikel', 'public');
        }

        $artikel->update($data);

        return redirect()->route('artikels.index');
    }
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect()->route('artikels.index') ;
    }
}
