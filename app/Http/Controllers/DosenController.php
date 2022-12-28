<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dosen;

class DosenController extends Controller
{
        //Insert
    public function insert(){
        
        //RAW
        $sql = DB::insert("INSERT INTO dosen (nidn,nama,jenis_kelamin,alamat,tempat_lahir,tanggal_lahir,photo,created_at,updated_at) VALUES ('10079', 'Al Haitham M.Kom','Laki-Laki','Jl.Merati','Bandung','1995-01-29','PhotoHaitham.png',now(),now())");
        dump($sql);

        //SB
        $sql1 = DB::table('dosen')->insert(
            [
                'nidn' => '10087',
                'nama' => 'Morax M.Pd',
                'jenis_kelamin' => 'Laki-Laki',
                'alamat' => 'Jl.Merpati No.3',
                'tempat_lahir' => 'Subang',
                'tanggal_lahir' => '1994-06-21',
                'photo' => 'photoMorax.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dump($sql1);

        //ELOQUENT
        $sql2 = Dosen::create(
            [
                'nidn' => '10094',
                'nama' => 'Rosaria M.Pd',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl.Kemerdekaan no.5',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '1997-03-19',
                'photo' => 'photoRosaria.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
            );
            dump($sql2);
    }

    //Select
    public function select(){

        //RAW
        $sql = DB::select("SELECT * FROM dosen");
        dd($sql);

        //SB
        $sql1 = DB::table('dosen')->get();
        dd($sql1);

        //ELOQUENT
        $sql2 = Dosen::all();
        dd($sql2);
    }


        //Update
    public function update(){

        // RAW
        $sql = DB::update("UPDATE dosen SET alamat='JL.Kuningan No.02',updated_at=now() WHERE id=?",[1]);
        dd($sql);

        //SB
        $sql1 = DB::table('dosen')
        ->where('id','3')
        ->update(
            [
                'alamat' => 'JL.Kuningan No.02',
                'updated_at' => now(),
            ]
            );
        dd($sql1);

        #ELOQUENT
        $sql2 = Dosen::where('id','1')->first()->update([
            'alamat' => 'Jl.Kuningan No.02',
            'updated_at' => now(),
        ]);
        dd($sql2);


    }

        //Delete
    public function delete(){

        //RAW
        $sql = DB::delete("DELETE FROM dosen WHERE nidn=?",['10094']);
        dd($sql);

        //SB
        $sql1 = DB::table('dosen')
        ->where('nidn','10094')
        ->delete();
        dd($sql1);

        //ELOQUENT
        $sql2 = Dosen::where('nidn','10094')->delete();
        dd($sql2);
    }
}
