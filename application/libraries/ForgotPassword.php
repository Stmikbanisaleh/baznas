<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ForgotPassword
{
    function forgotpassword($pemakai)
    {
        $result = $this->db->query("select count(nama) as jml,NIK,BAGIAN,KODEHAKAKSES from tbuser where STATUS!='F' AND email='$pemakai' GROUP BY NIK,BAGIAN,KODEHAKAKSES");
        return $result;
    }
}
