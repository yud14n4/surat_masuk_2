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
                    <h2>Surat Masuk</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      <a href="{{ route('SuratMasukAdd')}}"><button type="button" class="btn btn-primary">Add Surat Masuk</button></a>
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
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Tanggal Input</th>
                          <th>Asal Surat</th>
                          <th>Nomor Surat</th>
                          <th>Index Surat</th>
                          <th>Tanggal Surat</th>
                          <th>Jenis Surat</th>
                          <th>Perihal</th>
                          <th>Di Tujukan Kepada</th>
                          <th>Keterangan</th>
                          <th>Nama Penerima</th>
                          <th>Kode Arsip</th>
                          <th>Arsip File</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($GetDataSuratMasuk as $TableSuratMasuk)
                        <tr>
                          <td>{{$TableSuratMasuk->SuratM_InputDate}}</td>
                          <td>{{$TableSuratMasuk->SuratM_AsalSurat}}</td>
                          <td>{{$TableSuratMasuk->SuratM_NoSurat}}</td>
                          <td>{{$TableSuratMasuk->Index_Surat_Name}}</td>
                          <td>{{$TableSuratMasuk->SuratM_DateSurat}}</td>
                          <td>{{$TableSuratMasuk->Jenis_Surat_Name}}</td>
                          <td>{{$TableSuratMasuk->SuratM_Perihal}}</td>
                          <td>{{$TableSuratMasuk->SuratM_Tujuan}}</td>
                          <td>{{$TableSuratMasuk->SuratM_Keterangan}}</td>
                          <td>{{$TableSuratMasuk->SuratM_PenerimaSurat}}</td>
                          <td>{{$TableSuratMasuk->MediaArsip_Name}}</td>
                          <td><a href="{{ url('/UploadFileArsip/'.$TableSuratMasuk->SuratM_FileArsip) }}" target="_blank">{{$TableSuratMasuk->SuratM_FileArsip}}</a></td>
                          <td>
                            <a href="{{ url('/edit-surat-masuk/'.$TableSuratMasuk->SuratM_ID) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a><i class="fa fa-recycle" aria-hidden="true" OnClick="DeleteSuratMasuk({{$TableSuratMasuk->SuratM_ID}})"></i></a>
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