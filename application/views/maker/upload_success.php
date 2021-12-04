<div class="container-fluid" style="margin-bottom: 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Permintaan Massal</h1>
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <h5 align="center"><b>Tabel Data Valid</b></h5>
    <?= form_open('maker/permintaanMassal/permintaanMassalAksi'); ?>
    <table class="table table-striped table-bordered">
        <tr>
            <th class="text-center"><i class="far fa-check-square"></i></th>
            <th class="text-center">NO</th>
            <th style="display:none;">ID</th>
            <th class="text-center">NAMA</th>
            <th class="text-center">PANGKAT</th>
            <th class="text-center">NRP</th>
            <th class="text-center">SATKER/JABATAN</th>
            <th class="text-center">SUB SATKER</th>
            <th class="text-center"></th>
            <th style="display:none;">TANGGAL INPUT</th>
            <!-- <th style="display:none;">JENIS PERMINTAAN</th>
            <th style="display:none;">STATUS PERMINTAAN</th>
            <th style="display:none;">STATUS KARTU</th>
            <th style="display:none;">JUMLAH CETAK</th> -->
        </tr>
        <?php $n = 1; ?>
        <?php if (count($personel)) :
            foreach ($personel as $p) : ?>
                <tr>
                    <td class="text-center">
                        <input type="checkbox" name="id[]" value="<?= $p->id; ?>">
                    </td>
                    <td class="text-center"><?php echo $n++; ?></td>
                    <td style="display:none;"><?= $p->id; ?></td>
                    <!-- <td class="text-center"><?php if (strlen($p->nama) > 25) {
                                                        echo "<font color='red'>$p->nama</font><br>";
                                                    } ?></td> -->
                    <td class="text-center"> <?php if (strlen($p->nama) > 25) {
                                                    echo "<font color='red'>$p->nama</font><br>";
                                                } else echo $p->nama ?></td>
                    <td class="text-center"><?= $p->pangkat; ?></td>
                    <td class="text-center"><?= $p->nrp; ?></td>
                    <td class="text-center"><?= $p->satker; ?></td>
                    <td class="text-center"><?= $p->sub_satker1; ?></td>
                    <td class="text-center">
                        <a href="<?php echo base_url('maker/') ?>">Detail</a>
                    </td>
                    <td style="display:none;"><?= $p->tgl_input; ?></td>
                    <!-- <td style="display:none;"><?php echo 1; ?></td>
                    <td style="display:none;"><?php echo 0; ?></td>
                    <td style="display:none;"><?php echo 0; ?></td>
                    <td style="display:none;"><?php echo 0; ?></td> -->
                </tr>
            <?php endforeach; ?>

        <?php else : ?>
            <tr>
                <td colspan="4" style="text-align: center;">Students Data Not Found.</td>
            </tr>
        <?php endif; ?>
    </table>
    <div>
        <div class style="text-align: center;">
            <button type="submit" name="button_action" class="mb-2 mt-2 btn btn-sm btn-success" value="update_data">EDIT</button>
            <button type="submit" name="button_action" class="mb-2 mt-2 btn btn-sm btn-success" value="save_data">SIMPAN KE TABEL CHECKLIST</button>
        </div>
    </div>
    <?= form_close(); ?>
</div>