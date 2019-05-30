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
                    <h2>Master Jenis Surat</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-jenis-surat">Add Jenis Surat</button>
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
                      <!-- awal modal Jenis Surat -->
                      <div class="modal fade modal-jenis-surat" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
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

                                      <form class="form-horizontal form-label-left" novalidate method="post" action="{{ route ('postJenisSurat') }}">
                                        @csrf
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name Jenis Surat <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="jenis_surat_name" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="golongan_name">Description <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control col-md-7 col-xs-12" name="jenis_surat_desc"></textarea>
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
                      <!-- akhir modaln Add Jenis Surat-->
                      <!-- awal modal Edit Jenis Surat -->
                      <div class="modal fade modal-edit-jenis-surat" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Master Jenis Surat <small>Edit</small></h2>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                      <form class="form-horizontal form-label-left" novalidate method="post" action="{{ route ('PostJenisSuratEdit') }}">
                                        @csrf
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jenis Surat Name <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="jenis_surat_id_u" class="form-control col-md-7 col-xs-12" name="jenis_surat_id_u" required="required" type="hidden">
                                            <input id="jenis_surat_name_u" class="form-control col-md-7 col-xs-12" name="jenis_surat_name_u" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_surat_name">Description <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control col-md-7 col-xs-12" id="jenis_surat_desc_u" name="jenis_surat_desc_u"></textarea>
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
                      <!-- akhir modaln Edit Jenis Surat-->
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Jenis Surat Name</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($GetDataJenisSurat as $TableJenisSurat)
                        <tr>
                          <td>{{$TableJenisSurat->Jenis_Surat_Name}}</td>
                          <td>{{$TableJenisSurat->Jenis_Surat_Description}}</td>
                          <td>
                            <a><i class="fa fa-pencil" data-toggle="modal" data-target=".modal-edit-jenis-surat" aria-hidden="true" OnClick="EditJenisSurat({{$TableJenisSurat->Jenis_Surat_ID}})"></i></a> | 
                            <a><i class="fa fa-recycle" aria-hidden="true" OnClick="DeleteJenisSurat({{$TableJenisSurat->Jenis_Surat_ID}})"></i></a>
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
      //Get Data edit Jenis Surat
      function EditJenisSurat(id)
      {
        $.ajax({
          type    : 'POST',
          url     : "{{ URL::route('GetIdJenisSuratEdit') }}",
          headers : {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data    : {
            id_jenis_surat : id
          },
          success: function(values)
          {
            parse = $.parseJSON(values);

            document.getElementById('jenis_surat_id_u').value = parse.JenisSurat[0].Jenis_Surat_ID;
            document.getElementById('jenis_surat_name_u').value = parse.JenisSurat[0].Jenis_Surat_Name;
            document.getElementById('jenis_surat_desc_u').value = parse.JenisSurat[0].Jenis_Surat_Description;
          },
          error: function(error) {
            console.log("Conection Failed, please Try again!!!");
          }
        });
      }

      //delete jenis surat
      function DeleteJenisSurat(id)
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
                url   : "{{ URL::route('PostJenisSuratDelete') }}",
                headers : {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                data  : { id_jenis_surat : id },
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