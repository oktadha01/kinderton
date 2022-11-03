<?php $action = $this->input->post('select'); ?>
<!-- <?php echo $action; ?> -->
<?php
if ($action == 'harga') {
?>
    <label>Jenis Produk</label>
    <div class="form-group">
        <select class="form-control" id="id-jenis-produk-harga" name="" required="true">
            <option value="0">Pilih Produk*</option>
            <?php
            $sql = "SELECT * FROM jenis_produk";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $data) :
            ?>
                    <option value="<?php echo $data->id_jp; ?>"><?php echo $data->nm_jp; ?></option>
            <?php
                endforeach;
            }
            ?>
        </select>
    </div>
<?php
} else {
?>
    <div class="form-group">
        <select class="form-control" id="id-jenis-produk-foto" name="" required="true">
            <option value="0">Pilih Produk*</option>
            <?php
            $sql = "SELECT * FROM jenis_produk";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $data) :
            ?>
                    <option value="<?php echo $data->id_jp; ?>"><?php echo $data->nm_jp; ?></option>
            <?php
                endforeach;
            }
            ?>
        </select>
    </div>
<?php
}
?>