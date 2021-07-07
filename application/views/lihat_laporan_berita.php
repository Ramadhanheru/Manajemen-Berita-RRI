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
                        <b>halaman laporan berita</b>
                        </h2>
                    </div>
                    <div  class="body">
                        <form id="form_validation" action="" method="POST" >
                            <textarea id="ckeditor" name="ringkasan_laporan" required readonly>
                            <?= $query['ringkasan_laporan'] ?>
                            </textarea>
                            <?= form_error('ringkasan_laporan','<small class="text-danger pl-3 ">','</small>');?>
                            <a class="btn btn-lg btn-warning waves-effect"  href="<?= base_url('welcome/warta_berita') ?>">Kembali</a>
                            <button class="btn btn-lg btn-primary waves-effect" type="submit">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>