<?php

namespace App\Http\Controllers;

use App\siswa;
use App\Orangtuas;
use App\kelas;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()){
            $siswa = siswa::with('kelas','orangtua')->get();
            return Datatables::of($siswa)
            ->addColumn('action',function($siswa){
                return view('datatable._action', [
                    'model'     => $siswa,
                    'form_url'  => route('siswa.destroy',$siswa->id),
                    'edit_url'  => route('siswa.edit',$siswa->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $siswa->name . ' ?' ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'orangtua.nama_ortu','name'=>'orangtua.nama_ortu','title'=>'Nama Orang Tua'])
        ->addColumn(['data'=>'nama_siswa','name'=>'nama_siswa','title'=>'Nama Siswa'])
        ->addColumn(['data'=>'kelas.nama_kelas','name'=>'kelas.nama_kelas','title'=>'Nama Kelas'])
        ->addColumn(['data'=>'nis','name'=>'nis','title'=>'NIS'])
        ->addColumn(['data'=>'alamat','name'=>'alamat','title'=>'Alamat'])
        ->addColumn(['data'=>'no_hp','name'=>'no_hp','title'=>'No Hp'])
        ->addColumn(['data'=>'orangtua.no_hp','name'=>'orangtua.no_hp','title'=>'No Hp Orang Tua'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);
        return view('siswa.index')->with(compact('html'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa = new siswa;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->id_ortu = $request->id_ortu;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nis = $request->nis;
        $siswa->alamat = $request->alamat;
        $siswa->no_hp = $request->no_hp;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil menyimpan $siswa->nama_siswa"
            ]);
        return redirect()->route('siswa.index');  
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa, $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = siswa::find($id);
        return view('siswa.edit')->with(compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = siswa::find($id);
        $siswa->id_kelas = $request->id_kelas;
        $siswa->id_ortu = $request->id_ortu;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nis = $request->nis;
        $siswa->alamat = $request->alamat;
        $siswa->no_hp = $request->no_hp;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil menyimpan $siswa->nama_siswa"
            ]);
        return redirect()->route('siswa.index');
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $siswa=siswa::findOrFail($id);
    $siswa->delete();
    return redirect()->route('siswa.index');    
    }
}
