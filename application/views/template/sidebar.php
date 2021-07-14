 <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar" style="top: 110px;">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url('uploadfile/').$user['foto'] ?>" width="70" height="70" alt="User" />
                </div>
                <div class="info-container"style="margin-top: -20px;">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $user['nama'] ?></div>
                    <div class="email"><?= $user['jabatan'] ?></div>
                    
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <?php if($this->session->userdata('role') == 1){ ?>
                <ul class="list"> 
                    <li class="header">MENU</li>
                     <li <?= $this->uri->segment(2) == '' ||
                            $this->uri->segment(2) == 'profile' ? 'class="active "' : '' ?>>
                        <a href="<?= base_url('welcome') ?>">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                     <li <?= $this->uri->segment(2) == 'warta_berita' ? 'class="active "' : '' ?>>
                        <a href="<?= base_url('welcome/warta_berita') ?>">
                            <i class="material-icons">wifi_tethering</i>
                            <span>Warta Berita</span>
                        </a>
                    </li>
                    <li <?= $this->uri->segment(2) == 'laporan_berita' ||
                            $this->uri->segment(2) == 'update_laporan_berita' ? 'class="active "' : '' ?>>
                        <a href="<?= base_url('welcome/laporan_berita') ?>">
                            <i class="material-icons">archive</i>
                            <span>Laporan Berita</span>
                        </a>
                    </li>
                    <?php if($this->session->userdata('id_user') == 1){ ?>
                    <li <?= $this->uri->segment(2) == 'pengguna' ? 'class="active "' : '' ?>>
                        <a href="<?= base_url('welcome/pengguna') ?>">
                            <i class="material-icons">person_pin</i>
                            <span>Pengguna</span>
                        </a>
                    </li>
                <?php } ?>
                    <li >
                        <a href="<?= base_url('login/logout') ?>">
                            <i class="material-icons">input</i>
                            <span>Log Out</span>
                        </a>
                    </li>

                   <!--  <li <?= $this->uri->segment(2) == 'grafik' ? 'class="active"' : '' ?>>
                        <a href="<?= base_url('welcome/grafik'); ?>">
                            <i class="material-icons">timeline</i>
                            <span>Grafik Titik Kerusakan</span>
                        </a>
                    </li> -->   
                </ul>
            <?php } ?>
            <?php if($this->session->userdata('role') == 2){ ?>
                <ul class="list"> 
                    <li class="header">MENU</li>
                     <li <?= $this->uri->segment(2) == '' ||
                            $this->uri->segment(2) == 'profile' ? 'class="active "' : '' ?>>
                        <a href="<?= base_url('reporter') ?>">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                     <li <?= $this->uri->segment(2) == 'laporan_berita' ? 'class="active "' : '' ?>>
                        <a href="<?= base_url('reporter/laporan_berita') ?>">
                            <i class="material-icons">collections_bookmark</i>
                            <span>Laporan Berita</span>
                        </a>
                    </li>
                    <li <?= $this->uri->segment(2) == 'upload_laporan' ? 'class="active "' : '' ?>>
                        <a href="<?= base_url('reporter/upload_laporan') ?>">
                            <i class="material-icons">file_upload</i>
                            <span>Upload Laporan Berita</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?= base_url('login/logout') ?>">
                            <i class="material-icons">input</i>
                            <span>Log Out</span>
                        </a>
                    </li>  
                </ul>
            <?php } ?>
            <?php if($this->session->userdata('role') == 3){ ?>
                 <ul class="list"> 
                    <li class="header">MENU</li>
                     <li <?= $this->uri->segment(2) == '' ||
                            $this->uri->segment(2) == 'profile' ? 'class="active "' : '' ?>>
                        <a href="<?= base_url('pro1') ?>">
                            <i class="material-icons">equalizer</i>
                            <span>Info Data </span>
                        </a>
                    </li>
                     <li <?= $this->uri->segment(2) == 'warta_berita' ? 'class="active "' : '' ?>>
                        <a href="<?= base_url('pro1/warta_berita') ?>">
                            <i class="material-icons">wifi_tethering</i>
                            <span>Warta Berita</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?= base_url('login/logout') ?>">
                            <i class="material-icons">home</i>
                            <span>Log Out</span>
                        </a>
                    </li>  
                </ul>
            <?php } ?>
             <?php if($this->session->userdata('role') == 4){ ?>
                 <ul class="list"> 
                    <li class="header">MENU</li>
                     <li <?= $this->uri->segment(2) == '' ||
                            $this->uri->segment(2) == 'profile' ? 'class="active "' : '' ?>>
                        <a href="<?= base_url('redaksi') ?>">
                            <i class="material-icons">equalizer</i>
                            <span>Info Data </span>
                        </a>
                    </li>
                     <li <?= $this->uri->segment(2) == 'warta_berita' ? 'class="active "' : '' ?>>
                        <a href="<?= base_url('redaksi/warta_berita') ?>">
                            <i class="material-icons">wifi_tethering</i>
                            <span>Warta Berita</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?= base_url('login/logout') ?>">
                            <i class="material-icons">home</i>
                            <span>Log Out</span>
                        </a>
                    </li>  
                </ul>
            <?php } ?>

            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal" style="padding: 50px 15px;">
                <div class="copyright">
                    &copy; <?= date('Y'); ?> <a href="">Manajemen-Berita RRI Application</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

          <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" >
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple" class="active">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>