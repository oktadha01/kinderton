<style>
    .loader_regis {
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
</style>
<main class="margin_76_35 bg_gray">
    <div class="container margin_30">
        <div id="loader" class="loader_regis">
            <span class="loader__element"></span>
            <span class="loader__element"></span>
            <span class="loader__element"></span>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <label class="control-label col-sm-3" for="nm_jp">Nama</label>
                <div class="form-group">
                    <input type="text" id="nm-user" name="nm_user" class="form-control" placeholder="Nama Lengkap ...">
                </div>
                <label class="control-label col-sm-3" for="gmail">Gmail</label>
                <div class="form-group">
                    <input type="gmail" id="gmail" name="gmail" class="form-control" placeholder="Alamat Email ...">
                </div>
                <label class="control-label col-sm-3" for="kontak">Kontak</label>
                <div class="form-group">
                    <input type="number" id="kontak" name="kontak" class="form-control" placeholder="No WA ...">
                </div>
                <label class="control-label col-sm-3" for="password">Password</label>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password ...">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="form-group">
                    <label class="control-label col-sm-6  " for="kota_tujuan">Kota Tujuan Pengiriman</label>
                    <select class="form-control col-12" id="kota_tujuan" name="kota_tujuan">
                        <option></option>
                    </select>
                </div>
                <label class="control-label col-sm-3" for="alamat">Alamat</label>
                <div class="form-group">
                    <textarea id="alamat" name="alamat" class="form-control" cols="10" rows="8" placeholder="Alamat Lengkap Tujuan Pengiriman ..."></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" id="btn-simpan-register" class="col-12 btn btn-sm btn-info">Simpan</button>
            </div>
        </div>
    </div>

</main>