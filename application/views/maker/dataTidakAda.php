<div class="container-fluid" style="margin-bottom: 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Permintaan Massal</h1>
    </div>

    <div class="alert alert-success font-weight-bold mb-4" style="width: 65%">Selamat Datang di Aplikasi Manajemen KTA POLRI (MKP)
    </div>
    <p><?php echo anchor('maker/permintaanMassal', 'Upload Another File!'); ?><br>
        <?php
        echo '<table class="table table-striped table-bordered">';
        $file = fopen("uploads/data-ssdm.txt", "r") or die("Unable to open file!");
        while (!feof($file)) {
            $data = fgets($file);
            echo "<tr><td>" . str_replace(',', '</td><td>', $data) . '</td></tr>';
        }
        echo '</table>';
        fclose($file);
        ?>
</div>