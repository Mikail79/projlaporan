<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use RealRashid\SweetAlert\Facades\Alert;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnis = Alumni::latest();

        $alumnishow = Alumni::where('status', '=','Working')->latest()->first();

        return view('alumni.index', [
            'alumnis'=> $alumnis->filter(request(['search', 'major_id']))->paginate(5),
            'alumnishow'=>$alumnishow
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('is_admin');
        return view('alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'graduate'=>'required',
            'major_id'=>'required',
            'position'=>'required',
            'status'=>'required',
            'foto'=>'required|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);

        $input=$request->all();

        if ($foto = $request->file('foto')) {
            $destinationPath = 'img/';
            $profileImage = $foto->hashName();
            $foto->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
         }        
         
        Alumni::create($input);
        Alert::success('Data sudah ditambah!');
        return redirect()->route('alumni.index')
                        ->with('success','Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumni  $alumnus
     * @return \Illuminate\Http\Response
     */
    public function show(Alumni $alumnus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumni  $alumnus
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumni $alumnus)
    {
        $this->authorize('is_admin');
        return view('alumni.edit', compact('alumnus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumni  $alumnus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumni $alumnus)
    {
        $input=$request->all();

        if ($foto = $request->file('foto')) {
            $destinationPath = 'images/';
            $profileImage = $foto->hashName();
            $foto->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
         } else {
            unset($input['foto']);
         }

        $alumnus->update($input);
        Alert::success('Data sudah berhasil diedit!');
        return redirect()->route('alumni.index')
                        ->with('success','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumni  $alumnus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumni $alumnus)
    {
        $this->authorize('is_admin');
        $alumnus->delete();
        Alert::error('Data sudah dihapus!');
        return redirect()->route('alumni.index')
                        ->with('success','Berhasil Disimpan');
    }
}
