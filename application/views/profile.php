<section class="content" style="padding: 20px 5px;">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Profile</h2>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            <img src="<?= base_url('uploadfile/').$user['foto'] ?>" alt="AdminBSB - Profile Image" height="120" width="120"/>
                        </div>
                        <div class="content-area">
                            <h3><?= $user['nama']; ?></h3>
                            <p><?= $user['jabatan']; ?></p>
                            <p><?php if ($user['role']==3) { ?>
                              Programa 1
                            <?php } elseif ($user['role']==2) { ?>
                              Reporter
                           <?php  }else { ?>
                              Administrator
                            <?php } ?>
                            </p>
                        </div>
                    </div>
                    <div class="card card-about-me">
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        Email
                                    </div>
                                    <div class="content">
                                        <?= $user['email'] ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        No hp
                                    </div>
                                    <div class="content">
                                         <?= $user['no_hp'] ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Alamat
                                    </div>
                                    <div class="content">
                                         <?= $user['alamat'] ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation"  class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                    <li role="presentation"><a href="#change_username_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Username</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in  active" id="profile_settings">
                                        <form action="<?= base_url('login/editprofile') ?>" id="form_validation" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="nama" class="col-sm-2 control-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="id_user Pengguna" value="<?= $user['id_user'] ?>" required>
                                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pengguna" value="<?= $user['nama'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user['email'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_hp" class="col-sm-2 control-label">Nomor HP</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" value="<?= $user['no_hp'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat" class="col-sm-2 control-label">alamat</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $user['alamat'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="foto" class="col-sm-2 control-label">Foto Profile</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-line">
                                                            <input type="file" class="form-control" id="foto" name="foto">
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

                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form action="<?= base_url('login/editPassword') ?>" id="form_validation" method="POST" class="form-horizontal">
                                           
                                            <div class="form-group form-float">
                                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="id_user Pengguna" value="<?= $user['id_user'] ?>" required>
                                                        <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" value="<?= $user['password'] ?>" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                                                        <?= form_error('password','<small class="text-danger pl-3 ">','</small>');?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="New Password (Confirm)">
                                                        <?= form_error('password2','<small class="text-danger pl-3 ">','</small>');?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_username_settings">
                                        <form action="<?= base_url('login/editUsername') ?>" id="form_validation" method="POST" class="form-horizontal">
                                            <div class="form-group form-float">
                                                <label for="newUsername" class="col-sm-3 control-label">Username</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                         <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="id_user Pengguna" value="<?= $user['id_user'] ?>" required>
                                                        <input type="text" class="form-control" id="usernamee" name="usernamee" placeholder="New Username" value="<?= $user['username'] ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <label for="newUsername" class="col-sm-3 control-label">New Username</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                         <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="id_user Pengguna" value="<?= $user['id_user'] ?>" required>
                                                        <input type="text" class="form-control" id="username" name="username" placeholder="New Username">
                                                        <?= form_error('username','<small class="text-danger pl-3 ">','</small>');?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>