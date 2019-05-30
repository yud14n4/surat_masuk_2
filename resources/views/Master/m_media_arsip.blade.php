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
                    <h2>Master Media Arsip</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-media-arsip">Add Media Arsip</button>
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
                      <!-- awal modal Media Arsip -->
                      <div class="modal fade modal-media-arsip" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Master Media Arsip <small>Add</small></h2>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                      <form class="form-horizontal form-label-left" novalidate method="post" action="{{ route ('postMediaArsip') }}">
                                        @csrf
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name Media Arsip <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="media_arsip_name" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Urutan Arsip <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="media_arsip_urutan" required="required" type="number">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Space Media <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="media_arsip_quantity" required="required" type="number">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="media_arsip_desc">Description <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control col-md-7 col-xs-12" name="media_arsip_desc"></textarea>
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
                      <!-- akhir modaln Add Media Arsip-->
                      <!-- awal modal Edit Media Arsip -->
                      <div class="modal fade modal-edit-media-arsip" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Master Media Arsip <small>Edit</small></h2>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                      <form class="form-horizontal form-label-left" novalidate method="post" action="{{ route ('PostMediaArsipEdit') }}">
                                        @csrf
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name Media Arsip <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="media_arsip_id_u" class="form-control col-md-7 col-xs-12" name="media_arsip_id_u" required="required" type="hidden">
                                            <input id="media_arsip_name_u" class="form-control col-md-7 col-xs-12" name="media_arsip_name_u" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Urutan Arsip <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="media_arsip_urutan_u" class="form-control col-md-7 col-xs-12" name="media_arsip_urutan_u" required="required" type="number">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Space Media <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="media_arsip_quantity_u" class="form-control col-md-7 col-xs-12" name="media_arsip_quantity_u" required="required" type="number">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="media_arsip_desc_u">Description <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control col-md-7 col-xs-12" name="media_arsip_desc_u" id="media_arsip_desc_u"></textarea>
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
                      <!-- akhir modaln Edit Media Arsip-->
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Media Arsip Name</th>
                          <th>Urutan Arsip</th>
                          <th>Space Media</th>
                          <th>Desc Media</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($GetDataMediaArsip as $TableMediaArsip)
                        <tr>
                          <td>{{$TableMediaArsip->MediaArsip_Name}}</td>
                          <td>{{$TableMediaArsip->MediaArsip_Urutan}}</td>
                          <td>{{$TableMediaArsip->MediaArsip_Quantity}}</td>
                          <td>{{$TableMediaArsip->MediaArsip_Desc}}</td>
                          <td>
                            <a><i class="fa fa-pencil" data-toggle="modal" data-target=".modal-edit-media-arsip" aria-hidden="true" OnClick="EditMediaArsip({{$TableMediaArsip->MediaArsip_ID}})"></i></a> | 
                            <a><i class="fa fa-recycle" aria-hidden="true" OnClick="DeleteMediaArsip({{$TableMediaArsip->MediaArsip_ID}})"></i></a>
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
      //Get Data edit Media Arsip
      function EditMediaArsip(id)
      {
        $.ajax({
          type    : 'POST',
          url     : "{{ URL::route('GetIdMediaArsipEdit') }}",
          headers : {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data    : {
            id_media_arsip : id
          },
          success: function(values)
          {
            parse = $.parseJSON(values);
            // console.log(parse.MediaArsip[0].MediaArsip_ID);
            document.getElementById('media_arsip_id_u').value = parse.MediaArsip[0].MediaArsip_ID;
            document.getElementById('media_arsip_name_u').value = parse.MediaArsip[0].MediaArsip_Name;
            document.getElementById('media_arsip_urutan_u').value = parse.MediaArsip[0].MediaArsip_Urutan;
            document.getElementById('media_arsip_quantity_u').value = parse.MediaArsip[0].MediaArsip_Quantity;
            document.getElementById('media_arsip_desc_u').value = parse.MediaArsip[0].MediaArsip_Desc;
          },
          error: function(error) {
            console.log("Conection Failed, please Try again!!!");
          }
        });
      }

      //delete Media Arsip
      function DeleteMediaArsip(id)
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
                url   : "{{ URL::route('PostMediaArsipDelete') }}",
                headers : {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                data  : { id_media_arsip : id },
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