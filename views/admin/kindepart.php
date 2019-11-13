<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">        
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
                            <table class="table table-bordered table-hover">
                                <thead class="thead-default thead-lg">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">ID Departemen</th>
                                        <th class="text-center">Departemen</th>
                                        <th class="text-center">Belum Terjawab</th>
                                        <th class="text-center">Proses</th>
                                        <th class="text-center">Terselesaikan</th>
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
                                                <td>'.$depart->departemen.'</td>
                                                <td>'.$depart->belum_terjawab.'</td>
                                                <td>'.$depart->proses.'</td>
                                                <td>'.$depart->terselesaikan.'</td>
                                                <td>'.$depart->total_keluhan.'</td>
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