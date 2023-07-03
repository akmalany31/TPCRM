<div class="col-12">    
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-shopping-cart"></i> <?= $title ?>
                    <small class="float-right">Bulan : <?= $bulan ?>Tahun :<?= $tahun ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
              
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>No Transaksi</th>
                      <th>Tanggal</th>
                      <th>Total Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no=1 ;
                    $grand_total=0 ;
                    foreach ($laporan as $key => $value) {
                       
                      $grand_total = $grand_total + $value->grand_total;
                      
                      ?>
                      <tr>
                       <td><?= $no++ ?></td>
                      <td><?= $value->no_order ?></td>
                      <td><?= $value->tgl_order?></td>
                      <td>Rp.<?= $value->grand_total ?></td>       
                      </tr>
                    <?php } ?>       
                    </tbody>
                  </table>
                  <h1>Grand Total : Rp. <?= $grand_total ?></h1>
                  </div>
              <!-- /.row -->
                  </div>
              <!-- /.row -->
                <!-- /.col -->
              </div>
              <!-- /.row -->

            

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button class="btn btn-default" onclick=" window.print()"><i class="fas fa-print"></i> Print</button>
                  
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->