<section class="content" style="padding: 20px 5px;">
    <div class="container-fluid">
        <div class="block-header">
            <h2>PENGGUNA</h2>
            <?= $this->session->flashdata('message');?>
        </div>
        
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header align-center">
                        <h2>
                        <b> DATA PENGGUNA</b>
                        </h2>
                    </div>
                    
                    
                    <div class="body">
                        <div style="margin-bottom: 25px;"> <a href="" type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#largeModal">
                            <i class="material-icons">save</i>
                            <span>Tambah Pengguna</span>
                        </a> </div>
                        <!-- Large Size -->
                                <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="largeModalLabel">Tambah Pengguna</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form_validation" action="<?= base_url('welcome/tambah_pengguna') ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="username" required>
                                                            <label class="form-label">Username</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="password" class="form-control" name="password" required>
                                                            <label class="form-label">Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="nama" required>
                                                            <label class="form-label">Nama</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="number" class="form-control" name="nip" required>
                                                            <label class="form-label">Nip</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="alamat" required>
                                                            <label class="form-label">Alamat</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                             <select name="jabatan" class="form-control show-tick">
                                                                <option>-- Please select Jabatan --</option>
                                                                <option value="Reporter">Reporter</option>
                                                                <option value="Editor">Editor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="number" class="form-control" name="no_hp" required>
                                                            <label class="form-label">No HP</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="email" class="form-control" name="email" required>
                                                            <label class="form-label">Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                         <label class="form-label">Foto Profile</label>
                                                        <div class="form-line">
                                                            <input type="file" class="form-control" name="foto" required>
                                                        </div>
                                                    </div>
                                                   
                                                    <button class="btn btn-lg btn-primary waves-effect" type="submit">SUBMIT</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nip</th>
                                        <th>Alamat</th>
                                        <th>Jabatan</th>
                                        <th>No Hp</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Foto Profile</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nip</th>
                                    <th>Alamat</th>
                                    <th>Jabatan</th>
                                    <th>No Hp</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Foto Profile</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </tfoot>
                                <tbody>
                                    
                                    <?php
                                    $no=1;
                                    foreach($query->result() as $q) { ?>
                                    
                                    <tr id=<?= $q->id_user; ?>>
                                        <td><?= $no++ ?></td>
                                        <td><?= $q->nama ?></td>
                                        <td><?= $q->nip ?></td>
                                        <td><?= $q->alamat ?></td>
                                        <td><?= $q->jabatan ?></td>
                                        <td><?= $q->no_hp ?></td>
                                        <td><?= $q->email ?></td>
                                        <td><?php if ($q->role == 0 && $q->jabatan =='Reporter' ) {?>
                                           <a class="btn bg-red waves-effect  waves-float"
                                            href="<?= base_url('welcome/role_aktif/').$q->id_user?> ">Tidak Aktif
                                        </a>
                                        <?php }if($q->role == 2 && $q->jabatan =='Reporter') {?>
                                            <a class="btn bg-blue waves-effect  waves-float"
                                            href="<?= base_url('welcome/role_tidak_aktif/').$q->id_user?> ">Aktif
                                        </a>
                                    <?php }if($q->role == 0 && $q->jabatan =='Editor') {?>
                                            <a class="btn bg-red waves-effect  waves-float"
                                            href="<?= base_url('welcome/role_aktif_Editor/').$q->id_user?> ">Tidak Aktif
                                        </a>
                                    <?php }if($q->role == 1 && $q->jabatan =='Editor') {?>
                                            <a class="btn bg-blue waves-effect  waves-float"
                                            href="<?= base_url('welcome/role_tidak_aktif/').$q->id_user?> ">Aktif
                                        </a>
                                       <?php } ?>
                                           </td>
                                        <td><a href="<?= base_url('uploadfile/').$q->foto; ?>" target="_blank"><img src="<?= base_url('uploadfile/').$q->foto ?>" style="width: 100px; height: 100px;"></a></td>
                                        
                                        <td><a class="btn bg-lime btn-circle waves-effect waves-circle waves-float"
                                            href=""data-toggle="modal" data-target="#editModal-<?=$q->id_user?>"><i class="material-icons " >create</i>
                                        </a>
                                        <a  class="btn bg-red btn-circle waves-effect waves-circle waves-float  tombol-hapus"  href="<?= base_url('welcome/hapus_pengguna/').$q->id_user?> "><i class="material-icons">delete_forever</i>
                                        </a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editModal-<?=$q->id_user?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="largeModalLabel">Edit Pengguna</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form_validation" action="<?= base_url('welcome/edit_pengguna/').$q->id_user?>" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="nama" value="<?= $q->nama?>"required>
                                                            <label class="form-label">Nama</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="number" class="form-control" name="nip" value="<?= $q->nip?>"required>
                                                            <label class="form-label">Nip</label>
                                                        </div>
                                                    </div>
                                                   <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="jabatan" value="<?= $q->jabatan?>"required>
                                                            <label class="form-label">Jabatan</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="alamat" value="<?= $q->alamat?>"required>
                                                            <label class="form-label">Alamat</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="number" class="form-control" name="no_hp" value="<?= $q->no_hp?>"required>
                                                            <label class="form-label">No HP</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="email" class="form-control" name="email" value="<?= $q->email?>" required>
                                                            <label class="form-label">Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                         <label class="form-label">Foto Profile</label><br>
                                                         <img src="<?= base_url('uploadfile/').$q->foto ?>" style="width: 100px; height: 100px;"><br>
                                                         <label class="form-label">Upload New Foto Profile</label>
                                                        <div class="form-line">
                                                            <input type="file" class="form-control" name="foto" >
                                                        </div>
                                                    </div>
                                                   
                                                    <button class="btn btn-lg btn-primary waves-effect" type="submit">SUBMIT</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- #END# Exportable Table -->
    </div>
</div>
</section>