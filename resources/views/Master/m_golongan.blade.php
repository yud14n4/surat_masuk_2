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
                    <h2>Master Golongan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-add-golongan">Add Golongan</button>
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
                      <!-- awal modal add golongan -->
                      <div class="modal fade modal-add-golongan" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Master Golongan <small>Add</small></h2>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                      <form class="form-horizontal form-label-left" novalidate method="post" action="{{ route ('postGolongan') }}">
                                        @csrf
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name Golongan <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="golongan_name" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="golongan_name">Description <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control col-md-7 col-xs-12" name="golongan_desc"></textarea>
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Pangkat <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="pangkat" class="form-control col-md-7 col-xs-12" name="pangkat_name" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pangkat_desc">Description <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control col-md-7 col-xs-12" name="pangkat_desc"></textarea>
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
                      <!-- akhir modaln Add Golongan-->
                      <!-- awal modal Edit golongan -->
                      <div class="modal fade modal-edit-golongan" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Master Golongan <small>Edit</small></h2>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                      <form class="form-horizontal form-label-left" novalidate method="post" action="{{ route ('PostGolonganEdit') }}">
                                        @csrf
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name Golongan <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="golongan_id_u" class="form-control col-md-7 col-xs-12" name="golongan_id_u" required="required" type="hidden">
                                            <input id="golongan_name_u" class="form-control col-md-7 col-xs-12" name="golongan_name_u" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="golongan_name">Description <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control col-md-7 col-xs-12" id="golongan_desc_u" name="golongan_desc_u"></textarea>
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Pangkat <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="pangkat_name_u" class="form-control col-md-7 col-xs-12" name="pangkat_name_u" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pangkat_desc_u">Description <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control col-md-7 col-xs-12" id="pangkat_desc_u" name="pangkat_desc_u"></textarea>
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
                      <!-- akhir modaln Edit Golongan-->
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Golongan Name</th>
                          <th>Golongan Description</th>
                          <th>Pangkat Name</th>
                          <th>Pangkat Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($GetDataGolongan as $TableGolongan)
                        <tr>
                          <td>{{$TableGolongan->Golongan_Name}}</td>
                          <td>{{$TableGolongan->Golongan_Description}}</td>
                          <td>{{$TableGolongan->Golongan_Pangkat}}</td>
                          <td>{{$TableGolongan->Golongan_PangkatDesc}}</td>
                          <td>
                            <a><i class="fa fa-pencil" data-toggle="modal" data-target=".modal-edit-golongan" aria-hidden="true" OnClick="EditGolongan({{$TableGolongan->Golongan_ID}})"></i></a> | 
                            <a><i class="fa fa-recycle" aria-hidden="true" OnClick="DeleteGolongan({{$TableGolongan->Golongan_ID}})"></i></a>
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
      //Get Data edit golongan
      function EditGolongan(id)
      {
        $.ajax({
          type    : 'POST',
          url     : "{{ URL::route('GetIdGolonganEdit') }}",
          headers : {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data    : {
            id_golongan : id
          },
          success: function(values)
          {
            parse = $.parseJSON(values);

            document.getElementById('golongan_id_u').value = parse.Golongan[0].Golongan_ID;
            document.getElementById('golongan_name_u').value = parse.Golongan[0].Golongan_Name;
            document.getElementById('golongan_desc_u').value = parse.Golongan[0].Golongan_Description;
            document.getElementById('pangkat_name_u').value = parse.Golongan[0].Golongan_Pangkat;
            document.getElementById('pangkat_desc_u').value = parse.Golongan[0].Golongan_PangkatDesc;
          },
          error: function(error) {
            console.log("Conection Failed, please Try again!!!");
          }
        });
      }

      //delete golongan
      function DeleteGolongan(id)
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
                url   : "{{ URL::route('PostGolonganDelete') }}",
                headers : {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                data  : { id_golongan : id },
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