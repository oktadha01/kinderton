<style>
    .vodiapicker {
        display: none;
    }

    #a {
        padding-left: 0px;
    }

    #a img,
    .btn-select img {
        width: 77px;
        height: auto;

    }

    #a li {
        list-style: none;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 4px;
    }

    #a li:hover {
        background-color: #F4F3F3;
    }

    #a li img {
        margin: 5px;
    }

    #a li span,
    .btn-select li span {
        margin-left: 30px;
    }

    /* item list */

    .b {
        display: none;
        width: 100%;
        max-width: 350px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: 5px;

    }

    .open {
        display: show !important;
    }

    .btn-select {
        margin-top: 10px;
        width: 100%;
        max-width: 350px;
        height: 34px;
        border-radius: 5px;
        background-color: #fff;
        border: 1px solid #ccc;

    }

    .btn-select li {
        list-style: none;
        float: left !important;
        padding-bottom: 0px;
    }

    .btn-select:hover li {
        margin-left: 0px;
    }

    .btn-select:hover {
        background-color: #F4F3F3;
        border: 1px solid transparent;
        box-shadow: inset 0 0px 0px 1px #ccc;


    }

    .btn-select:focus {
        outline: none;
    }

    .lang-select {
        margin-left: 50px;
    }

    /* :root {
        --main-color: #ecf0f1;
        --point-color: #555;
        --size: 5px;
    } */

    .loader {
        overflow: hidden;
        position: relative;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        align-content: center;
        justify-content: center;
        z-index: 100000;
    }

    .loader-buat-pesanan {
        overflow: hidden;
        position: absolute;
        top: 45%;
        bottom: 45%;
        left: 40%;
        right: 40%;
        display: flex;
        align-items: center;
        align-content: center;
        justify-content: center;
        z-index: 100000;
    }

    .loader__element {
        border-radius: 100%;
        border: 5px solid #555;
        margin: calc(5px * 2);
    }

    .loader__element:nth-child(1) {
        animation: preloader 0.6s ease-in-out alternate infinite;
    }

    .loader__element:nth-child(2) {
        animation: preloader 0.6s ease-in-out alternate 0.2s infinite;
    }

    .loader__element:nth-child(3) {
        animation: preloader 0.6s ease-in-out alternate 0.4s infinite;
    }

    @keyframes preloader {
        100% {
            transform: scale(2);
        }
    }

    .hr-addtocart {
        margin: 0px 0 5px 0;
        border: 0;
        border-top: 1px solid #dddddd;
    }
