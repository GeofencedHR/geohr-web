<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest extends CI_Controller
{

    public function report_location()
    {
        $this->input->raw_input_stream;
        $input_data = json_decode($this->input->raw_input_stream, true);

        $this->load->model('Rest_Model');
        $result = $this->Rest_Model->save_location($input_data['loc']);

        header('Content-Type: application/json');
        echo json_encode($result);
    }

}