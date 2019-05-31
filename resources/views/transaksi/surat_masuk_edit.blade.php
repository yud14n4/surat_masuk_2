@extends('layouts.app')
@section('style')

@endsection
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Surat Masuk</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Surat Masuk <small>Edit</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{ route ('postUpdateSuratMasuk') }}" enctype="multipart/form-data">
                    @csrf
                    @foreach($GetDataSuratMasuk as $SuratMasuk)
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Input Surat Masuk<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="sm_id_u" class="form-control col-md-7 col-xs-12" name="sm_id_u" required="required" type="hidden" value="{{$SuratMasuk->SuratM_ID}}">
                            <input id="sm_input_date_u" class="form-control col-md-7 col-xs-12" name="sm_input_date_u" required="required" type="date" value="{{$SuratMasuk->SuratM_InputDate}}">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer_nip_u">Asal Surat <span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="sm_asal_surat_u" name="sm_asal_surat_u" required="required" class="form-control col-md-7 col-xs-12" value="{{$SuratMasuk->SuratM_AsalSurat}}">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_no_surat_u">Nomor Surat <span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="sm_no_surat_u" name="sm_no_surat_u" required="required" class="form-control col-md-7 col-xs-12" value="{{$SuratMasuk->SuratM_NoSurat}}">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_index_surat_u">Index Surat <span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control select2" name="sm_index_surat_u" id="sm_index_surat_" required>
                              <option select value="{{$SuratMasuk->SuratM_IndexSuratID}}">{{$SuratMasuk->Index_Surat_Name}}</option>
                              @foreach($GetSelectIndexSurat as $IndexSurat)
                              <option value="{{$IndexSurat->Index_Surat_ID}}">{{$IndexSurat->Index_Surat_Name}}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_tgl_surat_u">Tanggal Surat<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="sm_tgl_surat_u" class="form-control col-md-7 col-xs-12" name="sm_tgl_surat_u" required="required" type="date" value="{{$SuratMasuk->SuratM_DateSurat}}">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Jenis Surat <span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control select2" name="sm_jenis_surat_u" id="sm_jenis_surat_u" required>
                              <option select value="{{$SuratMasuk->SuratM_JenisSuratID}}">{{$SuratMasuk->Jenis_Surat_Name}}</option>
                              @foreach($GetSelectJenisSurat as $JenisSurat)
                              <option value="{{$JenisSurat->Jenis_Surat_ID}}">{{$JenisSurat->Jenis_Surat_Name}}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_perihal_u">Perihal<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" name="sm_perihal_u" id="sm_perihal_u">{{$SuratMasuk->SuratM_Perihal}}</textarea>
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_ditujukan_u">Ditujukan Kepada<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="sm_ditujukan_u" class="form-control col-md-7 col-xs-12" name="sm_ditujukan_u" required="required" type="text" value="{{$SuratMasuk->SuratM_Tujuan}}">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_keterangan">Keterangan<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" name="sm_keterangan_u" id="sm_keterangan_u">{{$SuratMasuk->SuratM_Keterangan}}</textarea>
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_penerima_u">Nama Penerima<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="sm_penerima_u" class="form-control col-md-7 col-xs-12" name="sm_penerima_u" type="text" data-toggle="modal" data-target="#modal-penerima" value="{{$SuratMasuk->SuratM_PenerimaSurat}}">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_media_arsip">Media Arsip<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control select2" name="sm_media_arsip_u" id="sm_media_arsip_u" required>
                              <option select value="{{$SuratMasuk->SuratM_KodeArsip}}">{{$SuratMasuk->MediaArsip_Name}}</option>
                              @foreach($GetSelectMediaArsip as $MediaArsip)
                              <option value="{{$MediaArsip->MediaArsip_ID}}">{{$MediaArsip->MediaArsip_Name}}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_file">File Arsip<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="sm_file" class="form-control col-md-2 col-xs-2" name="sm_file_old" type="hidden" value="{{$SuratMasuk->SuratM_FileArsip}}">
                            <input id="sm_file_u" class="form-control col-md-2 col-xs-2" name="sm_file_u" type="file" value="{{$SuratMasuk->SuratM_FileArsip}}">{{$SuratMasuk->SuratM_FileArsip}}
                          </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                      @endforeach
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
                      <!-- awal modal Jenis Surat -->
                      <div class="modal fade" id="modal-penerima" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Penerima</h2>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                      <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Nama Penerima</th>
                                            <th>NIP Penerima</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($GetDataPenerima as $TablePenerima)
                                          <tr class="pilih" data-id="{{$TablePenerima->Customer_Name}}">
                                            <td>{{$TablePenerima->Customer_Name}}</td>
                                            <td>{{$TablePenerima->Customer_NIP}}</td>
                                            <td>
                                              <a><button id="send" type="submit" class="btn btn-success">Select</button></a>
                                            </td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                      <div class="col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- akhir modaln Add Jenis Surat-->
                      

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('template/vendors/jquery/dist/jquery.min.js') }}">
  $(document).on('click', '.pilih', function (e) {
    document.getElementById("sm_penerima").value = $(this).attr('data-id');
      $('#modal-penerima').modal('hide');
  });
</script>
@endsection