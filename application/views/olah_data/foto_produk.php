<style>
    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px) {

        /* Force table to not be like tables anymore */
        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block !important;
        }

        /* Hide table headers (but not display: none !important;, for accessibility) */
        thead tr {
            position: absolute !important;
            top: -9999px !important;
            left: -9999px !important;
        }

        tr {
            margin: 0 0 1rem 0 !important;
        }

        td {
            /* Behave  like a "row" */
            border: none !important;
            border-bottom: 1px solid #eee !important;
            position: relative !important;
            padding-left: 40% !important;
        }

        td:before {
            /* Now like a table header */
            position: absolute !important;
            /* Top/left values mimic padding */
            top: 0 !important;
            left: 6px !important;
            /* width: 45% !important; */
            /* padding-right: 0px !important; */
            white-space: nowrap !important;
        }

        /*
		Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
		*/

        td:nth-of-type(1):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "PRODUK";
        }

        td:nth-of-type(2):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "FOTO";
        }

        td:nth-of-type(3):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "TEXTURE";
        }

        td:nth-of-type(4):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "LAYOUT";
        }
        td:nth-of-type(5):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "ACTION";
        }

    }
</style>
<div id="form-foto-produk" class="min-height box_account ">
    <div class="form_container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <h5>Data Foto Produk</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <select class="form-control select2 height-2rem p-2px" id="select-nm-produk" name="" required="true">
                                <option value="0">All Produk*</option>
                                <?php
                                foreach ($jenis_produk as $data_jp) :
                                ?>
                                    <option value="<?php echo $data_jp->id_jp; ?>"><?php echo $data_jp->nm_jp; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <button type="button" id="btn-form-foto-produk" class="btn btn-sm bg-info float-right col-12">Tambah Data foto Produk</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row"> -->
        <div class="card-body table-responsive p-0" style="height: 330px;">
            <table role="table" class="table table-head-fixed  table-striped text-nowrap table-hover">
                <thead role="rowgroup">
                    <tr role="row">
                        <th scope="col" role="columnheader">PRODUK</th>
                        <th scope="col" role="columnheader">FOTO</th>
                        <th scope="col" role="columnheader">TEXTURE</th>
                        <th scope="col" role="columnheader">LAYOUT</th>
                        <th scope="col" role="columnheader">ACTION</th>
                    </tr>
                </thead>
                <tbody id="data-foto">
                    <?php
                    foreach ($foto_produk as $data_fp) {
                    ?>
                        <tr id="" class="tr-foto-produk tr-foto-<?php echo $data_fp->id_jp; ?>">
                            <td role="cell" scope="col"><?php echo $data_fp->nm_jp; ?></td>
                            <td role="cell" scope="col"><img src="<?php echo base_url('upload'); ?>/<?php echo $data_fp->fotpro; ?>" id="" class="img-thumbnail max-height-5rem">
                            </td>
                            <td role="cell" scope="col"><?php echo $data_fp->texture; ?></td>
                            <td role="cell" scope="col"><?php echo $data_fp->status_foto; ?></td>
                            <td role="cell" scope="col">
                                <a href="#page">
                                    <button type="button" class="btn btn-xs bg-gradient-info elevation-3 btn-edit-foto-produk" id="" data-id-fotpro="<?php echo $data_fp->id_fotpro; ?>" data-id-fotjp="<?php echo $data_fp->id_fotjp; ?>" data-fotpro="<?php echo $data_fp->fotpro; ?>" data-texture="<?php echo $data_fp->texture; ?>" data-status-foto="<?php echo $data_fp->status_foto; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </button>
                                </a>
                                <button type="button" data-id="" class="btn btn-xs bg-gradient-danger elevation-3 hapus-foto-produk" data-id-fotpro="<?php echo $data_fp->id_fotpro; ?>" data-fotlama="<?php echo $data_fp->fotpro; ?>">
                                    <i class="fas fa-trash-alt mr-1"></i>Delete
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <hr>
    </div>
    <!-- /form_container -->
</div>

<script>
    $(document).ready(function() {
        $('#select-nm-produk').change(function(e) {
            var id = $("#select-nm-produk").find(':selected').val();
            if (id == '0') {
                $('.tr-foto-produk').show();

            } else {
                $('.tr-foto-produk').hide();
                $('.tr-foto-' + id).show();
            }
        });
        $('.btn-edit-foto-produk').click(function(e) {
            $('#form-foto-produk').removeAttr('hidden', true);
            $('#ceklis-ubah-foto').removeAttr('hidden', true);
            $('#fot_produk, .pilih-fot-produk').attr('disabled', true);

            var produk = $(this).data('id-fotjp');
            var foto = $(this).data('fotpro');
            var status = $(this).data('status-foto');
            $("#id-fotjp, option[value='" + produk + "']").attr("selected", "selected");
            $("#status-foto, option[value='" + status + "']").attr("selected", "selected");
            $('#preview-fot-produk').attr({
                src: "<?php echo base_url('upload'); ?>/" + foto + ""
            });
            // $('#fot_produk, #nm-fot-produk').val(foto);
            // $('.file-produk').val(foto);
            $('#fotlama').val(foto);
            $('#texture').val($(this).data('texture'));
            $('#id-fotpro').val($(this).data('id-fotpro'));
        });

        $('.hapus-foto-produk').click(function(e) {
            var el = this;

            // Delete id
            var id_fotpro = $(this).data('id-fotpro');
            var fotlama = $(this).data('fotlama');
            $('#id-fotpro').val(id_fotpro);
            var confirmalert = confirm("Are you sure?");
            if (confirmalert == true) {
                let formData = new FormData();
                formData.append('id-fotpro', id_fotpro);
                formData.append('fotlama', fotlama);
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('olah_data/hapus_foto_produk') ?>",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(msg) {
                        $(el).closest('tr').css('background', 'tomato');
                        $(el).closest('tr').fadeOut(300, function() {
                            $(this).remove();
                        });
                    }
                });
            }
        });
        $('#btn-form-foto-produk').click(function(e) {
            $('#form-foto-produk').removeAttr('hidden', true);
            $("#btn-simpan-foto-produk").val('simpan-foto-produk');
            $('#fot_produk, .pilih-fot-produk').removeAttr('disabled', true);
            $('#preview-fot-produk').attr({
                src: "<?php echo base_url('assets'); ?>/img/80x80.png"
            });
            $('#ceklis-ubah-foto').attr('hidden', true);

            // alert('yaa')
        });
        $('#btn-batal-foto-produk').click(function(e) {
            $('#form-foto-produk').attr('hidden', true);
        });

    });
</script>