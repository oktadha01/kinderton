<style>
    .loader-insert-foto {
        overflow: hidden;
        position: absolute;
        top: 45%;
        bottom: 45%;
        left: 35%;
        right: 35%;
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
</style>
<main class="bg_gray">
    <div class="container margin_30 pt-5rem">
        <!-- /page_header -->

        <div class="row">
            <div class="col-lg-3 col-md-3 col-12 box_account">
                <div class="form_container">
                    <h4>Menu Admin</h4>
                    <hr>
                    <div id="menu-admin">
                        <button type="button" id="btn-jenis-produk" class="btn_1 full-width btn-menu-active">Jenis Produk</button>
                        <button type="button" id="btn-harga-produk" class="btn-menu btn_1 full-width">Harga Produk</button>
                        <button type="button" id="btn-foto-produk" class="btn-menu btn_1 full-width">Foto Produk</button>
                        <hr>
                        <h4>Menu Pemesanan</h4>
                        <button type="button" id="btn-vali-pesanan" class="btn-menu btn_1 full-width">Validasi Pemesanan <span id="" class="badge badge-danger notif-pesanan"></span></button>
                        <button type="button" id="btn-pesanan-dikirim" class="btn-menu btn_1 full-width">Pesanan Dikirim <span id="" class="badge badge-danger notif-pesanan_dikirim"></span></button>
                        <button type="button" id="btn-riwayat-pesanan" class="btn-menu btn_1 full-width">Riwayat Pesanan</button>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-12">
                <div id="form-jenis-produk" hidden>
                    <div class="box_account">
                        <div class="form_container">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <h5>Tambah Data Jenis Produk</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="private box">
                                <form id="tdjp-form">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-6 col-12">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-6 col-12">
                                                    <label for="nm_jp">Nama Produk</label>
                                                    <div class="form-group">
                                                        <input type="text" id="id-jp" value="" hidden>
                                                        <input type="text" id="nm-jp" name="nm_jp" class="form-control" placeholder="Nama Produk ...">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label>Kategori</label>
                                                        <select class="form-control" id="kategori">
                                                            <option disabled selected value="0">Pilih Kategori*</option>
                                                            <option value="Longue-Wear">Longue Wear</option>
                                                            <option value="Formal-Wear">Formal Wear</option>
                                                            <option value="Modest-Wear">Modest Wear</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-12">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select class="form-control" id="gender">
                                                            <option disabled selected value="0">Pilih Gender*</option>
                                                            <option value="Girl">Girl</option>
                                                            <option value="Boy">Boy</option>
                                                            <option value="Unisex">Unisex</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="desk">Deskripsi</label>
                                            <div class="form-group">
                                                <textarea id="desk" name="desk" class="form-control" cols="10" rows="4" placeholder="Deskripsi"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="reset" class="col-12 btn btn-sm btn-danger btn-batal">Batal</button>
                                        </div>
                                        <div class="col">
                                            <button type="reset" id="btn-simpan-jenis-produk" class="col-12 btn btn-sm btn-info float-right">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="form-harga-produk" hidden>
                    <div class="box_account">
                        <div class="form_container">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <h5>Harga Produk</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="private box">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-12">

                                        <div class="form-select-data-jenis-produk-harga"></div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12">
                                        <label>Status</label>
                                        <div class="form-group">
                                            <select class="form-control" id="status-produk">
                                                <option disabled selected value="0">Pilih status*</option>
                                                <option value="HOT">HOT</option>
                                                <option value="NEW">NEW</option>
                                                <option value="PROMO">PROMO</option>
                                                <option value="LAINNYA">LAINNYA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-12">
                                        <label for="hrg-awal">Harga Awal</label>
                                        <div class="form-group">
                                            <input type="text" id="hrg-awal" name="hrg_awal" class="form-control" placeholder="Harga Awal ...">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <label for="diskon">Diskon</label>
                                        <div class="form-group">
                                            <input type="text" id="diskon" name="diskon" class="form-control input_disabled" placeholder="Diskon ..." readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12">
                                        <label>Tgl Akhir Promo</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control input_disabled" name="tgl_akhir_promo" id="tgl-akhir-promo" value="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <label for="jam-akhir-promo">Jam Akhir Promo</label>
                                        <div class="form-group">
                                            <input type="time" class="form-control input_disabled" id="jam-akhir-promo" name="jam_akhir_promo" value="00:00:00" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <label for="hrg-diskon">Harga Diskon</label>
                                        <div class="form-group">
                                            <input type="text" id="hrg-diskon" name="hrg_diskon" class="form-control input_disabled" placeholder="Harga Diskon ..." readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input cheklis-size" type="checkbox" id="cheklis-al" value="">
                                                <label for="cheklis-al" class="custom-control-label">All Size</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input cheklis-size" type="checkbox" id="cheklis-s" value="">
                                                <label for="cheklis-s" class="custom-control-label">Small</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input cheklis-size" type="checkbox" id="cheklis-m" value="">
                                                <label for="cheklis-m" class="custom-control-label">Medium</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input cheklis-size" type="checkbox" id="cheklis-l" value="">
                                                <label for="cheklis-l" class="custom-control-label">Large</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input cheklis-size" type="checkbox" id="cheklis-xl" value="">
                                                <label for="cheklis-xl" class="custom-control-label">Extra Large</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input cheklis-size" type="checkbox" id="cheklis-xxl" value="">
                                                <label for="cheklis-xxl" class="custom-control-label">Double Extra Large</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" id="all-size" hidden>
                                <input type="text" id="small" hidden>
                                <input type="text" id="medium" hidden>
                                <input type="text" id="large" hidden>
                                <input type="text" id="extra-large" hidden>
                                <input type="text" id="extra2-large" hidden>
                                <input type="text" id="id-hrg" hidden>
                                <input type="text" id="tgl-akhir" hidden>
                                <input type="text" id="jam-akhir" hidden>
                                <div class="row">
                                    <div class="col">
                                        <button type="reset" id="btn-batal-harga-produk" class="col-12 btn btn-sm btn-danger">Batal</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" id="btn-simpan-harga-produk" class="col-12 btn btn-sm btn-info float-right" value="">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="form-foto-produk" hidden>
                    <div class="box_account">
                        <div class="form_container">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <h5>Tambah Data Foto Produk</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="private box">
                                <div id="load-insert-foto" class="loader-insert-foto">
                                    <span class="loader__element"></span>
                                    <span class="loader__element"></span>
                                    <span class="loader__element"></span>
                                </div>
                                <form action="" method="POST" id="btn-simpan-foto-produk" role="form">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <div class="form-select-data-jenis-produk-foto"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="fot_produk">Foto produk</label>
                                                <div class="input-group">
                                                    <input type="text" id="id-fotpro" value="" hidden>
                                                    <input type="text" id="fotlama" value="" hidden>
                                                    <input type="file" id="fot_produk" name="fot_produk" class="file-produk" hidden required>
                                                    <input type="text" class="pilih-fot-produk form-control" placeholder="Upload Gambar" id="nm-fot-produk" required>
                                                    <div class="input-group-append">
                                                        <button type="button" id="" class="pilih-fot-produk browse btn btn-dark">Pilih Gambar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="texture">Texture</label>
                                                    <div class="form-group">
                                                        <input type="text" id="texture" name="texture" class="form-control" placeholder="Texture ..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Status Foto Produk</label>
                                                        <select class="form-control" id="status-foto" name="status_foto" required="true">
                                                            <option value="0">Pilih Status*</option>
                                                            <option value="slide">Slide</option>
                                                            <option value="display">Display</option>
                                                            <option value="detail">Detail</option>
                                                            <option value="keunggulan">Keunggulan</option>
                                                            <option value="detail-size">Detail Size</option>
                                                            <option value="others">Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <img src="<?php echo base_url('assets'); ?>/img/80x80.png" id="preview-fot-produk" class="pilih-fot-produk img-thumbnail max-height-14rem">
                                            <div id="ceklis-ubah-foto" class="form-group" hidden>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="text" id="val-ceklis-ubah" value="">
                                                    <input class="custom-control-input" type="checkbox" id="ceklis-ubah-fotpro" value="">
                                                    <label for="ceklis-ubah-fotpro" class="custom-control-label">Cheklis untuk mengubah foto produk</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="reset" id="btn-batal-foto-produk" class="col-12 btn btn-sm btn-danger">Batal</button>
                                        </div>
                                        <div class="col">
                                            <button type="submit" id="submit-simpan-foto" class="col-12 btn btn-sm btn-info float-right" value="">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="detail-pesanan" hidden>
                    <div class="box_account detail-vali-pesanan">
                    </div>
                </div>
                <div class="form-data"></div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>