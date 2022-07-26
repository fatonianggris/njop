<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('DashboardModel');
        if ($this->session->userdata('sias-admin') == FALSE) {
            redirect('admin/auth');
        }
    }

    //
    //-------------------------------DASHBOARD------------------------------//
    //
    
    public function index() {
        $data['nav_dash'] = 'menu-item-here';
        $data['total_pembayaran'] = $this->DashboardModel->get_total_pembayaran();
        $data['total_akun_surat'] = $this->DashboardModel->get_total_akun_surat();
        $data['chart_letter'] = $this->DashboardModel->get_chart_letter();
        $data['pie_chart_letter'] = $this->DashboardModel->get_pie_chart_letter();
        $data['page'] = $this->DashboardModel->get_general_page();
//        $data['budget_sisa'] = $this->DashboardModel->get_budget_sisa_insight();
//        $data['outcome'] = $this->DashboardModel->get_outcome_insight();
//        $data['outcome_persen'] = $this->DashboardModel->get_outcome_persen_insight();
        $this->template->load('template_admin/template_admin', 'admin_view_dashboard', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function change_status_client() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);
        $id = paramDecrypt($id);
        
        $update = $this->DashboardModel->update_status_open_client($id);
       
        if ($update == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Mode Klien Telah Diupdate.."));
            redirect('admin/dashboard');
        } else {

            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('admin/dashboard');
        }
    }

    //-----------------------------------------------------------------------//
//
}


