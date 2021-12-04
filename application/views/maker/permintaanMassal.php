<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="alert alert-success font-weight-bold mb-4" style="width: 65%">Selamat Datang di Aplikasi Manajemen KTA POLRI (MKP)
    </div>
    <?php echo $this->session->flashdata('pesan') ?>

    <form method="POST" action="<?php echo base_url('maker/permintaanMassal/importcsv') ?>" enctype="multipart/form-data">
        <div class=" input-group mb-3">
            <label class="input-group-text">Input File CSV</label>
            <input type="file" name="userfile" class="form-control" id="inputGroupFile02">
        </div>
        <button type="reset" class="mb-2 mt-2 btn btn-sm btn-success">CLEAR</button>
        <button type="submit" name="submit" value="upload" class="mb-2 mt-2 btn btn-sm btn-success">UPLOAD</button>

    </form>
    <?php if (isset($error)) : ?>
        <div class="alert alert-error"><?php echo $error; ?></div>
    <?php endif; ?>
</div>