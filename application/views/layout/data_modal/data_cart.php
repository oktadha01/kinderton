<h6 class="notif-blm-byr notifblmbyr"><span class="notif_blm_byr"></span> Pesanan Belum Dibayar</h6>
<div class="accordion" id="accordion-blm-byr">
    <?php
    foreach ($cart_blmbyr as $data) :
    ?>
        <div class="card mb-2 b-radius">
            <div class="card-header cart collapsed pl-1 pr-1 p" data-toggle="collapse" data-target="#coll<?php echo $data->id_cart; ?>" aria-expanded="false">
                <span class="accicon"><i class="fas fa-angle-down border-arrow rotate-icon">aaa</i></span>
                <div class="row title-cart">
                    <div class="col pl-1">
                        <span class="float-right text-danger font-size-xs"><?php echo $data->status_pembayaran; ?></span>
                        <?php
                        $sql = "SELECT * FROM favorit, jenis_produk, foto_produk, harga_produk WHERE jenis_produk.id_jp = favorit.produk 
                            AND foto_produk.id_fotpro = favorit.foto_favorit AND harga_produk.id_hrg = favorit.hrg_favorit AND favorit.kode_chekout = $data->kode_cart";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $nmproduk) {

                        ?>
                                <img src="<?php echo base_url('upload'); ?>/<?php echo $nmproduk->fotpro; ?>" class="size-img" alt="Image">
                                <span class="title"><?php echo $nmproduk->nm_jp; ?> || <?php echo $nmproduk->kategori; ?> || <?php echo $nmproduk->gender; ?></span>
                                <br>
                                <hr class="hr-cart">
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div id="coll<?php echo $data->id_cart; ?>" class="collapse " data-parent="#accordion-blm-byr">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM favorit, jenis_produk, foto_produk, harga_produk WHERE jenis_produk.id_jp = favorit.produk 
                            AND foto_produk.id_fotpro = favorit.foto_favorit AND harga_produk.id_hrg = favorit.hrg_favorit AND favorit.kode_chekout = $data->kode_cart";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $produk_cart) {

                        ?>

                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 pb-1">
                                    <div class="thumb_cart">
                                        <img src="<?php echo base_url('upload'); ?>/<?php echo $produk_cart->fotpro; ?>" class="lazy" alt="Image">
                                    </div>
                                    <span class=""><?php echo $produk_cart->nm_jp; ?> || <?php echo $produk_cart->kategori; ?> || <?php echo $produk_cart->gender; ?></span>
                                    <br>
                                    <span class=""><?php echo $produk_cart->texture; ?> || <?php echo $produk_cart->size; ?> || <?php echo $produk_cart->qty; ?>X</span>
                                    <br>
                                    <?php
                                    if ($produk_cart->status_produk == 'PROMO') {
                                    ?>
                                        <span class="text-danger">Rp. <?php echo $produk_cart->hrg_diskon; ?></span>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="text-danger">Rp. <?php echo $produk_cart->hrg_awal; ?></span>

                                    <?php
                                    }
                                    ?>
                                    <hr class="hr-cart">
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-4">
                                <h6>Pesanan</h6>
                                <ul class="">
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
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <h6>Jasa Kurir</h6>
                                <ul>
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
                            <div class="col-lg-4">
                                <h6>Mode Pembayaran</h6>
                                <ul>
                                    <li>
                                        <span><?php echo $data->mode_pembayaran; ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container pr-2rem">
                    <div class="row">
                        <div class="col-3">
                            <!-- <span><?php echo $data->total_produk; ?> Produk</span>
                                    <br>
                                    <span><?php echo $data->total_barang; ?> Barang</span> -->

                        </div>
                        <div class="col-9 text-right">
                            <span class="">Total Harus Dibayar : Rp. <span class="text-danger price-cart<?php echo $data->id_cart; ?>"><?php echo $data->total_pembayaran; ?></span></span>
                        </div>
                    </div>
                    <hr class="hr-cart">
                    <div class="row mb-1">
                        <div class="col-12">
                            <span class="text-warning" id="durasi-pembayaran<?php echo $data->id_cart; ?>"></span>
                            <br>
                            <span>Bayar sebelum <?php echo $data->tgl_pembayaran; ?> <?php echo $data->jam_pembayaran; ?> dengan <?php echo $data->mode_pembayaran; ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="#page">
                                <button type="button" class="btn btn-xs bg-gradient-danger float-right btn-bayar-sekarang" data-id-cart="<?php echo $data->id_cart; ?>" data-kode-pesanan="<?php echo $data->kode_cart; ?>" data-tgl="<?php echo $data->tgl_pembayaran; ?>" data-jam="<?php echo $data->jam_pembayaran; ?>" data-mode-bayar="<?php echo $data->mode_pembayaran; ?>" id="">
                                    <i class="fa-solid fa-cash-register"></i> Bayar sekarang
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var x = setInterval(function() {
                // Tetapkan tanggal kita menghitung mundur
                var countDownDate = new Date("<?php echo $data->tgl_pembayaran; ?> <?php echo $data->jam_pembayaran; ?>");

                // Dapatkan tanggal dan waktu hari ini
                var now = new Date().getTime();
                // Temukan jarak antara sekarang dan tanggal hitung mundur
                var distance = countDownDate - now;

                // Perhitungan waktu untuk hari, jam, menit dan detik
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Keluarkan hasil dalam elemen dengan id = "demo"
                document.getElementById("durasi-pembayaran<?php echo $data->id_cart; ?>").innerHTML = hours + " jam " +
                    minutes + " menit " + seconds + " detik ";
                //Jika hitungan mundur selesai, tulis beberapa teks
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("durasi-pembayaran<?php echo $data->id_cart; ?>").innerHTML = "EXPIRED";
                    if ($('#durasi-pembayaran<?php echo $data->id_cart; ?>').text() == 'EXPIRED') {
                        var kode = '<?php echo $data->kode_cart; ?>';
                        let formData = new FormData();
                        formData.append('kode_cart', kode);
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo site_url('cart/expired_cart'); ?>",
                            data: formData,
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(msg) {
                                // alert(msg);
                                $('#data_modal_addtocart').load('<?php echo site_url('Cart/data_cart'); ?>');

                            },
                            error: function() {
                                alert("Data Gagal Diupload");
                            }
                        });
                    }
                }
            }, 1000);
        </script>
    <?php
    endforeach
    ?>
