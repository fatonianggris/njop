<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//function to show message / aler

function warn_msg($param) {
    return '  
        <div class="alert alert-custom alert-light-warning shadow-sm fade show mb-7" role="alert">
             <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text text-dark">
                 <h4 class="alert-heading font-weight-bolder">Peringatan!</h4>
                ' . $param . '
                </div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>  
    ';
}

function login_err($param) {
    return '
        <div class="alert alert-custom alert-light-danger shadow-sm fade show mb-7" role="alert">
             <div class="alert-icon"><i class="flaticon-cancel"></i></div>
                <div class="alert-text font-weight-bolder">
                ' . $param . '
                </div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>  
    ';
}

function succ_msg($param) {
    return '
        <div class="alert alert-custom alert-light-success  shadow-sm fade show mb-7" role="alert">
             <div class="alert-icon"><i class="flaticon-like"></i></div>
                <div class="alert-text text-dark">
                 <h4 class="alert-heading font-weight-bolder">Berhasil!</h4>
                ' . $param . '
                </div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>  
    ';
}

function err_msg($param) {
    return '      
        <div class="alert alert-custom alert-light-danger shadow-sm fade show mb-7" role="alert">
             <div class="alert-icon"><i class="flaticon-cancel"></i></div>
                <div class="alert-text text-dark">
                 <h4 class="alert-heading font-weight-bolder">Terjadi Kesalahan!</h4>
                ' . $param . '
                </div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>  
    ';
}

$replacement = 'dash';

function create_slug($string, $replacement) {
    $CI = & get_instance();
    $CI->load->helper(array('url', 'text', 'string'));
    $string = strtolower(url_title(convert_accented_characters($string), $replacement));
    return reduce_multiples($string, get_replacement($replacement), TRUE);
}

function get_replacement($replacement) {
    return ($replacement === 'dash') ? '-' : '_';
}

//membuat format tanggal Indonesia
function TanggalIndo($date) {
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return($result);
}

//Iki helper bulan indo to SQL
function bulanindoSQL($month) {

    $indo_month = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    );

    //return $indo_month[$month];
    return array_search($month, $indo_month);
}

function bulanindo($month) {

    $indo_month = array(
        'Januari' => '01',
        'Februari' => '02',
        'Maret' => '03',
        'April' => '04',
        'Mei' => '05',
        'Juni' => '06',
        'Juli' => '07',
        'Agustus' => '08',
        'September' => '09',
        'Oktober' => '10',
        'November' => '11',
        'Desember' => '12'
    );

    //return $indo_month[$month];
    return array_search($month, $indo_month);
}

//Iki helper import data gae konvert format (TGL indo 24 Januari 2014 > SQL YYYY-MM-DD)
function indoSQL($date) {
    $hari = substr($date, 0, 2);
    //$bulan = substr($date, 3, -4);
    $tahun = substr($date, -4);

    $Array_bulan = explode(" ", $date);
    $bulan = ucwords(strtolower($Array_bulan[1]));

    return $tahun . '-' . bulanindoSQL($bulan) . '-' . $hari;
}

//membuat format menjadi rupiah
function format_rupiah($angka) {
    $jadi = "Rp " . number_format((double) $angka, 2, ',', '.');
    return $jadi;
}

// untuk KRIPTOGRAFI
define('CLASS_ENCRYPT', dirname(__FILE__));
include('cryptography/AES.class.php');
include('cryptography/hash_crypt.php');

// $keypass=md5('inv'.md5('store'));
// $key1=md5('inv');

function keypass() {
    return md5('inv' . md5('store'));
}

function paramEncrypt($x) {

    $first_output = '';
    $count = 0;


    $Cipher = new AES();
    $key_256bit = keypass();

    $n = ceil(strlen($x) / 16);
    $encrypt = "";

    for ($i = 0; $i <= $n - 1; $i++) {
        $cryptext = $Cipher->encrypt($Cipher->stringToHex(substr($x, $i * 16, 16)), $key_256bit);
        $encrypt .= $cryptext;
    }

    return $encrypt;
}

function paramDecrypt($x) {
    $Cipher = new AES();
    $key_256bit = keypass();

    $n = ceil(strlen($x) / 32);
    $decrypt = "";

    for ($i = 0; $i <= $n - 1; $i++) {
        $result = $Cipher->decrypt(substr($x, $i * 32, 32), $key_256bit);
        $decrypt .= $Cipher->hexToString($result);
    }

    return $decrypt;
}

function decode($x) {

    $pecahURI = explode('?', $x);
    $parameter = $pecahURI[1];

    $pecahParam = explode('&', paramDecrypt($parameter));

    for ($i = 0; $i <= count($pecahParam) - 1; $i++) {
        $decode = explode('=', $pecahParam[$i]);
        $var[$decode[0]] = $decode[1];
    }

    return $var;
}

function encoder($x) {
    $value = new hash_encryption($keypass1);
    $first = $value->encrypt($x);

    $first_output = '';
    $count = 0;

    while ($count < strlen($encrypted)) {
        $enc_output .= substr($first, $count, 80) . "<br>";
        $count += 80;
    }

    $Cipher = new AES();
    $key_256bit = $keypass;

    $n = ceil(strlen($first) / 16);
    $encrypt = "";

    for ($i = 0; $i <= $n - 1; $i++) {
        $cryptext = $Cipher->encrypt($Cipher->stringToHex(substr($first, $i * 16, 16)), $key_256bit);
        $encrypt .= $cryptext;
    }

    return $encrypt;
}

function decoder($x) {
    $Cipher = new AES();
    $key_256bit = keypass();

    $n = ceil(strlen($x) / 32);
    $decrypt = "";

    for ($i = 0; $i <= $n - 1; $i++) {
        $result = $Cipher->decrypt(substr($x, $i * 32, 32), $key_256bit);
        $decrypt .= $Cipher->hexToString($result);
    }

    $value = new hash_encryption('');
    $decrypted = $value->decrypt($decrypt);

    return $decrypted;
}
