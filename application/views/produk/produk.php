<div class="container margin_76_35 bg-dashboard">
    <div class="row small-gutters">
        <?php
        $get_data = $this->uri->segment(2);
        $get_data_3 = $this->uri->segment(3);
        if ($get_data == 'category') {
        ?>
            <!-- <div class="row"> -->
                <div class="col-12">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
                            <li><a href="<?php echo base_url('dashboard'); ?>">Category</a></li>
                            <li><?php echo $get_data_3; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <button type="button" class="btn btn-rounded mr-2 btn-bg-kinderton btn-filter-produk btn-Boy" data-btn="Boy">Boys</button>
                    <button type="button" class="btn btn-rounded mr-2 btn-bg-kinderton btn-filter-produk btn-Girl" data-btn="Girl">Grils</button>
                    <button type="button" class="btn btn-rounded mr-2 btn-bg-kinderton btn-filter-produk btn-Unisex" data-btn="Unisex">Unisex</button>
                    <button type="button" class="btn btn-rounded mr-2 btn-bg-kinderton btn-filter-produk btn-all">All</button>
                </div>
            <!-- </div> -->
        <?php
        } else if ($get_data == 'gender') {
        ?>
            <!-- <div class="row"> -->
                <div class="col-12">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
                            <li><a href="<?php echo base_url('dashboard'); ?>">Gender</a></li>
                            <li><?php echo $get_data_3; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <button type="button" class="btn btn-rounded mr-2 btn-bg-kinderton btn-filter-produk btn-Longue-Wear" data-btn="Longue-Wear">Longue Wear</button>
                    <button type="button" class="btn btn-rounded mr-2 btn-bg-kinderton btn-filter-produk btn-Formal-Wear" data-btn="Formal-Wear">Formal Wear</button>
                    <button type="button" class="btn btn-rounded mr-2 btn-bg-kinderton btn-filter-produk btn-Modest-Wear" data-btn="Modest-Wear">Modest Wear</button>
                    <button type="button" class="btn btn-rounded mr-2 btn-bg-kinderton btn-filter-produk btn-all">All</button>
                </div>
            <!-- </div> -->
        <?php
        }
        ?>
    </div>
    <hr class="hr-cart">
    <div  class="row small-gutters">
        <?php
        foreach ($data_produk as $row) :
            $id_jp = $row->id_jp;
            $nm_jp = $row->nm_jp;
            $gender = $row->gender;
            $nm_produk = preg_replace("![^a-z0-9]+!i", "-", $nm_jp);
            $sql = "SELECT * FROM favorit WHERE produk= $id_jp AND status_favorit = 'terbeli'";
            $jumlah = $this->db->query($sql);
            if ($get_data == 'gender') {
                $filter = $row->kategori;
            } else if ($get_data == 'category') {
                $filter = $row->gender;
            }
        ?>
            <div id="produk<?php echo $filter; ?>" class="col-6 col-md-4 col-xl-3 col-produk">
                <div class="grid_item bg-white mb-1">
                    <?php
                    $sql = "SELECT * FROM harga_produk WHERE id_hrg_produk = $id_jp  ORDER BY hrg_awal DESC limit 1";
                    $query = $this->db->query($sql);
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $harga) {
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
                                <?php
                                } else { ?>
                                    <span class="new_price">Rp.<?php echo $harga->hrg_awal; ?></span>
                                <?php
                                }
                                ?>
                            </div>
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
                                        if ($('#countdown<?php echo $id_jp; ?>').text() == 'EXPIRED') {
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
                        }
                    }
                    ?>

                    <ul>
                        <?php if (!$this->session->userdata('is_login')) : ?>
                            <li><a href="#" class="tooltip-1" data-toggle="modal" data-target="#modal-login" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                            <li><a href="<?php echo base_url(); ?>detail_produk/data/<?php echo $row->id_jp; ?>/<?php echo $nm_produk; ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        <?php else : ?>
                            <!-- <li><a href="#" id="" class="tooltip-1 btn-simpan-favorit btn-favorit<?php echo $row->id_jp; ?>" data-user="<?= $this->session->userdata("id_user") ?>" data-produk="<?php echo $row->id_jp; ?>" data-foto="<?php echo $foto->id_fotpro; ?>" data-harga="<?php echo $harga->id_hrg; ?>" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li> -->
                            <li><a href="#" class="tooltip-1 btn-favorit-produk" data-id-produk="<?php echo $row->id_jp; ?>" data-foto-produk="<?php echo $foto->fotpro; ?>" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                            <li><a href="<?php echo base_url(); ?>detail_produk/data/<?php echo $row->id_jp; ?>/<?php echo $nm_produk; ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        <?php endif ?>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>