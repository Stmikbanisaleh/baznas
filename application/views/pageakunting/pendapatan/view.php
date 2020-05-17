<div class="row">
    <form class="form-horizontal" target="_blank" method="POST" role="form" id="formSearch" action="<?php echo base_url() ?>modulakunting/pendapatan/laporan">
        <div class="col-xs-4">
            <input type="date" id="periode_awal" required name="periode_awal" placeholder="Tanggal Awal" class="form-control" />
        </div>
        <td>
        <div class="col-xs-4">
            <input type="date" id="periode_akhir" required name="periode_akhir" placeholder="Tanggal Akhir" class="form-control" />
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