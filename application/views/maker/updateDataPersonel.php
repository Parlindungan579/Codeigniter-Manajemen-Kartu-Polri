<div class="container-fluid" style="margin-bottom: 100px">

    <div>
        <h1 style="text-align: center;" class="h3 mb-0 text-gray-800">Permintaan Massal</h1><br>
    </div>

    <?= form_open('maker/permintaanMassal/updateDataPersonel'); ?>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>
                        <center>NO</center>
                    </th>
                    <th style="display:none;">ID</th>
                    <th>
                        <center>NAMA</center>
                    </th>
                    <th>
                        <center>PANGKAT</center>
                    </th>
                    <th>
                        <center>NRP</center>
                    </th>
                    <th>
                        <center>SATKER</center>
                    </th>
                    <th class="text-center">SUB SATKER</th>
                    <th style="display:none;">STATUS PERMINTAAN</th>
                </tr>
            </thead>
            <tbody>
                <?php $n = 1; ?>
                <?php if (count($personel)) :
                    foreach ($personel as $p) : ?>
                        <tr>
                            <td align="center"><?php echo $n++; ?></td>
                            <td align="center" style="display:none;"><input type="text" name="id[]" value="<?= $p->id; ?>"></td>
                            <td align="center">
                                <input type="text" name="nama[]" class=" form-control" value="<?= $p->nama; ?>">
                            </td>
                            <td align="center"><input type="text" name="pangkat[]" class=" form-control" value="<?= $p->pangkat; ?>"></td>
                            <td align="center"><input type="text" name="nrp[]" class=" form-control" value="<?= $p->nrp; ?>"></td>
                            <td align="center"><input type="text" name="satker[]" class=" form-control" value="<?= $p->satker; ?>"></td>
                            <td align="center"><input type="text" name="sub_satker[]" class=" form-control" value="<?= $p->sub_satker1; ?>"></td>
                            <td align="center" style="display:none;"><input type="text" name="status_request[]" value="1"></td>
                            <td align="center" style="display:none;"><input type="text" name="tgl_input[]" value="<?php echo date("Y-m-d"); ?>"></td>
                        </tr>
                    <?php endforeach;
                    $n++; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div>
        <div class style="text-align: center;">
            <button type="submit" class="mb-2 mt-2 btn btn-sm btn-success">SIMPAN KE TABEL DATA VALID</button>
        </div>
    </div>
    <?= form_close(); ?>
</div>