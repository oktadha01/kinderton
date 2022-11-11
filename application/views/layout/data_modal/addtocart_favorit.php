<div id="data-favorit" class="container margin_30">
    <div class="card">
        <div class="row">
            <table class="table table-striped cart-list p-3">
                <thead>
                    <tr>
                        <th>
                            PRODUK
                        </th>
                        <th>
                            VARIAN
                        </th>
                        <th>
                            UKURAN
                        </th>
                        <th>
                            HARGA
                        </th>
                        <th>
                            JUMLAH
                        </th>
                        <th>
                            SUBTOTAL
                        </th>
                        <th>
                            CHEKOUT
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data_favorit as $data) :
                        $id_jp = $data->id_jp;
                        $produk = $data->produk;
                        $hrg_favorit = $data->hrg_favorit;
                        // $no = 0;
                    ?>

                        <tr class="border-radius-6px tr<?php echo $data->id_favorit; ?>">
                            <td>
                                <img id="foto_favorit<?php echo $data->id_favorit; ?>" src="<?php echo base_url('upload'); ?>/<?php echo $data->fotpro; ?>" class="img-thumbnail max-height-5rem pr-1" alt="Image">
                                <span id="nm-produk-addtocart"><?php echo $data->nm_jp; ?></span>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control select2 height-2rem p-2px varian" id="varian-<?php echo $data->id_favorit; ?>" data-id-favorit="<?php echo $data->id_favorit; ?>" name="">
                                        <?php
                                        $sql = "SELECT * FROM foto_produk WHERE id_fotjp = $id_jp";
                                        $query = $this->db->query($sql);
                                        if ($query->num_rows() > 0) {
                                            foreach ($query->result() as $data_texture) {
                                                if ($data_texture->texture == '-') {
                                                } else {

                                        ?>
                                                    <option id="<?php echo $data_texture->fotpro; ?>" value="<?php echo $data_texture->id_fotpro; ?>"><?php echo $data_texture->texture; ?></option>
                                                <?php
                                                }
                                                ?>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control select2 height-2rem p-2px size" id="size-<?php echo $data->id_favorit; ?>" data-id-favorit="<?php echo $data->id_favorit; ?>" data-action="size-harga" name="">
                                        <?php
                                        if ($data->size == '') { ?>
                                            <option value="">Pilih Size</option>
                                        <?php
                                        } else { ?>
                                            <option disabled selected value=""><?php echo $data->size; ?></option>

                                        <?php
                                        }
                                        ?>
                                        <?php
                                        $sql = "SELECT *FROM harga_produk WHERE id_hrg_produk = $produk";
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
                                                if ($data_size->extra2_large == 'XL') { ?>
                                                    <option value="<?php echo $data_size->extra2_large; ?>" data-id-hrg="<?php echo $data_size->id_hrg; ?>" data-hrg-diskon="<?php echo $data_size->hrg_diskon; ?>" data-hrg-awal="<?php echo $data_size->hrg_awal; ?>"><?php echo $data_size->extra2_large; ?></option>
                                                <?php } else { ?>
                                                <?php } ?>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <?php
                                $sql = "SELECT *FROM harga_produk, jenis_produk WHERE harga_produk.id_hrg = $hrg_favorit AND harga_produk.id_hrg_produk = jenis_produk.id_jp ORDER BY id_hrg DESC";
                                $query = $this->db->query($sql);
                                if ($query->num_rows() > 0) {
                                    foreach ($query->result() as $data_hrg) {
                                ?>
                                        <?php if ($data_hrg->status_produk == 'PROMO') { ?>
                                            <span class="new_price text-danger hrg<?php echo $data->id_favorit; ?>">Rp.<?php echo $data_hrg->hrg_diskon; ?></span>
                                            <span class="font-size-smllr old_price old<?php echo $data->id_favorit; ?>">Rp.<?php echo $data_hrg->hrg_awal; ?></span>
                                            <span hidden class="produk-hrg<?php echo $data->id_favorit; ?>"><?php echo $data_hrg->hrg_diskon; ?></span>
                                        <?php
                                        } else { ?>
                                            <span class="new_price text-danger hrg<?php echo $data->id_favorit; ?>">Rp.<?php echo $data_hrg->hrg_awal; ?></span>
                                            <!-- <span class="produk-hrg<?php echo $data->id_favorit; ?>"><?php echo $data_hrg->hrg_awal; ?></span> -->
                                            <span hidden class="produk-hrg<?php echo $data->id_favorit; ?>"><?php echo $data_hrg->hrg_awal; ?></span>
                                        <?php
                                        }
                                        ?>
                                <?php
                                    }
                                }
                                ?>
                                <!-- <strong>$140.00</strong> -->
                            </td>
                            <td>
                                <input type="text" class="berat<?php echo $data->id_favorit; ?>" value="" hidden>
                                <div class="number-qty qty<?php echo $data->id_favorit; ?>">
                                    <input type="text" id="quantity-<?php echo $data->id_favorit; ?>" data-id-favorit="<?php echo $data->id_favorit; ?>" data-action="qty" data-berat="<?php echo $data->berat_produk; ?>" class="input-qty quantity qty<?php echo $data->id_favorit; ?>" value="<?php echo $data->qty; ?>">
                                    <button data-id-favorit="<?php echo $data->id_favorit; ?>" class="dec decrease-btn btn-qty qty<?php echo $data->id_favorit; ?>" data-action="qty" data-berat="<?php echo $data->berat_produk; ?>">-</button>
                                    <button data-id-favorit="<?php echo $data->id_favorit; ?>" class="inc increase-btn btn-qty qty<?php echo $data->id_favorit; ?>" data-action="qty" data-berat="<?php echo $data->berat_produk; ?>">+</button>
                                </div>
                            </td>
                            <td>
                                <span class="text-price">Rp.<strong class="text-price price subtotal<?php echo $data->id_favorit; ?>"></strong></span>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input chekout" type="checkbox" name="" id="chekout<?php echo $data->id_favorit; ?>" data-id-chekout="<?php echo $data->id_favorit; ?>" value="<?php echo $data->id_favorit; ?>">
                                        <label for="chekout<?php echo $data->id_favorit; ?>" class="custom-control-label label-chekout<?php echo $data->id_favorit; ?>"></label>
                                    </div>
                                </div>
                            </td>
                            <td class="options">
                                <a href="#" class="hapus-data-favorit" data-id-favorit="<?php echo $data->id_favorit; ?>"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        <script>
                            $(document).ready(function() {

                                $("#varian-<?php echo $data->id_favorit; ?>, option[value='<?php echo $data->foto_favorit; ?>']").attr("selected", "selected");

                                var gram = parseInt(<?php echo $data->berat_produk; ?>) * parseInt($('#quantity-<?php echo $data->id_favorit; ?>').val());
                                $('.berat<?php echo $data->id_favorit; ?>').val(gram);

                                var subtotal = parseFloat(removeCommas($('.produk-hrg<?php echo $data->id_favorit; ?>').text())) * $('#quantity-<?php echo $data->id_favorit; ?>').val();
                                $('.subtotal<?php echo $data->id_favorit; ?>').text(addCommas(subtotal));
                                //
                            });
                        </script>
                    <?php
                    endforeach
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <center>
        <h5 id="" class="font-family-cursive tdk-ada-pesanan-favorit">Tidak ada pesanan!!</h5>
    </center>
</div>

<script>
    tdk_ada_pesanan_favorit();


    $('#btn-ok-addtocart').val('favorit');
    $('#total-berat-addtocart').val('0');
    $('#cart, #btn-kirim-bukti, #konfrimasi-pembayaran,#btn-back,#btn-upload-bukti').hide();
    $('#btn-ok-addtocart, #btn-ubah-pembayaran-addtocart').show();
    $(document).on("change", ".varian", function(e) {
        // e.preventDefault();
        var id_favorit = $(this).data('id-favorit');
        var varian = $("#varian-" + id_favorit).find(':selected').val();
        var foto = $("#varian-" + id_favorit + " option:selected").attr("id");
        alert(varian + '--' + id_favorit + foto);
        $('#foto_favorit' + id_favorit).attr({
            src: "<?php echo base_url('upload'); ?>/" + foto
        });
        let formData = new FormData();
        formData.append('id_favorit', id_favorit);
        formData.append('foto_favorit', varian);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('favorit/edit_favorit'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(msg) {
                // alert(msg);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });

    });

    $(document).on("change", ".size", function(e) {
        var action = $(this).data('action');
        var id_favorit = $(this).data('id-favorit');
        var size = $("#size-" + id_favorit).find(':selected').val();
        var hrg_favorit = $("#size-" + id_favorit + " option:selected").data("id-hrg");
        var hrg_awal = $("#size-" + id_favorit + " option:selected").data("hrg-awal");
        var hrg_diskon = $("#size-" + id_favorit + " option:selected").data("hrg-diskon");
        // alert(id_favorit + '--' + hrg_favorit + '--' + size + '--' + hrg_awal + '--' + hrg_diskon + '--' + action);
        if (hrg_diskon == '') {
            $('.hrg' + id_favorit).text('Rp.' + hrg_awal);
            $('.produk-hrg' + id_favorit).text(hrg_awal);
        } else {
            $('.old' + id_favorit).text('Rp.' + hrg_awal);
            $('.hrg' + id_favorit).text('Rp.' + hrg_diskon);
            $('.produk-hrg' + id_favorit).text(hrg_diskon);
        }
        var subtotal = parseFloat(removeCommas($('.produk-hrg' + id_favorit).text())) * $('#quantity-' + id_favorit).val();
        $('.subtotal' + id_favorit).text(addCommas(subtotal));


        let formData = new FormData();
        formData.append('action', action);
        formData.append('id_favorit', id_favorit);
        formData.append('size', size);
        formData.append('hrg_favorit', hrg_favorit);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('favorit/edit_favorit'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(msg) {
                // alert(msg);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });

    $(document).on("input", ".quantity", function(e) {
        var action = $(this).data('action');
        var id_favorit = $(this).data('id-favorit');
        var berat = $(this).data('berat');
        // $('#quantity-' + id_favorit).val(parseInt($('#quantity-' + id_favorit).val()) + 1);
        var qty = $('#quantity-' + id_favorit).val();
        var gram = parseInt(berat) * parseInt($('#quantity-' + id_favorit).val());
        var subtotal = parseFloat(removeCommas($('.produk-hrg' + id_favorit).text())) * parseInt($('#quantity-' + id_favorit).val());
        $('.subtotal' + id_favorit).text(addCommas(subtotal));
        $('.berat' + id_favorit).val(gram);
        // alert(gram)

        let formData = new FormData();
        formData.append('action', action);
        formData.append('id_favorit', id_favorit);
        formData.append('qty', qty);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('favorit/edit_favorit'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(msg) {
                // alert(msg);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
    $('.mode-bayar').hide();
    $('.chekout').click(function(e) {
        var id_chekout = $(this).data('id-chekout');
        // alert(id_chekout);
        if ($(this).is(":checked")) {
            var total_gram = parseInt($("#total-berat-addtocart").val()) + parseInt($('.berat' + id_chekout).val());
            if (total_gram > '10000') {
                var total_gram = parseInt(total_gram) - parseInt($('.berat' + id_chekout).val());
                $("#total-berat-addtocart").val(total_gram);
                alert('Berat Tidak Boleh Lebih Dari 10Kg');
                $('#chekout' + id_chekout).prop('checked', false);
            } else {
                var qty = parseInt($('#qty-addtocart').text()) + parseInt($('#quantity-' + id_chekout).val());
                var sub = parseFloat(removeCommas($('.subtotal' + id_chekout).text())) + parseFloat(removeCommas($('#subtotal-addtocart').text()));
                var total = sub + parseFloat(removeCommas($('#ongkir-addtocart').text()));
                $('#total-produk-addtocart').text(parseInt($('#total-produk-addtocart').text()) + 1);
                berat_kg();
                $('.label-chekout' + id_chekout).text('Chekout');
                $('.tr' + id_chekout).addClass('chekout');
                $('#varian-' + id_chekout).attr('disabled', true).addClass('chekout');
                $('#size-' + id_chekout).attr('disabled', true).addClass('chekout');
                $('.qty' + id_chekout).attr('disabled', true).addClass('chekout');
                $('#select-kurir').removeAttr('hidden', true);
                document.getElementById('box_cart').scrollIntoView({
                    behavior: 'smooth'
                });

            }
        } else {
            var qty = parseInt($('#qty-addtocart').text()) - parseInt($('#quantity-' + id_chekout).val());
            var total_gram = parseInt($("#total-berat-addtocart").val()) - parseInt($('.berat' + id_chekout).val());
            var sub = parseFloat(removeCommas($('#subtotal-addtocart').text())) - parseFloat(removeCommas($('.subtotal' + id_chekout).text()));
            var total = sub + parseFloat(removeCommas($('#ongkir-addtocart').text()));
            $('#total-produk-addtocart').text(parseInt($('#total-produk-addtocart').text()) - 1);
            berat_kg();
            $('.label-chekout' + id_chekout).text('');
            $('.tr' + id_chekout).removeClass('chekout');
            $('#varian-' + id_chekout).removeAttr('disabled').removeClass('chekout');
            $('#size-' + id_chekout).removeAttr('disabled').removeClass('chekout');
            $('.qty' + id_chekout).attr('disabled', false).removeClass('chekout');
            if ($('#subtotal-addtocart').text() == '0,00') {
                $('#berat-addtocart').text('0');
                $('#total-addtocart').text('0,00');
                $('#ongkir-addtocart').text('0,00');
                $('#select-kurir').attr('hidden', true);
                $('.cek-ongkir').hide(300);
            } else {
                document.getElementById('box_cart').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }

        function berat_kg() {
            $("#qty-addtocart").text(qty);
            $("#total-berat-addtocart").val(total_gram);
            $('#subtotal-addtocart').text(addCommas(sub));
            $('#total-addtocart').text(addCommas(total));

            if (total_gram <= '1000') {
                var kg = '1';
                chekout();
            } else if (total_gram >= '1000' && total_gram <= '2000') {
                var kg = '2';
                chekout();
            } else if (total_gram >= '2000' && total_gram <= '3000') {
                var kg = '3';
                chekout();
            } else if (total_gram >= '3000' && total_gram <= '4000') {
                var kg = '4';
                chekout();
            } else if (total_gram >= '4000' && total_gram <= '5000') {
                var kg = '5';
                chekout();
            } else if (total_gram >= '5000' && total_gram <= '6000') {
                var kg = '6';
                chekout();
            } else if (total_gram >= '6000' && total_gram <= '7000') {
                var kg = '7';
                chekout();
            } else if (total_gram >= '7000' && total_gram <= '8000') {
                var kg = '8';
                chekout();
            } else if (total_gram >= '8000' && total_gram <= '9000') {
                var kg = '9';
                chekout();
            } else if (total_gram >= '9000' && total_gram <= '10000') {
                var kg = '10';
                chekout();
            }

            function chekout() {

                if (qty == '0') {
                    $('.cek-ongkir').hide();
                    $('.mode-bayar').hide();

                } else {
                    var kurir = $(".select-kurir-addtocart").find(':selected').val();
                    let formData = new FormData();
                    formData.append('kurir', kurir);
                    formData.append('berat_kg', kg);
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('Chekout/cek_ongkir'); ?>",
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(data) {

                            $('.cek-ongkir').html(data);
                            if ($('.cek-berat').text() == '0') {
                                chekout();
                            } else {
                                setTimeout(hide_loader, 1000);
                                event.preventDefault();
                            }
                            $('.mode-bayar').show();
                            show_loader();
                        },
                        error: function() {
                            alert("Data Gagal Diupload");
                        }
                    });
                }
            }
            $(document).on("change", ".select-kurir-addtocart", function(e) {
                var kurir = $(".select-kurir-addtocart").find(':selected').val();
                let formData = new FormData();
                formData.append('berat_kg', $('.cek-berat').text());
                formData.append('kurir', kurir);
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('Chekout/cek_ongkir'); ?>",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        // alert(msg);
                        $('.cek-ongkir').html(data);
                        if ($('.cek-berat').text() == '0') {
                            $('#ongkir-addtocart').text('0,00');
                            var total = parseFloat(removeCommas($('#subtotal-addtocart').text())) + parseFloat(removeCommas($('#ongkir-addtocart').text()));
                            $('#total-addtocart').text(addCommas(total));

                            $('#tabel-alamat').show(300);
                            $('#btn-edit-alamat').show(300);
                            $('#form-edit-alamat').attr('hidden', true);
                        } else {
                            setTimeout(hide_loader, 1000);
                            event.preventDefault();
                        }
                        show_loader();
                    },
                    error: function() {
                        alert("Data Gagal Diupload");
                    }
                });
            });

            function show_loader() {
                // $("#loader").addClass("loader");
                $("#loader").show();
                $('.cek-ongkir').hide();
                //event.preventDefault();
            }

            function hide_loader() {
                // $("#loader").removeClass("loader");
                $("#loader").hide(300);
                $('.cek-ongkir').show();
                //event.preventDefault();
            }
        }
    });
    $('.cek-ongkir').hide();
    $('.loader').hide();
    $('#btn-addtocart').attr('disabled', true);
    // function subtotal_total() {
    //     var subtotal = parseFloat(removeCommas($('.new-price-addtocart').text())) * parseInt($('.quantity').val());
    $('#subtotal-addtocart').text('0,00');

    //     var total = parseFloat(removeCommas($('#subtotal-addtocart').text())) + parseFloat(removeCommas($('#ongkir-addtocart').text()));
    $('#total-produk-addtocart,#qty-addtocart,#berat-addtocart').text('0');
    $('#total-addtocart').text('0,00');
    $('#ongkir-addtocart').text('0,00');


    $('.increase-btn').click(function() {
        var id_favorit = $(this).data('id-favorit');
        $('#quantity-' + id_favorit).val(parseInt($('#quantity-' + id_favorit).val()) + 1);
        var action = $(this).data('action');
        var berat = $(this).data('berat');
        var qty = $('#quantity-' + id_favorit).val();
        var gram = parseInt(berat) * parseInt($('#quantity-' + id_favorit).val());
        var subtotal = parseFloat(removeCommas($('.produk-hrg' + id_favorit).text())) * parseInt($('#quantity-' + id_favorit).val());
        $('.subtotal' + id_favorit).text(addCommas(subtotal));
        $('.berat' + id_favorit).val(gram);

        let formData = new FormData();
        formData.append('action', action);
        formData.append('id_favorit', id_favorit);
        formData.append('qty', qty);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('favorit/edit_favorit'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(msg) {
                // alert(msg);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });

    $('.decrease-btn').click(function() {
        var id_favorit = $(this).data('id-favorit');
        $('#quantity-' + id_favorit).val(parseInt($('#quantity-' + id_favorit).val()) - 1);
        var action = $(this).data('action');
        var berat = $(this).data('berat');
        var qty = $('#quantity-' + id_favorit).val();
        var gram = parseInt(berat) * parseInt($('#quantity-' + id_favorit).val());
        var subtotal = parseFloat(removeCommas($('.produk-hrg' + id_favorit).text())) * parseInt($('#quantity-' + id_favorit).val());
        $('.subtotal' + id_favorit).text(addCommas(subtotal));
        $('.berat' + id_favorit).val(gram);

        let formData = new FormData();
        formData.append('action', action);
        formData.append('id_favorit', id_favorit);
        formData.append('qty', qty);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('favorit/edit_favorit'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(msg) {
                // alert(msg);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });

    $('.hapus-data-favorit').click(function(e) {
        var el = this;

        // Delete id
        var id_favorit = $(this).data('id-favorit');
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            let formData = new FormData();
            formData.append('id-favorit', id_favorit);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('favorit/hapus_data_favorit') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    $('#notif-favorit').load('<?php echo site_url('Favorit/notif_favorit'); ?>');
                    $(el).closest('tr').css('background', 'tomato');
                    $(el).closest('tr').fadeOut(300, function() {
                        $(this).remove();
                    });
                    tdk_ada_pesanan_favorit();
                }
            });
        }
    });

    function tdk_ada_pesanan_favorit() {

        $("#data-favorit").each(function() {
            var $minHeight = 100;
            //you need the height of the div you are currently iterating on: use this
            if ($(this).height() < $minHeight) {
                $('.tdk-ada-pesanan-favorit').show(200);
                $('.detail-cart').hide();
                // alert('ya');
            } else {
                $('.tdk-ada-pesanan-favorit').hide();
                $('.detail-cart').show();
            }
        });
    }
</script>