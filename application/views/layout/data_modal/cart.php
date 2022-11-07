<style>
    .cart .title {
        font-size: 17px;
        color: #000;
    }

    .cart .accicon {
        float: right;
        font-size: 20px;
        width: 1.2em;
    }

    .cart {
        cursor: pointer;
        border-bottom: none;
    }

    /* .card {
        border: 1px solid #ddd;
    } */

    /* .card-body {
        border: 1px solid #ddd;
    } */


    .cart:not(.collapsed) .title-cart {
        display: none;
    }

    .cart:not(.collapsed) .border-arrow {
        background: aqua;
    }

    .cart:not(.collapsed) .rotate-icon {
        transform: rotate(180deg);
    }

    .border-arrow {
        border-radius: 1rem;
        border: 1px solid;
        height: 10px;
        width: 10px;
        padding: 2px;
        background: seashell;

    }

    .b-radius {
        border-radius: 10px !important;
    }

    .hr-cart {
        margin: 12px 0 5px 0 !important;
        border: 0;
        border-top: 1px solid #dddddd;
    }

    .size-img {
        height: 34px;
        width: 30px;
        border-radius: 8px;
        margin-right: 8px;
    }

    .pr-2rem {
        padding-right: 2rem;
    }

    .top-33px {
        top: 33px;
    }

    .text-align-last {
        text-align-last: justify;
    }

    .logistic {
        color: #555;
        font-size: x-large;
    }

    .bedge-logistic {
        top: -21px;
        right: 11px;
        position: relative;
        border-radius: 2rem;
    }

    .border-0 {
        border-top: none !important;
        border-bottom: none !important;
    }

    .notif-blm-byr {
        border: 1px solid #00000014;
        max-inline-size: fit-content;
        padding: 4px;
        border-radius: 12px;
        font-family: system-ui;
        background: #dc35451a;
        color: #1f2d3dad;
        font-size: x-small;
    }

    .notif-sdh-byr {
        border: 1px solid #00000014;
        max-inline-size: fit-content;
        padding: 4px;
        border-radius: 12px;
        font-family: system-ui;
        background: #ffeb3b38;
        color: #1f2d3dad;
        font-size: x-small;
    }

    .notif-brg-kms {
        border: 1px solid #00000014;
        max-inline-size: fit-content;
        padding: 4px;
        border-radius: 12px;
        font-family: system-ui;
        background: #3b7aff38;
        color: #1f2d3dad;
        font-size: x-small;
    }

    .notif-dikirim {
        border: 1px solid #00000014;
        max-inline-size: fit-content;
        padding: 4px;
        border-radius: 12px;
        font-family: system-ui;
        background: #17fc0138;
        color: #1f2d3dad;
        font-size: x-small;
    }

    .max-height-7rem {
        max-height: 7rem;
    }

    .font-active {
        color: #2196f3 !important;
    }
</style>
<div id="cart">
    <div id="logistic" class="container">
        <div class="row">
            <div class="col mt-3 pl-1 pr-1 max-height-7rem">
                <div class="table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap table-hover">
                        <thead class="">
                            <tr>
                                <td scope="col" class="text-center border-0 p-3">
                                    <center>
                                        <a id="blmbyr" class="showSingle" target="1">
                                            <i class="fa-solid fa-cash-register logistic font-1"></i>
                                            <span class="badge badge-danger bedge-logistic notifblmbyr notif_blm_byr"></span>
                                            <p class="text-dark">
                                                Belum Bayar
                                            </p>
                                        </a>
                                    </center>
                                </td>
                                <td scope="col" class="text-center border-0 p-3">
                                    <center>
                                        <a class="showSingle" target="2">
                                            <i class="fa-regular fa-credit-card logistic font-2"></i><span id="" class="badge badge-danger bedge-logistic notifsdhbyr notif_sdh_byr"></span>
                                            <p class="text-dark">
                                                Sudah Bayar
                                            </p>
                                        </a>
                                    </center>
                                </td>
                                <td scope="col" class="text-center border-0 p-3">
                                    <center>
                                        <a class="showSingle" target="3">
                                            <i class="fa-solid fa-boxes-packing logistic font-3"></i><span id="" class="badge badge-danger bedge-logistic notifbrgkms notif_brg_kms"></span>
                                            <p class="text-dark">
                                                Dikemas
                                            </p>
                                        </a>
                                    </center>
                                </td>
                                <td scope="col" class="text-center border-0 p-3">
                                    <center>
                                        <a class="showSingle showSingle-dikirim" target="4">
                                            <i class="fa-solid fa-truck-fast logistic font-4"></i><span id="" class="badge badge-danger bedge-logistic notifdikirim notif_dikirim"></span>
                                            <p class="text-dark">
                                                Dikirim
                                            </p>
                                        </a>
                                    </center>
                                </td>
                                <td scope="col" class="text-center border-0 p-3">
                                    <center>
                                        <a class="showSingle" target="5">
                                            <i class="fa-solid fa-clock-rotate-left logistic font-5"></i>
                                            <p class="text-dark">
                                                Riwayat
                                            </p>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <hr class="hr-cart">
    </div>
    <div id="data-cart" class="container mb-2">
        <center>
            <h5 id="" class="font-family-cursive tdk-ada-pesanan">Tidak ada pesanan!!</h5>
        </center>
        <div id="div1" class="targetDiv">
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
        </div>
        <div id="div3" class="targetDiv">
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
        </div>
        <div id="div4" class="targetDiv">
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
        </div>
        <div id="div5" class="targetDiv">
            <!-- <h6 class="notif-dikirim notifdikirim"><span class="notif_dikirim"></span> Pesanan Sudah Dikirim</h6> -->
            <div class="accordion" id="accordion-selesai-dikirim">
                <?php
                foreach ($cart_selesai_dikirim as $data) :
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
                            <div id="coll<?php echo $data->id_cart; ?>" class="collapse " data-parent="#accordion-selesai-dikirim">
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
                                        <span class=""><span>Pesana selesai dikirim ke alamat anda, <?php echo $data->tgl_selesai_dikirim; ?> <?php echo $data->jam_kirim; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach
                ?>
            </div>
        </div>
    </div>
