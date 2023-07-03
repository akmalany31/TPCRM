<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
        <div class="col-sm12">
        <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
            }
            ?>
        </div>
            <div class="col-sm-12">
                <?php

                use function PHPSTORM_META\type;

                echo form_open('belanja/update'); ?>

                <table class="table" cellpadding="6" cellspacing="1" style="width:100%" border="0">

                    <tr>
                        <th width="85px">Qty</th>
                        <th>Nama Barang</th>
                        <th style="text-align:left">Harga</th>
                        <th style="text-align:left">Sub Total</th>
                        <th style="text-align:left">Berat (gr)</th>
                        <th class="text-left">Action</th>
                    </tr>

                    <?php $i = 1; ?>

                    <?php
                    $total_berat = 0;
                    foreach ($this->cart->contents() as $items) {
                        $barang = $this->M_home->detail_barang($items['id']);
                        $berat = $items['qty'] * $barang->berat;
                        $total_berat = $total_berat + $berat;
                    ?>
                        <tr>
                            <td><?php echo form_input(array(
                                    'name' => $i . '[qty]',
                                    'value' => $items['qty'],
                                    'maxlength' => '3',
                                    'min' => '0',
                                    'size' => '5',
                                    'type' => 'number',
                                    'class' => 'form-control'
                                ));
                                ?>
                            </td>
                            <td> <?php echo $items['name']; ?> </td>
                            <td style="text-align:left">Rp. <?php echo number_format($items['price'], 0); ?></td>
                            <td style="text-align:left">Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                            <td style="text-align:left"><?= $berat  ?> gr</td>
                            <td class=" text-left">
                                <a href="<?= base_url('belanja/delete/' . $items['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                            </td>
                        </tr>

                        <?php $i++; ?>

                    <?php } ?>
                    <tr>
                        <td colspan="4"> </td>
                        <td class="right"><strong><?= $total_berat ?> gr<strong></td>
                    </tr>
                    <tr>
                        <td colspan="2"> </td>
                        <td class="right"><strong>Total</strong></td>
                        <td class="right"><strong>Rp. <?php echo number_format($this->cart->total(), 0); ?><strong></td>
                    </tr>


                </table>

                <div class="row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary btn-flat">Update Cart</i></button>
                        <a href="<?= base_url('belanja/clear') ?>" class="btn btn-danger btn-flat">Clear Cart</i></a>
                        <a href="<?= base_url('belanja/cekout') ?>" class="btn btn-success btn-flat">Check Out</i></a>
                        <?php echo form_close(); ?>
                    </div>
                </div><br>
            </div>
        </div>
    </div>
</div>
</div>