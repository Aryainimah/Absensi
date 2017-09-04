<?php

namespace App\Http\Controllers;

use App\jurusans;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class JurusansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()){
            $jurusans = jurusans::all();
            return Datatables::of($jurusans)
            ->addColumn('action',function($jurusans){
                return view('datatable._action', [
                    'model'     => $jurusans,
                    'form_url'  => route('jurusan.destroy',$jurusans->id),
                    'edit_url'  => route('jurusan.edit',$jurusans->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $jurusans->name . ' ?' ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'nama_jur','name'=>'nama_jur','title'=>'Nama jurusan'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);
        return view('jurusan.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jurusan.create');

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
            'nama_jur' => 'required',
        ]);

        $jurusans = new jurusans;
        $jurusans->nama_jur = $request->nama_jur;
        $jurusans->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil menyimpan $jurusans->nama_jur"
            ]);
        return redirect()->route('jurusan.index');    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jurusans  $jurusans
     * @return \Illuminate\Http\Response
     */
    public function show(jurusans $jurusans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jurusans  $jurusans
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jurusans = jurusans::find($id);
        return view('jurusan.edit')->with(compact('jurusans'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jurusans  $jurusans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jurusans $jurusans, $id)
    {
        $this->validate($request,[
            'nama_jur' => 'required',
        ]);
        $jurusans = jurusans::find($id);
        $jurusans->nama_jur = $request->nama_jur;
        $jurusans->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil menyimpan $jurusans->nama_jur"
            ]);
        return redirect()->route('jurusan.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jurusans  $jurusans
     * @return \Illuminate\Http\Response
     */
    public function destroy(jurusans $jurusans,$id)
    {
        //
        $jurusans=jurusans::findOrFail($id);
        $jurusans->delete();
        return redirect()->route('jurusan.index');
    }
}
