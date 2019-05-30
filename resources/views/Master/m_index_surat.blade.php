@extends('layouts.app')
@section('style')

@endsection
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Master Index Surat</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-index-surat">Add Index Surat</button>
                      @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                      @endif
                      @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button> 
                          <strong>{{ $message }}</strong>
                        </div>
                      @endif
                      <!-- awal modal Index Surat -->
                      <div class="modal fade modal-index-surat" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Master Index Surat <small>Add</small></h2>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                      <form class="form-horizontal form-label-left" novalidate method="post" action="{{ route ('postIndexSurat') }}">
                                        @csrf
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name Index Surat <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="index_surat_name" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="index_surat_name">Description <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control col-md-7 col-xs-12" name="index_surat_desc"></textarea>
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
                        </div>
                      </div>
                      <!-- akhir modaln Add Index Surat-->
                      <!-- awal modal Edit Index Surat -->
                      <div class="modal fade modal-edit-index-surat" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Master Index Surat <small>Edit</small></h2>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                      <form class="form-horizontal form-label-left" novalidate method="post" action="{{ route ('PostIndexSuratEdit') }}">
                                        @csrf
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Index Surat Name <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="index_surat_id_u" class="form-control col-md-7 col-xs-12" name="index_surat_id_u" required="required" type="hidden">
                                            <input id="index_surat_name_u" class="form-control col-md-7 col-xs-12" name="index_surat_name_u" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="index_surat_name">Description <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control col-md-7 col-xs-12" id="index_surat_desc_u" name="index_surat_desc_u"></textarea>
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
                        </div>
                      </div>
                      <!-- akhir modaln Edit Index Surat-->
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Index Surat Name</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($GetDataIndexSurat as $TableIndexSurat)
                        <tr>
                          <td>{{$TableIndexSurat->Index_Surat_Name}}</td>
                          <td>{{$TableIndexSurat->Index_Surat_Description}}</td>
                          <td>
                            <a><i class="fa fa-pencil" data-toggle="modal" data-target=".modal-edit-index-surat" aria-hidden="true" OnClick="EditIndexSurat({{$TableIndexSurat->Index_Surat_ID}})"></i></a> | 
                            <a><i class="fa fa-recycle" aria-hidden="true" OnClick="DeleteIndexSurat({{$TableIndexSurat->Index_Surat_ID}})"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection

@section('script')
    <script>
      //Get Data edit Index Surat
      function EditIndexSurat(id)
      {
        $.ajax({
          type    : 'POST',
          url     : "{{ URL::route('GetIdIndexSuratEdit') }}",
          headers : {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data    : {
            id_index_surat : id
          },
          success: function(values)
          {
            parse = $.parseJSON(values);

            document.getElementById('index_surat_id_u').value = parse.IndexSurat[0].Index_Surat_ID;
            document.getElementById('index_surat_name_u').value = parse.IndexSurat[0].Index_Surat_Name;
            document.getElementById('index_surat_desc_u').value = parse.IndexSurat[0].Index_Surat_Description;
          },
          error: function(error) {
            console.log("Conection Failed, please Try again!!!");
          }
        });
      }

      //delete Index surat
      function DeleteIndexSurat(id)
      {
        swal({
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
          },
            function() {
              $.ajax({
                type  : 'POST',
                url   : "{{ URL::route('PostIndexSuratDelete') }}",
                headers : {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                data  : { id_index_surat : id },
                success  : function(data){
                    swal({
                      title: "Data Berhasil di Delete",
                      type: "info"
                    })
                    location.reload();
                }
              });
        });
      }
    </script>
@endsection