</style>
<div id="modal-panel" class="top_panel">
    <div id="modal-header-panel" class="container header_panel pb-2">
        <a href="#" id="btn-modal-close" class="btn_close_top_panel"><i class="ti-close"></i></a>
        <!-- <label id="label-addtocart">1 product added to cart</label> -->
    </div>

    <!-- /header_panel -->
    <?php
    $jatuh_tempo        = mktime(0, 0, 0, date("n"), date("j") + 1, date("Y"));
    $convert_tgl_jatuh_tempo        = date("m-d-Y", $jatuh_tempo);
    ?>
    <p id="tgl-tempo" hidden><?php echo $convert_tgl_jatuh_tempo; ?></p>
    <p id="jam-tempo" hidden></p>
    <p id="kode-cart" hidden></p>

    <div id="pembayaran-addtocart" class="p-3">
        <div class="container">
            <div id="load-buat-pesanan" class="loader-buat-pesanan">
                <span class="loader__element"></span>
                <span class="loader__element"></span>
                <span class="loader__element"></span>
            </div>
            <div class="box_cart pt-1 pb-1">
                <ul class="text-right">
                    <li>
                        <span class="text-dark">Total Pembayaran</span>
                        <strong class="text-dark">Rp. <strong id="total-pembayaran" class="">0</strong></strong>
                        <hr>
                    </li>
                    <li class="text-transfrom-none">
                        <span class="text-dark">
                            <h6>Pembayaran Dalam</h6>
                        </span>
                        <h6 id="durasi-addtocart" class="text-danger font-size-m"></h6>
                        <p id="jatuh_tempo" class="font-size-xs text-secondary"></p>
                    </li>
                </ul>
                <hr>
                <table class="width-13rem">
                    <tr>
                        <th><img id="logo-pembayaran" src="<?php echo base_url('assets'); ?>/img/logo_mandiri.png" class="size-logo-pembayaran" alt=""></th>
                        <th class="th-nm-pembayaran">Bank Mandiri</th>
                    </tr>
                </table>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>A.N</th>
                            <th id="th-no-addtocart">No Rekening</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="an-akun-addtocart">Jilan Inas Sahar</td>
                            <td id="id-no-addtocart">1360014983586</td>
                            <th class="">
                                <a href="#" id="salin-no" onclick="myFunction()" data-clipboard-text="1">Salin</a>
                            </th>
                            <input type="text" id="id-no-addtocart-val" value="1360014983586" hidden>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr class="hr-addtocart">
            <div id="konfrimasi-pembayaran" class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <label for="an-pengirim">Nama</label>
                    <div class="form-group">
                        <input type="text" id="an-pengirim" name="an_pengirim" class="form-control" placeholder="An. Pengirim ..." required>
                    </div>
                    <div class="form-group">
                        <label>Bank Pengirim</label>
                        <select class="form-control select2" id="bank-pengirim" name="bank_pengirim" required="true">
                            <option value="0">Pilih Bank*</option>
                            <option value="BCA">BCA</option>
                            <option value="BRI">BRI</option>
                            <option value="BNI">BNI</option>
                            <option value="MANDIRI">MANDIRI</option>
                            <option value="Bank Lainnya">Bank Lainnya</option>
                        </select>
                    </div>
                    <label for="nominal">Nominal Pembayaran</label>
                    <div class="form-group">
                        <input type="text" id="nominal" name="nominal" class="form-control" placeholder="0.00" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <label for="kode-pesanan">Kode Pesanan</label>
                    <div class="form-group">
                        <input type="text" id="kode-pesanan" name="kode_pesanan" class="form-control btn-disabled" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="bukti-transfer">Foto Bukti transfer</label>
                        <div class="input-group">
                            <input type="file" id="bukti-transfer" name="bukti_transfer" class="file-bukti-transfer" hidden required>
                            <input type="text" id="nm-bukti-transfer" class="pilih-bukti-transfer form-control" placeholder="Upload Gambar" required>
                            <div class="input-group-append">
                                <button type="button" id="" class="pilih-bukti-transfer browse btn btn-dark">Upload Bukti</button>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo base_url('assets'); ?>/img/80x80.png" id="preview-bukti-transfer" class="pilih-bukti-transfer img-thumbnail max-height-14rem">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="#page">
                        <button type="button" id="btn-ubah-pembayaran-addtocart" class="col-lg-6 col md-6 col-12 btn btn-sm btn-warning">Ubah Pembayarn</button>
                        <button type="button" id="btn-back" class="col-lg-6 col md-6 col-12 btn btn-sm btn-danger">kembali</button>
                    </a>
                </div>
                <div class="col-6">
                    <a href="#page">
                        <button type="button" id="btn-ok-addtocart" class="col-lg-6 col md-6 col-12 btn btn-sm btn-info float-right" value="" disabled>Ok</button>
                        <button type="button" id="btn-upload-bukti" class="col-lg-6 col md-6 col-12 btn btn-sm btn-info float-right" value="">Upload Bukti Pembayaran</button>
                        <button type="button" id="btn-kirim-bukti" class="col-lg-6 col md-6 col-12 btn btn-sm btn-success float-right " value="">Kirim</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="form-buat-pesanan-addtocart" class="mt-4">
        <div id="data_modal_addtocart"></div>
        <div class="container detail-cart">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-group">
                        <label class="control-label float-left ml-3"><i class="fa-solid fa-truck"></i> Ubah Jasa Pengiriman</label>
                        <select class="form-control select-kurir-addtocart col-12" id="kurir" name="kurir" required="">
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS INDONESIA</option>
                        </select>
                    </div>
                    <div id="loader" class="loader">
                        <span class="loader__element"></span>
                        <span class="loader__element"></span>
                        <span class="loader__element"></span>
                    </div>
                    <div class="cek-ongkir"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 ">
                    <div class="form-group mode-bayar">
                        <label class="control-label ml-3" for=""><i class="fa-regular fa-credit-card"></i> Pilih Metode Pembayaran</label>
                        <select class="form-control vodiapicker">
                            <option value="BANK MANDIRI" data-thumbnail="<?php echo base_url('assets'); ?>/img/logo_mandiri.png">Transfer Bank Mandiri</option>
                            <option value="SHOPEEPAY" data-thumbnail="<?php echo base_url('assets'); ?>/img/logo_shopeePay.png">Bayar Dengan ShopeePay</option>
                            <option value="GOPAY" data-thumbnail="<?php echo base_url('assets'); ?>/img/logo_gopay.png">Bayar Dengan GoPay</option>

                        </select>
                        <div class="lang-select ml-0">
                            <button class="btn-select mt-0 col-12" value=""></button>
                            <div class="b">
                                <ul class="select-mode-pembayaran-addtocart" id="a"></ul>
                            </div>
                        </div>
                    </div>
                    <div class="box_cart pt-1">
                        <ul class="text-right">
                            <li class="mb-1">
                                <span>Total Produk</span>
                                <strong id="total-produk-addtocart">0</strong>
                            </li>
                            <!-- <hr> -->
                            <li class="mb-1">
                                <span>Total Barang</span>
                                <strong><strong id="qty-addtocart">0</strong> (Pcs)</strong>
                            </li>
                            <!-- <hr> -->
                            <li class="mb-1">
                                <span>Total berat</span>
                                <input type="text" id="total-berat-addtocart" value="0" hidden>
                                <strong><strong id="berat-addtocart">0</strong> (Kg)</strong>
                            </li>
                            <!-- <hr> -->
                            <li class="mb-1">
                                <span>Subtotal</span>
                                <strong>Rp. <strong id="subtotal-addtocart" class="">0</strong></strong>
                            </li>
                            <!-- <hr> -->
                            <li class="mb-1">
                                <span>Ongkir</span>
                                <strong>Rp. <strong id="ongkir-addtocart" class="">0</strong></strong>
                            </li>
                            <!-- <hr> -->
                            <li>
                                <span>Total</span>
                                <strong>Rp. <strong id="total-addtocart" class="">0</strong></strong>
                            </li>
                        </ul>
                        <a href="#page">
                            <button type="button" id="buat-pesanan-addtocart" class="btn_1 full-width cart btn-disabled-b-pesanan" disabled>Buat Pesanan</button>
                        </a>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
    <!-- /item -->
    <!-- <div class="container related">
        <h4>Who bought this product also bought</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="item_panel">
                    <a href="#0">
                        <figure>
                            <img src="<?php echo base_url('assets'); ?>/img/banners_cat_placeholder.jpg" data-src="img/products/shoes/2.jpg" alt="" class="lazy">
                        </figure>
                    </a>
                    <a href="#0">
                        <h5>Armor Okwahn II</h5>
                    </a>
                    <div class="_panel"><span class="new_">$90.00</span></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item_panel">
                    <a href="#0">
                        <figure>
                            <img src="<?php echo base_url('assets'); ?>/img/banners_cat_placeholder.jpg" data-src="img/products/shoes/3.jpg" alt="" class="lazy">
                        </figure>
                    </a>
                    <a href="#0">
                        <h5>Armor Air Wildwood ACG</h5>
                    </a>
                    <div class="_panel"><span class="new_">$75.00</span><span class="percentage">-20%</span> <span class="old_">$155.00</span></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item_panel">
                    <a href="#0">
                        <figure>
                            <img src="<?php echo base_url('assets'); ?>/img/banners_cat_placeholder.jpg" data-src="img/products/shoes/4.jpg" alt="" class="lazy">
                        </figure>
                    </a>
                    <a href="#0">
                        <h5>Armor ACG React Terra</h5>
                    </a>
                    <div class="_panel"><span class="new_">$110.00</span></div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- /related -->
</div>