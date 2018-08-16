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

    private $from_email = "no-reply-geohr@dushan.lk";
    private $from_password = "o5?q6@Kflz5v";

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function send($to, $name, $subject, $body)
    {
        $this->CI->load->library('email');

        $this->CI->email->initialize($this->get_mail_config());
        $this->CI->email->set_newline("\r\n");

        $this->CI->email->from($this->from_email, 'GeoHR');
        $this->CI->email->to($to);
        $this->CI->email->subject($subject);
        $this->CI->email->message("Dear " . $name . ",\r\n\r\n" . $body . "\r\n\r\nThank you,\r\nGeoHR Team");
        $this->CI->email->send(FALSE);
        $message = $this->CI->email->print_debugger();
        log_message('error', 'Sent email ' . $message);
    }

    private function get_mail_config()
    {
        $config = array();
        $config['useragent'] = "GeoHR";
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "secure180.servconfig.com";
        $config['smtp_user'] = $this->from_email;
        $config['smtp_pass'] = $this->from_password;
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
        $body = "Your account has been created successfully. Click on following link to confirm you email.\r\n\r\n" . base_url('/index.php/register/verify?id=' . $user_id . '&token=' . $url_param);
        return array('subject' => $subject, 'body' => $body);
    }

    public function create_employee_account_confirmation_mail($password)
    {
        $this->CI->load->helper('url');
        $subject = "Account confirmation";
        $body = "Your account has been created successfully. Use your email and following 4 digit password to login using our mobile app.\r\n\r\n" . $password;
        return array('subject' => $subject, 'body' => $body);
    }
}