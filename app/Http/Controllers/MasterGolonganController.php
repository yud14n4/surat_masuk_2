<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Response;
use Auth;
use Alert;

class MasterGolonganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
   
    	$GetDataGolongan = DB::table('m_golongan')->get();

    	return view('master.m_golongan', compact('GetDataGolongan'));
    }

    public function PostGolongan(Request $req)
    {

    	try {
	    	$insert = [
	    				'Golongan_Name' => $req->golongan_name,
	    				'Golongan_Description' => $req->golongan_desc,
                        'Golongan_Pangkat' => $req->pangkat_name,
                        'Golongan_PangkatDesc' => $req->pangkat_desc,
	    				'Input_Date' => date('Y-m-d'),
	    				'Input_By' => auth::user()->id
	    			];
	    	DB::table('m_golongan')->insert($insert);
            return redirect()->route('mGolongan')->with(['success' => 'Pesan Berhasil']);
	    } catch(Exception $exc) {
			abort(404, $exc->getMessage());
		}
        
    }

    public function EditGolongan()
    {

        $data_all = [];
        $dataGolongan = DB::table('m_golongan')
                        ->where('Golongan_ID', Input::get('id_golongan'))
                        ->get();
        $data_all = [
                        'Golongan' => $dataGolongan
                    ];
        return json_encode($data_all);
    }

    public function PostEditGolongan(Request $req)
    {
        try{
            $update = [
                        'Golongan_Name' => $req->golongan_name_u,
                        'Golongan_Description' => $req->golongan_desc_u,
                        'Golongan_Pangkat' => $req->pangkat_name_u,
                        'Golongan_PangkatDesc' => $req->pangkat_desc_u,
                        'Update_Date' => date('Y-m-d'),
                        'Update_By' => auth::user()->id
                    ];
            DB::table('m_golongan')->where('Golongan_ID', $req->golongan_id_u)->update($update);
            return redirect()->route('mGolongan')->with(['success' => 'Pesan Berhasil di Update']);
        } catch(Exception $exc) {
            abort(404, $exc->getMessage());
        }
    }

    public function PostDeleteGolongan()
    {
        try {
            DB::table('m_golongan')->where('Golongan_ID', Input::get('id_golongan'))->delete();
            return redirect()->route('mGolongan');
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }
}