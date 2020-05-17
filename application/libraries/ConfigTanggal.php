<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ConfigTanggal
{
    function tgl_indo($tgl)
    {
        $tanggal = substr($tgl, 8, 2);
        $bulan = getBulan(substr($tgl, 5, 2));
        $tahun = substr($tgl, 0, 4);
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }
    function tgl_indo1($tgl)
    {
        $tanggal = substr($tgl, 8, 2);
        $bulan = substr($tgl, 5, 2);
        $tahun = substr($tgl, 0, 4);
        return $tahun . '-' . $bulan . '-' . $tanggal;
    }

    function getBulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
    function Gethari($tgl)
    {
        if (date("D", strtotime($tgl)) == 'Sun') {
            return "Minggu";
        }
        if (date("D", strtotime($tgl)) == 'Mon') {
            return "Senin";
        }
        if (date("D", strtotime($tgl)) == 'Tue') {
            return "Selasa";
        }
        if (date("D", strtotime($tgl)) == 'Wed') {
            return "Rabu";
        }
        if (date("D", strtotime($tgl)) == 'thu') {
            return "Kamis";
        }
        if (date("D", strtotime($tgl)) == 'Fri') {
            return "Jum`at";
        }
        if (date("D", strtotime($tgl)) == 'Sat') {
            return "Sabtu";
        }
    }
}
