<section class="content" style="padding: 20px 5px;">
    <div class="container-fluid">
        <div class="block-header">
            <h2>WARTA BERITA</h2>
        </div>
        <?= $this->session->flashdata('message') ?>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header align-center">
                        <h2 style="margin-bottom: 10px;">
                        <b>halaman warta berita</b>
                        </h2>
                    </div>
                    <div  class="body">
                        <?php if ($this->session->userdata('role')==1) {?>
                        <div class="row">
                            <div style="margin-bottom: 25px;" class="col-lg-2"> <a href="" type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#largeModal">
                                <i class="material-icons">save</i>
                                <span>Tambah Warta Berita</span>
                            </a> </div>
                            <form id="form_validation" action="<?= base_url('welcome/pdf_warta_berita') ?>" method="POST" target="_blank">
                                <div style="margin-bottom: 25px;" class="col-lg-2" style="border-radius: 2px;">
                                    
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="id_user" class="form-control show-tick" required>
                                                <?php foreach($query2->result() as $q) { ?>
                                                <option value="<?= $q->desk_editor; ?>"><?= $q->desk_editor; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-bottom: 25px;" class="col-lg-2" style="border-radius: 2px;">
                                    <div class="form-group form-float">
                                        <div class="form-line" >
                                            <input type="date" class="datepicker form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required="">
                                            
                                        </div>
                                    </div>

                                </div>
                                <div style="margin-bottom: 25px;" class="col-lg-2" style="border-radius: 2px;">
                                     <button class="btn btn-lg btn-primary waves-effect" type="submit">SUBMIT</button>
                                </div>
                                </form>
                            </div>
                        <!-- Large Size -->
                        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="largeModalLabel">Tambah Warta Berita</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_validation" action="<?= base_url('welcome/tambah_warta_berita') ?>" method="POST">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="desk_editor" value="<?= $user['nama'] ?>" readonly required>
                                                    <label class="form-label">Desk Editor</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <select name="hari" class="form-control show-tick" required>
                                                        <option selected="" value="Senin">Senin</option>
                                                        <option value="Selasa">Selasa</option>
                                                        <option value="Rabu">Rabu</option>
                                                        <option value="Kamis">Kamis</option>
                                                        <option value="Jumat">Jumat</option>
                                                        <option value="Sabtu">Sabtu</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="form-group form-float">
                                                <div class="form-line" >
                                                    <input type="date" class="datepicker form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required="">
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line" >
                                                    <input type="time" class="datepicker form-control" id="pukul" name="pukul" placeholder="pukul" required="">
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <select name="id_laporan_berita" class="form-control show-tick" data-show-subtext="true" required>
                                                        <?php foreach($query1->result() as $q) { ?>
                                                        <option value="<?= $q->id_laporan_berita ?>" data-subtext="<?=$q->nama ?>"><?=$q->ringkasan_laporan ?></option>
                                                        <?php } ?>
                                                    </select>
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
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Desk Editor</th>
                                        <th>Hari</th>
                                        <th>Tanggal</th>
                                        <th>Pukul</th>
                                        <th>Isi Berita</th>
                                        <th>Status</th>
                                        <?php if($this->session->userdata('id_user') == 1){ ?>
                                        <th>Action</th>
                                        <?php } ?>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Desk Editor</th>
                                    <th>Hari</th>
                                    <th>Tanggal</th>
                                    <th>Pukul</th>
                                    <th>Isi Berita</th>
                                    <th>Status</th>
                                    <?php if($this->session->userdata('id_user') == 1){ ?>
                                    <th>Action</th>
                                    <?php } ?>
                                    
                                </tr>
                                </tfoot>
                                <tbody>
                                    
                                    <?php
                                    $no=1;
                                    foreach($query->result() as $q) { ?>
                                    
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $q->desk_editor ?></td>
                                        <td><?= $q->hari ?></td>
                                        <td><?= $q->tanggal ?></td>
                                        <td><?= $q->pukul ?></td>
                                        <td>
                                            <?= $q->ringkasan_laporan ?>
                                        </td>
                                        <td><?php if ($q->status == 0) { ?>
                                            <button class="btn btn-danger">Menunggu disiarkan</button>
                                            <?php }else{ ?>
                                            <button class="btn btn-success">Telah Disiarkan</button>
                                        <?php } ?></td>
                                        <?php if($this->session->userdata('id_user') == 1){ ?>
                                        <td><a class="btn bg-lime btn-circle waves-effect waves-circle waves-float"
                                            href=""data-toggle="modal" data-target="#editModal-<?=$q->id_warta_berita?>"><i class="material-icons " >create</i>
                                        </a>
                                        <a  class="btn bg-red btn-circle waves-effect waves-circle waves-float  tombol-hapus"  href="<?= base_url('welcome/hapus_warta_berita/').$q->id_warta_berita?>"><i class="material-icons">delete_forever</i>
                                        </a>
                                    </td>
                                    <div class="modal fade" id="editModal-<?=$q->id_warta_berita?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="largeModalLabel">Edit Warta Berita</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="form_validation" action="<?= base_url('welcome/edit_warta_berita/').$q->id_warta_berita?>" method="POST">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" name="desk_editor" value="<?= $q->desk_editor ?>" readonly required>
                                                                <label class="form-label">Desk Editor</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" name="hari" value="<?= $q->hari ?>"  required>
                                                                <label class="form-label">Hari</label>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group form-float">
                                                            <div class="form-line" >
                                                                <input type="date" class="datepicker form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required="" value="<?= $q->tanggal ?>">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-float">
                                                            <div class="form-line" >
                                                                <input type="time" class="datepicker form-control" id="pukul" name="pukul" placeholder="pukul" required="" value="<?= $q->pukul ?>">
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
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                    <?php if ($this->session->userdata('role')==3) {?>
                    <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"  class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Menunggu Disiarkan</a></li>
                            <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Telah Disiarkan</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in  active" id="profile_settings">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Desk Editor</th>
                                                <th>Hari</th>
                                                <th>Tanggal</th>
                                                <th>Pukul</th>
                                                <th>Warta Berita</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Desk Editor</th>
                                            <th>Hari</th>
                                            <th>Tanggal</th>
                                            <th>Pukul</th>
                                            <th>Warta Berita</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                            
                                            <?php
                                            $no=1;
                                            foreach($query->result() as $q) { ?>
                                            
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $q->desk_editor ?></td>
                                                <td><?= $q->hari ?></td>
                                                <td><?= $q->tanggal ?></td>
                                                <td><?= $q->pukul ?></td>
                                                <td>
                                                    <a href="<?= base_url('pro1/pdf_warta_berita/').$q->desk_editor.'/'.$q->tanggal ?>" target="_blank"><p class="col-teal">Lihat warta berita</p></a>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('pro1/siarkan_warta_berita/').$q->desk_editor.'/'.$q->tanggal ?>" class="btn btn-info">Siarkan Warta Berita</a>
                                                    </td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Desk Editor</th>
                                                <th>Hari</th>
                                                <th>Tanggal</th>
                                                <th>Pukul</th>
                                                <th>Warta Berita</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Desk Editor</th>
                                            <th>Hari</th>
                                            <th>Tanggal</th>
                                            <th>Pukul</th>
                                            <th>Warta Berita</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                            
                                            <?php
                                            $no=1;
                                            foreach($query1->result() as $q) { ?>
                                            
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $q->desk_editor ?></td>
                                                <td><?= $q->hari ?></td>
                                                <td><?= $q->tanggal ?></td>
                                                <td><?= $q->pukul ?></td>
                                                <td>
                                                   <a href="<?= base_url('pro1/pdf_warta_berita/').$q->desk_editor.'/'.$q->tanggal ?>" target="_blank"><p class="col-teal">Lihat warta berita</p></a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success">Telah Disiarkan</button>
                                                </td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>