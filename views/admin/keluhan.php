<div class="content-wrapper">
	<div class="page-content fade-in-up">
		<div class="row">
			<div class="col-lg-8">
				<div class="ibox">
					<div class="ibox-body">
						<?php
							foreach ($postingan as $key) {
                                $gol = $key->id_user;
								# code...
								echo '<h5>'.$key->judul.'</h5>'
								.html_entity_decode($key->deskripsi).'
								<div class="d-flex align-items-center font-13 mt-3">
									<img class="img-circle mr-2" src="'.$key->imgdir.'" alt="image" width="22">
									<a class="mr-2 text-success" href="">'.$key->name.'</a>
									<span class="text-muted">'.$key->tanggal_upload.'</span>
									</div>';
							}
                        ?>
					</div>
				</div>
				<div class="ibox">
					<div class="ibox-body">
						<ul class="media-list media-list-divider mr-2">
						<?php
							$id = $_GET['id'];
							if(count($komen) > 0){
								foreach($komen as $value){
									echo'
                                    <li class="media align-items-center">
                                        <div class="media-body d-flex align-items-center">
                                            <div class="flex-1">
                                                '.html_entity_decode($value->komentar).'
                                                <div class="d-flex align-items-center mt-3">
                                                    <img class="img-circle mr-2" src="'.$value->imgdir.'" alt="image" width="18" />
                                                    <a class="mr-2 text-success" href="profile.php?id='.$value->id_user.'">'.$value->name.'</a>
                                                    <small class="text-muted">'.$value->tanggal_komentar.'</small> 
                                <a class="dropdown-toggle ml-3" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item editKomen" data-toggle="modal" data-target="#ModalEdit" data-id="'.$value->id_komentar.'"><i class="la la-pencil"></i>Edit</a>
                                        <a data-toggle="modal" data-target="#ModalHapus" data-id="'.$value->id_komentar.'" class="dropdown-item hapusKomen"><i class="la la-trash"></i>Delete</a>
                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>';
								}
							}else{
								echo "<p class='text-muted'>BELUM ADA KOMENTAR</p>";
							}
						?>
						</ul>
						<hr>
						<form action="index.php?url=admin/komentar/insert&id=<?=$id?>&komentar=<?=$ide?>&goal=<?=$gol?>" method="post" enctype="multipart/form-data" onsubmit="komenForm()">
							<div class="row">
                                <div class="col-lg-12">
                            <textarea name="komentar" id="summernote"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                            <button type="submit" class="float-right btn btn-primary">Balas</button>
						  </div>
                        </div>
                        </form>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">DETAIL PESAN</div>
                            <div class="ibox-tools">
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item editKeluhan" data-toggle="modal" data-target="#ModalEdit" data-id="<?=$id?>"><i class="la la-pencil"></i>Edit</a>
                                        <a class="dropdown-item hapusKeluhan" data-toggle="modal" data-target="#ModalHapus" data-id="<?=$id?>"><i class="la la-trash"></i>Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <?php
                                    foreach($postingan as $detail){
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
                                </ul>';
                            }
                                ?>

                            </div>
                        </div>
			</div>
		</div>
	</div>