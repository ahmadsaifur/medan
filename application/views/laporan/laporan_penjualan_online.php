<?php if ($penjualan->num_rows() > 0) { ?>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>NO</th>
				<th>Nomor Nota</th>
				<th>Tanggal</th>
				<th>Nama Pasien</th>
				<th>Nama Produk</th>
				<th>Qty</th>
				<th>Harga Satuan</th>
				<th>Total Penjualan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			$total_penjualan = 0;
			$summary = 0;
			foreach ($penjualan->result() as $p) {
				$subtotal = $p->harga_satuan * $p->jumlah_beli;
				$array = array($subtotal);
				echo "
					<tr>
						<td>" . $no . "</td>
						<td>" . $p->nomor_nota . "</td>
						<td>" . $p->tanggal . "</td>
						<td>" . $p->nrmp . " - " . $p->nama_pasien . "</td>
						<td>" . $p->nama_barang . "</td>
						<td>" . $p->jumlah_beli . "</td>
						<td>Rp. " . str_replace(",", ".", number_format($p->harga_satuan)) . "</td>
						<td>Rp. " . str_replace(",", ".", number_format($subtotal)) . "</td>
					</tr>
				";

				$total_penjualan = $total_penjualan + $p->total;
				$summary = $summary + array_sum($array);
				$no++;
			}

			echo "
				<tr>
					<td colspan='6'><b>Total Seluruh Penjualan</b></td>
					<td colspan='2'><b>Rp. " . str_replace(",", ".", number_format($summary)) . "</b></td>
				</tr>
			";
			?>
		</tbody>
	</table>

	<p>
		<?php
		$from 	= date('Y-m-d', strtotime($from));
		$to		= date('Y-m-d', strtotime($to));
		?>
		<a href="<?php echo site_url('laporan/pdf_online/' . $from . '/' . $to); ?>" target='blank' class='btn btn-default'><img src="<?php echo config_item('img'); ?>pdf.png"> Export ke PDF</a>
		<a href="<?php echo site_url('laporan/excel/' . $from . '/' . $to); ?>" target='blank' class='btn btn-default'><img src="<?php echo config_item('img'); ?>xls.png"> Export ke Excel</a>
	</p>
	<br />
<?php } ?>

<?php if ($penjualan->num_rows() == 0) { ?>
	<div class='alert alert-info'>
		Data dari tanggal <b><?php echo $from; ?></b> sampai tanggal <b><?php echo $to; ?></b> tidak ditemukan
	</div>
	<br />
<?php } ?>