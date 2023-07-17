<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Profile</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
            }

            echo form_open_multipart('pelanggan/profile');
            ?>

            <div class="from-group row">
                <div class="col-sm-12">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" value="<?= $profile['nama_pelanggan']; ?> required><br>
                </div>
            </div>

            <div class=" from-group row">
                    <div class=" col-sm-12">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" required><br>
                    </div>
                </div>

                <div class="from-group row">
                    <div class="col-sm-2">
                        <label>Picture</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="" class="img-thumnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                    <label class="custom-file-label" for="customeFile">Choose Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <div class=" form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="<?= base_url('akun') ?>" class="btn btn-success btn-sm">Kembali</a>
                </div>

            </div>

        </div>

    </div>
</div>

<?php echo form_close() ?>
</div>
</div>
</div>