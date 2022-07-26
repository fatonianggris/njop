<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator {

    public function generate($html, $filename = '', $attch = 0, $path = '', $stream = TRUE, $paper = 'A5', $orientation = "landscape") {
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        $dompdf = new DOMPDF($options);
        $dompdf->load_html($html);
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();

        if ($stream) {
            $dompdf->stream($filename . ".pdf", array("Attachment" => $attch));
        } else {
            $output = $dompdf->output();

            if (!file_exists($path . $filename . ".pdf")) {
                file_put_contents($path . $filename . ".pdf", $output);
            }
        }
    }

}
