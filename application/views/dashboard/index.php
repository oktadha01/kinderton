<main>
    <div id="carousel-home">
        <div class="owl-carousel owl-theme">
            <?php
            $sql = "SELECT * FROM jenis_produk, foto_produk WHERE foto_produk.id_fotjp = jenis_produk.id_jp AND foto_produk.status_foto = 'slide'  ORDER BY RAND()";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $slide) {
                    $nm_jp = $slide->nm_jp;
                    $nm_produk = preg_replace("![^a-z0-9]+!i", "-", $nm_jp);
            ?>
                    <div class="owl-slide cover" style="background-image: url(<?php echo base_url('upload'); ?>/<?php echo $slide->fotpro; ?>);">
                        <div class="opacity-mask d-flex align-items-center">
                            <div class="container">
                                <div class="row justify-content-center justify-content-md-end">
                                    <div class="col-lg-6 static">
                                        <div class="slide-text text-right white">
                                            <h2 class="owl-slide-animated owl-slide-title"><?php echo $slide->kategori; ?><br><?php echo $slide->nm_jp; ?></h2>
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                            </p>
                                            <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="<?php echo base_url(); ?>detail_produk/data/<?php echo $slide->id_jp; ?>/<?php echo $nm_produk; ?>" role="button">Shop Now</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/owl-slide-->
            <?php
                }
            }
            ?>
        </div>
        <div id="icon_drag_mobile"></div>
    </div>
    <!--/carousel-->
    <?php
    $get_data = $this->uri->segment(2);
    echo $get_data
    ?>
    <ul id="banners_grid" class="clearfix">
        <?php
        $longue = 0;
        $formal = 0;
        $modest = 0;
        foreach ($data_ketegori as $data) {
        ?>
            <?php
            if ($data->kategori == 'Longue-Wear') {
                $longue++;
                if ($longue == 1) {
            ?>
                    <li>
                        <a href="<?php echo base_url(); ?>produk/category/<?php echo $data->kategori; ?>" class="img_container">
                            <img src="<?php echo base_url('upload'); ?>/<?php echo $data->fotpro; ?>" data-src="<?php echo base_url('upload'); ?>/<?php echo $data->fotpro; ?>" alt="" class="lazy">
                            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                                <h3><?php echo $data->kategori; ?></h3>
                                <div><span class="btn_1">Shop Now</span></div>
                            </div>
                        </a>
                    </li>
                <?php
                }
            } else if ($data->kategori == 'Formal-Wear') {
                $formal++;
                if ($formal == 1) {
                ?>
                    <li>
                        <a href="<?php echo base_url(); ?>produk/category/<?php echo $data->kategori; ?>" class="img_container">
                            <img src="<?php echo base_url('upload'); ?>/<?php echo $data->fotpro; ?>" data-src="<?php echo base_url('upload'); ?>/<?php echo $data->fotpro; ?>" alt="" class="lazy">
                            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                                <h3><?php echo $data->kategori; ?></h3>
                                <div><span class="btn_1">Shop Now</span></div>
                            </div>
                        </a>
                    </li>
                <?php
                }
                ?>
                <?php
            } else if ($data->kategori == 'Modest-Wear') {
                $modest++;
                if ($modest == 1) {
                ?>
                    <li>
                        <a href="<?php echo base_url(); ?>produk/category/<?php echo $data->kategori; ?>" class="img_container">
                            <img src="<?php echo base_url('upload'); ?>/<?php echo $data->fotpro; ?>" data-src="<?php echo base_url('upload'); ?>/<?php echo $data->fotpro; ?>" alt="" class="lazy">
                            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                                <h3><?php echo $data->kategori; ?></h3>
                                <div><span class="btn_1">Shop Now</span></div>
                            </div>
                        </a>
                    </li>
                <?php
                }
                ?>
            <?php
            }
            ?>
        <?php
        }
        ?>

    </ul>
    <!--/banners_grid -->
    <div class="container margin_60_35 bg-dashboard pt-3 pb-3">
        <div class="data-dashboard"></div>
        <!-- /row -->
    </div>
    <!-- /container -->
    <?php
    $sql = "SELECT * FROM jenis_produk, harga_produk, foto_produk WHERE jenis_produk.id_jp = harga_produk.id_hrg_produk AND foto_produk.id_fotjp = jenis_produk.id_jp AND jenis_produk.status_produk IN ('PROMO','NEW','HOT') AND foto_produk.status_foto = 'display' ORDER BY RAND() LIMIT 1";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $nm_jp = $row->nm_jp;
            $nm_produk = preg_replace("![^a-z0-9]+!i", "-", $nm_jp);
    ?>
            <div class="featured lazy" data-bg="url(<?php echo base_url('upload'); ?>/<?php echo $row->fotpro; ?>)">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container margin_60">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-6 wow" data-wow-offset="150">
                                <h3><?php echo $row->nm_jp; ?></h3>
                                <h5 class="text-light"><?php echo $row->kategori; ?>||<?php echo $row->gender; ?></h5>
                                <div class="feat_text_block">
                                    <div class="price_box">
                                        <?php if ($row->status_produk == 'PROMO') { ?>
                                            <span class="new_price">Rp.<?php echo $row->hrg_diskon; ?></span>
                                            <span class="old_price">Rp.<?php echo $row->hrg_awal; ?></span>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="new_price">Rp.<?php echo $row->hrg_awal; ?></span>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <a class="btn_1" href="<?php echo base_url(); ?>detail_produk/data/<?php echo $row->id_jp; ?>/<?php echo $nm_produk; ?>" role="button">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
    <!-- /featured -->
    <div class="bg_gray">
        <div class="container pt-2 pb-2">
            <div id="brands" class="owl-carousel owl-theme">
                <div class="item">
                    <a href="#0"><img src="<?php echo base_url('assets'); ?>/img/1-03.png" data-src="<?php echo base_url('assets'); ?>/img/1-03.png" alt="" class="owl-lazy size-logo-slide"></a>
                </div>
                <div class="item">
                    <a href="#0"><img src="<?php echo base_url('assets'); ?>/img/ikon baju-03.png" data-src="<?php echo base_url('assets'); ?>/img/ikon baju-03.png" alt="" class="owl-lazy size-logo-slide"></a>
                </div>
                <div class="item">
                    <a href="#0"><img src="<?php echo base_url('assets'); ?>/img/ikon baju-04.png" data-src="<?php echo base_url('assets'); ?>/img/ikon baju-04.png" alt="" class="owl-lazy size-logo-slide"></a>
                </div>
                <div class="item">
                    <a href="#0"><img src="<?php echo base_url('assets'); ?>/img/ikon baju-05.png" data-src="<?php echo base_url('assets'); ?>/img/ikon baju-05.png" alt="" class="owl-lazy size-logo-slide"></a>
                </div>
                <div class="item">
                    <a href="#0"><img src="<?php echo base_url('assets'); ?>/img/ikon baju-06.png" data-src="<?php echo base_url('assets'); ?>/img/ikon baju-06.png" alt="" class="owl-lazy size-logo-slide"></a>
                </div>
            </div><!-- /carousel -->
        </div><!-- /container -->
    </div>
    <!-- /bg_gray -->
</main>