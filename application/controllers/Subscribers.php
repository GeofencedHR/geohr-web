<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/14/2018
 * Time: 11:12 PM
 */

class Subscribers extends CI_Controller
{
    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('user_validation_library');
        $this->load->model('Subscribers_model');

        if ($this->user_validation_library->is_logged_in() && $this->user_validation_library->is_admin()) {

            $email = null;
            $status = null;
            $page = null;

            if (isset($_GET['email'])) {
                $email = $_GET['email'];
            }

            if (isset($_GET['status'])) {
                $status = $_GET['status'];
            }

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }

            $subscribers = $this->Subscribers_model->getSubscribers($email, $status, $page);
            $this->load->view('dash_board_subscribers', $this->user_validation_library->get_page_data($subscribers));
        } else {
            redirect('/login');
        }
    }

    public function view()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('user_validation_library');
        $this->load->model('Subscribers_model');

        if ($this->user_validation_library->is_logged_in() && $this->user_validation_library->is_admin()) {

            if (isset($_POST['status'])) {
                $update = array();
                $update['user_status'] = $_POST['status'];
                $this->Subscribers_model->update_subscriber($_GET['id'], $update);
            }

            if (isset($_POST['plan'])) {
                $update = array();
                $update['user_plan'] = $_POST['plan'];
                $this->Subscribers_model->update_subscriber($_GET['id'], $update);
            }

            $profileData = $this->Subscribers_model->getSubscriberProfile($_GET['id']);
            if ($profileData['profile']->num_rows() == 1) {
                $data = array();
                $data['profile'] = $profileData['profile']->row();
                $data['id'] = $_GET['id'];
                $this->load->view('dash_board_subscribers_view', $this->user_validation_library->get_page_data($data));
            }
        } else {
            redirect('/login');
        }
    }
}