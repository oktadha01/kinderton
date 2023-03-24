<style>
    .size-addto-favorit {
        height: 7rem;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgb(0 0 0 / 0%), 0 6px 6px rgb(0 0 0 / 13%) !important;
    }

    .size-textureddto-favorit {
        height: 23px;
    }

    .bg-size-texture-addto-favorit {
        padding: 7px;
        background: antiquewhite;
        max-width: fit-content;
        border-radius: 6px;
        margin: 10px;

    }

    .conten {
        content: '\e802';
    }

    .texture.selected {
        content: '\e802';
        border: 2px solid red;
        background: white;
    }

    .border-b {
        border-bottom: 1px solid black;
    }

    .hr {
        margin: 12px 0 5px 0 !important;
        border-top: 1px solid #dddddd;
    }

    .height {
        height: 41px;
    }

    .btn-disabled {
        background: darkgray !important;
    }

    .font-size-s {
        font-size: smaller;
    }

    .qty-disabled {
        color: #bcbcc4 !important;
    }
</style>
<?php
$id_produk = $this->input->post('id-produk');
$foto_produk = $this->input->post('foto-produk');
$sql = "SELECT * FROM jenis_produk WHERE id_jp = $id_produk";
$query = $this->db->query($sql);
foreach ($query->result() as $data) :
    $id_jp = $data->id_jp;
    $nm_jp = $data->nm_jp;
