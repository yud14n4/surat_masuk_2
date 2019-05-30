@extends('layouts.app')
@section('style')

@endsection
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Customer</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Master Customer <small>Edit</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{ route ('postUpdateCustomer') }}">
                    @csrf
                    @foreach ($GetDataEditCust as $cust)
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-7 col-xs-12" name="customer_id_u" required="required" type="hidden" value="{{$cust->Customer_ID}}">
                            <input id="name" class="form-control col-md-7 col-xs-12" name="customer_name_u" required="required" type="text" value="{{$cust->Customer_Name}}">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer_nip_u">NIP <span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="customer_nip" name="customer_nip_u" required="required" class="form-control col-md-7 col-xs-12" value="{{$cust->Customer_NIP}}">
                          </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Golongan <span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control select2" name="customer_golongan_u" id="customer_golongan_u" required>
                              <option select value="{{$cust->Golongan_ID}}">{{$cust->Golongan_Name}}</option>
                              @foreach($GetSelectGolongan as $golongan)
                              <option value="{{$golongan->Golongan_ID}}">{{$golongan->Golongan_Name}}</option>
                              @endforeach
                            </select>
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

@endsection

@section('script')
@endsection