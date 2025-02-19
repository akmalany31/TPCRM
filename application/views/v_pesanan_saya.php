<div class="row">
  <?php
  if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i>';
    echo $this->session->flashdata('pesan');
    echo '</h5></div>';
  }

  ?>
  <div class="col-sm-12">
    <div class="card card-primary card-outline card-tabs">
      <div class="card-header p-0 pt-1 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">
              Pesanan Diproses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">
              Dikirim</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">
              Selesai</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-three-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
            <table class="table">
              <tr>
                <th>No Order</th>
                <th>Tanggal Order</th>
                <th>Expedisi</th>
                <th>Total Bayar</th>
                <th>Action</th>
              </tr>
              <?php foreach ($belum_bayar as $key => $value) { ?>
                <tr>
                  <td><?= $value->no_order ?></td>
                  <td><?= $value->tgl_order ?></td>
                  <td>
                    <b> <?= $value->expedisi ?><br></b>
                    Paket :<?= $value->paket ?><br>
                    ongkir :<?= $value->ongkir ?>

                  </td>
                  <td> Rp. <?= $value->total_bayar ?><br>
                    <?php if ($value->status_bayar == 0) { ?>
                      <span class="badge badge-warning">Belum Bayar</span>
                    <?php } else { ?>
                      <span class="badge badge-success"> Sudah Bayar</span><br>
                      <span class="badge badge-primary"> Menunggu Verifikasi</span>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if ($value->status_bayar == 0) { ?>
                      <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary"> Bayar</a>
                    <?php } ?>
                  </td>
                </tr>
              <?php  } ?>

            </table>
          </div>



          <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
            <table class="table">
              <tr>
                <!-- /.Proses -->
                <th>No Order</th>
                <th>Tanggal Order</th>
                <th>Expedisi</th>
                <th>Total Bayar</th>

              </tr>
              <?php foreach ($diproses as $key => $value) { ?>
                <tr>
                  <td><?= $value->no_order ?></td>
                  <td><?= $value->tgl_order ?></td>
                  <td>
                    <b> <?= $value->expedisi ?><br></b>
                    Paket :<?= $value->paket ?><br>
                    ongkir :<?= $value->ongkir ?>

                  </td>
                  <td> Rp. <?= $value->total_bayar ?><br>

                    <span class="badge badge-success"> Terverfikasi</span><br>
                    <span class="badge badge-primary"> Diproses / Dikemas</span>

                  </td>

                </tr>
              <?php  } ?>

            </table>
          </div>


          <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
            <table class="table">
              <tr>
                <!-- /.Proses -->
                <th>No Order</th>
                <th>Tanggal Order</th>
                <th>Expedisi</th>
                <th>Total Bayar</th>
                <th>No Resi</th>
              </tr>
              <?php foreach ($dikirim as $key => $value) { ?>
                <tr>
                  <td><?= $value->no_order ?></td>
                  <td><?= $value->tgl_order ?></td>
                  <td>
                    <b> <?= $value->expedisi ?><br></b>
                    Paket :<?= $value->paket ?><br>
                    ongkir :<?= $value->ongkir ?>

                  </td>
                  <td> Rp. <?= $value->total_bayar ?><br>


                    <span class="badge badge-primary"> Dikirim</span>

                  </td>
                  <td>
                    <h3><?= $value->no_resi ?><br>
                      <button data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>" class="btn btn-success btn-primary">Diterima</button>
                    </h3>
                  </td>
                </tr>
              <?php  } ?>

            </table>
          </div>
          <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
            <table class="table">
              <tr>
                <!-- /.selesai -->
                <th>No Order</th>
                <th>Tanggal Order</th>
                <th>Expedisi</th>
                <th>Total Bayar</th>
                <th>No Resi</th>
              </tr>
              <?php foreach ($selesai as $key => $value) { ?>
                <tr>
                  <td><?= $value->no_order ?></td>
                  <td><?= $value->tgl_order ?></td>
                  <td>
                    <b> <?= $value->expedisi ?><br></b>
                    Paket :<?= $value->paket ?><br>
                    ongkir :<?= $value->ongkir ?>

                  </td>
                  <td> Rp. <?= $value->total_bayar ?><br>


                    <span class="badge badge-success"> Selesai </span>

                  </td>
                  <td>
                    <h4><?= $value->no_resi ?><br>
                    </h4>
                  </td>
                </tr>
              <?php  } ?>

            </table>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>


  <?php foreach ($dikirim as $key => $value) { ?>
    <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Pesanan Diterima</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda Yakin Pesanan Telah Diterima ?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>" class="btn btn-primary">Ya</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  <?php  } ?>
</div>
</div>