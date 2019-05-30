<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Response;
use Auth;
use Alert;

class MasterMediaArsipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
   
    	$GetDataMediaArsip = DB::table('m_media_arsip')->get();

    	return view('master.m_media_arsip', compact('GetDataMediaArsip'));
    }

    public function PostMediaArsip(Request $req)
    {

    	try {
	    	$insert = [
	    				'MediaArsip_Name' => $req->media_arsip_name,
	    				'MediaArsip_Urutan' => $req->media_arsip_urutan,
                        'MediaArsip_Quantity' => $req->media_arsip_quantity,
                        'MediaArsip_Desc' => $req->media_arsip_desc,
	    				'Input_Date' => date('Y-m-d'),
	    				'Input_By' => auth::user()->id
	    			];
	    	DB::table('m_media_arsip')->insert($insert);
            return redirect()->route('mMediaArsip')->with(['success' => 'Pesan Berhasil']);
	    } catch(Exception $exc) {
			abort(404, $exc->getMessage());
		}
        
    }

    public function EditMediaArsip()
    {

        $data_all = [];
        $dataMediaArsip = DB::table('m_media_arsip')
                        ->where('MediaArsip_ID', Input::get('id_media_arsip'))
                        ->get();
                        // dd($dataMediaArsip);
        $data_all = [
                        'MediaArsip' => $dataMediaArsip
                    ];
        return json_encode($data_all);
    }

    public function PostEditMediaArsip(Request $req)
    {
        try{
            $update = [
                        'MediaArsip_Name' => $req->media_arsip_name_u,
                        'MediaArsip_Urutan' => $req->media_arsip_urutan_u,
                        'MediaArsip_Quantity' => $req->media_arsip_quantity_u,
                        'MediaArsip_Desc' => $req->media_arsip_desc_u,
                        'Update_Date' => date('Y-m-d'),
                        'Update_By' => auth::user()->id
                    ];
            DB::table('m_media_arsip')->where('MediaArsip_ID', $req->media_arsip_id_u)->update($update);
            return redirect()->route('mMediaArsip')->with(['success' => 'Pesan Berhasil di Update']);
        } catch(Exception $exc) {
            abort(404, $exc->getMessage());
        }
    }

    public function PostDeleteMediaArsip()
    {
        try {
            DB::table('m_media_arsip')->where('MediaArsip_ID', Input::get('id_media_arsip'))->delete();
            return redirect()->route('mMediaArsip');
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }
}