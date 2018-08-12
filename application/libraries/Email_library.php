<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/12/2018
 * Time: 2:09 PM
 */

class  Email_library
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function send($to, $name, $subject, $body)
    {
        $this->CI->load->library('email');

        $this->CI->email->initialize($this->get_mail_config());
        $this->CI->email->set_newline("\r\n");

        $this->CI->email->from('no-reply@geohr.dushan.lk', 'GeoHR');
        $this->CI->email->to($to);
        $this->CI->email->subject($subject);
        $this->CI->email->message("Dear " . $name . ",\r\n\r\n" . $body . "\r\n\r\nThank you,\r\nGeoHR Team");
        $this->CI->email->send();
    }

    private function get_mail_config()
    {
        $config = array();
        $config['useragent'] = "GeoHR";
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "secure180.servconfig.com";
        $config['smtp_user'] = "no-reply@geohr.dushan.lk";
        $config['smtp_pass'] = "=z(L%#2iPMum";
        $config['smtp_port'] = 465;
        $config['smtp_timeout'] = 5;
        $config['smtp_crypto'] = "ssl";
        $config['priority'] = 1;
        $config['mailtype'] = "text";
        return $config;
    }

    public function create_account_confirmation_mail($user_id, $url_param)
    {
        $this->CI->load->helper('url');
        $subject = "Account confirmation";
        $body = "Your account has been created successfully. Click on following link to confirm you email.\r\n\r\n" . base_url('/index.php/login/verify?id=' . $user_id . '&token=' . $url_param);
        return array('subject' => $subject, 'body' => $body);
    }
}