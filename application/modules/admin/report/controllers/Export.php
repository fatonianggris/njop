<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Export extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-admin') == FALSE) {
            redirect('admin/auth');
        }
        $this->load->model('ExportModel');
        $this->load->library('form_validation');
    }

    //---------------------------EKSPORT DATA MAHASISWA---------------------------------//

    public function export_data_csv() {
        $this->load->helper('download');

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $extension = 'csv';

        $fileName = 'DATA_SURAT_' . date('d-m-Y');

        //var_dump($data['data_check']);exit;

        if ($data['data_check'] == '' or $data['data_check'] == NULL || empty($data['data_check'] || !$data['data_check'])) {

            $this->session->set_flashdata('flash_message', warn_msg('Pilih/Centang data terlebih dahulu'));
            redirect('admin/report/letter/list_letter_document');
        } else {

            if (!empty($extension)) {
                $extension = $extension;
            } elseif ($extension == 'xlsx') {
                $extension = 'xlsx';
            } else {
                $extension = 'xls';
            }

            $empInfo = $this->ExportModel->get_data_export_letter($data['data_check']);
//            var_dump($empInfo);
//            exit;
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1', 'NOP');
            $sheet->setCellValue('B1', 'ALAMAT OBJEK PAJAK');
            $sheet->setCellValue('C1', 'PROVINSI OBJEK PAJAK');
            $sheet->setCellValue('D1', 'KABUPATEN/KOTA OBJEK PAJAK');
            $sheet->setCellValue('E1', 'KECAMATAN OBJEK PAJAK');
            $sheet->setCellValue('F1', 'KELURAHAN OBJEK PAJAK');
            $sheet->setCellValue('G1', 'NIK/NOPEL WAJIB PAJAK');
            $sheet->setCellValue('H1', 'NAMA WAJIB PAJAK');
            $sheet->setCellValue('I1', 'ALAMAT WAJIB PAJAK');
            $sheet->setCellValue('J1', 'PROVINSI WAJIB PAJAK');
            $sheet->setCellValue('K1', 'KABUPATEN/KOTA WAJIB PAJAK');
            $sheet->setCellValue('L1', 'KECAMATAN WAJIB PAJAK');
            $sheet->setCellValue('M1', 'KELURAHAN WAJIB PAJAK');
            $sheet->setCellValue('N1', 'LUAS BUMI');
            $sheet->setCellValue('O1', 'LUAS BANGUNAN');
            $sheet->setCellValue('P1', 'KELAS BUMI');
            $sheet->setCellValue('Q1', 'KELAS BANGUNAN');
            $sheet->setCellValue('R1', 'HARGA NJOP/M BUMI');
            $sheet->setCellValue('S1', 'HARGA NJOP/M BANGUNAN');
            $sheet->setCellValue('T1', 'TOTAL NJOP BUMI');
            $sheet->setCellValue('U1', 'TOTAL NJOP BANGUNAN');
            $sheet->setCellValue('V1', 'TAHUN PAJAK');
            $sheet->setCellValue('W1', 'TOTAL PAJAK BUMI/BANGUNAN');
            $sheet->setCellValue('X1', 'STATUS PEMBAYARAN');

            $rowCount = 2;

            foreach ($empInfo as $element) {

                $status_pembayaran = '';
                if ($element['status_pembayaran_pajak'] == '0') {
                    $status_pembayaran = 'BELUM BAYAR';
                } else if ($element['status_pembayaran_pajak'] == '1') {
                    $status_pembayaran = 'LUNAS';
                }

                $sheet->setCellValue('A' . $rowCount, $element['nomor_nop']);
                $sheet->setCellValue('B' . $rowCount, preg_replace("/\r|\n/", "", $element['letak_objek_pajak']));
                $sheet->setCellValue('C' . $rowCount, $element['nama_provinsi_obj']);
                $sheet->setCellValue('D' . $rowCount, $element['nama_kabupaten_kota_obj']);
                $sheet->setCellValue('E' . $rowCount, $element['nama_kecamatan_obj']);
                $sheet->setCellValue('F' . $rowCount, $element['nama_kelurahan_desa_obj']);
                $sheet->setCellValue('G' . $rowCount, $element['nik_wajib_pajak']);
                $sheet->setCellValue('H' . $rowCount, $element['nama_wajib_pajak']);
                $sheet->setCellValue('I' . $rowCount, preg_replace("/\r|\n/", " ", $element['alamat_wajib_pajak']));
                $sheet->setCellValue('J' . $rowCount, $element['nama_provinsi_pem']);
                $sheet->setCellValue('K' . $rowCount, $element['nama_kabupaten_kota_pem']);
                $sheet->setCellValue('L' . $rowCount, $element['nama_kecamatan_pem']);
                $sheet->setCellValue('M' . $rowCount, $element['nama_kelurahan_desa_pem']);
                $sheet->setCellValue('N' . $rowCount, $element['luas_bumi']);
                $sheet->setCellValue('O' . $rowCount, $element['luas_bangunan']);
                $sheet->setCellValue('P' . $rowCount, $element['kelas_bumi']);
                $sheet->setCellValue('Q' . $rowCount, $element['kelas_bangunan']);
                $sheet->setCellValue('R' . $rowCount, $element['harga_meter_njop_bumi']);
                $sheet->setCellValue('S' . $rowCount, $element['harga_meter_njop_bangunan']);
                $sheet->setCellValue('T' . $rowCount, $element['total_njop_bumi']);
                $sheet->setCellValue('U' . $rowCount, $element['total_njop_bangunan']);
                $sheet->setCellValue('V' . $rowCount, $element['tahun_pajak']);
                $sheet->setCellValue('W' . $rowCount, $element['total_pajak_bumi_bangunan']);
                $sheet->setCellValue('X' . $rowCount, $status_pembayaran);

                $rowCount++;
            }

            if ($extension == 'csv') {
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
                $fileName = $fileName . '.csv';
            } elseif ($extension == 'xlsx') {
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
                $fileName = $fileName . '.xlsx';
            } else {
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
                $fileName = $fileName . '.xls';
            }

            $this->output->set_header('Content-Type: application/vnd.ms-excel');
            $this->output->set_header("Content-type: application/csv");
            $this->output->set_header('Cache-Control: max-age=0');
            header('Content-Disposition: attachment;filename="' . $fileName . '"');
            $writer->save('php://output');
        }
    }

    //-----------------------------------------------------------------------//
//
}
