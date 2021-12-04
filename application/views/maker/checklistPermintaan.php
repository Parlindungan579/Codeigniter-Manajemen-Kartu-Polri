<div class="container-fluid" style="margin-bottom: 100px">

    <div>
        <h1 style="text-align: center;" class="h3 mb-0 text-gray-800"><?php echo $title ?></h1><br>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <form method="POST" action="<?php echo base_url('maker/buatSurat') ?>">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">NRP</th>
                    <th class="text-center">NAMA CETAK</th>
                    <th class="text-center">JABATAN CETAK</th>
                    <th class="text-center">PANGKAT CETAK</th>
                    <th class="text-center">SATKER</th>
                    <th class="text-center">NO SURAT</th>
                    <th class="text-center"></th>
                    <th class="text-center"><i class="far fa-check-square"></i></th>
                </tr>

                <?php $no = 1;

                foreach ($personel as $p) : ?>
                    <tr>
                        <td align="center"><?php echo $no++ ?></td>
                        <td align="center"><?php echo $p->id ?></td>
                        <td align="center"><?php echo $p->nrp ?></td>
                        <td align="center"><?php echo $p->nama ?></td>
                        <td align="center"><?php echo $p->jabatan ?></td>
                        <td align="center"><?php echo $p->pangkat ?></td>
                        <td align="center"><?php echo $p->satker ?></td>
                        <td align="center">
                            <center><?php echo $p->noSuratMaker ?></center>
                        </td>
                        <td align="center">
                            <a class="btn btn-sm btn-primary" href="<?php echo base_url('maker/detailPermintaan/detail/' . $p->id) ?>">Detail</a>
                        </td>
                        <td align="center"><input type="checkbox" name="id[]" value="<?php echo $p->id; ?>" />
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div>
            <div class style="text-align: center;">
                <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('maker/tolakPermintaan') ?>"></i>TOLAK</a>
                <button class="mb-2 mt-2 btn btn-sm btn-success" type="submit" name="submit">BUAT SURAT</button>
            </div>
        </div>
    </form>

</div>