<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>
    <form method="POST" action="<?php echo base_url('maker/permintaanKartu') ?>">
        <div class="input-group mb-3" style="width: 40%">
            <input type="text" name="nrp" class="form-control" placeholder="NRP" autocomplete="off" autofocus>
            <button class="btn btn-primary" type="submit" name="submit">Cari</button>
        </div>
        <?php echo form_error('nrp', '<div class="text-small text-danger"></div>') ?>

    </form>
</div>