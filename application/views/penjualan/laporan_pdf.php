<?php
//terbilang

$pelanggan = $this->m_penjualan_master->fetch_data('pj_pelanggan', ['nrmp' => $nrmp])->row();
function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}


?>

<style type="text/css">
    /** {
margin: 0;
padding: 0;
}*/
    .tengah {
        text-align: center;

    }

    .textkecil {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10px;
        /*font-weight:bolder;*/
    }

    .textkecilcenter {
        font-family: Verdana, Geneva, sans-serif;
        font-size: 9px;
        text-align: center;

    }

    .text1center {
        font-family: Verdana, Geneva, sans-serif;
        font-size: 15;
        text-align: center;

    }

    .textbiasa {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
        text-align: left;

    }

    .textbesar {
        font-family: Verdana, Geneva, sans-serif;
        font-size: 25px;

    }

    .textbesar2 {
        font-family: Verdana, Geneva, sans-serif;
        font-size: 14px;
    }

    .textbesar3 {
        font-family: Verdana, Geneva, sans-serif;
        font-size: 18;
        letter-spacing: 2px;
    }

    html {
        margin: 10px
    }

    div.page_break+div.page_break {
        page-break-before: always;
    }

    th {
        background-color: #f2f2f2;
    }

    .zebra-striped tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .hr-border {
        border: 1px solid black;
    }
</style>
<?php
function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="textbiasa">
    <tr>
        <td>
            <table width="100%" cellspacing="0" border="0" cellpadding="1">
                <tr>
                    <td>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="textbesar2">

                            <tr>
                                <td><strong>KPRJ ALKINDI</strong></td>
                                <td align="left"> Kepada Yth : </td>
                                <td align="left"> <?= $pelanggan->nama ?></td>
                            </tr>
                            <tr>
                                <td><strong>Jl. SIDORUKUN, PULO BRAYAN DARAT II, KEC. MEDAN TIM, <br>(Kota Medan)</strong></td>
                                <td>Jadwal Datang Kembali</td>
                                <td><?= $tanggal_kembali ?></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>Herbalis : </td>
                                <td> <?= $nama_herbalis ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>NRMP :</td>
                                <td> <?= $nrmp ?></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;" colspan="3"><strong>Kwitansi Pembelian</strong></td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal : <?= format_indo(date('Y-m-d H:i:s')) ?>
                                </td>
                                <td style="text-align: center;"> Sales : <?= $sales_pam ?></td>
                            </tr>


                        </table>
                        <table width="100%" border="1" cellspacing="0" cellpadding="0" class="textbiasa">
                            <tr>
                                <th> No</th>
                                <th> Nama Produk</th>
                                <th> Qty</th>
                                <th> Harga</th>
                                <th> Subtotal</th>
                                <th> Discont</th>
                                <th> Disc (Rp)</th>
                                <th> Grand Total </th>
                                <?php
                                $no = 0;
                                foreach ($_GET['kode_barang'] as $kd) {
                                    $no = $no + 1;
                                    if (!empty($kd)) {
                                        $nama_barang = $this->m_penjualan_master->fetch_data('pj_barang', ['kode_barang' => $kd])->row()->nama_barang;
                                        $qty = $_GET['jumlah_beli'][$no];
                                        $harga = $_GET['jumlah_beli'][$no];
                                    $jumlah_beli = $_GET['sub_total_awal'][$no];
                                    $discount = $_GET['discountnya'][$no];
                                    $total = number_format($_GET['sub_total'][$no]);
                                        $no++;
                                    }
?>
<tr>
    <td><?= $no++?> </td>
    <td><?= $nama_barang; ?> </td>
    <td><?= $qty ;?> </td>
    <td><?= $harga ?> </td>
    <td><?= $jumlah_beli ?> </td>
    <td><?= $discount ?> </td>
    <td><?= $discount ?> </td>
    <td><?= $total ?> </td>
    <td><?= $nama_barang; ?> </td>
    <?php
                                    
                                }
                                           
                                              ?>

                            </tr>
                        </table>
                    </td>
                </tr>




    </tr>

</table>

