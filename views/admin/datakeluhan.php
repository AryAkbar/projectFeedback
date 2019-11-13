<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Data Keluhan</h1>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-4">DATA KELUHAN</h5>
                        <div class="flexbox mb-4">
                            <div class="flexbox">
                                <label class="mb-0 mr-2">Status:</label>
                                <select class="selectpicker show-tick form-control" id="type-filter" title="Please select" data-style="btn-solid" data-width="150px">
                                    <option value="">All</option>
                                    <option>Terbuka</option>
                                    <option>Terselesaikan</option>
                                    <option>Proses</option>
                                    <option>Belum Terbaca</option>
                                    <option>Tutup</option>
                                </select>
                            </div>
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
                                        <th class="text-center">ID Keluhan</th>
                                        <th class="text-center">Judul</th>
                                        <th class="text-center">Departemen</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($show as $all) {
                                        # code...
                                        echo '
                                    <tr>
                                        <td>'.$no++.'</td>
                                        <td>
                                            <a href="index.php?url=admin/keluhan&id='.$all->id_keluhan.'">'.$all->id_keluhan.'</a>
                                        </td>
                                        <td>'.$all->judul.'</td>
                                        <td>'.$all->departemen.'</td>
                                        <td>
                                            <span class="badge badge-primary badge-pill">'.$all->status.'</span>
                                        </td>
                                        <td>'.$all->tanggal_upload.'</td>
                                        <td>
                                            <a class="text-muted font-16" href="javascript:;"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>';
                                }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->