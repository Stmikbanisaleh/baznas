<div class="row">
    <form class="form-horizontal" target="_blank" method="POST" role="form" id="formSearch" action="<?php echo base_url() ?>modulkasir/lap_bayarsiswa/laporan_pdf">
        <div class="col-xs-3">
            Periode Awal
            <div class="input-group">
                <input class="form-control date-picker" id="id-date-picker-1" name="periode_awal" type="date" data-date-format="dd-mm-yyyy" />
                <span class="input-group-addon">
                    <i class="fa fa-calendar bigger-110"></i>
                </span>
            </div>
        </div>
        <div class="col-xs-3">
            Periode Akhir
            <div class="input-group">
                <input class="form-control date-picker" id="id-date-picker-1" type="date" name="periode_akhir" data-date-format="dd-mm-yyyy" />
                <span class="input-group-addon">
                    <i class="fa fa-calendar bigger-110"></i>
                </span>
            </div>
        </div>
        <div class="col-xs-1">
            <br>
            <button type="submit" id="btn_search" class="btn btn-sm btn-success pull-left">
                <a class="ace-icon fa fa-search bigger-120"></a>Periksa
            </button>
        </div>
        <br>
        <br>
    </form>
    </div>