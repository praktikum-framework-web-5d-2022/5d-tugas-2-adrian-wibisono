<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function insert(){

        // RAW
        $sql = DB::insert("INSERT INTO siswa (npm,nama,jenis_kelamin,alamat,tempat_lahir,tanggal_lahir,photo,created_at,updated_at) VALUES ('20047', 'Adrian Wibisono','Laki-Laki','Jl.Piper no.3','Jakarta','2002-03-09','mhs_adrian.png',now(),now())");
        dump($sql);

        // SB
        $sql1 = DB::table('siswa')->insert(
            [
                'npm' => '20043',
                'nama' => 'Adrian Wibisono',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat' => 'Jl.Piper no.3',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2002-03-09',
                'photo' => 'mhs_adrian.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dd($sql1);

        //ELOQUENT
        $sql2 = siswa::create(
            [
                'npm' => '20046',
                'nama' => 'Adrian Wibisono',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat' => 'Jl.Piper no.3',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2002-03-09',
                'photo' => 'mhs_adrian.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
            );
            dd($sql2);
        return "Data berhasil diproses";
    }

    public function select(){

        // RAW
        $sql = DB::select("SELECT * FROM siswa");
        dd($sql);

        // SB
        $sql2 = DB::table('siswa')->get();
        dd($sql2);

        //ELOQUENT
        $sql3 = siswa::all();
        dd($sql3);
    }

    public function update(){

        //RAW
        $sql = DB::update("UPDATE siswa SET npm='20049',updated_at=now() WHERE id=?",[1]);
        dd($sql);

        //SB
        $sql1 = DB::table('siswa')
        ->where('id','1')
        ->update(
            [
                'alamat' => 'Jl.Viktor no.05',
                'updated_at' => now()
            ]
            );
        dd($sql1);

        #ELOQUENT
        $sql2 = siswa::where('id','1')->first()->update([
            'alamat' => 'Jl.Viktor no.05',
            'updated_at' => now()
        ]);
        dd($sql2);

    }

    public function delete(){

        //RAW
        $sql = DB::delete("DELETE FROM siswa WHERE npm=?",['20043']);
        dd($sql);

        //SB
        $sql1 = DB::table('siswa')
        ->where('npm','20043')
        ->delete();
        dd($sql1);

        //ELOQUENT
        $sql2 = siswa::where('siswa','20043')->delete();
        dd($sql2);
    }
    
}
