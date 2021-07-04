<section class="content" style="padding: 20px 5px;">
    <div class="container-fluid">
        <div class="block-header">
            <h2>UPLOAD LAPORAN BERITA</h2>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header align-center">
                        <h2 style="margin-bottom: 10px;">
                        <b>halaman upload laporan berita</b>
                        </h2>
                    </div>
                    <div  class="body">
                        <form action="<?= base_url('reporter/tambah_laporan_berita') ?>" id="form_validation" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama" class="col-sm-2 control-label">Nama Reporter</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="id_user Pengguna" value="<?= $user['id_user'] ?>" required>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pengguna" value="<?= $user['nama'] ?>" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="berita" class="col-sm-2 control-label">Berita</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="radio" value="Warta Daerah" name="gender" id="male" class="with-gap">
                                        <label for="male">Warta Daerah</label>
                                        <input type="radio" value="Warta Olahraga" name="gender" id="female" class="with-gap">
                                        <label for="female" class="m-l-20">Warta Olahraga</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <div class="form-line" >
                                        <input type="date" class="datepicker form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="foto" class="col-sm-2 control-label">Laporan Berita</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="file" class="form-control" id="file_laporan" name="file_laporan" required="">
                                    </div>
                                    <p class=" font-italic col-red">*file berupa .mp3</p>
                                </div>
                            </div>
                             <!-- <audio controls>
                                <source src="../uploadfile/Dan Lebowitz - Birds in Flight (1).mp3" type="audio/mpeg">
                                Browsermu tidak mendukung tag audio, upgrade donk!
                              </audio> -->
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>