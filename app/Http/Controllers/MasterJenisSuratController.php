<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Response;
use Auth;
use Alert;

class MasterJenisSuratController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
   
    	$GetDataJenisSurat = DB::table('m_jenis_surat')->get();

    	return view('master.m_jenis_surat', compact('GetDataJenisSurat'));
    }

    public function PostJenisSurat(Request $req)
    {

    	try {
	    	$insert = [
	    				'Jenis_Surat_Name' => $req->jenis_surat_name,
	    				'Jenis_Surat_Description' => $req->jenis_surat_desc,
	    				'Input_Date' => date('Y-m-d'),
	    				'Input_By' => auth::user()->id
	    			];
	    	DB::table('m_jenis_surat')->insert($insert);
            return redirect()->route('mJenisSurat')->with(['success' => 'Pesan Berhasil']);
	    } catch(Exception $exc) {
			abort(404, $exc->getMessage());
		}
        
    }

    public function EditJenisSurat()
    {

        $data_all = [];
        $dataJenisSurat = DB::table('m_jenis_surat')
                        ->where('Jenis_Surat_ID', Input::get('id_jenis_surat'))
                        ->get();
        $data_all = [
                        'JenisSurat' => $dataJenisSurat
                    ];
        return json_encode($data_all);
    }

    public function PostEditJenisSurat(Request $req)
    {
        try{
            $update = [
                        'Jenis_Surat_Name' => $req->jenis_surat_name_u,
                        'Jenis_Surat_Description' => $req->jenis_surat_desc_u,
                        'Update_Date' => date('Y-m-d'),
                        'Update_By' => auth::user()->id
                    ];
            DB::table('m_jenis_surat')->where('Jenis_Surat_ID', $req->jenis_surat_id_u)->update($update);
            return redirect()->route('mJenisSurat')->with(['success' => 'Pesan Berhasil di Update']);
        } catch(Exception $exc) {
            abort(404, $exc->getMessage());
        }
    }

    public function PostDeleteJenisSurat()
    {
        try {
            DB::table('m_jenis_surat')->where('Jenis_Surat_ID', Input::get('id_jenis_surat'))->delete();
            return redirect()->route('mJenisSurat');
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }
}