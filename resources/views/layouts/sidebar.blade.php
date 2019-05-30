	<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>APP SIM</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home </a></li>
                  <li><a><i class="fa fa-edit"></i> Referensi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('mCustomer') }}">Penerima</a></li>
                      <li><a href="{{ route('mGolongan') }}">Golongan</a></li>
                      <li><a href="{{ route('mIndexSurat') }}">Index Surat</a></li>
                      <li><a href="{{ route('mJenisSurat') }}">Jenis Surat</a></li>
                      <li><a href="{{ route('mMediaArsip') }}">Media Arsip</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Surat Masuk <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('SuratMasuk') }}">Form Surat Masuk</a></li>
                      <li><a href="media_gallery.html">Disposisi</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Laporan Daily</a></li>
                      <li><a href="tables_dynamic.html">Laporan Monthly</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
