<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Response;
use Auth;
use Alert;

class SuratMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$GetDataSuratMasuk = DB::table('t_surat_masuk')
    							->leftjoin('m_index_surat', 'SuratM_IndexSuratID','=','Index_Surat_ID')
                                ->leftjoin('m_jenis_surat', 'SuratM_JenisSuratID','=','Jenis_Surat_ID')
    							->get();
    	return view('transaksi.surat_masuk', compact('GetDataSuratMasuk'));
    }

    public function indexAdd()
    {
        $GetDataPenerima = DB::table('m_penerima')->get();
        $GetSelectIndexSurat = DB::table('m_index_surat')->get();
        $GetSelectJenisSurat = DB::table('m_jenis_surat')->get();
        return view('transaksi.surat_masuk_add', compact('GetDataPenerima','GetSelectIndexSurat','GetSelectJenisSurat'));
    }    

    public function PostCustomer(Request $req)
    {
        try {
            $insert = [
                        'Customer_Name' => $req->customer_name,
                        'Customer_NIP' => $req->customer_nip,
                        'Customer_GolID' => $req->customer_golongan,
                        'Input_Date' => date('Y-m-d'),
                        'Input_By' => auth::user()->id
                    ];
            DB::table('m_penerima')->insert($insert);
            return redirect()->route('mCustomer')->with(['success' => 'Pesan Berhasil']);
        } catch(Exception $exc) {
            abort(404, $exc->getMessage());
        }
        
    }

    public function GetIdCustomer($idCust)
    {
        $GetDataEditCust = DB::table('m_penerima')
                            ->leftjoin('m_golongan', 'Customer_GolID','=','Golongan_ID')
                            ->where('Customer_ID', $idCust)
                            ->get();
        $GetSelectGolongan = DB::table('m_golongan')->get();

        return view('master.m_penerima_edit', compact('judul','GetDataEditCust','GetSelectGolongan'));
    }

    public function PostUpdateCustomer(Request $req)
    {
        try {
            $update = [
                        'Customer_Name' => $req->customer_name_u,
                        'Customer_NIP' => $req->customer_nip_u,
                        'Customer_GolID' => $req->customer_golongan_u,
                        'Update_Date' => date('Y-m-d'),
                        'Update_By' => auth::user()->id
                    ];
            DB::table('m_penerima')->where('Customer_ID', $req->customer_id_u)->update($update);
            return redirect()->route('mCustomer')->with(['success' => 'Berhasil Di Update']);
        } catch(Exception $exc) {
            abort(404, $exc->getMessage());
        }
        
    }
    
    public function PostDeleteCustomer()
    {
        try {
            DB::table('m_penerima')->where('Customer_ID', Input::get('id_customer'))->delete();
            return redirect()->route('mCustomer');
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }    
}