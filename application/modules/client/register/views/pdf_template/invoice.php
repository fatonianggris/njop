<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>E-INVOICE Sekolah Utsman</title>

        <style type="text/css">
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table{
                font-size: x-small;
            }
            tfoot tr td{
                font-weight: bold;
                font-size: x-small;
            }
            .gray {
                background-color: #f2c195
            }
          
        </style>

    </head>
    <body style="background-image: url('<?php echo base_url().$page[0]->logo_website ?>'); opacity: 0.2; background-repeat: no-repeat;background-attachment: fixed;background-position: center;">
        <table width="100%">
            <tr>
                <td valign="top"><img src="<?php echo base_url().$page[0]->logo_website ?>" alt="" width="150"/></td>
                <td align="right">
                    <h2 style="color:#f77d0e"><?php echo $page[0]->nama_website; ?></h2>
                   
                        <?php echo $contact[0]->alamat; ?><br>
                        <?php echo $contact[0]->nomor_telephone; ?> / <?php echo $contact[0]->no_handphone; ?><br>
                        <?php echo $contact[0]->email; ?><br>
                        <?php echo $contact[0]->url_website; ?><br>               

                    <h3 style="color:#1BC5BD ">INV/PPDB #<?php echo $invoice[0]->nomor_pendaftaran; ?></h3>
                </td>
            </tr>

        </table>

        <table width="100%">
            <tr>
                <td><strong>Dari:</strong> PPDB <?php echo ucwords(strtolower($page[0]->nama_website)); ?></td>
                <td><strong>Kepada:</strong> <?php echo ucwords(strtolower($invoice[0]->nama_calon_siswa)); ?> / <b><?php echo $invoice[0]->nomor_pendaftaran; ?></b></td>
            </tr>

        </table>
        <br/>

        <table width="100%">
            <thead style="background-color: #f2c195;">
                <tr>
                    <th>#</th>
                    <th>Nama Item</th>
                    <th>Jumlah</th>
                    <th>Tipe</th>
                    <th>Harga (Rp)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><?php echo ucwords(strtolower($invoice[0]->nama_biaya)); ?></td>
                    <td align="right">x1</td>
                    <td align="right">
                        <b style="color:#F64E60; ">
                            <?php
                            if ($invoice[0]->id_tingkat == 1) {
                                echo 'KB';
                            } else if ($invoice[0]->id_tingkat == 2) {
                                echo 'TK';
                            } else if ($invoice[0]->id_tingkat == 3) {
                                echo 'SD';
                            } else if ($invoice[0]->id_tingkat == 4) {
                                echo 'SMP';
                            }
                            ?> - 
                            <?php
                            if ($invoice[0]->id_jalur == 1) {
                                echo 'REGULER';
                            } else if ($invoice[0]->id_jalur == 2) {
                                echo 'ICP';
                            }
                            ?> -
                            T.A.
                            <?php echo $invoice[0]->tahun_ajaran; ?>
                        </b>
                    </td>
                    <td align="right">Rp. <?php echo number_format($invoice[0]->nominal, 2, ',', '.'); ?></td>
                </tr>

            </tbody>

            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td align="right">Subtotal (Rp)</td>
                    <td align="right">Rp. <?php echo number_format($invoice[0]->nominal, 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td align="right">Diskon</td>
                    <td align="right">0.00</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td align="right">Total (Rp)</td>
                    <td align="right" class="gray">Rp. <?php echo number_format($invoice[0]->nominal, 2, ',', '.'); ?></td>
                </tr>
            </tfoot>
        </table>
        <br>
        <table width="100%">
            <thead>
                <tr>
                    <th style="text-align: left;">Keterangan:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="left" style="color:#1BC5BD; font-size: medium"><b>LUNAS & TERVERIFIKASI</b></td>
                </tr>
                <tr>
                    <td align="left" style="color:#F64E60"> </td>
                </tr>
                <tr>
                    <td align="left" style="color:#F64E60"> </td>
                </tr>
                <tr>
                    <td align="left" style="color:#F64E60"> </td>
                </tr>
                <tr>
                    <td align="left" style="color:#F64E60"> </td>
                </tr>
                <tr>
                    <td align="left" style="color:#F64E60"> </td>
                </tr>
                <tr>
                    <td align="left" style="color:#F64E60"> </td>
                </tr>
                <tr>
                    <td align="left" style="color:#F64E60"> </td>
                </tr>
                <tr>
                    <td align="center" style="color:#F64E60; font-size: xx-small"><b>*Dimohon untuk menyimpan bukti E-INVOICE ini, Terima kasih.</b></td>
                </tr>
                <tr>
                    <td align="left" style="color:#F64E60"> </td>
                </tr>
                <tr>
                    <td align="left" style="color:#F64E60"> </td>
                </tr>
                <tr>
                    <td align="left" style="color:#F64E60"> </td>
                </tr>  
                <tr>
                    <td align="left" style="color:#F64E60"> </td>
                </tr>
            </tbody>
        </table>
        <?php if ($invoice[0]->id_voucher != NULL or $invoice[0]->id_voucher != "") { ?>
            <table width="100%" style="border: 3px dashed #f77d0e;">
                <thead>
                    <tr>
                        <th align="left" style="width:80px"><img src="<?php echo base_url().$page[0]->logo_website ?>" alt="" width="120"/></th>
                        <th align="left" valign="top" >
                            <table >
                                <tbody>
                                    <tr>
                                        <td align="left" style="text-align: left;" >
                                            <p style="color:#f77d0e; font-size: 15px; margin-top: 0px; margin-bottom: 0px; font-weight: bolder; ">SELAMAT ANDA MENDAPATAKAN </p>
                                            <p style="color:#1BC5BD; font-size: 50px; margin-top: 0px; margin-bottom: 0px; font-weight: bolder; ">VOUCHER DISKON</p>
                                            <p style="color:#505050; font-size: 20px; margin-top: 0px; margin-bottom: 0px; font-weight: bolder; "><?php echo strtoupper($invoice[0]->nama_voucher); ?><b style="color:#f77d0e; "> <?php echo strtoupper($invoice[0]->potongan); ?>%</b> KODE: <b style="color:#f77d0e;" ><?php echo strtoupper($invoice[0]->kode_voucher); ?></b></p>
                                            <p style="color:#F64E60; font-size: x-small; margin-top: 0px; margin-bottom: 0px; font-weight: normal; ">*lihat syarat dan ketentuan berlaku </p> 
                                        </td>                    
                                    </tr>                                
                                </tbody>
                            </table>
                        </th>                    
                    </tr>
                </thead>
            </table>
            <br>
            <table width="100%">
                <thead>
                    <tr>
                        <th style="text-align: left;">Syarat & Ketentuan Voucher:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="left" style="font-size: x-small" ><?php echo ucwords(strtolower($invoice[0]->syarat_ketentuan)); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </body>
</html>