<div class="row">
    <form class="form-horizontal" target="_blank" method="POST" role="form" id="formSearch" action="<?php echo base_url() ?>modulakunting/lap_bukubesar/laporan">
        <div class="col-xs-2">
            <input type="number" id="tahun" required name="tahun" placeholder="Tahun" class="form-control" />
        </div>
        <td>
        <div class="col-xs-2">
            <select class="form-control" name="blnawal" id="blnawal">
            	<option value="0">--Bulan Awal--</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>
        <td>
        <div class="col-xs-2">
            <select class="form-control" name="blnakhir" id="blnakhir">
                <option value="0">--Bulan Akhir--</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="coa" id="coa">
                <option value="0">--Pilih COA--</option>
                <?php foreach ($myjurnal as $value) { ?>
                    <option value=<?= $value['kode_jurnal'] ?>><?= $value['kode_jurnal']." - ".$value['nama_jurnal'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-xs-1">
            <button type="submit" id="btn_search" class="btn btn-sm btn-success pull-left">
                <a class="ace-icon fa fa-search bigger-120"></a>Periksa
            </button>
        </div>
        <br>
        <br>
    </form>
</div>