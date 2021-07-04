<section class="content" style="padding: 20px 5px;">
    <div class="container-fluid">
        <div class="block-header">
            <h2>WARTA BERITA</h2>
        </div>
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari</th>
                                        <th>Tanggal</th>
                                        <th>Pukul</th>
                                        <th>Berita</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                        <th>No</th>
                                        <th>Hari</th>
                                        <th>Tanggal</th>
                                        <th>Pukul</th>
                                        <th>Berita</th>
                                        <th>Action</th>
                                    
                                </tr>
                                </tfoot>
                                <tbody>
                                    
                                    <?php
                                    $no=1;
                                    foreach($query->result() as $q) { ?>
                                    
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $q->hari ?></td>
                                        <td><?= $q->tanggal ?></td>
                                        <td><?= $q->pukul ?></td>
                                        <td><?= $q->status ?></td>
                                        <td>
                                            <a href=""><p class="col-teal">Lihat Berita</p></a>
                                            
                                        </td>
                                        
                                        <td><a class="btn bg-lime btn-circle waves-effect waves-circle waves-float"
                                            href=""data-toggle="modal" data-target="#editModal-<?=$q->id_warta_berita?>"><i class="material-icons " >create</i>
                                        </a>
                                        <a  class="btn bg-red btn-circle waves-effect waves-circle waves-float  tombol-hapus"  href=""><i class="material-icons">delete_forever</i>
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
        </div>
    </div>
</section>