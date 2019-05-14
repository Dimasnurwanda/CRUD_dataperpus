<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $bukus=\App\Buku::all();
        return view('index',compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bukus= new \App\Buku;
        $bukus->judul=$request->get('judul');
        $bukus->penerbit=$request->get('penerbit');
        $bukus->tahunterbit=$request->get('tahunterbit');
        $bukus->pengarang=$request->get('pengarang');
        $bukus->save();

        return redirect('buku')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bukus = \App\Buku::find($id);
        return view('edit',compact('bukus','id'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bukus= \App\Buku::find($id);
        $bukus->judul=$request->get('judul');
        $bukus->penerbit=$request->get('penerbit');
        $bukus->tahunterbit=$request->get('tahunterbit');
        $bukus->pengarang=$request->get('pengarang');
        $bukus->save();
        return redirect('buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bukus = \App\Buku::find($id);
        $bukus->delete();
        return redirect('buku')->with('success','Information has been  deleted');
    }
}
