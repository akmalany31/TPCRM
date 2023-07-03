    <!-- Main content -->
    <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-shopping-cart"></i> Checkout.
                    <small class="float-right">Tanggal : <?= date('d/m/y') ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th class="text-center">Qty</th> 
                      <th width ="150px"class="text-center">Harga</th>
                      <th class="text-center">Barang</th>
                      <th class="text-center">Total Harga</th>
                      <th class="text-center">Berat</th>
                    </tr>
                    </thead>
                    <tbody>
                   
                        <?php 
                        $i = 1;
                        $total_berat = 0;
                        foreach ($this->cart->contents() as $items){ 
                        $barang = $this->M_home->detail_barang($items['id']);
                        $berat = $items['qty'] * $barang->berat;
                        $total_berat = $total_berat + $berat;
                            ?>
                    <tr>
                      <<td> <?php echo $items['qty']; ?> </td>
                      <td class="text-center">Rp. <?php echo number_format($items['price'], 0); ?></td>
                      <<td> <?php echo $items['name']; ?> </td>
                     <td class="text-center">Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                         <td class="text-center"><?= $berat  ?> gr</td>
                            
                    </tr>
                    <?php }  ?>
                    <tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>',' </div>');
            ?>
              <?php  
              echo form_open('belanja/cekout');
              $no_order = date('Ymd') . strtoupper(random_string('alnum',8));
              ?>
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-8">
                  Tujuan :
                  <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" class="form-control"></select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kota/Kabupaten</label>
                        <select name="kota" class="form-control">
                             </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Expedisi</label>
                        <select name="expedisi" class="form-control">
                             </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Paket</label>
                        <select name="paket" class="form-control">
                             </select>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label>Alamat</label>
                       <input name="alamat" class="form-control"> </input>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Kode Pos</label>
                       <input name="kode_pos" class="form-control"> </input>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Penerima</label>
                       <input name="nama_penerima" class="form-control"> </input>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Telepon Penerima</label>
                       <input name="hp_penerima" class="form-control"> </input>
                    </div>
                </div>
                
            </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Grand Total:</th>
                        <th>Rp. <?php echo number_format($this->cart->total(), 0); ?>
                        </td></tr>
                      <tr>
                        <th>Berat : </th>
                        <th><?= $total_berat ?> gr</td>
                      </tr>
                      <tr>
                        <th>Ongkir :</th>
                        <th><label id="ongkir"> </label></td>
                      </tr>
                      <tr>
                        <th>Total Bayar:</th>
                        <th><label id="total_bayar"></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->



        <input name="no_order" value="<?=$no_order ?>" hidden>
        <input name="estimasi"hidden>
        <input name="ongkir"hidden>
        <input name="berat" value="<?=$total_berat?>"hidden><br>
        <input name="grand_total" value="<?=$this->cart->total()?>"hidden>
        <input name="total_bayar"hidden>

        <?php 
        $i=1;
        foreach  ($this->cart->contents() as $items){
            echo form_hidden('qty'.$i++, $items['qty']);
        }
        ?>

              <!-- this row will not appear when printing -->

              <div class="row no-print">
                <div class="col-12">
                  <a href="<?= base_url('belanja') ?>" class="btn btn-warning"><i class="fas fa-backward"></i> Kembali </a>
    
                  <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-shopping-cart"></i> Proses Cek Out
                  </button>
                </div>
              </div>
              <?php 
                echo form_close();
                ?>
            </div>

            <script>
    $(document).ready(function() {
        //masukkan data ke select provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?> ",
            success: function(hasil_provinsi) {
                //console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });
        //masukkan data ke select kota
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?> ",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    //console.log(hasil_kota)
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });
        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/expedisi') ?> ",
                success: function(hasil_expedisi) {
                    //console.log(hasil_kota)
                    $("select[name=expedisi]").html(hasil_expedisi);
                }
            });
        
        });
        $("select[name=expedisi]").on("change", function() {
            var expedisi_terpilih = $("select[name=expedisi]").val()
            var id_kota_tujuan_terpilih = $("option:selected","select[name=kota]").attr('id_kota');
            var total_berat = <?= $total_berat ?>;
            
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/paket') ?> ",
                data : 'expedisi='+expedisi_terpilih+'&id_kota='+id_kota_tujuan_terpilih+'&berat='+total_berat,
                success: function(hasil_paket) {
                    //console.log(hasil_kota)
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        
        });

        $("select[name=paket]").on("change", function() {
           var dataongkir =$("option:selected",this).attr('ongkir');
           var	reverse = dataongkir.toString().split('').reverse().join(''),
	                ribuan_ongkir 	= reverse.match(/\d{1,3}/g);
	                ribuan_ongkir	= ribuan_ongkir.join('.').split('').reverse().join('');
     $("#ongkir").html("Rp. "+ ribuan_ongkir)
        
              var total_bayar = parseInt(dataongkir) + parseInt(<?= $this->cart->total() ?>);
              var	reverse = total_bayar.toString().split('').reverse().join(''),
	                total_bayar 	= reverse.match(/\d{1,3}/g);
	                total_bayar	= total_bayar.join('.').split('').reverse().join('');

              $("#total_bayar").html("Rp. "+total_bayar);
       
            //estimasi & ongkir
            var estimasi = $("option:selected",this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(dataongkir);
            $("input[name=total_bayar]").val(total_bayar);
        });







    });
</script>