<?php

use Illuminate\Database\Seeder;
use App\kelas;
use App\siswa;
use App\Orangtuas;
use App\jurusans;

class SiswasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sample orang tua
       $ortu1= Orangtuas::create(['nama_ortu'=>'Ujang','alamat'=>'Jl.Soekarno Hatta','no_hp'=>'0821893483']);
       $ortu2= Orangtuas::create(['nama_ortu'=>'Eman','alamat'=>'Jl.Moh Toha','no_hp'=>'08972318273']);
       $ortu3= Orangtuas::create(['nama_ortu'=>'Ajo','alamat'=>'Jl.Terangkanlah','no_hp'=>'08127428938']);

       //simple jurusan
       $jurus1= jurusans::create(['nama_jur'=>'Rekayasa Perangkat Lunak']);
       $jurus2= jurusans::create(['nama_jur'=>'Teknik Kendaraan Ringan']);
       $jurus3= jurusans::create(['nama_jur'=>'Teknik Sepeda Motor']);

       // sample kelas

       $kel1= kelas::create(['id_jurusan'=>'1','nama_kelas'=>'X RPL 1','walikelas'=>'Omen']);
       $kel2= kelas::create(['id_jurusan'=>'2','nama_kelas'=>'X TSM 1','walikelas'=>'Suripto']);
       $kel1= kelas::create(['id_jurusan'=>'3','nama_kelas'=>'X TKR 1','walikelas'=>'Subejo']);

       // sample siswa
       $siswa1= siswa::create(['id_kelas'=>'1','id_ortu'=>'1','nama_siswa'=>'Faksy','nis'=>'1516273849','alamat'=>'Jl.Soekarno Hatta','no_hp'=>'08273829128']);
       $siswa2= siswa::create(['id_kelas'=>'2','id_ortu'=>'2','nama_siswa'=>'Deby','nis'=>'1562830172','alamat'=>'Jl.Pahlawan','no_hp'=>'08927361821']);
       $siswa3= siswa::create(['id_kelas'=>'3','id_ortu'=>'3','nama_siswa'=>'Piyan','nis'=>'1827391037','alamat'=>'Jl.BKR','no_hp'=>'08962728929']);
  }
}
