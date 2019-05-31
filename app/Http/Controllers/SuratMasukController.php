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
                                ->leftjoin('m_media_arsip', 'SuratM_KodeArsip', '=', 'MediaArsip_ID')
    							->get();
        // dd($GetDataSuratMasuk);
    	return view('transaksi.surat_masuk', compact('GetDataSuratMasuk'));
    }

    public function indexAdd()
    {
        $GetDataPenerima = DB::table('m_penerima')->get();
        $GetSelectMediaArsip = DB::table('m_media_arsip')->get();
        $GetSelectIndexSurat = DB::table('m_index_surat')->get();
        $GetSelectJenisSurat = DB::table('m_jenis_surat')->get();
        return view('transaksi.surat_masuk_add', compact('GetDataPenerima','GetSelectMediaArsip','GetSelectIndexSurat','GetSelectJenisSurat'));
    }    

    public function PostSuratMasuk(Request $req)
    {
        //upload file
        $file_arsip     = $req->file('sm_file');
        $name_file      = $file_arsip->getClientOriginalName();
        $req->sm_file->move(public_path('UploadFileArsip'), $name_file);
        
        //proses insert database
        try {
            $insert = [
                        'SuratM_InputDate'      => $req->sm_input_date,
                        'SuratM_AsalSurat'      => $req->sm_asal_surat,
                        'SuratM_NoSurat'        => $req->sm_no_surat,
                        'SuratM_IndexSuratID'   => $req->sm_index_surat,
                        'SuratM_DateSurat'      => $req->sm_tgl_surat,
                        'SuratM_JenisSuratID'   => $req->sm_jenis_surat,
                        'SuratM_Perihal'        => $req->sm_perihal,
                        'SuratM_Tujuan'         => $req->sm_ditujukan,
                        'SuratM_Keterangan'     => $req->sm_keterangan,
                        // 'SuratM_PenerimaSurat'  => $req->sm_penerima,
                        'SuratM_PenerimaSurat'  => 'Yudiana Dulu',
                        'SuratM_KodeArsip'      => $req->sm_media_arsip,
                        'SuratM_FileArsip'      => $name_file,
                        'Input_Date'            => date('Y-m-d'),
                        'Input_By'              => auth::user()->id
                    ];
            DB::table('t_surat_masuk')->insert($insert);
            return redirect()->route('SuratMasuk')->with(['success' => 'Pesan Berhasil']);
        } catch(Exception $exc) {
            abort(404, $exc->getMessage());
        }
        
    }

    public function GetIdSuratMasuk($idSuratMasuk)
    {
        $GetDataSuratMasuk = DB::table('t_surat_masuk')
                                ->leftjoin('m_index_surat', 'SuratM_IndexSuratID','=','Index_Surat_ID')
                                ->leftjoin('m_jenis_surat', 'SuratM_JenisSuratID','=','Jenis_Surat_ID')
                                ->leftjoin('m_media_arsip', 'SuratM_KodeArsip', '=', 'MediaArsip_ID')
                                ->where('SuratM_ID', $idSuratMasuk)
                                ->get();
        $GetSelectIndexSurat = DB::table('m_index_surat')->get();
        $GetSelectJenisSurat = DB::table('m_jenis_surat')->get();
        $GetDataPenerima = DB::table('m_penerima')->get();
        $GetSelectMediaArsip = DB::table('m_media_arsip')->get();
        
        return view('transaksi.surat_masuk_edit', compact('GetDataSuratMasuk','GetSelectIndexSurat','GetSelectJenisSurat','GetSelectMediaArsip','GetDataPenerima'));
    }

    public function PostUpdateSuratMasuk(Request $req)
    {
        //upload file
        if ($req->sm_file==''){

            $name_file = $req->sm_file_old;

        } else {

            $file_arsip     = $req->file('sm_file');
            $name_file      = $file_arsip->getClientOriginalName();
            $req->sm_file->move(public_path('UploadFileArsip'), $name_file);
        }
        //proses update database
        try {
            $update = [
                        'SuratM_InputDate'      => $req->sm_input_date_u,
                        'SuratM_AsalSurat'      => $req->sm_asal_surat_u,
                        'SuratM_NoSurat'        => $req->sm_no_surat_u,
                        'SuratM_IndexSuratID'   => $req->sm_index_surat_u,
                        'SuratM_DateSurat'      => $req->sm_tgl_surat_u,
                        'SuratM_JenisSuratID'   => $req->sm_jenis_surat_u,
                        'SuratM_Perihal'        => $req->sm_perihal_u,
                        'SuratM_Tujuan'         => $req->sm_ditujukan_u,
                        'SuratM_Keterangan'     => $req->sm_keterangan_u,
                        // 'SuratM_PenerimaSurat'  => $req->sm_penerima,
                        'SuratM_PenerimaSurat'  => 'Yudiana Dulu',
                        'SuratM_KodeArsip'      => $req->sm_media_arsip_u,
                        'SuratM_FileArsip'      => $name_file,
                        'Update_Date'            => date('Y-m-d'),
                        'Update_By'              => auth::user()->id
                    ];
            DB::table('t_surat_masuk')->where('SuratM_ID', $req->sm_id_u)->update($update);
            return redirect()->route('SuratMasuk')->with(['success' => 'Berhasil di Update']);
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