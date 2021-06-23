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
                        <div style="margin-bottom: 25px;"> <a href="<?= base_url('welcome/tambah_pengguna') ?>" type="button" class="btn bg-blue waves-effect">
                            <i class="material-icons">save</i>
                            <span>Tambah Pengguna</span>
                        </a> </div>
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
                                        <td><?= $q->role ?></td>
                                        <td><a href="<?= base_url('uploadfile/').$q->foto; ?>" target="_blank"><img src="<?= base_url('uploadfile/').$q->foto ?>" style="width: 100px; height: 100px;"></a></td>
                                        
                                        <td><a class="btn bg-lime btn-circle waves-effect waves-circle waves-float"
                                            href="<?= base_url('welcome/edit_pengguna/').$q->id_user?> "><i class="material-icons " >create</i>
                                        </a>
                                        <a  class="btn bg-red btn-circle waves-effect waves-circle waves-float  tombol-hapus"  href="<?= base_url('welcome/hapus_pengguna/').$q->id_user?> "><i class="material-icons">delete_forever</i>
                                        </a>
                                    </td>
                                </tr>
                                
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