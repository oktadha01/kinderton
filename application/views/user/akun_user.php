<div class="container pt-5rem">
    <?php
    $id_user = $this->session->userdata("id_user");
    $sql = "SELECT * FROM user WHERE id_user = $id_user";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $data) {
    ?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <label class="ml-2" for="nm-user">Nama</label>
                    <div class="form-group">
                        <input type="text" id="nm-user" name="nm_user" class="form-control input_disabled" readonly value="<?php echo $data->nm_user; ?>">
                    </div>
                    <label class="ml-2" for="gmail">Alamat Email</label>
                    <div class="form-group">
                        <input type="text" id="gmail" name="gmail" class="form-control input_disabled" readonly value="<?php echo $data->gmail; ?>">
                    </div>

                    <label class="ml-2" for="kontak">Kontak</label>
                    <div class="form-group">
                        <input type="text" id="kontak" name="kontak" class="form-control input_disabled" readonly value="<?php echo $data->kontak; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="kota_tujuan">Kota Tujuan Pengiriman</label>
                        <select class="form-control input_disable kota_tujuan" id="kota_tujuan" name="kota_tujuan" disabled>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-group">
                        <label class="ml-2" for="alamat">Alamat</label>
                        <textarea type="text" id="alamat" name="alamat" class="form-control input_disabled" readonly rows="12"><?php echo $data->alamat; ?></textarea>
                    </div>
                </div>
            </div>
            <hr class="hr-cart">
            <div class="row">
                <div class="col">
                    <button type="reset" id="btn-batal-user" class="col-12 btn btn-sm bg-gradient-danger">Batal</button>
                </div>
                <div class="col">
                    <button type="button" id="btn-simpan-user" class="col-12 btn btn-sm bg-gradient-success float-right" value="">Simpan</button>
                    <button type="button" id="btn-edit-user" class="col-12 btn btn-sm bg-gradient-warning float-right" value="">Edit</button>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>
<script>
    
</script>