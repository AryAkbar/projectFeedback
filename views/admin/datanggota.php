<div class="content-wrapper">
                <div class="page-heading">
                    <h1 class="page-title">Data Pengguna KRITIKKU</h1>
                </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-4">DATA PENGGUNA</h5>
                        <div class="flexbox mb-4">
                            <div class="input-group-icon input-group-icon-left mr-3 float-right">
                                <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                                <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Search ...">
                            </div>
                            <button class="btn btn-success float-right addUser" data-toggle="modal" data-target="#modalTambah"><i class="ti-plus mr-2"></i> Tambah Anggota </button>
                        </div>
                        <div class="table-responsive row">
                            <table class="table table-bordered table-hover table-fixed">
                                <thead class="thead-default thead-lg">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">ID Pengguna</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Tanggal Lahir</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody id="ceeeb">
                                    <?php
                                    $no = 1;
                                    foreach ($all as $key) {
                                        # code...
                                        echo '
                                        <tr>
                                            <td>'.$no++.'</td>
                                            <td>#'.$key->id_user.'</td>
                                            <td>'.$key->name.'</td>
                                            <td>'.$key->tgl_lahir.'</td>
                                            <td>'.$key->alamat.'</td>
                                            <td>'.$key->email.'</td>
                                            <td><button class="btn btn-danger deleteUser mr-2" data-toggle="modal" data-target="#modalDelete">Hapus</button><button class="btn btn-warning editUser" onclick="Edit('.$key->id_user.')" data-toggle="modal" data-target="#modalTambah">Edit</button></td>
                                        </tr>
                                        ';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalDelete">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="hapusJudul">Hapus Data Anggota SISAM</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="index.php?url=admin/user/delete" method="post">
                            <h5> Hapus Data User!? </h5>
                            <input type="hidden" name="idhp" id="hpid">
                            <button type="submit" class="btn btn-danger float-right mt-3">Delete</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalTambah">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="judule"> Tambah Data Anggota KRITIKKU </h4><button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="index.php?url=admin/user/insert&id=<?=$max?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="idneu" id="iki">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label>Full Name</label>
                                        <input class="form-control" id="name" type="text" name="name" placeholder="Enter Full Name">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Email</label>
                                        <input class="form-control" id="email" type="email" name="email" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Username</label>
                                        <input class="form-control" type="text" id="user" name="usern" placeholder="Username">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Date of Birth</label>
                                        <input class="form-control" type="date" name="tgl" id="tgljs" placeholder="Enter Date of Birth">
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
                            </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label>Location</label>
                                        <div class="input-group-icon input-group-icon-left">
                                            <span class="input-icon input-icon-left"><i class="ti-location-pin font-16"></i></span>
                                            <input class="form-control" id="alamatjs" type="text" name="alamat" placeholder="Alamat">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Phone number</label>
                                        <input class="form-control" type="text" id="nohp" name="no" placeholder="Enter Phone">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label id="pasjs">Password</label>
                                        <input class="form-control" id="passjs" type="Password" name="pass" placeholder="Password">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Posisi</label>
                                        <select name="position" class="form-control" id="poss">
                                            <option selected="true">Posisi</option>
                                            <option>Anggota</option>
                                            <option>Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Bagian</label>
                                        <select name="role" class="form-control" id="poss">
                                            <option selected="true">Bagian</option>
                                            <option value="1234">Kesiswaan</option>
                                            <option value="1235">Sarana Prasarana</option>
                                            <option value="1236">Kabid Perpustakaan</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Biografi</label>
                                        <div class="input-group-icon input-group-icon-left">
                                            <textarea name="bio" cols="50" rows="2" id="bio"></textarea>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->