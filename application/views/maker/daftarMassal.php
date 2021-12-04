<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Permintaan Massal</h1>
    </div>

    <div class="alert alert-success font-weight-bold mb-4" style="width: 65%">Selamat Datang di Aplikasi Manajemen KTA POLRI (MKP)
    </div>
    <form method="POST" action="<?php echo base_url('maker/buatSurat') ?>">

        <table class="table table-striped table-bordered">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">ID</th>
                <th class="text-center">NRP</th>
                <th class="text-center">Nama Cetak</th>
                <th class="text-center">Jabatan Cetak</th>
                <th class="text-center">Pangkat Cetak</th>
                <th class="text-center">Satker</th>
                <th class="text-center">No Surat</th>
                <th class="text-center"></th>
                <th class="text-center"><i class="far fa-check-square"></i></th>
            </tr>
        </table>

        <button class="mb-2 mt-2 btn btn-sm btn-success" type="submit" name="submit">DaftarMassal</button>
    </form>

</div>