</div>
<h6 class="notif-sdh-byr notifsdhbyr"><span class="notif_sdh_byr"></span> Pesanan Sudah Dibayar</h6>
<div class="accordion" id="accordion-sdh-byr">
    <?php
    foreach ($cart_sdhbyr as $data) :
    ?>
        <div class="card mb-2 b-radius">
            <div class="card-header cart collapsed pl-1 pr-1 p" data-toggle="collapse" data-target="#coll<?php echo $data->id_cart; ?>" aria-expanded="false">
                <span class="accicon"><i class="fas fa-angle-down border-arrow rotate-icon"></i></span>
                <div class="row title-cart">
                    <div class="col pl-1">
                        <span class="float-right text-warning font-size-xs"><?php echo $data->status_pembayaran; ?></span>
                        <?php
                        $sql = "SELECT * FROM favorit, jenis_produk, foto_produk, harga_produk WHERE jenis_produk.id_jp = favorit.produk 
                            AND foto_produk.id_fotpro = favorit.foto_favorit AND harga_produk.id_hrg = favorit.hrg_favorit AND favorit.kode_chekout = $data->kode_cart";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $nmproduk) {

                        ?>
                                <img src="<?php echo base_url('upload'); ?>/<?php echo $nmproduk->fotpro; ?>" class="size-img" alt="Image">
                                <span class="title"><?php echo $nmproduk->nm_jp; ?> || <?php echo $nmproduk->kategori; ?> || <?php echo $nmproduk->gender; ?></span>
                                <br>
                                <!-- <hr class="hr-cart"> -->
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div id="coll<?php echo $data->id_cart; ?>" class="collapse " data-parent="#accordion-sdh-byr">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM favorit, jenis_produk, foto_produk, harga_produk WHERE jenis_produk.id_jp = favorit.produk 
                                AND foto_produk.id_fotpro = favorit.foto_favorit AND harga_produk.id_hrg = favorit.hrg_favorit AND favorit.kode_chekout = $data->kode_cart";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $produk_cart) {

                        ?>

                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 pb-1">
                                    <div class="thumb_cart">
                                        <img src="<?php echo base_url('upload'); ?>/<?php echo $produk_cart->fotpro; ?>" class="lazy" alt="Image">
                                    </div>
                                    <span class=""><?php echo $produk_cart->nm_jp; ?> || <?php echo $produk_cart->kategori; ?> || <?php echo $produk_cart->gender; ?></span>

                                    <br>
                                    <span class=""><?php echo $produk_cart->texture; ?> || <?php echo $produk_cart->size; ?> || <?php echo $produk_cart->qty; ?>X</span>
                                    <br>
                                    <?php
                                    if ($produk_cart->status_produk == 'PROMO') {
                                    ?>
                                        <span class="text-danger">Rp. <?php echo $produk_cart->hrg_diskon; ?></span>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="text-danger">Rp. <?php echo $produk_cart->hrg_awal; ?></span>

                                    <?php
                                    }
                                    ?>
                                    <hr class="hr-cart">
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="container">

                        <div class="row pr-3">
                            <div class="col-lg-4">
                                <h6>Pesanan</h6>
                                <ul class="">
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
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <h6>Jasa Kurir</h6>
                                <ul>
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
                            <div class="col-lg-4">
                                <h6>Mode Pembayaran</h6>
                                <ul>
                                    <li>
                                        <span><?php echo $data->mode_pembayaran; ?></span>
                                    </li>
                                </ul>
                                <h6>Bukti Transfer</h6>
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
                                        <span class="text-warning"><?php echo $data->status_pembayaran; ?></span>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row pr-3 mt-2">
                            <div class="col">
                                <span class="text-bold float-right">Total Pembayaran <span class="text-danger">Rp.<?php echo $data->total_pembayaran; ?></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container pr-2rem">
                    <hr class="hr-cart">
                    <div class="row mb-1">
                        <div class="col-12">
                            <span>Sudah Dibayar Pada Tanggal <?php echo $data->tgl_byr; ?> dengan <?php echo $data->mode_pembayaran; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endforeach
    ?>
