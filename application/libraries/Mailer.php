<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Mailer {

    protected $_ci;
    protected $db_mailer = "mailer_config";

    public function __construct() {
        $this->_ci = &get_instance(); // Set variabel _ci dengan Fungsi2-fungsi dari Codeigniter
    }

    public function send($data) {
        $get_mailer = $this->_ci->db->query('select * from ' . $this->db_mailer . ' where id_mailer=1')->result();

        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->Host = $get_mailer[0]->host;
        $mail->Username = $get_mailer[0]->email_induk; // Email Pengirim
        $mail->Password = $get_mailer[0]->password; // Isikan dengan Password email pengirim
        $mail->Port = $get_mailer[0]->port;
        $mail->SMTPAuth = $get_mailer[0]->smtp_auth;
        $mail->SMTPSecure = $get_mailer[0]->smtp_secure;
        //$mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

        $mail->setFrom($get_mailer[0]->email_induk, $get_mailer[0]->nama_pengirim);
        $mail->addAddress($data['email_penerima'], '');
        $mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

        $mail->Subject = $data['subjek'];
        $mail->Body = $data['content'];
        $send = $mail->send();

        if ($send) { // Jika Email berhasil dikirim
            $response = TRUE;
        } else { // Jika Email Gagal dikirim
            $response = FALSE;
        }

        return $response;
    }

    public function send_with_attachment($data) {
        $get_mailer = $this->_ci->db->query('select * from ' . $this->db_mailer . ' where id_mailer=1')->result();

        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->Host = $get_mailer[0]->host;
        $mail->Username = $get_mailer[0]->email_induk;  // Email Pengirim
        $mail->Password = $get_mailer[0]->password;  // Isikan dengan Password email pengirim
        $mail->Port = $get_mailer[0]->port;
        $mail->SMTPAuth = $get_mailer[0]->smtp_auth;
        $mail->SMTPSecure = $get_mailer[0]->smtp_secure;
        // $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

        $mail->setFrom($get_mailer[0]->email_induk, $get_mailer[0]->nama_pengirim);
        $mail->addAddress($data['email_penerima'], '');
        $mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

        $mail->Subject = $data['subjek'];
        $mail->Body = $data['content'];

        if (filesize($data['files']) <= 25000000) { // Jika ukuran file <= 25 MB (25.000.000 bytes)
            $mail->addAttachment($data['files']);

            $send = $mail->send();

            if ($send) { // Jika Email berhasil dikirim
                $response = TRUE;
            } else { // Jika Email Gagal dikirim
                $response = FALSE;
            }
        } else { // Jika Ukuran file lebih dari 25 MB
            $response = FALSE;
        }

        return $response;
    }

}
