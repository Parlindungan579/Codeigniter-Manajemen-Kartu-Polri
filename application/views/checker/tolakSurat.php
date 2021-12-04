<div class="container-fluid" style="margin-bottom: 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <!-- <?php $no = 1; ?>
    <?php foreach ($personel as $p); ?>

    <form class="user" method="POST" action="<?php echo base_url('checker/tolakSurat/tolakSuratAksi') ?>" enctype="multipart/form-data">
        <div class="mb-3 row">
            <div class="col-sm-10">
                <td><input type="text" style="display:none;" name="id[]" value="<?= $p->id; ?>"></td>
                <input type="text" style="display:none;" name="status_request[]" value="0">
                <input type="text" name="noSuratMaker[]" class="form-control" value="<?php echo "No Surat :" ?> <?php echo $p->tgl_input ?>/<?php echo $p->satker ?>/<?php echo $this->session->userdata('Tahap'); ?>/<?php echo $no++ ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Ringkasan Permintaan Kartu :</label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="text-align: center"><b>JUMLAH</b></label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">PATI</label>
            <label class="col-sm-3 col-form-label"><?php echo $total_isPati ?></label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">NON PATI</label>
            <label class="col-sm-3 col-form-label">
                <?php
                if (isset($_POST['user_id'])) {
                    $jumlah = count($_POST['user_id']);
                    echo $jumlah;
                } else {
                    echo '0';
                }

                ?><br>
            </label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">____________________________________</label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">TOTAL</label>
            <label class="col-sm-3 col-form-label">
                <?php
                if (isset($_POST['user_id'])) {
                    $jumlah = count($_POST['user_id']);
                    echo $jumlah;
                } else {
                    echo '0';
                }

                ?>
            </label>
        </div>

        <div>
            <div class>
                <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('maker/checklistPermintaan') ?>"></i>Kembali</a>
                <a class="mb-2 mt-2 btn btn-sm btn-success"></i>Kirim</a>
            </div>
        </div>
    </form> -->

    <?= form_open('checker/tolakSurat/tolakSuratAksi'); ?>
    <div>
        <table>
            <tbody>
                <?php $n = 0; ?>
                <?php if (count($personel)) :
                    foreach ($personel as $p) : ?>
                        <tr>
                            <td align="center" style="display:none;"><input type="text" name="id[]" value="<?= $p->id; ?>"></td>
                            <div class="mb-1 row">
                                <label class="col-sm-2 col-form-label"><b>No Surat :</b></label>
                                <div class="col-sm-4">
                                    <input type="text" name="noSuratChecker[]" class=" form-control" value="<?php echo $p->tgl_input ?>/<?php echo $p->satker ?>/<?php echo $this->session->userdata('Tahap'); ?>/<?php echo $no++ ?>"><br>
                                </div>
                            </div>

                            <label for=""><b>Ringkasan Permintaan Kartu</b></label>
                            <td align="center" style="display:none;"><input type="text" name="status_request[]" value="3"></td>
                        </tr>
                    <?php endforeach;
                    $n++; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label" style="text-align: center"><b>JUMLAH</b></label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">PATI</label>
            <label class="col-sm-3 col-form-label"><?php echo $total_isPati ?></label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">NON PATI</label>
            <label class="col-sm-3 col-form-label">
                <?php
                if (isset($_POST['id'])) {
                    $jumlah = count($_POST['id']);
                    echo $jumlah;
                } else {
                    echo '0';
                }

                ?><br>
            </label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">____________________________________</label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">TOTAL</label>
            <label class="col-sm-3 col-form-label">
                <?php
                if (isset($_POST['id'])) {
                    $jumlah = count($_POST['id']);
                    echo $jumlah;
                } else {
                    echo '0';
                }

                ?>
            </label>
        </div>

        <div>
            <div class>
                <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('checker/checklistPermintaan') ?>"></i>Kembali</a>
                <button type="submit" class="mb-2 mt-2 btn btn-sm btn-success">Kirim</button>
            </div>
        </div>
    </div>
    <?= form_close(); ?>
</div>