</div>
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
    // if ($('.notif-cart').text() == '0') {
    //     $('#tdk-ada-pesanan').show(200);
    //     alert('ya');
    // }else{
        
    //     $('#tdk-ada-pesanan').hide();
    // }
    $('.notif_blm_byr').load('<?php echo site_url('cart/notif_blm_byr'); ?>');
    $('.notif_sdh_byr').load('<?php echo site_url('cart/notif_sdh_byr'); ?>');
    $('.notif_brg_kms').load('<?php echo site_url('cart/notif_brg_kms'); ?>');
    $('.notif_dikirim').load('<?php echo site_url('cart/notif_dikirim'); ?>');
    $('.detail-cart').hide();
    $('#pembayaran-addtocart').hide();
    $('#konfrimasi-pembayaran').hide();
    $('#btn-kirim-bukti,#btn-back,#btn-upload-bukti').show();
    $('#btn-ok-addtocart, #btn-ubah-pembayaran-addtocart').hide();

    $('.btn-bayar-sekarang').click(function(e) {
        var id_cart = $(this).data('id-cart');
        var tgl = $(this).data('tgl');
        var jam = $(this).data('jam');
        var mode_bayar = $(this).data('mode-bayar');
        var kode_pesanan = $(this).data('kode-pesanan');
        // alert(tgl + '' + jam);
        var x = setInterval(function() {

            // Tetapkan tanggal kita menghitung mundur
            var countDownDate = new Date(tgl + ' ' + jam);
            // Dapatkan tanggal dan waktu hari ini
            var now = new Date().getTime();
            var kode = new Date().getTime();
            // console.log(kode);
            // Temukan jarak antara sekarang dan tanggal hitung mundur
            var distance = countDownDate - now;

            // Perhitungan waktu untuk hari, jam, menit dan detik
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Keluarkan hasil dalam elemen dengan id = "demo"
            document.getElementById("durasi-addtocart").innerHTML = hours + " jam " +
                minutes + " menit " + seconds + " detik ";
            $('#kode-cart').text(kode);
            //Jika hitungan mundur selesai, tulis beberapa teks
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("durasi-addtocart").innerHTML = "EXPIRED";
            }
            $('#btn-modal-close').click(function(e) {
                clearInterval(x);

            });
            $('#btn-back').click(function(e) {
                $('#pembayaran-addtocart').hide();
                $('#konfrimasi-pembayaran').hide();
                $('#cart').show(200);
                $('#btn-upload-bukti').show(200);
                $('#btn-kirim-bukti').hide();
                clearInterval(x);
                // reset_form_upload();
            });
            $('#btn-upload-bukti').click(function(e) {
                $('#konfrimasi-pembayaran').show(300);
                $('#btn-upload-bukti').hide();
                $('#btn-kirim-bukti').show(200);
            });
        }, 1000);
        // $('#durasi-addtocart').text($('#durasi-pembayaran' + id_cart).text());
        $('#total-pembayaran').text($('.price-cart' + id_cart).text());
        $('#jatuh_tempo').text('Jatuh tempo' + tgl + ',' + jam);
        $('#kode-pesanan').val(kode_pesanan);
        $('#pembayaran-addtocart').show(200);
        $('#cart').hide();
        $('#btn-kirim-bukti').hide();
        $('#btn-ok-addtocart, #btn-ubah-pembayaran-addtocart').hide();
        if (mode_bayar == 'Bank Mandiri') {
            $('#th-no-addtocart').text('No Rekening');
            $('#id-no-addtocart').text('1360014983586');
            $('#id-no-addtocart-val').val('1360014983586');
            $('.th-nm-pembayaran').text('Bank Mandiri');
            $('#logo-pembayaran').attr({
                src: "<?php echo base_url('assets'); ?>/img/logo_mandiri.png"
            });
        } else if (mode_bayar == 'Shopee Pay') {
            $('#th-no-addtocart').text('Virtual Akun');
            $('#id-no-addtocart').text('893082325788719');
            $('#id-no-addtocart-val').val('893082325788719');
            $('.th-nm-pembayaran').text('Shopee Pay');
            $('#logo-pembayaran').attr({
                src: "<?php echo base_url('assets'); ?>/img/logo_shopeePay.png"
            });
        } else if (mode_bayar == 'GoPay') {
            $('#th-no-addtocart').text('Virtual Akun');
            $('#id-no-addtocart').text('087831697017');
            $('#id-no-addtocart-val').val('087831697017');
            $('.th-nm-pembayaran').text('GoPay');
            $('#logo-pembayaran').attr({
                src: "<?php echo base_url('assets'); ?>/img/logo_gopay.png"
            });
        }
    });
    $(document).on("click", ".pilih-bukti-transfer", function() {
        var file = $(this).parents().find(".file-bukti-transfer");
        file.trigger("click");
    });

    $('#bukti-transfer').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#nm-bukti-transfer").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-bukti-transfer").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    $('#bank-pengirim').select2();
    $('#an-pengirim, #nominal').on('input', function() {
        btn_enable_kirim();
    });

    $("#btn-kirim-bukti").click(function(e) {
        // alert('ya');
        e.preventDefault();
        var nama = $('#an-pengirim').val();
        var nominal = $('#nominal').val();
        var kode_pesanan = $('#kode-pesanan').val();
        var bank = $("#bank-pengirim").find(':selected').val();
        const foto_bukti = $('#bukti-transfer').prop('files')[0];
        let formData = new FormData();
        formData.append('an-pengirim', nama);
        formData.append('nominal', nominal);
        formData.append('kode-pesanan', kode_pesanan);
        formData.append('bank', bank);
        formData.append('foto-bukti', foto_bukti);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('cart/simpan_bukti_transfer'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(msg) {
                $('#data_modal_addtocart').load('<?php echo site_url('Cart/data_cart'); ?>');
                $('.notif_blm_byr').load('<?php echo site_url('cart/notif_blm_byr'); ?>');
                var kode_pesanan = $('#kode-pesanan').val();
                var nohp = '<?php echo $useradmin->kontak; ?>';
                // var pesan = 'Terikasih sudah order, pesanan kamu segara kami kiri ke alamat anda ...';
                var pesan = 'Hallo kak saya mau konfirmasi pembayaran dengan kode pesanan #' + kode_pesanan;
                var linkWA = 'https://web.whatsapp.com/send?phone=' + nohp + '&text=' + pesan;
                window.location = linkWA;
            },
            error: function() {
                alert("Data Gagal Diupload");
            },
        });
    });

    tdk_ada_pesanan();
    jQuery(function() {
        $('#tdk-ada-pesanan').hide();
        $('#div5').hide();
        jQuery('#showall').click(function() {
            jQuery('.targetDiv').show();
        });
        jQuery('.showSingle').click(function() {
            jQuery('.targetDiv').hide();
            $('#div' + $(this).attr('target')).show();
            $('.font-active').removeClass('font-active');
            $('.font-' + $(this).attr('target')).addClass('font-active');

            tdk_ada_pesanan();
        });
    });
    
    
    tdk_ada_pesanan();
    function tdk_ada_pesanan() {
        $("#data-cart").each(function() {
            var $minHeight = 100;
            //you need the height of the div you are currently iterating on: use this
            if ($(this).height() < $minHeight) {
                $('.tdk-ada-pesanan').hide();
                $('.tdk-ada-pesanan').show(200);
                // alert('ya');
            } else {
                $('.tdk-ada-pesanan').hide();
            }
        });
    }

    function btn_enable_kirim() {
        if ($('#an-pengirim').val() == '') {

        } else if (($('#nominal').val() == '')) {

        } else {

            // alert('ya');
        }
    }

    function reset_form_upload() {
        $('#an-pengirim, #nominal, #bukti-transfer, #nm-bukti-transfer').val('');
        $('#preview-bukti-transfer').attr({
            src: "<?php echo base_url('assets'); ?>/img/80x80.png"
        });
    };

    // });
</script>