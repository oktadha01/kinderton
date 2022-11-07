<div class="form_container">
    <?php $kode_pesanan = $this->input->post('kode-pesanan');
    ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <h5>Detail Pesanan #<span><?php echo $kode_pesanan; ?></span></h5>
        </div>
    </div>
    <hr>
    <div class="private box">
        <div class="row">

            <?php
            $sql = "SELECT * FROM favorit, jenis_produk, foto_produk, harga_produk, cart, bukti_transfer, user WHERE jenis_produk.id_jp = favorit.produk 
                AND foto_produk.id_fotpro = favorit.foto_favorit 
                AND harga_produk.id_hrg = favorit.hrg_favorit 
                AND favorit.kode_chekout = cart.kode_cart 
                AND bukti_transfer.kode_pesanan = cart.kode_cart 
                AND user.id_user = cart.cart_user
                AND bukti_transfer.kode_pesanan = $kode_pesanan";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $data) :

            ?>

                    <div class="col-lg-4 col-md-6 col-12 pb-1">
                        <div class="thumb_cart">
                            <img src="<?php echo base_url('upload'); ?>/<?php echo $data->fotpro; ?>" class="lazy" alt="Image">
                        </div>
                        <span class=""><?php echo $data->nm_jp; ?> || <?php echo $data->kategori; ?> || <?php echo $data->gender; ?></span>
                        <br>
                        <span class=""><?php echo $data->texture; ?> || <?php echo $data->size; ?> || <?php echo $data->qty; ?>X</span>
                        <br>
                        <?php
                        if ($data->status_produk == 'PROMO') {
                        ?>
                            <span class="text-danger">Rp. <?php echo $data->hrg_diskon; ?></span>
                        <?php
                        } else {
                        ?>
                            <span class="text-danger">Rp. <?php echo $data->hrg_awal; ?></span>

                        <?php
                        }
                        ?>
                        <hr class="hr-cart">
                    </div>
            <?php
                endforeach;
            }
            ?>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">

                <ul class="pl-3">
                    <li>
                        <span class="text-bold">Nama</span>
                        <span class="font-family-cursive">: <?php echo $data->nm_user; ?></span>
                    </li>
                    <li>
                        <span class="text-bold">Kota Tujuan</span>
                        <span class="font-family-cursive">: <?php echo $data->kota; ?></span>
                    </li>
                    <li>
                        <span class="text-bold">Alamat</span>
                        <span class="font-family-cursive">: <?php echo $data->alamat; ?></span>
                    </li>
                    <li>
                        <span class="text-bold">Total Produk</span>
                        <span class="font-family-cursive">: <?php echo $data->total_produk; ?></span>
                    </li>
                    <li>
                        <span class="text-bold">Total Barang</span>
                        <span class="font-family-cursive">: <?php echo $data->total_barang; ?></span>
                    </li>
                    <li>
                        <span class="text-bold">Kurir</span>
                        <span class="font-family-cursive">: <?php echo $data->kurir; ?></span>
                    </li>
                    <li>
                        <span class="text-bold">Layanan</span>
                        <span class="font-family-cursive">: <?php echo $data->pelayanan; ?></span>
                    </li>
                    <li>
                        <span class="text-bold">ETD</span>
                        <span class="font-family-cursive">: <?php echo $data->etd; ?> D</span>
                    </li>
                    <li>
                        <span class="text-bold">Berat (Kg)</span>
                        <span class="font-family-cursive">: <?php echo $data->berat; ?> Kg</span>
                    </li>
                    <li>
                        <span class="text-bold">Ongkir</span>
                        <span class="font-family-cursive">: Rp.<?php echo $data->ongkir; ?></span>
                    </li>
                    <li>
                        <span class="text-bold">Subtotal</span>
                        <span class="font-family-cursive">: Rp.<?php echo $data->subtotal; ?></span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <h6>Mode Pembayaran</h6>
                <ul>
                    <li>
                        <span><?php echo $data->mode_pembayaran; ?></span>
                    </li>
                </ul>
                <h6>Bukti transfer</h6>
                <div class="border-detail-pesanan p-1">
                    <div class="thumb_cart">
                        <a target="_blank" href="<?php echo base_url('upload/bukti_transfer'); ?>/<?php echo $data->foto_bukti; ?>">
                            <img src="<?php echo base_url('upload/bukti_transfer'); ?>/<?php echo $data->foto_bukti; ?>" class="lazy" alt="Image">
                        </a>
                    </div>
                    <ul class="pl-6rem">
                        <li>
                            <span class="text-bold">A.N</span>
                            <span class="font-family-cursive">: <?php echo $data->an_pengirim; ?></span>
                        </li>
                        <li>
                            <span class="text-bold">Transaksi Bank</span>
                            <span class="font-family-cursive">: <?php echo $data->bank; ?></span>
                        </li>
                        <li>
                            <span class="text-bold">Nominal</span>
                            <span class="font-family-cursive">: Rp.<?php echo $data->nominal; ?></span>
                        </li>
                        <li>
                            <span class="text-bold">Tgl Bayar</span>
                            <span class="font-family-cursive">: <?php echo $data->tgl_byr; ?></span>
                        </li>
                    </ul>
                    <?php
                    if ($data->status_pembayaran == 'Dikirim' || $data->status_pembayaran == 'Selesai Dikirim') {
                    ?>
                        <hr class="hr-cart ml-1 mr-1">
                        <div class="row">
                            <div class="col-6">
                                <h6>Tgl Kirim</h6>
                                <ul class="pl-4">
                                    <li>
                                        <span><?php echo $data->tgl_kirim; ?> <?php echo $data->jam_kirim; ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <h6>Nomor Resi</h6>
                                <ul class="pl-4">
                                    <li>
                                        <span><?php echo $data->no_resi; ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col">
                <span class="text-bold float-right">Total Pembayaran <span class="text-danger">Rp.<?php echo $data->total_pembayaran; ?></span></span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <!-- <span> -->
                <?php
                if ($data->status_pembayaran == 'Sudah Bayar') {
                ?>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input chekbox" type="checkbox" name="" id="acc" data-action="Dikemas">
                            <label for="acc" class="custom-control-label">Acc</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input chekbox" type="checkbox" name="" id="tolak" data-action="Di Tolak">
                            <label for="tolak" class="custom-control-label">Tolak</label>
                        </div>
                    </div>
                <?php
                } else if ($data->status_pembayaran == 'Dikemas') {
                ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <h6 class="text-warning"><?php echo $data->status_pembayaran; ?></h6>
                        </div>
                        <div class="col-lg-6 pl-0 pr-0">
                            <label for="no-resi">ETD</label>
                            <div class="form-group">
                                <p id="jam-kirim"></p>
                                <input type="number" id="etd-kirim" name="etd_kirim" class="form-control" placeholder="Estimasi lama pengiriman ...">
                            </div>
                            <label for="no-resi">No Resi</label>
                            <div class="form-group">
                                <input type="text" id="no-resi" name="no_resi" class="form-control" placeholder="No Resi ...">
                            </div>
                            <button type="button" id="btn-kirim-pesanan" class="btn col-12 btn-sm btn-success float-right" data-kode-cart="<?php echo $data->kode_cart; ?>" value="">Kirim Pesanan</button>
                        </div>
                    </div>

                <?php
                } else if ($data->status_pembayaran == 'Dikirim' || $data->status_pembayaran == 'Selesai Dikirim') {
                ?>
                    <span class="span-dikirim"><?php echo $data->status_pembayaran; ?></span>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="button" id="btn-acc" class="col-6 btn btn-sm btn-primary float-right" data-kode-cart="<?php echo $data->kode_cart; ?>" value="">Dikemas</button>
                <button type="button" id="btn-tolak" class="col-6 btn btn-sm btn-danger float-right" data-kode-cart="<?php echo $data->kode_cart; ?>" value="">Tolak</button>
            </div>
        </div>
    </div>
</div>
<input type=" text" class="action-vali-pesanan" value="Dikirim" hidden>
<?php
$sql = "SELECT * FROM user WHERE privilage='admin'";
$query = $this->db->query($sql);
if ($query->num_rows() > 0) {
    foreach ($query->result() as $useradmin) :

?>
        <!-- <p><?php echo $useradmin->nm_user; ?></p> -->
<?php
    endforeach;
}
?>
<script>
    
    $('#btn-acc').hide()
    $('#btn-tolak').hide()
    // $('#btn-kirim-pesanan').hide()
    action_vali_pesanan()
    $('.chekbox').click(function(e) {
        $('.chekbox').not(this).prop('checked', false);
        var action = $(this).data('action');
        if ($(this).is(":checked")) {
            $('.action-vali-pesanan').val(action);
            action_vali_pesanan();
        } else {
            $('.action-vali-pesanan').val('');
            action_vali_pesanan();
        }
    });

    $('#btn-acc, #btn-tolak, #btn-kirim-pesanan').click(function(e) {
        let formData = new FormData();
        formData.append('kode-cart', $(this).data('kode-cart'));
        formData.append('status-pembayaran', $('.action-vali-pesanan').val());
        formData.append('no-resi', $('#no-resi').val());
        formData.append('jam-kirim', $('#jam-kirim').text());
        formData.append('etd-kirim', $('#etd-kirim').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('chekout/acc_pesanan'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(msg) {
                alert(msg);
                $('#detail-pesanan').attr('hidden', true);
                $('.form-data').load('<?php echo site_url('Chekout/vali_pesanan'); ?>');
                $('.notif-pesanan').load('<?php echo site_url('chekout/notif_vali_pesanan'); ?>');
                $('.notif-pesanan_dikirim').load('<?php echo site_url('chekout/notif_pesanan_dikirim'); ?>');

                if ($('.action-vali-pesanan').val() == 'Dikirim') {
                    var nohp = '<?php echo $data->kontak; ?>';
                    var pesan = 'horree.. Pesanan kamu sudah di antar ke alamat anda.. silahkan cek no resi kamu di sini: <?php echo base_url(); ?>/?pesanan=dikirim';
                    // var pesan = 'horree.. Pesanan kamu sudah di antar ke alamat anda.. silahkan cek no resi kamu di sini: http://localhost/backup-kinderton/?pesanan=dikirim';
                    var linkWA = 'https://web.whatsapp.com/send?phone=' + nohp + '&text=' + pesan;
                    window.location = linkWA;
                }
            },
            error: function() {
                alert("Data Gagal Diupload");
            }

        });
    });
    $('#no-resi').on('input', function(e) {
        action_vali_pesanan();
    });

    function action_vali_pesanan() {
        if ($('.action-vali-pesanan').val() == 'Dikemas') {
            $('#btn-acc').show(200)
            $('#btn-tolak').hide()

        } else if ($('.action-vali-pesanan').val() == 'Di Tolak') {
            $('#btn-acc').hide()
            $('#btn-tolak').show(200)

        } else {
            $('#btn-acc').hide(200)
            $('#btn-tolak').hide(200)

        }

        if ($('#no-resi').val() == '') {
            $('#btn-kirim-pesanan').addClass('btn-disabled').removeClass('btn-success').attr('disabled', true);
        } else {
            $('#btn-kirim-pesanan').removeClass('btn-disabled').addClass('btn-success').removeAttr('disabled', true);
        }
    }
</script>