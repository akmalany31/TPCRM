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

            <div class="from-group row d-flex justify-content-center">

                <div class="">
                    <div class="row">
                        <div class="">
                            <img src="" class="img-thumnail">
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php if (!is_null($this->session->userdata('foto'))) { ?>
                                        <img src="<?= base_url('assets/foto/' . $this->session->userdata('foto')) ?>" id="gambar_load" class="mt-3" width="400px">
                                    <?php } else { ?>
                                        <img src="<?= base_url('assets/gambar/nofoto.png') ?>" class="mt-3" id="gambar_load" width="300px">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="preview_gambar" name="foto">

                                <label class="custom-file-label" for="customeFile">Choose Image</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="from-group row">
                <div class="col-sm-12">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="id_pelanggan" value="<?= $this->session->userdata('id_pelanggan') ?>" hidden>

                    <input type="text" name="nama_pelanggan" class="form-control" value="<?= $this->session->userdata('nama_pelanggan') ?>" require><br>
                </div>
            </div>

            <div class=" from-group row">
                <div class=" col-sm-12">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?= $this->session->userdata('email') ?>" required><br>
                </div>

                <div class=" col-sm-12">
                    <label>Password</label>
                    <input type="password" id="myInput" name="password" class="form-control" value="<?= $this->session->userdata('password') ?>" required><br>
                </div>

                <div class=" col-sm-12">
                    <label>Confirm Password</label>
                    <input type="password" id="myInput2" name="ulangi_password" class="form-control" value="<?= $this->session->userdata('password') ?>" required><br>
                </div>

            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="show" onclick="showPass()">
                <label class="form-check-label" for="show">
                    Show Password
                </label>
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

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function showPass() {
        var x = document.getElementById("myInput");
        var y = document.getElementById("myInput2");
        if (x.type === "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
</script>