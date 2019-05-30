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
                    <h2>Surat Masuk <small>Add</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{ route ('postSuratMasuk') }}">
                    @csrf
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Input Surat Masuk<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="sm_input_date" class="form-control col-md-7 col-xs-12" name="sm_input_date" required="required" type="date">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer_nip_u">Asal Surat <span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="sm_asal_surat" name="sm_asal_surat" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_no_surat">Nomor Surat <span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="sm_no_surat" name="sm_no_surat" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_index_surat">Index Surat <span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control select2" name="sm_index_surat" id="sm_index_surat" required>
                              <option select value="">Pilih Index Surat</option>
                              @foreach($GetSelectIndexSurat as $IndexSurat)
                              <option value="{{$IndexSurat->Index_Surat_ID}}">{{$IndexSurat->Index_Surat_Name}}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_tgl_surat">Tanggal Surat<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="sm_tgl_surat" class="form-control col-md-7 col-xs-12" name="sm_tgl_surat" required="required" type="date">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Jenis Surat <span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control select2" name="sm_jenis_surat" id="sm_jenis_surat" required>
                              <option select value="">Pilih Jenis Surat</option>
                              @foreach($GetSelectJenisSurat as $JenisSurat)
                              <option value="{{$JenisSurat->Jenis_Surat_ID}}">{{$JenisSurat->Jenis_Surat_Name}}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_perihal">Perihal<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" name="sm_perihal" id="sm_perihal"></textarea>
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_ditujukan">Ditujukan Kepada<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="sm_ditujukan" class="form-control col-md-7 col-xs-12" name="sm_ditujukan" required="required" type="text">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_keterangan">Keterangan<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" name="sm_keterangan" id="sm_keterangan"></textarea>
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_penerima">Nama Penerima<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="sm_ditujukan" class="form-control col-md-7 col-xs-12" name="sm_ditujukan" required="required" type="text" data-toggle="modal" data-target=".modal-penerima">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_penerima">Media Arsip<span class="required">*</span>
                        </label>
                          <div class="col-md-2 col-sm-2 col-xs-12">
                            <input id="sm_ditujukan" class="form-control col-md-2 col-xs-2" name="sm_ditujukan" required="required" type="text">
                            <input id="sm_ditujukan" class="form-control col-md-2 col-xs-2" name="sm_ditujukan" required="required" type="text">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_penerima">Kode Arsip<span class="required">*</span>
                        </label>
                          <div class="col-md-2 col-sm-2 col-xs-12">
                            <input id="sm_ditujukan" class="form-control col-md-2 col-xs-2" name="sm_ditujukan" required="required" type="text">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sm_penerima">File Arsip<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="sm_ditujukan" class="form-control col-md-2 col-xs-2" name="sm_ditujukan" required="required" type="file">
                          </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
                      <!-- awal modal Jenis Surat -->
                      <div class="modal fade modal-penerima" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Master Jenis Surat <small>Add</small></h2>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                      <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Nama Penerima</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($GetDataPenerima as $TablePenerima)
                                          <tr>
                                            <td>{{$TablePenerima->Customer_Name}}</td>
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
@endsection