[l<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-4">DATA KELUHAN</h5>
                        <div class="flexbox mb-4">
                            <div class="flexbox">
                                <label class="mb-0 mr-2">Status:</label>   
                                <select class="selectpicker show-tick form-control" id="type-filter" title="Please select" data-style="btn-solid" data-width="200px">
                                    <option value="">All</option>
                                    <option>Terbuka</option>
                                    <option>Terselesaikan</option>
                                    <option>Menunggu Balasan</option>
                                    <option>Belum Terjawab</option>
                                    <option>Tutup</option>
                                </select>
                                    <button class="btn btn-success float-right addUser" data-toggle="modal" data-target="#myModal"><i class="ti-printer mr-2"></i> Cetak Data </button>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    if($_SESSION['role'] == "superadmin"):
                                        foreach ($sho as $all) {
                                        # code...                                    
                                            switch ($all->status) {
                                            case 'Terbuka':
                                                # code...
                                                echo '<tr>
                                        <td style="font-weight:1000">'.$no++.'</td>
                                        <td style="font-weight:1000">
                                            #'.$all->id_keluhan.'
                                        </td>
                                        <td style="font-weight:1000"><a href="index.php?url=admin/keluhan&id='.$all->id_keluhan.'">'.html_entity_decode($all->judul).'</a></td>
                                        <td style="font-weight:1000">'.$all->departemen.'</td>
                                        <td data-stats="'.$all->status.'" style="font-weight:1000"> <span style="font-weight:1000" class="badge badge-danger badge-pill"> Belum Terjawab </span></td>
                                        <td style="font-weight:1000">'.date('d-m-Y', strtotime($all->tanggal_upload)).'</td>';
                                                break;

                                            case 'Sudah Dibalas':
                                                # code...
                                                echo '<tr>
                                        <td>'.$no++.'</td>
                                        <td>
                                            '.$all->id_keluhan.'
                                        </td>
                                        <td><a href="index.php?url=admin/keluhan&id='.$all->id_keluhan.'">#'.html_entity_decode($all->judul).'</a></td>
                                        <td>'.$all->departemen.'</td>
                                        <td data-stats="'.$all->status.'"> <span class="badge badge-secondary badge-pill"> Terbuka </span></td>
                                        <td>'.date('d-m-Y', strtotime($all->tanggal_upload)).'</td>';
                                                break;

                                            case 'Balasan Klien':
                                                # code...
                                                echo '<tr>
                                        <td>'.$no++.'</td>
                                        <td>
                                            #'.$all->id_keluhan.'
                                        </td>
                                        <td><a href="index.php?url=admin/keluhan&id='.$all->id_keluhan.'">#'.html_entity_decode($all->judul).'</a></td>
                                        <td>'.$all->departemen.'</td>
                                        <td data-stats="'.$all->status.'"><span class="badge badge-warning badge-pill"> Menunggu Balasan </span></td>
                                        <td>'.date('d-m-Y', strtotime($all->tanggal_upload)).'</td>';
                                                break;

                                                case 'Tutup':
                                                    # code...
                                        echo '<tr>
                                        <td class="text-muted">'.$no++.'</td>
                                        <td class="text-muted">
                                            #'.$all->id_keluhan.'
                                        </td>
                                        <td class="text-muted"><a href="index.php?url=admin/keluhan&id='.$all->id_keluhan.'">#'.html_entity_decode($all->judul).'</a></td>
                                        <td class="text-muted">'.$all->departemen.'</td>
                                        <td class="text-muted" data-stats="'.$all->status.'"><span class="badge badge-secondary badge-pill text-muted"> Tutup </span></td>
                                        <td class="text-muted">'.date('d-m-Y', strtotime($all->tanggal_upload)).'</td>';
                                                    break;
                                            
                                            default:
                                                # code...
                                                echo 'Tutup';
                                                break;
                                        }
                                             echo '

                                        
                                    </tr>';
                                }
                                    endif;
                                    foreach ($show as $all) {
                                        # code...                                    
                                            switch ($all->status) {
                                            case 'Terbuka':
                                                # code...
                                                echo '<tr>
                                        <td style="font-weight:1000">'.$no++.'</td>
                                        <td style="font-weight:1000">
                                            #'.$all->id_keluhan.'
                                        </td>
                                        <td style="font-weight:1000"><a href="index.php?url=admin/keluhan&id='.$all->id_keluhan.'">'.html_entity_decode($all->judul).'</a></td>
                                        <td style="font-weight:1000">'.$all->departemen.'</td>
                                        <td data-stats="'.$all->status.'" style="font-weight:1000"> <span style="font-weight:1000" class="badge badge-danger badge-pill"> Belum Terjawab </span></td>
                                        <td style="font-weight:1000">'.date('d-m-Y', strtotime($all->tanggal_upload)).'</td>';
                                                break;

                                            case 'Sudah Dibalas':
                                                # code...
                                                echo '<tr>
                                        <td>'.$no++.'</td>
                                        <td>
                                            #'.$all->id_keluhan.'
                                        </td>
                                        <td><a href="index.php?url=admin/keluhan&id='.$all->id_keluhan.'">'.html_entity_decode($all->judul).'</a></td>
                                        <td>'.$all->departemen.'</td>
                                        <td data-stats="'.$all->status.'"> <span class="badge badge-secondary badge-pill"> Terbuka </span></td>
                                        <td>'.date('d-m-Y', strtotime($all->tanggal_upload)).'</td>';
                                                break;

                                            case 'Balasan Klien':
                                                # code...
                                                echo '<tr>
                                        <td>'.$no++.'</td>
                                        <td>
                                            #'.$all->id_keluhan.'
                                        </td>
                                        <td><a href="index.php?url=admin/keluhan&id='.$all->id_keluhan.'">'.html_entity_decode($all->judul).'</a></td>
                                        <td>'.$all->departemen.'</td>
                                        <td data-stats="'.$all->status.'"><span class="badge badge-warning badge-pill"> Menunggu Balasan </span></td>
                                        <td>'.date('d-m-Y', strtotime($all->tanggal_upload)).'</td>';
                                                break;

                                                case 'Tutup':
                                                    # code...
                                        echo '<tr>
                                        <td class="text-muted">'.$no++.'</td>
                                        <td class="text-muted">
                                            #'.$all->id_keluhan.'
                                        </td>
                                        <td class="text-muted"><a href="index.php?url=admin/keluhan&id='.$all->id_keluhan.'">'.html_entity_decode($all->judul).'</a></td>
                                        <td class="text-muted">'.$all->departemen.'</td>
                                        <td class="text-muted" data-stats="'.$all->status.'"><span class="badge badge-secondary badge-pill text-muted"> Tutup </span></td>
                                        <td class="text-muted">'.date('d-m-Y', strtotime($all->tanggal_upload)).'</td>';
                                                    break;
                                            
                                            default:
                                                # code...
                                                echo 'Tutup';
                                                break;
                                        }
                                             echo '

                                        
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

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Laporan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <label>Dari Tanggal :</label>
                <input type="date" name="strdate" class="form-control">
            <br>
            <label>Sampai Tanggal :</label>
                <input type="date" name="enddate" class="form-control">
            </div>
                <div class="modal-footer">
                    <a class="btn btn-success float-right addUser" style="color:white;" href="index.php?url=admin/print">Cetak</a>
                </div>
            </div>
        </div>
    </div>