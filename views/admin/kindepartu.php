<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
            <div class="row mb-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body flexbox-b">
                            <div class="easypie mr-4" data-percent="35" data-bar-color="#18C5A9" data-size="80" data-line-width="8">
                                <span class="easypie-data text-success" style="font-size:32px;"><i class="la la-users"></i></span>
                            </div>
                            <div>
                                <h3 class="font-strong text-success">200</h3>
                                <div class="text-muted">Anggota Baru</div>
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body flexbox-b">
                            <div class="easypie mr-4" data-percent="42" data-bar-color="#5c6bc0" data-size="80" data-line-width="8">
                                <span class="easypie-data font-26 text-primary"><i class="ti-envelope"></i></span>
                            </div>
                            <div>
                                <h3 class="font-strong text-primary">511</h3>
                                <div class="text-muted">KELUHAN</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body flexbox-b">
                            <div class="easypie mr-4" data-percent="70" data-bar-color="#ff4081" data-size="80" data-line-width="8">
                                <span class="easypie-data text-pink" style="font-size:32px;"><i class="la la-tags"></i></span>
                            </div>
                            <div>
                                <h3 class="font-strong text-pink">307</h3>
                                <div class="text-muted">KELUHAN TERSELESAIKAN</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-4">DATA KELUHAN</h5>
                        <div class="flexbox mb-4">
                            <div class="input-group-icon input-group-icon-left mr-3">
                                <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                                <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Search ...">
                            </div>
                        </div>
                        <div class="table-responsive row">
                            <table class="table table-bordered table-hover" id="datatable">
                                <thead class="thead-default thead-lg">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">ID Departemen</th>
                                        <th class="text-center">Departemen</th>
                                        <th class="text-center">Belum Terjawab</th>
                                        <th class="text-center">Proses</th>
                                        <th class="text-center">Terselesaikan</th>
                                        <th class="text-center">Tutup</th>
                                        <th class="text-center">Total Keluhan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($show as $depart){
                                            echo '
                                                <tr>
                                                <td>'.$no++.'</td>
                                                <td>#'.$depart->id_departemen.'</td>
                                                <td>'.$depart->name.'</td>
                                                <td>'.$depart->belum_terjawab.'</td>
                                                <td>'.$depart->menunggu_balasan.'</td>
                                                <td>'.$depart->balasan_klien.'</td>
                                                <td>'.$depart->tutup.'</td>
                                                <td id="tot"></td>
                                                </tr>
                                            '; 
                                        }
                                    ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <!-- END PAGE CONTENT-->