?>

    <div class="row pt-2">
        <div class="col-lg-6 col-md-6 col-12">
            <!-- <div class="row border-b p-3"> -->
            <img id="foto-addto-favorit" class="size-addto-favorit float-left mr-4" src="<?php echo base_url('upload'); ?>/<?php echo $this->input->post('foto-produk'); ?>" alt="The Woods" />
            <h6 class=""><?php echo $data->nm_jp; ?>||<?php echo $data->kategori; ?>||<?php echo $data->gender; ?></h6>
            <?php
            $id_produk = $this->input->post('id-produk');
            $min = "SELECT *
            FROM harga_produk
            WHERE hrg_awal = (SELECT MIN(hrg_awal)FROM harga_produk WHERE id_hrg_produk = $id_produk)";
            $min_ = $this->db->query($min);
            foreach ($min_->result() as $min_hrg) :
            endforeach;
            ?>

            <?php
            $id_produk = $this->input->post('id-produk');
            $max = "SELECT *
            FROM harga_produk
            WHERE hrg_awal = (SELECT MAX(hrg_awal)FROM harga_produk WHERE id_hrg_produk = $id_produk)";
            $max_ = $this->db->query($max);
            foreach ($max_->result() as $max_hrg) :
            endforeach;
            ?>
            <?php
            if ($min_hrg->hrg_awal == $max_hrg->hrg_awal) {
            ?>
                <?php
                if ($min_hrg->hrg_diskon == '') {
                ?>
                    <p class="mb-0 text-danger">Rp.<span class="price-addtofavorit"><span><?php echo $max_hrg->hrg_awal; ?></span></span></p>
                <?php
                } else {
                ?>
                    <p class="mb-0 text-danger">Rp.<span class="price-addtofavorit"><span><?php echo $max_hrg->hrg_awal; ?></span></span></p>
                    <p><span class="old_price old font-size-s">Rp. <span class="diskon-addtofavorit"><span><?php echo $min_hrg->hrg_awal; ?></span></span></p>
                <?php
                }
                ?>

            <?php
            } else {
            ?>
                <?php
                if ($min_hrg->hrg_diskon == '') {
                ?>
                    <p class="mb-0 text-danger">Rp.<span class="price-addtofavorit"><span><?php echo $min_hrg->hrg_awal; ?></span> - Rp.<span><?php echo $max_hrg->hrg_awal; ?></span></span></p>

                <?php
                } else {
                ?>
                    <p class="mb-0 text-danger">Rp.<span class="price-addtofavorit"><span><?php echo $min_hrg->hrg_diskon; ?></span> - Rp.<span><?php echo $max_hrg->hrg_diskon; ?></span></span></p>
                    <p><span class="old_price old font-size-s">Rp.
                            <span class="diskon-addtofavorit">
                                <span><?php echo $min_hrg->hrg_awal; ?></span>
                                <span class="old_price old font-size-s">
                                    Rp.<?php echo $max_hrg->hrg_awal; ?>
                                </span>
                            </span>
                    </p>
                <?php
                }
                ?>
            <?php
            }
            ?>

        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="row mt-2">
                <?php
                $sql = "SELECT * FROM foto_produk WHERE id_fotjp = $id_jp AND status_foto = 'display'";
                $query = $this->db->query($sql);
                foreach ($query->result() as $foto) {
                    if ($foto->texture == '-') {
                    } else {
                ?>
                        <p class="bg-size-texture-addto-favorit texture" data-texture-addto-favorit="<?php echo $foto->id_fotpro; ?>" data-foto-addto-favorit="<?php echo base_url('upload'); ?>/<?php echo $foto->fotpro; ?>"><img class="size-textureddto-favorit float-left mr-2" src="<?php echo base_url('upload'); ?>/<?php echo $foto->fotpro; ?>" alt="The Woods" />
                            <?php echo $foto->texture; ?></p>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <hr class="hr">
    <div class="row mt-2">
        <div class="col-lg-3 col-md-3 col-5">
            <label for="">Size/Ukuran</label>
            <div class="form-group">
                <select class="form-control select2 heightp-2px" id="select-size-addtofavorit" data-id-favorit="" data-action="" name="">
                    <option value="0">Pilih size</option>
                    <?php
                    $sql = "SELECT *FROM harga_produk WHERE id_hrg_produk = $id_jp ORDER BY id_hrg ASC";
                    $query = $this->db->query($sql);
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $data_size) {
                    ?>
                            <?php
                            if ($data_size->all_size == 'All Size') { ?>
                                <option value="<?php echo $data_size->all_size; ?>" data-id-hrg="<?php echo $data_size->id_hrg; ?>" data-hrg-diskon="<?php echo $data_size->hrg_diskon; ?>" data-hrg-awal="<?php echo $data_size->hrg_awal; ?>"><?php echo $data_size->all_size; ?></option>
                            <?php } else { ?>
                            <?php } ?>

                            <?php
                            if ($data_size->small == 'S') { ?>
                                <option value="<?php echo $data_size->small; ?>" data-id-hrg="<?php echo $data_size->id_hrg; ?>" data-hrg-diskon="<?php echo $data_size->hrg_diskon; ?>" data-hrg-awal="<?php echo $data_size->hrg_awal; ?>"><?php echo $data_size->small; ?></option>
                            <?php } else { ?>
                            <?php } ?>

                            <?php
                            if ($data_size->medium == 'M') { ?>
                                <option value="<?php echo $data_size->medium; ?>" data-id-hrg="<?php echo $data_size->id_hrg; ?>" data-hrg-diskon="<?php echo $data_size->hrg_diskon; ?>" data-hrg-awal="<?php echo $data_size->hrg_awal; ?>"><?php echo $data_size->medium; ?></option>
                            <?php } else { ?>
                            <?php } ?>

                            <?php
                            if ($data_size->large == 'L') { ?>
                                <option value="<?php echo $data_size->large; ?>" data-id-hrg="<?php echo $data_size->id_hrg; ?>" data-hrg-diskon="<?php echo $data_size->hrg_diskon; ?>" data-hrg-awal="<?php echo $data_size->hrg_awal; ?>"><?php echo $data_size->large; ?></option>
                            <?php } else if ($data_size->large == '') { ?>
                            <?php } ?>

                            <?php
                            if ($data_size->extra_large == 'XL') { ?>
                                <option value="<?php echo $data_size->extra_large; ?>" data-id-hrg="<?php echo $data_size->id_hrg; ?>" data-hrg-diskon="<?php echo $data_size->hrg_diskon; ?>" data-hrg-awal="<?php echo $data_size->hrg_awal; ?>"><?php echo $data_size->extra_large; ?></option>
                            <?php } else { ?>
                            <?php } ?>

                            <?php
                            if ($data_size->extra2_large == 'XXL') { ?>
                                <option value="<?php echo $data_size->extra2_large; ?>" data-id-hrg="<?php echo $data_size->id_hrg; ?>" data-hrg-diskon="<?php echo $data_size->hrg_diskon; ?>" data-hrg-awal="<?php echo $data_size->hrg_awal; ?>"><?php echo $data_size->extra2_large; ?></option>
                            <?php } else { ?>
                            <?php } ?>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-5">
            <label for="">Jumlah</label>
            <div class="number-qty">
                <input type="number" id="quantity" class="input-qty quantity text-danger qty-addtofavorid qty-disabled" value="1" disabled>
                <button class="dec decrease-btn btn-qty qty-addtofavorid qty-disabled" disabled>-</button>
                <button class="inc increase-btn btn-qty qty-addtofavorid qty-disabled" disabled>+</button>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <button type="button" id="btn-simpan-addtofavorit" class="btn btn-sm col-12 pl-2 pr-2 btn-disabled" disabled><i class="fa-regular fa-heart"></i> Favorit</button>
    </div>
<?php
endforeach
?>
<input type="text" class="texture-addtofavorit" value="" hidden>
<script>
    $('.texture').on('click', function() {
        $('.texture').removeClass('selected');
        $(this).addClass('selected');
        var foto = $(this).data('foto-addto-favorit');
        var texture = $(this).data('texture-addto-favorit');
        $('.texture-addtofavorit').val(texture);
        $('#foto-addto-favorit').attr({
            src: foto
        });
        disabled_btn();
    });

    $(document).on("change", "#select-size-addtofavorit", function(e) {
        var hrg_awal = $("#select-size-addtofavorit option:selected").data("hrg-awal");
        var hrg_diskon = $("#select-size-addtofavorit option:selected").data("hrg-diskon");
        // alert($("#select-size-addtofavorit option:selected").data("hrg-diskon"));
        if (hrg_diskon == '') {

            $('.price-addtofavorit').text(hrg_awal);
        } else {
            $('.price-addtofavorit').text(hrg_diskon);
            $('.diskon-addtofavorit').text(hrg_awal);
        }
        disabled_btn();
    });

    function disabled_btn() {
        if ($('.texture-addtofavorit').val() == '') {} else if ($("#select-size-addtofavorit").find(':selected').val() == '0') {
            $('#btn-simpan-addtofavorit').addClass('btn-disabled').removeClass('bg-info').attr('disabled', true);
            $('.qty-addtofavorid').addClass('qty-disabled').attr('disabled', true);
        } else {
            $('.qty-addtofavorid').removeClass('qty-disabled').removeAttr('disabled', true);
            $('#btn-simpan-addtofavorit').removeClass('btn-disabled').addClass('bg-info').removeAttr('disabled', true);
        }
    }

    $("#btn-simpan-addtofavorit").click(function(e) {
        // alert('ya');
        e.preventDefault();
        var user = '<?= $this->session->userdata("id_user") ?>';
        var produk = '<?php echo $data->id_jp; ?>';
        var foto = $('.texture-addtofavorit').val();
        var harga = $("#select-size-addtofavorit option:selected").data("id-hrg");
        var qty = $('#quantity').val();
        var size = $("#select-size-addtofavorit").find(':selected').val();
        // alert(user + '||' + produk + '||' + foto + '||' + harga+'||'+qty+'||'+size);
        let formData = new FormData();
        formData.append('user', user);
        formData.append('produk', produk);
        formData.append('harga', harga);
        formData.append('foto', foto);
        formData.append('qty', qty);
        formData.append('size', size);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('favorit/simpan_favorit'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(msg) {
                // alert(msg);
                $('#notif-favorit').load('<?php echo site_url('Favorit/notif_favorit'); ?>');
                $('.favorit').load('<?php echo site_url('Favorit/data_favorit'); ?>');
                $('.navbar-bottom').removeClass("opened");
            },
            error: function() {
                alert("Gagal");
            }
        });
    });

    $('.increase-btn').click(function() {
        // var id_favorit = $(this).data('id-favorit');
        $('#quantity').val(parseInt($('#quantity').val()) + 1);
        // var action = $(this).data('action');
        // var berat = $(this).data('berat');
        // var qty = $('#quantity-' + id_favorit).val();
        // var gram = parseInt(berat) * parseInt($('#quantity-' + id_favorit).val());
        // var subtotal = parseFloat(removeCommas($('.produk-hrg' + id_favorit).text())) * parseInt($('#quantity-' + id_favorit).val());
        // $('.subtotal' + id_favorit).text(addCommas(subtotal));
        // $('.berat' + id_favorit).val(gram);

        // let formData = new FormData();
        // formData.append('action', action);
        // formData.append('id_favorit', id_favorit);
        // formData.append('qty', qty);
        // $.ajax({
        //     type: 'POST',
        //     url: "<?php echo site_url('favorit/edit_favorit'); ?>",
        //     data: formData,
        //     cache: false,
        //     processData: false,
        //     contentType: false,
        //     success: function(msg) {
        //         // alert(msg);

        //     },
        //     error: function() {
        //         alert("Data Gagal Diupload");
        //     }
        // });
    });

    $('.decrease-btn').click(function() {
        $('#quantity').val(parseInt($('#quantity').val()) - 1);
        // var action = $(this).data('action');
        // var berat = $(this).data('berat');
        // var qty = $('#quantity-' + id_favorit).val();
        // var gram = parseInt(berat) * parseInt($('#quantity-' + id_favorit).val());
        // var subtotal = parseFloat(removeCommas($('.produk-hrg' + id_favorit).text())) * parseInt($('#quantity-' + id_favorit).val());
        // $('.subtotal' + id_favorit).text(addCommas(subtotal));
        // $('.berat' + id_favorit).val(gram);

        // let formData = new FormData();
        // formData.append('action', action);
        // formData.append('id_favorit', id_favorit);
        // formData.append('qty', qty);
        // $.ajax({
        //     type: 'POST',
        //     url: "<?php echo site_url('favorit/edit_favorit'); ?>",
        //     data: formData,
        //     cache: false,
        //     processData: false,
        //     contentType: false,
        //     success: function(msg) {
        //         // alert(msg);

        //     },
        //     error: function() {
        //         alert("Data Gagal Diupload");
        //     }
        // });
    });
</script>