<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SysConfig
{
    function getConfig()
    {
        $this->load->model('Model_config');
        $data = $this->Model_config->get();
        return $data;
    }
}