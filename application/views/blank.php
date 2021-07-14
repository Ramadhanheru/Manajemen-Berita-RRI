<?php if ($this->session->userdata('role')==3 || $this->session->userdata('role')==4) { ?>
   <section class="content" style="padding: 20px 5px;">
    <div class="container-fluid">
        <div class="block-header">
            <h2>INFO DATA</h2>
        </div>
       <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-teal hover-zoom-effect hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">wifi_tethering</i>
                    </div>
                    <div class="content">
                        <div class="text">Jumlah Warta Berita Daerah yang telah disiarkan</div>
                        <div class="number count-to" data-from="0" data-to="<?= $total1; ?>" data-speed="2000" data-fresh-interval="20"><?= $total1; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-teal hover-zoom-effect hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">wifi_tethering</i>
                    </div>
                    <div class="content">
                        <div class="text">Jumlah Warta Berita Olahraga yang telah disiarkan</div>
                        <div class="number count-to" data-from="0" data-to="<?= $total2; ?>" data-speed="2000" data-fresh-interval="20"><?= $total2; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-light-blue hover-zoom-effect hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">equalizer</i>
                    </div>
                    <div class="content">
                        <div class="text">Total Warta Berita</div>
                        <div class="number count-to" data-from="0" data-to="<?= $total3 ?>" data-speed="2000" data-fresh-interval="20"><?= $total3 ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-zoom-effect  hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">archive</i>
                    </div>
                    <div class="content">
                        <div class="text">Total warta berita masuk</div>
                        <div class="number count-to" data-from="0" data-to="<?= $total4 ?>
                        " data-speed="2000" data-fresh-interval="20"><?= $total4 ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } else { ?>
  <section class="content" style="padding: 20px 5px;">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header align-center">
                        <h2 style="margin-bottom: 10px;">
                        <b>halaman dashboard</b>
                        </h2>
                    </div>
                    <div  class="body">
                        <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">
                        
                            <div class="panel panel-col-cyan">
                                <div class="panel-heading" role="tab" id="headingTwo_17">
                                    <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseTwo_17" aria-expanded="false"
                                        aria-controls="collapseTwo_17">
                                        <i class="material-icons">cloud_download</i> PRINSIP LEMBAGA PENYIARAN PUBLIK:
                                    </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo_17" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo_17">
                                    <div class="panel-body">
                                        <ol>
                                            <li>
                                                <p>LPP ADALAH LEMBAGA PENYIARAN UNTUK SEMUA WARGA NEGARA</p>
                                            </li>
                                            <li>
                                                <p>SIARANNYA HARUS MENJANGKAU SELURUH WILAYAH NEGARA</p>
                                            </li>
                                            <li>
                                                <p>SIARANNYA HARUS MEREFLEKSIKAN KEBERAGAMAN</p>
                                            </li>
                                            <li>
                                                <p>SIARANNYA HARUS BERBEDA DG LEMBAGA PENYIARAN LAINNYA</p>
                                            </li>
                                            <li>
                                                <p>LPP HRS MENEGAKKAN INDEPENDENSI DAN NETRALITAS</p>
                                            </li>
                                            <li>
                                                <p>SIARANNYA HARUS BERVARIASI DAN BERKUALITAS TINGGI</p>
                                            </li>
                                            <li>
                                                <p>MENJADI&nbsp;<em>FLAG CARRIER</em>&nbsp;DARI BANGSA INDONESIA</p>
                                            </li>
                                            <li>
                                                <p>MENCERMINKAN&nbsp;<em>IDENTITAS BANGSA</em></p>
                                            </li>
                                            <li>
                                                <p>PEREKAT DAN PEMERSATU BANGSA</p>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-col-teal">
                                <div class="panel-heading" role="tab" id="headingThree_17">
                                    <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseThree_17" aria-expanded="false"
                                        aria-controls="collapseThree_17">
                                        <i class="material-icons">contact_phone</i> Visi LPP RRI
                                    </a>
                                    </h4>
                                </div>
                                <div id="collapseThree_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_17">
                                    <div class="panel-body">
                                        <p><strong><big>&quot;Menjadikan LPP RRI radio berjaringan terluas, pembangun karakter bangsa, berkelas dunia&quot;</big></strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-col-orange">
                                <div class="panel-heading" role="tab" id="headingFour_17">
                                    <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseFour_17" aria-expanded="false"
                                        aria-controls="collapseFour_17">
                                        <i class="material-icons">folder_shared</i> Misi LPP RRI
                                    </a>
                                    </h4>
                                </div>
                                <div id="collapseFour_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour_17">
                                    <div class="panel-body">
                                        <ol>
                                            <li>
                                                <p>Memberikan pelayanan informasi terpecaya yang dapat menjadi acuan dan ssarana kontrol sosial masyarakat dengan memperhatikan kode etik jurnalistik/kode etik penyiaran.</p>
                                            </li>
                                            <li>
                                                <p>Mengembangkan siaran pendidikan untuk mencerahkan, mencerdaskan, dan memberdayakan serta mendorong kreatifitas masyarakat dalam kerangka membangun karaktek bangsa.</p>
                                            </li>
                                            <li>
                                                <p>Menyelenggarakan siaran yang bertujuan menggali, melestarikan dan mengembangkan budaya bangsa, memberikan hiburan yang sehat bagi keluarga, membentuk budi pekerti dan jati diri bangsa di tengah arus globalisasi.</p>
                                            </li>
                                            <li>
                                                <p>Menyelenggarakan program siaran berperspektif gender yang sesuai dengan budaya bangsa dan melayani kebutuhan kelompok minoritas.</p>
                                            </li>
                                            <li>
                                                <p>Memperkuat program siaran di wilayah perbatasan untuk menjaga kedaulatan NKRI</p>
                                            </li>
                                            <li>
                                                <p>Meningkatkan kualitas siaran luar negeri dengan program siaran yang mencerminkan politik negara dan citra positif bangsa.</p>
                                            </li>
                                            <li>
                                                <p>Meningkatkan partisipasi publik dalam proses penyelenggaraan siaran mulai dari tahap perencanaan, pelaksanaan, hingga evaluasi program siaran.</p>
                                            </li>
                                            <li>
                                                <p>Meningkatkan kualitas audio dan memperluas jangkauan siaran secara nasional dan internasional dengan mengoptimalkan sumberdaya teknologi yang ada dan mengadaptasi perkembangan teknologi penyiaran serta mengefisienkan pengelolaan operasional maupun pemeliharaan perangkat teknik.</p>
                                            </li>
                                            <li>
                                                <p>Mengembangkan organisasi yang dinamis, efektif, dan efisien dengan sistem manajemen sumber daya (SDM, keuangan, asset, informasi dan operasional) berbasis teknologi informasi dalam rangka mewujudkan tata kelola lembaga yang baik ( good corporate governance)</p>
                                            </li>
                                            <li>
                                                <p>Meningkatkan kualitas siaran luar negeri dengan program siaran yang mencerminkan politik negara dan citra positif bangsa.</p>
                                            </li>
                                            <li>
                                                <p>Memberikan pelayanan jasa-jasa yang terkait dengan penggunaan dan pemanfaatan asset negara secara profesional dan akuntabel serta menggali sumber-sumber penerimaan lain untuk mendukung operasional siaran dan meningkatkan kesejahteraan pegawai.</p>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
