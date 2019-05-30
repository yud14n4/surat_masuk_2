<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Response;
use Auth;
use Alert;

class MasterIndexSuratController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
   
    	$GetDataIndexSurat = DB::table('m_index_surat')->get();

    	return view('master.m_index_surat', compact('GetDataIndexSurat'));
    }

    public function PostIndexSurat(Request $req)
    {

    	try {
	    	$insert = [
	    				'Index_Surat_Name' => $req->index_surat_name,
	    				'Index_Surat_Description' => $req->index_surat_desc,
	    				'Input_Date' => date('Y-m-d'),
	    				'Input_By' => auth::user()->id
	    			];
	    	DB::table('m_index_surat')->insert($insert);
            return redirect()->route('mIndexSurat')->with(['success' => 'Pesan Berhasil']);
	    } catch(Exception $exc) {
			abort(404, $exc->getMessage());
		}
        
    }

    public function EditIndexSurat()
    {

        $data_all = [];
        $dataIndexSurat = DB::table('m_index_surat')
                        ->where('Index_Surat_ID', Input::get('id_index_surat'))
                        ->get();
        $data_all = [
                        'IndexSurat' => $dataIndexSurat
                    ];
        return json_encode($data_all);
    }

    public function PostEditIndexSurat(Request $req)
    {
        try{
            $update = [
                        'Index_Surat_Name' => $req->index_surat_name_u,
                        'Index_Surat_Description' => $req->index_surat_desc_u,
                        'Update_Date' => date('Y-m-d'),
                        'Update_By' => auth::user()->id
                    ];
            DB::table('m_index_surat')->where('index_Surat_ID', $req->index_surat_id_u)->update($update);
            return redirect()->route('mIndexSurat')->with(['success' => 'Pesan Berhasil di Update']);
        } catch(Exception $exc) {
            abort(404, $exc->getMessage());
        }
    }

    public function PostDeleteIndexSurat()
    {
        try {
            DB::table('m_index_surat')->where('index_Surat_ID', Input::get('id_index_surat'))->delete();
            return redirect()->route('mIndexSurat');
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }
}