<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="ibox">
                            <div class="ibox-body">
                            <h5><label for="keluhan">Tulis Keluhan Anda :</label></h5>
                            <form id="postForm" action="index.php?url=keluhan/action&id=<?=$ide?>" method="post" enctype="multipart/form-data" onsubmit="return postForm()">
                            <input type="text" class="form-control" name="titles" placeholder="Judul" required>
                            <div class="row mt-3">
                                <div class="col-xl-6">
                                    <select name="departemen" class="form-control" >
                                        <option>Departemen</option>
                                        <?php
                                        foreach($show as $dep){
                                        echo '
                                        <option value="'.$dep->id_departemen.'">'.$dep->departemen.'</option>';
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="col-xl-6">
                                    <label class="btn btn-danger file-input" style="width: 100%">
                                        <span class="btn-icon">
                                            <i class="la la-upload"></i>
                                            Pilih Foto
                                        </span>
                                        <input type="file" name="file" accept="image/*">
                                    </label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-xl-12 ">
                                    <textarea id="summernote" name="keluhan" ></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-top:10px;"><i class="fa fa-pencil" aria-hidden="true"></i> Posting </button>
                        </form>
                            </div>
                        </div>
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Keluhan Terakhir</div>
                            </div>
                            <div class="ibox-body" style="">
                                <ul class="media-list media-list-divider mr-2 sekrol" style="max-height: 371px;">
                                    <?php
                                    if(count($showfor) > 0){
                                    foreach($showfor as $datall){
                                        echo '
                                    <li class="media align-items-center">
                                        <div class="media-body d-flex align-items-center">
                                            <div class="flex-1">
                                                <div class="media-heading"><a href="index.php?url=keluhan&id='.$datall->id_keluhan.'">'.html_entity_decode($datall->judul).'</a></div>
                                                <p class="text-muted font-13">'.html_entity_decode(substr($datall->deskripsi, 0, 300)).'</p>
                                                <div class="d-flex align-items-center font-13">
                                                    <img class="img-circle mr-2" src="./views/client/assets/img/users/'.$datall->imgdir.'" alt="image" width="22" />
                                                    <a class="mr-2 text-success" href="index.php?url=profile&id='.$datall->id_user.'">'.$datall->name.'</a>
                                                    <span class="text-muted">'.$datall->tanggal_upload.'</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>';
                                }
                            }else{
                                echo 'Belum Ada Keluhan Masuk';
                            }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Keluhan Terakhir Anda</div>
                            </div>
                            <div class="ibox-body">
                                <ul class="media-list media-list-divider mr-2 sekrol" style="max-height: 800px;">
                            <?php
                                $id = $_SESSION['id'];
                                if(count($showall) > 0){
                                foreach ($showall as $daftar) {
                                echo'
                                    <li class="media align-items-center">
                                        <div class="media-body d-flex align-items-center">
                                            <div class="flex-1">
                                                <div class="ibox">
                                                    <div class="ibox-head">
                                                        <div class="ibox-title">
                                                        <a href="index.php?url=keluhan&id='.$daftar->id_keluhan.'">'.html_entity_decode(substr($daftar->judul, 0, 35)).'...</a></div><span class="badge badge-info badge-pill">'.$daftar->status.'</span>
                                                    </div>
                                                    <div class="ibox-body">
                                                        <small class="text-muted">'.html_entity_decode($daftar->deskripsi).'</small>
                                                        <div class="d-flex align-items-center mt-3">
                                                            <img class="img-circle mr-2" src="./views/client/assets/img/users/'.$daftar->imgdir.'" alt="image" width="18" />
                                                            <a class="mr-2 text-success" href="javascript:;">'.$daftar->name.'</a>
                                                            <span class="text-muted">'.$daftar->tanggal_upload.'</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>';
                                }
                            }else{
                                echo '<h3 class="text-muted">Anda Belum Memiliki Keluhan</h3>';
                            }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

