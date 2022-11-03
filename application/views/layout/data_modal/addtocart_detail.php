<div class="item">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="item_panel">
                    <figure class="wid-height">
                        <img id="foto-addtocart" src="<?php echo base_url('assets'); ?>/img/banners_cat_placeholder.jpg" class="lazy" alt="">
                    </figure>
                    <strong id="nm-produk-addtocart"></strong> / <span id="texture-addtocart"></span> / <span id="size-addtocart"></span>
                    <div class="price_panel"><span class="new_price new-price-addtocart"></span><span class="percentage percentage-addtocart">-20%</span> <span class="old_price old-price-addtocart">$160.00</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.detail-cart').show();
        $('#btn-ok-addtocart').val('detail');
        $('#total-produk-addtocart').text('1');
        $('#ongkir-addtocart').text('0,00');
        $('#total-berat-addtocart').val('0');
        $('#pembayaran-addtocart').hide();
        $('#form-buat-pesanan-addtocart, .cek-ongkir').show();
        $('#cart, #btn-kirim-bukti, #konfrimasi-pembayaran,#btn-back,#btn-upload-bukti').hide();
        $('#btn-ok-addtocart, #btn-ubah-pembayaran-addtocart').show();

        $('#nm-produk-addtocart').text($('#nm-produk').text());
        var taxt_texture = $("#select-texture-addtocart").find(':selected').text();
        var val_foto_texture = $("#select-texture-addtocart").find(':selected').val();
        var size_addtocart = $("#select-size-addtocart").find(':selected').text();
        var qty = $('.quantity').val();
        $('#size-addtocart').text(size_addtocart);
        $('#texture-addtocart').text(taxt_texture);
        $('#foto-addtocart').attr({
            src: "<?php echo base_url('upload'); ?>/" + val_foto_texture
        });
        $('#qty-addtocart').text(qty);

        var id_hrg = $("#select-size-addtocart").find(':selected').val();
        var data_diskon = $("#select-size-addtocart").find(':selected').data('diskon');
        var data_hrg_diskon = $("#select-size-addtocart").find(':selected').data('hrg-diskon');
        var data_hrg_awal = $("#select-size-addtocart").find(':selected').data('hrg-awal');
        if (data_diskon == '') {
            $('.percentage-addtocart, .old-price-addtocart').hide();
            $('.new-price-addtocart').text(data_hrg_awal);
        } else {
            $('.percentage-addtocart, .old-price-addtocart').show();
            $('.new-price-addtocart').text(data_hrg_diskon);
            $('.percentage-addtocart').text('-' + data_diskon + '%');
            $('.old-price-addtocart').text('Rp' + data_hrg_awal);
        }
    });
</script>