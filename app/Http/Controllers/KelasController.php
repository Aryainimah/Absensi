<?php

namespace App\Http\Controllers;

use App\kelas;
use App\jurusans;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()){
            $kelas = kelas::with('jurusan')->get();
            return Datatables::of($kelas)
            ->addColumn('action',function($kelas){
                return view('datatable._action', [
                    'model'     => $kelas,
                    'form_url'  => route('kelas.destroy',$kelas->id),
                    'edit_url'  => route('kelas.edit',$kelas->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $kelas->name . ' ?' ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'jurusan.nama_jur','name'=>'jurusan.nama_jur','title'=>'Nama Jurusan'])
        ->addColumn(['data'=>'nama_kelas','name'=>'nama_kelas','title'=>'Nama Kelas'])
        ->addColumn(['data'=>'walikelas','name'=>'walikelas','title'=>'Nama Wali Kelas'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);
        return view('kelas.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kelas.create');
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
            'id_jurusan' => 'required',
            'nama_kelas' => 'required',
            'walikelas' => 'required',
        ]);

        $kelas = new kelas;
        $kelas->id_jurusan = $request->id_jurusan;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->walikelas = $request->walikelas;
        $kelas->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil menyimpan $kelas->nama_kelas"
            ]);
        return redirect()->route('kelas.index');  
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(kelas $kelas,$id)
    {
        $kelas = kelas::find($id);
        return view('kelas.edit')->with(compact('kelas'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kelas $kelas,$id)
    {
        $this->validate($request,[
            'id_jurusan' => 'required',
            'nama_kelas' => 'required',
            'walikelas' => 'required',
        ]);

        $kelas = kelas::find($id);
        $kelas->id_jurusan = $request->id_jurusan;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->walikelas = $request->walikelas;
        $kelas->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil menyimpan $kelas->nama_kelas"
            ]);
        return redirect()->route('kelas.index');      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(kelas $kelas)
    {
        $kelas=kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index');    }
}