</div>
<h6 class="notif-brg-kms notifbrgkms"><span class="notif_brg_kms"></span> Pesanan Sudah Dikemas</h6>
<div class="accordion" id="accordion-brg-kms">
    <?php
    foreach ($cart_brgkms as $data) :
    ?>
        <div class="card mb-2 b-radius">
            <div class="card-header cart collapsed pl-1 pr-1 p" data-toggle="collapse" data-target="#coll<?php echo $data->id_cart; ?>" aria-expanded="false">
                <span class="accicon"><i class="fas fa-angle-down border-arrow rotate-icon"></i></span>
                <div class="row title-cart">
                    <div class="col pl-1">
                        <span class="float-right text-primary font-size-xs"><?php echo $data->status_pembayaran; ?></span>
                        <?php
                        $sql = "SELECT * FROM favorit, jenis_produk, foto_produk, harga_produk WHERE jenis_produk.id_jp = favorit.produk 
                            AND foto_produk.id_fotpro = favorit.foto_favorit AND harga_produk.id_hrg = favorit.hrg_favorit AND favorit.kode_chekout = $data->kode_cart";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $nmproduk) {

                        ?>
                                <div class="mb-1">
                                    <img src="<?php echo base_url('upload'); ?>/<?php echo $nmproduk->fotpro; ?>" class="size-img" alt="Image">
                                    <span class="title"><?php echo $nmproduk->nm_jp; ?> || <?php echo $nmproduk->kategori; ?> || <?php echo $nmproduk->gender; ?></span>
                                    <br class="mb-1">
                                </div>
                                <!-- <hr class="hr-cart"> -->
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div id="coll<?php echo $data->id_cart; ?>" class="collapse " data-parent="#accordion-brg-kms">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM favorit, jenis_produk, foto_produk, harga_produk WHERE jenis_produk.id_jp = favorit.produk 
                                AND foto_produk.id_fotpro = favorit.foto_favorit AND harga_produk.id_hrg = favorit.hrg_favorit AND favorit.kode_chekout = $data->kode_cart";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $produk_cart) {

                        ?>

                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 pb-1">
                                    <div class="thumb_cart">
                                        <img src="<?php echo base_url('upload'); ?>/<?php echo $produk_cart->fotpro; ?>" class="lazy" alt="Image">
                                    </div>
                                    <span class=""><?php echo $produk_cart->nm_jp; ?> || <?php echo $produk_cart->kategori; ?> || <?php echo $produk_cart->gender; ?></span>
                                    <br>
                                    <span class=""><?php echo $produk_cart->texture; ?> || <?php echo $produk_cart->size; ?> || <?php echo $produk_cart->qty; ?>X</span>
                                    <br>
                                    <?php
                                    if ($produk_cart->status_produk == 'PROMO') {
                                    ?>
                                        <span class="text-danger">Rp. <?php echo $produk_cart->hrg_diskon; ?></span>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="text-danger">Rp. <?php echo $produk_cart->hrg_awal; ?></span>

                                    <?php
                                    }
                                    ?>
                                    <hr class="hr-cart">
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="container">

                        <div class="row pr-3">
                            <div class="col-lg-4">
                                <h6>Pesanan</h6>
                                <ul class="">
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
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <h6>Jasa Kurir</h6>
                                <ul>
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
                            <div class="col-lg-4">
                                <h6>Mode Pembayaran</h6>
                                <ul>
                                    <li>
                                        <span><?php echo $data->mode_pembayaran; ?></span>
                                    </li>
                                </ul>
                                <h6>Bukti Transfer</h6>
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
                                        <span class="text-warning"><?php echo $data->status_pembayaran; ?></span>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row pr-3 mt-2">
                            <div class="col">
                                <span class="text-bold float-right">Total Pembayaran <span class="text-danger">Rp.<?php echo $data->total_pembayaran; ?></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container pr-2rem">
                    <hr class="hr-cart">
                    <div class="row">
                        <div class="col">
                            <span class=""><span><?php echo $data->total_produk; ?> Produk</span> <span><?php echo $data->total_barang; ?> Barang</span> Sedang Dikemas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endforeach
    ?>
