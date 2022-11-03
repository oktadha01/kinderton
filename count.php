<!DOCTYPE HTML>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        p {
            text-align: center;
            font-size: 60px;
            margin-top: 0px;
        }
    </style>
</head>

<body>
    <?php
    // $pinjam            = date("d-m-Y");
    $jatuh_tempo        = mktime(0, 0, 0, date("n"), date("j") + 1, date("Y"));
    $convert_tgl_jatuh_tempo        = date("d-m-Y", $jatuh_tempo);

    // echo "<br />";
    // echo "Tgl Kembali : $convert_tgl_jatuh_tempo";
    ?>
    <input type="text" id="tgl" value="">

    <p id="demo"></p>

    <script>
        // Perbarui hitungan mundur setiap 1 detik
        const milliseconds = new Date().getTime();

        const hours1 = `0${new Date(milliseconds).getHours()}`.slice(-2);
        const minutes1 = `0${new Date(milliseconds).getMinutes()}`.slice(-2);
        const seconds1 = `0${new Date(milliseconds).getSeconds()}`.slice(-2);

        const time = `${hours1}:${minutes1}:${seconds1}`
        // var tgl_tempo = document.getElementById('#tgl').val();
        var x = setInterval(function() {
            console.log(time);
            // Tetapkan tanggal kita menghitung mundur
            var countDownDate = new Date("10-13-2022 00:00:00").getTime();

            // Dapatkan tanggal dan waktu hari ini
            var now = new Date().getTime();
            // var now = new Date();

            // console.log(now.getTime());
            // Temukan jarak antara sekarang dan tanggal hitung mundur
            var distance = countDownDate - now;

            // Perhitungan waktu untuk hari, jam, menit dan detik
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Keluarkan hasil dalam elemen dengan id = "demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";

            //Jika hitungan mundur selesai, tulis beberapa teks
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>

</body>

</html>
<div id="div2" class="targetDiv">
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
</div>

