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
                    <h2>Master Penerima</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-add-customer">Add Customer</button>
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
                      <!-- modalnya -->
                      <div class="modal fade modal-add-customer" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Master Penerima <small>Add</small></h2>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                      <form class="form-horizontal form-label-left" novalidate method="post" action="{{ route ('postCustomer') }}">
                                        @csrf
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="customer_name" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer_nip">NIP <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="number" id="customer_nip" name="customer_nip" required="required" class="form-control col-md-7 col-xs-12">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Golongan <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control select2" name="customer_golongan" id="customer_golongan" required>
                                              <option select value="">Pilih Golongan</option>
                                              @foreach($GetSelectGolongan as $golongan)
                                              <option value="{{$golongan->Golongan_ID}}">{{$golongan->Golongan_Name}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                        </div>
                                        <!-- <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Pangkat <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <span id="skode"></span>
                                            <input type="text" id="pangkat_name" name="pangkat_name" required="required" class="form-control col-md-7 col-xs-12">
                                          </div>
                                        </div> -->
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
                      <!-- akhir modalnya -->
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Customer Name</th>
                          <th>Customer NIP</th>
                          <th>Golongan</th>
                          <th>Pangkat</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($GetDataMasterPenerima as $TablePenerima)
                        <tr>
                          <td>{{$TablePenerima->Customer_Name}}</td>
                          <td>{{$TablePenerima->Customer_NIP}}</td>
                          <td>{{$TablePenerima->Golongan_Name}}</td>
                          <td>{{$TablePenerima->Golongan_Pangkat}}</td>
                          <td>
                            <a href="{{ url('/Edit-Master-Customer/'.$TablePenerima->Customer_ID) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a><i class="fa fa-recycle" aria-hidden="true" OnClick="DeleteCustomer({{$TablePenerima->Customer_ID}})"></i></a>
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
<script type="text/javascript">

      //delete customer
      function DeleteCustomer(id)
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
                url   : "{{ URL::route('PostCustomerDelete') }}",
                headers : {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                data  : { id_customer : id },
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