<?php

namespace App\Http\Controllers;

use App\Orangtuas;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class OrangtuasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()){
            $orangtuas = Orangtuas::all();
            return Datatables::of($orangtuas)
            ->addColumn('action',function($orangtua){
                return view('datatable._action', [
                    'model'     => $orangtua,
                    'form_url'  => route('ortu.destroy',$orangtua->id),
                    'edit_url'  => route('ortu.edit',$orangtua->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $orangtua->nama_ortu . ' ?' ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'nama_ortu','name'=>'nama_ortu','title'=>'Nama Ortu'])
        ->addColumn(['data'=>'alamat','name'=>'alamat','title'=>'Alamat'])
        ->addColumn(['data'=>'no_hp','name'=>'no_hp','title'=>'No Hp'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);
        return view('ortu.index')->with(compact('html'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ortu.create');
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
            'nama_ortu' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
        $orangtuas = new Orangtuas;
        $orangtuas->nama_ortu = $request->nama_ortu;
        $orangtuas->alamat = $request->alamat;
        $orangtuas->no_hp = $request->no_hp;
        $orangtuas->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil menyimpan $orangtuas->nama_ortu"
            ]);
        return redirect()->route('ortu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orangtuas  $orangtuas
     * @return \Illuminate\Http\Response
     */
    public function show(Orangtuas $orangtuas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orangtuas  $orangtuas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $orangtuas = Orangtuas::find($id);
        return view('ortu.edit')->with(compact('orangtuas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orangtuas  $orangtuas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orangtuas $orangtuas, $id)
    {
        $this->validate($request,[
            'nama_ortu' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
        $orangtuas = Orangtuas::find($id);
        $orangtuas->nama_ortu = $request->nama_ortu;
        $orangtuas->alamat = $request->alamat;
        $orangtuas->no_hp = $request->no_hp;
        $orangtuas->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil menyimpan $orangtuas->nama_ortu"
            ]);
        return redirect()->route('ortu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orangtuas  $orangtuas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orangtuas $orangtuas, $id)
    {
        //
        $orangtuas=Orangtuas::findOrFail($id);
        $orangtuas->delete();
        return redirect()->route('ortu.index');
    }
}