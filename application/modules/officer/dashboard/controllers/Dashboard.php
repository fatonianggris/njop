<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('DashboardModel');
        $this->user_officer = $this->session->userdata("sias-officer");
        if ($this->session->userdata('sias-officer') == FALSE) {
            redirect('officer/auth');
        }
    }

    //
    //-------------------------------DASHBOARD------------------------------//
    //
    
    public function index() {
        $data['nav_dash'] = 'menu-item-here';
        $data['total_pembayaran'] = $this->DashboardModel->get_total_pembayaran($this->user_officer[0]->id_akun);
        $data['status_surat'] = $this->DashboardModel->get_total_status_surat($this->user_officer[0]->id_akun);
        $data['page'] = $this->DashboardModel->get_general_page();
        $data['contact'] = $this->DashboardModel->get_contact();
//        $data['budget_sisa'] = $this->DashboardModel->get_budget_sisa_insight();
//        $data['outcome'] = $this->DashboardModel->get_outcome_insight();
//        $data['outcome_persen'] = $this->DashboardModel->get_outcome_persen_insight();
        $this->load->view('officer_view_dashboard', $data);
        //$this->template->load('template_officer/template_officer', 'under_dev', $data);
    }

    //-----------------------------------------------------------------------//
//
}
