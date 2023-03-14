<div class="row small-gutters">

    <?php
    foreach ($data_produk as $row) {
        $id_jp = $row->id_jp;
        $nm_jp = $row->nm_jp;
        $nm_produk = preg_replace("![^a-z0-9]+!i", "-", $nm_jp);
        $sql = "SELECT * FROM favorit WHERE produk= $id_jp AND status_favorit = 'terbeli'";
        $jumlah = $this->db->query($sql);
    ?>
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item bg-white mb-1">
                <?php
                $hrg = 0;
                foreach ($data_hrg_produk as $harga) {
                    if ($harga->id_hrg_produk == $id_jp) {
                        $hrg++;
                        if ($hrg == 1) {
                ?>
                            <figure class="mb-1">
                                <?php
                                if ($row->status_produk == 'HOT') { ?>
                                    <span class="ribbon hot"><?php echo $row->status_produk; ?></span>
                                <?php } else if ($row->status_produk == 'NEW') { ?>
                                    <span class="ribbon new"><?php echo $row->status_produk; ?></span>
                                <?php } else if ($row->status_produk == 'PROMO') { ?>
                                    <span class="ribbon off"><?php echo $harga->diskon; ?>%</span>
                                <?php
                                }
                                ?>
                                <!-- <a href="<?php echo base_url('detail_produk'); ?>/<?php echo $row->nm_jp; ?>"> -->
                                <a href="<?php echo base_url(); ?>detail_produk/data/<?php echo $row->id_jp; ?>/<?php echo $nm_produk; ?>">
                                    <?php
                                    $sql = "SELECT * FROM foto_produk WHERE id_fotjp = $id_jp AND status_foto = 'display' ORDER BY RAND() LIMIT 1";
                                    $query = $this->db->query($sql);
                                    if ($query->num_rows() > 0) {
                                        foreach ($query->result() as $foto) :
                                    ?>
                                            <img class="img-fluid lazy" src="<?php echo base_url('upload'); ?>/<?php echo $foto->fotpro; ?>" data-src="<?php echo base_url('upload'); ?>/<?php echo $foto->fotpro; ?>" alt="" data-foto="<?php echo $foto->fotpro; ?>">
                                    <?php
                                        endforeach;
                                    }
                                    ?>
                                    <?php
                                    $sql = "SELECT * FROM foto_produk WHERE id_fotjp = $id_jp AND status_foto = 'display' ORDER BY RAND() LIMIT 1";
                                    $query = $this->db->query($sql);
                                    if ($query->num_rows() > 0) {
                                        foreach ($query->result() as $foto2) {
                                    ?>
                                            <img class="img-fluid lazy" src="<?php echo base_url('upload'); ?>/<?php echo $foto2->fotpro; ?>" data-src="<?php echo base_url('upload'); ?>/<?php echo $foto2->fotpro; ?>" alt="">
                                    <?php
                                        }
                                    }
                                    ?>
                                </a>
                                <?php if ($row->status_produk == 'PROMO') { ?>
                                    <span class="countdown" id="countdown<?php echo $id_jp; ?>"></span>
                                <?php
                                } else {
                                }
                                ?>
                            </figure>
                            <div class="row">
                                <div class="col text-right">
                                    <span class="font-size-xs pr-2"><?php echo ($jumlah->num_rows()); ?> terjual</span>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>detail_produk/data/<?php echo $row->id_jp; ?>/<?php echo $nm_produk; ?>">
                                <h3><?php echo $row->nm_jp; ?></h3>
                            </a>
                            <div class="price_box">
                                <?php if ($row->status_produk == 'PROMO') { ?>
                                    <span class="new_price">Rp.<?php echo $harga->hrg_diskon; ?></span>
                                    <span class="old_price">Rp.<?php echo $harga->hrg_awal; ?></span>
                                    <script>
                                        var x = setInterval(function() {
                                            var countDownDate = new Date("<?php echo $row->tgl_akhir_promo; ?> <?php echo $row->jam_akhir_promo; ?>");

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
                                            document.getElementById("countdown<?php echo $id_jp; ?>").innerHTML = days + "D " + hours + ":" +
                                                minutes + ":" + seconds + "";
                                            //Jika hitungan mundur selesai, tulis beberapa teks
                                            if (distance < 0) {
                                                clearInterval(x);
                                                document.getElementById("countdown<?php echo $id_jp; ?>").innerHTML = "EXPIRED";
                                                if ($('#countdown<?php echo $id_jp; ?>').text() == 'EXPIRED' || $('#countdown<?php echo $id_jp; ?>').text() == 'NAND') {
                                                    // alert('ya')
                                                    var id_jp = '<?php echo $id_jp; ?>';
                                                    let formData = new FormData();
                                                    formData.append('id-jp', id_jp);
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: "<?php echo site_url('olah_data/expired_promo'); ?>",
                                                        data: formData,
                                                        cache: false,
                                                        processData: false,
                                                        contentType: false,
                                                        success: function(msg) {
                                                            $('.data-dashboard').load('<?php echo site_url('Dashboard/data_dashboard'); ?>');

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
                                } else { ?>
                                    <span class="new_price">Rp.<?php echo $harga->hrg_awal; ?></span>
                                <?php
                                }
                                ?>
                            </div>
                <?php
                        }
                    }
                }
                ?>

                <ul>
                    <?php if (!$this->session->userdata('is_login')) : ?>
                        <li><a href="#" class="tooltip-1" data-toggle="modal" data-target="#modal-login" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="<?php echo base_url(); ?>detail_produk/data/<?php echo $row->id_jp; ?>/<?php echo $nm_produk; ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    <?php else : ?>
                        <?php if ($this->session->userdata('status_user') == '1') { ?>
                            <li><a href="#" class="tooltip-1 btn-favorit-produk" data-id-produk="<?php echo $row->id_jp; ?>" data-foto-produk="<?php echo $foto->fotpro; ?>" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                            <li><a href="<?php echo base_url(); ?>detail_produk/data/<?php echo $row->id_jp; ?>/<?php echo $nm_produk; ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        <?php } else { ?>
                            <li><a href="#" class="tooltip-1 btn-favorit-produk-konfemail" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                            <li><a href="<?php echo base_url(); ?>detail_produk/data/<?php echo $row->id_jp; ?>/<?php echo $nm_produk; ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        <?php } ?>
                    <?php endif ?>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
    <?php
    }
    ?>
</div>
<script>
    $('.btn-favorit-produk-konfemail').click(function(e) {
        sweetalert();
        // alert('ya');
    });

    function sweetalert() {
        Swal.fire({
            // title: 'Error!',
            text: 'Please activate your account',
            icon: 'error',
            confirmButtonText: 'Konfrimasi'
        })
        $('.swal2-confirm').click(function(e) {
            window.location.assign("<?php echo base_url('konfrim_akun'); ?>");

        })

    };
    $('.btn-favorit-produk').click(function() {
        $('.navbar-bottom').addClass("opened");
        var id_produk = $(this).data('id-produk');
        var foto_produk = $(this).data('foto-produk');
        let formData = new FormData();
        formData.append('id-produk', id_produk);
        formData.append('foto-produk', foto_produk);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Favorit/select_favorit'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert(data);
                $('#data-addto-favorit').html(data);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
</script>