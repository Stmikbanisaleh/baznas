<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class GetIdentitas
{
    function getIdentitas($pemakai)
    {
        $result = $this->db->get("identitas");
        return $result;
    }
}
