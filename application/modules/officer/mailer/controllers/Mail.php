<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }

        $this->load->model('Mailmodel');
        $this->load->library('form_validation');
    }

    //
    //------------------------------NEWSLETTER PAGE--------------------------------//
    //

    public function send_mail_order_success($id) {

        $data['page'] = $this->Mailmodel->get_general_page();
        $data['contact'] = $this->Mailmodel->get_contact();
        $data['register'] = $this->Mailmodel->get_register_id($id); //?

        $subjek = "PEMESANAN FORMULIR SEKOLAH UTSMAN";
        $content = $this->load->view('mailer_template/newsletter', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['register'][0]->email,
            'subjek' => $subjek,
            'content' => $content,
        );

        $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
    }

    public function test_newsletter() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();

        $subjek = "ABANG21.COM - TESTING EMAIL NEWSLETTER";
        $content = $this->load->view('mailer_template_test/newsletter', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Newsletter Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    public function test_akun_aktivasi() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();

        $subjek = "ABANG21.COM - TESTING EMAIL AKUN AKTIVASI";
        $content = $this->load->view('mailer_template_test/akun_aktivasi', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );

        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Akun Aktivasi Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    public function test_invoice() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();

        $subjek = "ABANG21.COM - TESTING EMAIL INVOICE";
        $content = $this->load->view('mailer_template_test/invoice', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );

        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Invoice Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    public function test_lupa_password() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();

        $subjek = "ABANG21.COM - TESTING EMAIL LUPA PASSWORD";
        $content = $this->load->view('mailer_template_test/lupa_password', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Lupa Password Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    public function test_pembayaran() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();

        $subjek = "ABANG21.COM - TESTING EMAIL PEMBAYARAN";
        $content = $this->load->view('mailer_template_test/pembayaran', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Pembayaran Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    public function test_pengiriman_konfirmasi() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();

        $subjek = "ABANG21.COM - TESTING EMAIL PENGIRIMAN & KONFIRMASI";
        $content = $this->load->view('mailer_template_test/pengiriman_konfirmasi', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Pengiriman & Konfirmasi Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    public function test_pesanan() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();

        $subjek = "ABANG21.COM - TESTING EMAIL PESANAN";
        $content = $this->load->view('mailer_template_test/pesanan', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Pesanan Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    //-----------------------------------------------------------------------//
}