</div>
<h6 class="notif-dikirim notifdikirim"><span class="notif_dikirim"></span> Pesanan Sudah Dikirim</h6>
<div class="accordion" id="accordion-dikirim">
    <?php
    foreach ($cart_dikirim as $data) :
    ?>
        <div class="card mb-2 b-radius">
            <div class="card-header cart collapsed pl-1 pr-1 p" data-toggle="collapse" data-target="#coll<?php echo $data->id_cart; ?>" aria-expanded="false">
                <span class="accicon"><i class="fas fa-angle-down border-arrow rotate-icon"></i></span>
                <div class="row title-cart">
                    <div class="col pl-1">
                        <span class="float-right text-success font-size-xs"><?php echo $data->status_pembayaran; ?></span>
                        <?php
                        $sql = "SELECT * FROM favorit, jenis_produk, foto_produk, harga_produk WHERE jenis_produk.id_jp = favorit.produk 
                            AND foto_produk.id_fotpro = favorit.foto_favorit AND harga_produk.id_hrg = favorit.hrg_favorit AND favorit.kode_chekout = $data->kode_cart";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $nmproduk) {

                        ?>
                                <div class="mb-1">
                                    <img src="<?php echo base_url('upload'); ?>/<?php echo $nmproduk->fotpro; ?>" class="size-img" alt="Image">
                                    <span class="title"><?php echo $nmproduk->nm_jp; ?> || <?php echo $nmproduk->kategori; ?> || <?php echo $nmproduk->gender; ?></span>
                                    <br class="mb-1">
                                </div>
                                <!-- <hr class="hr-cart"> -->
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div id="coll<?php echo $data->id_cart; ?>" class="collapse " data-parent="#accordion-dikirim">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM favorit, jenis_produk, foto_produk, harga_produk WHERE jenis_produk.id_jp = favorit.produk 
                                AND foto_produk.id_fotpro = favorit.foto_favorit AND harga_produk.id_hrg = favorit.hrg_favorit AND favorit.kode_chekout = $data->kode_cart";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $produk_cart) {

                        ?>

                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 pb-1">
                                    <div class="thumb_cart">
                                        <img src="<?php echo base_url('upload'); ?>/<?php echo $produk_cart->fotpro; ?>" class="lazy" alt="Image">
                                    </div>
                                    <span class=""><?php echo $produk_cart->nm_jp; ?> || <?php echo $produk_cart->kategori; ?> || <?php echo $produk_cart->gender; ?></span>
                                    <br>
                                    <span class=""><?php echo $produk_cart->texture; ?> || <?php echo $produk_cart->size; ?> || <?php echo $produk_cart->qty; ?>X</span>
                                    <br>
                                    <?php
                                    if ($produk_cart->status_produk == 'PROMO') {
                                    ?>
                                        <span class="text-danger">Rp. <?php echo $produk_cart->hrg_diskon; ?></span>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="text-danger">Rp. <?php echo $produk_cart->hrg_awal; ?></span>

                                    <?php
                                    }
                                    ?>
                                    <hr class="hr-cart">
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="container">

                        <div class="row pr-3">
                            <div class="col-lg-4">
                                <h6>Pesanan</h6>
                                <ul class="">
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
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <h6>Jasa Kurir</h6>
                                <ul>
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
                            <div class="col-lg-4">
                                <h6>Mode Pembayaran</h6>
                                <ul>
                                    <li>
                                        <span><?php echo $data->mode_pembayaran; ?></span>
                                    </li>
                                </ul>
                                <h6>Bukti Transfer</h6>
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
                                        <span class="text-success"><?php echo $data->status_pembayaran; ?></span>
                                    </ul>
                                    <hr class="hr-cart ml-2 mr-2">
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
                                </div>
                            </div>
                        </div>
                        <div class="row pr-3 mt-2">
                            <div class="col">
                                <span class="text-bold float-right">Total Pembayaran <span class="text-danger">Rp.<?php echo $data->total_pembayaran; ?></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container pr-2rem">
                    <hr class="hr-cart">
                    <div class="row">
                        <div class="col">
                            <span class=""><span>Pesana dikirim ke alamat anda, <?php echo $data->tgl_kirim; ?> <?php echo $data->jam_kirim; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endforeach
    ?>
</div>