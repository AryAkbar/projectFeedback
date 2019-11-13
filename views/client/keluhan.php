<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="ibox">
                            <div class="ibox-body">
                                <?php
                                foreach($show as $data){
                                    $iduser = $data->id_user;
                                    $kels = $data->status;
                                    echo '
                                <h5>'.$data->judul.'</h5>
                                '.html_entity_decode($data->deskripsi).'
                                <div class="d-flex align-items-center font-13">
                                    <img class="img-circle mr-2" src="./views/client/assets/img/users/'.$data->imgdir.'" alt="image" width="22" />
                                    <a class="mr-2 text-success" href="index.php?url=profile&id='.$iduser.'">'.$data->name.'</a>
                                    <span class="text-muted">'.$data->tanggal_upload.'</span>
                                </div>';
                            }
                                ?>
                            </div>
                        </div>
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">KOMENTAR</div>
                            </div>
                            <div class="ibox-body">
                                <ul class="media-list media-list-divider mr-2">
                                    <?php
                                    $id = $_GET['id'];
                                    if(count($showcomm)  > 0){
                                        foreach($showcomm as $daftar){
                                            ?>
                                    <li class="media align-items-center">
                                        <div class="media-body d-flex align-items-center">
                                            <div class="flex-1">
                                                <div style="text-transform:capitalize; font-13"><?=html_entity_decode($daftar->komentar)?></div>
                                                <div class="d-flex align-items-center mt-3">
                                                    <img class="img-circle mr-2" src="./views/client/assets/img/users/<?=$daftar->imgdir?>" alt="image" width="18"/>
                                                    <a class="mr-2 text-success" href="index.php?url=profile&id=<?=$daftar->id_user?>"><?=$daftar->name?></a>
                                                    <small class="text-muted"><?=$daftar->tanggal_komentar?></small> 
                                                    <?php
                                                        if($daftar->id_user == $_SESSION['id']){
                                                    ?>
                                <a class="dropdown-toggle ml-3" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item editKomen" data-toggle="modal" data-target="#ModalEdit" data-id="<?=$daftar->id_komentar?>"><i class="la la-pencil"></i>Edit</a>
                                        <a data-toggle="modal" data-target="#ModalHapus" data-id="<?=$daftar->id_komentar?>" class="dropdown-item hapusKomen"><i class="la la-trash"></i>Delete</a>
                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                }
                            }else{
                                echo "<p class='text-muted'> Jadilah Yang Pertama Mengomentari</p>";
                            }
                                    ?>
                                </ul>
                                <hr>
                                <form action="index.php?url=komentar/action&id=<?=$id?>&komentar=<?=$ide?>&user=<?=$iduser?>&status=<?=$kels?>" method="post" enctype="multipart/form-data" onsubmit="commenForm()">
                                    <textarea id="komen" class="mt-2" name="komentar"></textarea>
                                    <button class="btn btn-primary mt-3">Komentar</button>
                                </form>
                                </div>
                                    </div>
                                </div>
                    <div class="col-xl-4">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">DETAIL PESAN</div>
                                <?php
                                    if($iduser == $_SESSION['id']){
                                ?>
                                <div class="ibox-tools">
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item editKeluhan" data-toggle="modal" data-target="#ModalEdit" data-id="<?=$id?>"><i class="la la-pencil"></i>Edit</a>
                                        <a class="dropdown-item hapusKeluhan" data-toggle="modal" data-target="#ModalHapus" data-id="<?=$id?>"><i class="la la-trash"></i>Delete</a>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="ibox-body">
                                <?php
                                    foreach($show as $detail){
                                        echo'    
                                <ul class="timeline">
                                    <li class="timeline-item">
                                        <span class="timeline-point bg-primary"></span>Id Keluhan <p class="float-right text-muted ml-2">#'.$detail->id_keluhan.' </p>
                                    </li>
                                    <li class="timeline-item">
                                        <span class="timeline-point bg-primary"></span>User <p class="float-right text-muted ml-2">'.$detail->name.'</p>
                                    </li>
                                    <li class="timeline-item">
                                        <span class="timeline-point bg-primary"></span>Tanggal <p class="float-right text-muted ml-2">'.$detail->tanggal_upload.'</p> 
                                    </li>
                                    <li class="timeline-item">
                                        <span class="timeline-point bg-info"></span>Status <p class="float-right text-muted ml-2">'.$detail->status.'</p>
                                    </li>
                                     <li class="timeline-item">
                                        <span class="timeline-point bg-primary"></span>Departemen <p class="float-right text-muted ml-2">'.$detail->departemen.' </p>
                                    </li>
                                    '; 

                                    if($detail->status == "Tutup"){
                                        echo'
                                        <button class="btn btn-disable float-right"><i class="fa fa-minus-circle"></i> Tutup Keluhan </button>';
                                        }else{
                                        echo '<button class="btn btn-warning sweet-6 float-right tutupkel" data-toggle="modal" data-target="#ModalHapus" data-id="'.$detail->id_keluhan.'"><i class="fa fa-minus-circle"></i> Tutup Keluhan </button>';
                                    }
                                    echo '
                                    </li>
                                </ul>';
                            }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="modal fade" id="ModalEdit" style="overflow:scroll">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="labele">Edit Keluhan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form action="keluhan/edit/act" method="post" onsubmit="return editcomForm()" enctype="multipart/form-data">
                <input type="hidden" name="id" id="ide">
                <input type="hidden" name="idkel" id="idk">
                <label for="judul" class="jud">Judul : </label>
                <input type="text" name="judul" id="judul" class="form-control mb-3">
                <label for="edited" class="kel">Keluhan : </label>
                <textarea name="editKeluhan" class="mt-3" id="edited"></textarea>
                <button type="submit" class="btn btn-warning mt-3 float-right">Edit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="ModalHapus">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="hapuslabel">Hapus Komentar</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
             <form method="post" action="keluhan/delete/act" enctype="multipart/form-data">
                <input type="hidden" name="idnek" id="idke">
                <input type="hidden" name="idkel" id="idk" value="<?=$id?>">
                <h5 id="ulasan"> Yakin Hapus Komentar Anda? </h5>
    <div class="rating hidden">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Sangat Baik - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Sangat Baik - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Baik - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Baik - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Sedang - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Sedang - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Buruk - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Buruk - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sangat Buruk - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sangat Buruk"></label>
    </div>
    <button type="submit" class="btn btn-danger mt-3 float-right bun">Hapus</a>
        </form>
        </div>
      </div>
    </div>
  </div>
            <!-- END PAGE CONTENT-->