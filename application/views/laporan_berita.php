<section class="content" style="padding: 20px 5px;">
    <div class="container-fluid">
        <div class="block-header">
            <h2>LAPORAN BERITA</h2>
        </div>
        
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header align-center">
                        <h2 style="margin-bottom: 10px;">
                        <b>halaman laporan berita</b>
                        </h2>
                    </div>
                    <div  class="body">
                        <?php if($this->session->userdata('role') == 2){ ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Berita</th>
                                        <th>File laporan Berita</th>
                                        <th>Ringkasan Berita</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Berita</th>
                                    <th>File laporan Berita</th>
                                    <th>Ringkasan Berita</th>
                                    <th>Status</th>
                                    
                                </tr>
                                </tfoot>
                                <tbody>
                                    
                                    <?php
                                    $no=1;
                                    foreach($query->result() as $q) { ?>
                                    
                                    <tr id=<?= $q->id_user; ?>>
                                        <td><?= $no++ ?></td>
                                        <td><?= $q->tanggal ?></td>
                                        <td><?= $q->nama ?></td>
                                        <td><?= $q->berita ?></td>
                                        <td><audio controls>
                                            <source src="<?= base_url('uploadfile/').$q->file_laporan ?>" type="audio/mpeg">
                                            Browsermu tidak mendukung tag audio, upgrade donk!
                                        </audio></td>
                                        <td><?= $q->ringkasan_laporan ?></td>
                                        <td><?php if ($q->status == 0) {?>
                                            <a class="btn bg-amber waves-effect  waves-float"
                                                href="#">Menunggu
                                            </a>
                                            <?php } else {?>
                                            <a class="btn bg-blue waves-effect  waves-float"
                                                href="#">diproses
                                            </a>
                                        <?php } ?></td>
                                        
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php } ?>
                        <?php if($this->session->userdata('role') == 1){ ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal laporan masuk</th>
                                        <th>Reporter</th>
                                        <th>Berita</th>
                                        <th>File laporan Berita</th>
                                        <th>Ringkasan Berita</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal laporan masuk</th>
                                    <th>Reporter</th>
                                    <th>Berita</th>
                                    <th>File laporan Berita</th>
                                    <th>Ringkasan Berita</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </tfoot>
                                <tbody>
                                    
                                    <?php
                                    $no=1;
                                    foreach($query->result() as $q) { ?>
                                    
                                    <tr id=<?= $q->id_user; ?>>
                                        <td><?= $no++ ?></td>
                                        <td><?= $q->tanggal ?></td>
                                        <td><?= $q->nama ?></td>
                                        <td><?= $q->berita ?></td>
                                        <td><audio controls>
                                            <source src="<?= base_url('uploadfile/').$q->file_laporan ?>" type="audio/mpeg">
                                            Browsermu tidak mendukung tag audio, upgrade donk!
                                        </audio></td>
                                        <td><?php if($q->ringkasan_laporan == null) {  ?>
                                            <a class="btn bg-blue  waves-effect  waves-float"
                                                href="<?= base_url('welcome/update_laporan_berita/').$q->id_laporan_berita?>">Isi Ringkasan Berita
                                            </a><?php }else{ ?>
                                            <a href="<?= base_url('welcome/update_laporan_berita/').$q->id_laporan_berita?>"><p class="col-teal">Lihat Ringkasan Berita</p></a>
                                            <?php } ?>
                                        </td>
                                        
                                        <td><a class="btn bg-lime btn-circle waves-effect waves-circle waves-float"
                                            href=""data-toggle="modal" data-target="#editModal-<?=$q->id_laporan_berita?>"><i class="material-icons " >create</i>
                                        </a>
                                        <a  class="btn bg-red btn-circle waves-effect waves-circle waves-float  tombol-hapus"  href="<?= base_url('welcome/hapus_laporan_berita/').$q->id_laporan_berita?> "><i class="material-icons">delete_forever</i>
                                        </a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editModal-<?=$q->id_laporan_berita?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="largeModalLabel">Edit laporan berita</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form_validation" action="<?= base_url('welcome/edit_laporan_berita/').$q->id_laporan_berita?>" method="POST" >
                                                    <div class="form-group">
                                                        <label for="nama" class="col-sm-2 control-label">Nama Reporter</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pengguna" value="<?= $q->nama ?>" required readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="berita" class="col-sm-2 control-label">Berita</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="radio" value="Warta Daerah" name="gender" id="male" class="with-gap"  <?= $q->berita == 'Warta Daerah' ? 'checked=""' : '' ?>>
                                                                <label for="male">Warta Daerah</label>
                                                                <input type="radio" value="Warta Olahraga" name="gender" id="female" class="with-gap" <?= $q->berita == 'Warta Olahraga' ? 'checked=""' : '' ?>>
                                                                <label for="female" class="m-l-20">Warta Olahraga</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line" >
                                                                <input type="date" class="datepicker form-control" id="tanggal" name="tanggal" placeholder="Tanggal" value="<?= $q->tanggal ?>" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" class="btn btn-danger">Update</button>
                                                        </div>
                                                    </div>
                                                    
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>