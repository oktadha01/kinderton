<style>
    .loader-konf-akun {
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
<?php
foreach ($data_user as $data) {
?>
    <main class="margin_76_35 bg_gray">
        <div class="container margin_30">
            <center>
                <h5>Registrasi Akun Kinderton</h5>
            </center>
            <hr>
            <h6>Hai <?php echo $data->nm_user; ?></h6>
            <p>Kami telah Menerima Pendaftaran Akun kamu Di <a class="color-kinderton" href="">Kinderon.id</a>. Segera konfrimasi e-mail kamu di sini ya,</p>
            <div class="bg-konf-email mb-3">
                <center>
                    <div class="col-8">
                        <a class="btn-konf-email" href="https://mail.google.com/">Konfirmasi Email</a>
                    </div>
                </center>
            </div>
            <p class="mb-0">Apabila konfirmasi bermasalah, kamu bisa meminta kirim ulang e-mail konfirmasi, klik <a id="btn-edit-email" class="text-danger" href="#">disni</a>.</p>
            <div id="loader" class="loader-konf-akun">
                <span class="loader__element"></span>
                <span class="loader__element"></span>
                <span class="loader__element"></span>
            </div>
            <div id="form-edit-email" class="row" hidden>
                <div class="col-6">
                    <label class="ml-2">E-mail</label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend btn-edit-input-email">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control input_disabled" name="" id="gmail" value="<?php echo $data->gmail; ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group pt-23px">
                        <button type="button" id="btn-kirim-ulang-email" class="btn btn-sm btn-success height-39px" data-id-user="<?php echo $data->id_user; ?>"><i class="fa-regular fa-paper-plane"></i> Kirim Ulang Email</button>
                    </div>
                </div>
            </div>
            <p>Segala bentuk informasi seperti nomor kontak, alamat e-mail atau password kamu bersifat rahasia. Jangan menginformasikan data-data kepada siapapun, termasuk kepada pihak yang mengatasnamakan Kinderton.</p>
        </div>
    </main>
<?php } ?>