<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="page-header">
                <div class="ibox flex-1">
                    <div class="ibox-body">
                        <div class="flexbox">
                            <div class="flexbox-b">
                                <div class="ml-5 mr-5">
                                    <?php 
                                            foreach($showprof as $profiles){
                                            $idneiku = $profiles->id_user;
                                            echo'
                                    <img class="img-circle" src="./views/client/assets/img/users/'.$profiles->imgdir.'" alt="'.$profiles->name.'" width="110" />
                                </div>
                                <div>
                                    
                                    <h4>'.$profiles->name.'</h4>
                                    <div class="text-muted font-13 mb-3">
                                        <span class="mr-3"><i class="ti-location-pin mr-2"></i>'.$profiles->alamat.'</span>
                                        <span><i class="ti-calendar mr-2"></i>'.$profiles->tgl_lahir.'</span>
                                    </div>
                                    <div>
                                        <span class="mr-3">
                                            <span class="badge badge-primary badge-circle mr-2 font-14" style="height:30px;width:30px;"><i class="fa fa-user-o"></i></span>'.$profiles->position.'</span>
                                    </div>';
                                }
                                    ?>
                                </div>
                            </div>
                            <div class="d-inline-flex">
                                <div class="px-4 text-center">
                                    <div class="text-muted font-13">KELUHAN</div>
                                    <div class="h2 mt-2"><?=$many;?></div>
                                </div>
                                <div class="px-4 text-center">
                                    <div class="text-muted font-13">TERSELESAIKAN</div>
                                    <div class="h2 mt-2"><?=$smany;?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs tabs-line m-0 pl-5 pr-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab-1-1" data-toggle="tab">Ikhtisar</a>
                        </li>
                        <?php
                            if($idneiku == $_SESSION['id']){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-1-2" data-toggle="tab">Pengaturan</a>
                            <?php
                            }
                            ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-1-3" data-toggle="tab"> Riwayat Keluhan </a>
                        </li>
                    </ul>
                </div>
            </div>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="tab-1-1">
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="ibox">
                           <div class="ibox-body">
                            <h5 class="font-strong mb-4">INFORMASI UMUM</h5>
                            <?php
                                    foreach($showprof as $sip){
                                        echo'
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">Full Name:</div>
                                    <div class="col-6">'.$sip->name.'</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">Tanggal Lahir:</div>
                                    <div class="col-6">'.$sip->tgl_lahir.'</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">City:</div>
                                    <div class="col-6">'.$sip->alamat.'</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">Address:</div>
                                    <div class="col-6">Jakarta Utara</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">Phone:</div>
                                    <div class="col-6">'.$sip->phone.'</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">Email:</div>
                                    <div class="col-6">'.$sip->email.'</div>
                                </div>
                            </div>';
                        }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="ibox">
                            <div class="ibox-body">
                                <h5 class="font-strong mb-4">BIOGRAFI</h5>
                                <p><?php foreach($showprof as $bio){ echo $bio->biografi; }?></p>
                            </div>
                        </div>
                        <div class="ibox" style="min-height:412px">
                            <div class="ibox-body">
                                <h5 class="font-strong mb-4">KELUHAN</h5>
                                <ul class="timeline">
                                    <?php
                                    foreach ($showkel as $datkel){ 
                                  
                                  echo '<li class="timeline-item">
                                        <a href="index.php?url=keluhan&id='.$datkel->id_keluhan.'"><span class="timeline-point"></span>'.html_entity_decode($datkel->judul).'</a><small class="float-right text-muted ml-2 nowrap">'.$datkel->tanggal_upload.'</small></li>';
                                }
                                ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-1-2">
                <div class="page-content fade-in-up">
                    <form action="index.php?url=profile/edit" method="post" enctype="multipart/form-data">
                    <div class="ibox">
                        <div class="ibox-body">
                            <div class="row">
                                <?php
                                    foreach($showprof as $edited){
                                        ?>
                                        <input type="hidden" name="idnea" value="<?=$edited->id_user?>">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label>Full Name</label>
                                        <input class="form-control" name="name" type="text" value="<?php echo $edited->name ?>" placeholder="Enter Full Name">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Email</label>
                                        <input class="form-control" type="text" name="email" value="<?php echo $edited->email ?>" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Date of Birth</label>
                                        <input class="form-control" name="tgl" type="date" value="<?php echo $edited->tgl_lahir ?>" placeholder="Enter Date of Birth">
                                        <span class="help-block">Please Enter your date of birth.</span>
                                    </div>
                                <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="mt-1">
                                    <label class="radio radio-inline radio-grey radio-primary">
                                        <input type="radio" name="d" value="Pria" checked>
                                        <span class="input-span"></span>Pria</label>
                                    <label class="radio radio-inline radio-grey radio-primary">
                                        <input type="radio" name="d" value="Wanita">
                                        <span class="input-span"></span>Wanita</label>
                                    <label class="radio radio-inline radio-grey radio-primary">
                                        <input type="radio" name="d" value="Lainnya">
                                        <span class="input-span"></span>Lainnya</label>
                                </div>
                                <div class="mt-2">
                                    <input type="hidden" name="gbr" value="<?=$edited->imgdir?>">
                                    <input type="file" class="form-control" name="uploed" accept="image/*">
                                </div>
                            </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label>Location</label>
                                        <div class="input-group-icon input-group-icon-left">
                                            <span class="input-icon input-icon-left"><i class="ti-location-pin font-16"></i></span>
                                            <input class="form-control" type="text" name="alamat" value="<?php echo $edited->alamat ?>" placeholder="Enter Location">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Phone number</label>
                                        <input class="form-control" type="text" name="nohp" value="<?php echo $edited->phone ?>" placeholder="Enter Phone">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Biografi</label>
                                        <div class="input-group-icon input-group-icon-left">
                                            <textarea id="biograph" name="biografi">
                                                <?php echo $edited->biografi ?>                                                
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                             <div class="ibox-footer">
                                <button class="btn btn-primary mr-2" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>

            <div class="tab-pane fade text-center" id="tab-1-3">
                <div class="ibox fade-in-up">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-4" id="riw">RIWAYAT KELUHAN</h5>
                        <div class="flexbox mb-4">
                            <div class="flexbox">
                                <label class="mb-0 mr-2">Status :</label>
                                <select class="selectpicker show-tick form-control" id="type-filter" title="Please select" data-style="btn-solid" data-width="150px">
                                    <option value="">All</option>
                                    <option value="Terbuka" id="1">Terbuka</option>
                                    <option value="Sudah Dibalas" id="2">Sudah Dibalas</option>
                                    <option value="Balasan Klien" id="3">Balasan Klien</option>
                                    <option value="Tutup" id="4">Tutup</option>
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
                                        <th>#</th>
                                        <th>ID Keluhan</th>
                                        <th>Judul</th>
                                        <th>Departemen</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($showall as $col){
                                        $upload = $col->tanggal_upload;
                                        switch ($col->status) {
                                            case 'Terbuka':
                                                # code...
                                                echo '
                                            <tr>
                                                <td>'.$no++.'</td>
                                                <td><a href="index.php?url=keluhan&id='.$col->id_keluhan.'">#'.$col->id_keluhan.'</a></td>
                                                <td>'.html_entity_decode($col->judul).'</td>
                                                <td>'.$col->departemen.'</td>
                                                <td><span class="badge badge-primary badge-pill">'.$col->status.'</span></td>
                                                <td> '.date("d-m-Y", strtotime($upload)).' </td>
                                            </tr>
                                                ';
                                                break;
                                            case 'Sudah Dibalas':
                                                # code...
                                                echo '
                                            <tr>
                                                <td>'.$no++.'</td>
                                                <td><a href="index.php?url=keluhan&id='.$col->id_keluhan.'">#'.$col->id_keluhan.'</a></td>
                                                <td>'.html_entity_decode($col->judul).'</td>
                                                <td>'.$col->departemen.'</td>
                                                <td><span class="badge badge-warning badge-pill">'.$col->status.'</span></td>
                                                <td> '.date("d-m-Y", strtotime($upload)).' </td>
                                            </tr>
                                                ';
                                                break;
                                            case 'Balasan Klien':
                                                # code...
                                                echo '
                                            <tr>
                                                <td>'.$no++.'</td>
                                                <td><a href="index.php?url=keluhan&id='.$col->id_keluhan.'">#'.$col->id_keluhan.'</a></td>
                                                <td>'.html_entity_decode($col->judul).'</td>
                                                <td>'.$col->departemen.'</td>
                                                <td><span class="badge badge-info badge-pill">'.$col->status.'</span></td>
                                                <td> '.date("d-m-Y", strtotime($upload)).' </td>
                                            </tr>
                                                ';
                                                break;
                                            
                                            default:
                                                # code...
                                                echo '
                                            <tr class="text-muted">
                                                <td>'.$no++.'</td>
                                                <td><a href="index.php?url=keluhan&id='.$col->id_keluhan.'">#'.$col->id_keluhan.'</a></td>
                                                <td>'.html_entity_decode($col->judul).'</td>
                                                <td>'.$col->departemen.'</td>
                                                <td><span class="badge badge-secondary badge-pill">'.$col->status.'</span></td>
                                                <td> '.date("d-m-Y", strtotime($upload)).' </td>
                                            </tr>
                                                ';
                                                break;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>

        </div>
    </div>
</div>
</div>

            <!-- END PAGE CONTENT-->