<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/navbar'); ?>

<style>
	.footer {
		margin-bottom: 22px;
	}

	.panel-primary .form-group {
		margin-bottom: 10px;
	}

	.form-control {
		border-radius: 0px;
		box-shadow: none;
	}

	.error_validasi {
		margin-top: 0px;
	}
</style>

<?php
$level 		= $this->session->userdata('ap_level');
$readonly	= '';
$disabled	= '';
if ($level !== 'admin') {
	$readonly	= 'readonly';
	$disabled	= 'disabled';
}
?>

<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-body">

			<div class='row'>
				<div class="col-sm-12">
					<h5 class='judul-transaksi'>
						<i class='fa fa-shopping-cart fa-fw'></i> Penjualan <i class='fa fa-angle-right fa-fw'></i> Transaksi Online
						<a href="<?php echo site_url('penjualan/transaksi2'); ?>" class='pull-right'><i class='fa fa-refresh fa-fw'></i> Refresh Halaman</a>
					</h5>
				</div>
				<div class="col-sm-6">
					<div class="panel panel-success" id='PelangganArea'>
						<div class="panel-heading"><i class='fa fa-user'></i> Informasi Pasien</div>
						<div class="panel-body">
							<div class="form-group">
								<label>Pasien</label>
								<a href="<?php echo site_url('penjualan/tambah-pelanggan2'); ?>" class='pull-right' id='TambahPelanggan'>Tambah Baru ?</a>
								<select name='id_pelanggan' id='id_pelanggan' class='form-control input-sm' style='cursor: pointer;'>
									<option value=''>-- Umum --</option>
									<?php
									if ($pelanggan->num_rows() > 0) {
										foreach ($pelanggan->result() as $p) {
											echo "<option value='" . $p->id_pelanggan . "'>" . $p->nrmp . ' - ' . $p->nama . "</option>";
										}
									}
									?>
								</select>
							</div>

							<div class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-2 control-label">Telp / HP</label>
									<div class="col-sm-8">
										<div id='telp_pelanggan'><small><i>Tidak ada</i></small></div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Alamat</label>
									<div class="col-sm-8">
										<div id='alamat_pelanggan'><small><i>Tidak ada</i></small></div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal Kembali</label>
									<div class="col-sm-8">
										<input type="date" name="tanggal_kembali" class="form-control input-sm" id="tanggal_kembali">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Sales</label>
									<div class="col-sm-8">
										<input id="id_herbalis" readonly="readonly" class="form-control" type="text" name="nama_herbalis">
										<button type="button" id="klik" class="btn btn-primary btn-sm" data-toggle="modal" style="margin-top: 5px"><b> EDIT</b></button><!-- 
										<button type="button" id="simpan" class="btn btn-success btn-sm save" data-toggle="modal" style="margin-top: 5px"><b> SAVE</b></button> -->
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Kota ATY</label>
									<div class="col-sm-8"><!-- 
										<input id="aty" readonly="readonly" class="form-control" type="text" name="kota_aty"> -->
										<select name='kota_aty' id='aty' class='form-control input-sm' style='cursor: pointer;'>
											<option value=''>-- Pilih Kota --</option>
											<option value='aty_sby'>ATY SURABAYA</option>
											<option value='aty_mdn'>ATY MEDAN</option>
											<option value='aty_mksr'>ATY MAKASSAR</option>
											<option value='aty_bali'>ATY BALI</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Nama Herbalis</label>
									<div class="col-sm-8"><!-- 
										<input id="aty" readonly="readonly" class="form-control" type="text" name="kota_aty"> -->
										<select name='nama_herbalis_ori' id='id_herbalis_ori' class='form-control input-sm' style='cursor: pointer;'>
											<option value=''>-- Pilih Herbalis --</option>
											<option value='BM-NS'>BM-NS</option>
											<option value='AY-DN'>AY-DN</option>
											<option value='BW-DT'>BW-DT</option>
											<option value='BM-MT'>BM-MT</option>
											<option value='AY-MT-DT'>AY-MT-DT</option>
											<option value='AY-MT'>AY-MT</option>
											<option value='AY-NS'>AY-NS</option>
											<option value='AY-MT-NS'>AY-MT-NS</option>
											<option value='BW-DN'>BW-DN</option>
											<option value='BM-DN'>BM-DN</option>
											<option value='AY-BT'>AY-BT</option>
											<option value='BW-MT'>BW-MT</option>
											<option value='MT-NS'>MT-NS</option>
											<option value='Dr.Faruq'>Dr.Faruq</option>
										</select>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class='col-sm-6'>
					<div class="panel panel-success">
						<div class="panel-heading"><i class='fa fa-file-text-o fa-fw'></i> Informasi Nota</div>
						<div class="panel-body">

							<div class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-2 control-label">No. Nota</label><br>
									<div class="col-sm-8">
										<input type='text' name='nomor_nota' class='form-control input-sm' id='nomor_nota' value="<?php echo strtoupper(uniqid()) . $this->session->userdata('ap_id_user'); ?>" <?php echo $readonly; ?>>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal</label><br>
									<div class="col-sm-8">
										<input type='text' name='tanggal' class='form-control input-sm' id='tanggal' value="<?php echo date('Y-m-d H:i:s'); ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Kasir</label><br>
									<div class="col-sm-8">
										<select name='id_kasir' id='id_kasir' class='form-control input-sm' <?php echo $disabled; ?>>
											<?php
											if ($kasirnya->num_rows() > 0) {
												foreach ($kasirnya->result() as $k) {
													$selected = '';
													if ($k->id_user == $this->session->userdata('ap_id_user')) {
														$selected = 'selected';
													}

													echo "<option value='" . $k->id_user . "' " . $selected . ">" . $k->nama . "</option>";
												}
											}
											?>
										</select>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class='col-sm-12'>

					<table class='table table-bordered' id='TabelTransaksi'>
						<thead>
							<tr>
								<th style='width:25px;'>#</th>
								<th style='width:120px;'>Kode Barang</th>
								<th>Nama Barang</th>
								<th style='width:45px;'>Satuan</th>
								<th style='width:100px;'>Harga</th>
								<th style='width:75px;'>Qty</th>
								<th style='width:125px;'>Sub Total</th>
								<th style='width:75px;'>Disc %</th>
								<th style='width:120px;'>Discount</th>
								<th style='width:125px;'>Grand Total</th>
								<th style='width:100px;'>action</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>

					<div class='alert alert-info TotalBayar'>
						<button id='BarisBaru' class='btn btn-default pull-left'><i class='fa fa-plus fa-fw'></i> Baris Baru (F7)</button>
						<h2>Total : <span id='TotalBayar'>Rp. 0</span></h2>
						<input type="hidden" id='TotalBayarHidden'>
						<input type="hidden" id='Totaldiscounthidden'>
						<input type="hidden" id='Totalitemdiscount'>
						<input type="hidden" id='TotalBayarHidden2'>
					</div>

					<div class='row'>
						<div class='col-sm-7'>
							<textarea name='catatan' id='catatan' class='form-control' rows='2' placeholder="Catatan Transaksi (Jika Ada)" style='resize: vertical; width:83%;'></textarea>

							<br />
							<p><i class='fa fa-keyboard-o fa-fw'></i> <b>Shortcut Keyboard : </b></p>
							<div class='row'>
								<div class='col-sm-6'>F7 = Tambah baris baru</div>
								<div class='col-sm-6'>F9 = Cetak Struk</div>
								<div class='col-sm-6'>F8 = Fokus ke field bayar</div>
								<div class='col-sm-6'>F10 = Simpan Transaksi</div>
							</div>
						</div>
						<div class='col-sm-5'>
							<div class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-2 control-label">Disc%</label>
									<div class="col-sm-3">
										<input type='number' id='discc' class='form-control'>
									</div>
									<label class="col-sm-2 control-label">Discount</label>
									<div class="col-sm-5">
										<input type='text' id='discount_all' class='form-control' name="discountnya">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-6 control-label">Total Setelah Discount</label>
									<div class="col-sm-6">
										<input type='text' id='TotalBayarHidden3' class='form-control' disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-6 control-label">Bayar (F8)</label>
									<div class="col-sm-6">
										<input type='text' name='cash' id='UangCash' class='form-control' onkeypress='return check_int(event)'>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-6 control-label">Kembali</label>
									<div class="col-sm-6">
										<input type='text' id='UangKembali' class='form-control' disabled>
									</div>
								</div>

								<div class='row'>
									<div class='col-sm-3' style='padding-right: 0px;'>
										<button type='button' class='btn btn-default btn-block' id='pending'>
											<i class='fa fa-clock-o' style="margin-bottom: 8px;padding-top: 5px"></i> pending
										</button>
									</div>
									<div class='col-sm-4' style='padding-right: 0px;'>
										<button type='button' class='btn btn-warning btn-block' id='CetakStruk'>
											<i class='fa fa-print'></i> Cetak (F9)
										</button>
									</div>
									<div class='col-sm-5'>
										<button type='button' class='btn btn-primary btn-block' id='Simpann'>
											<i class='fa fa-floppy-o'></i> Simpan (F10)
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>

					<br />
				</div>
			</div>

		</div>
	</div>
</div>

<p class='footer'><?php echo config_item('web_footer'); ?></p>

<link rel="stylesheet" type="text/css" href="<?php echo config_item('plugin'); ?>datetimepicker/jquery.datetimepicker.css" />
<script src="<?php echo config_item('plugin'); ?>datetimepicker/jquery.datetimepicker.js"></script>
<script>
	$('#tanggal').datetimepicker({
		lang: 'en',
		timepicker: true,
		format: 'Y-m-d H:i:s'
	});

	$(document).ready(function() {

		for (B = 1; B <= 1; B++) {
			BarisBaru();
		}
		/*
			$("#simpan").hide();*/

		$("#klik").click(function() {

			$("#id_herbalis").replaceWith("<select name='id_herbalis' id='id_herbalis' class='form-control input-sm' style='cursor: pointer;'><option value=''>-- pilih sales --</option><?php if ($sales->num_rows() > 0) {
																																																foreach ($sales->result() as $p) {
																																																	echo "<option value='" . $p->nama_sales . "'>" . $p->nama_sales . "</option>";
																																																}
																																															}
																																															?></select>");
			$(this).hide();
			/*
			       		$(".save").show();*/
			// $(".foto").show();
		});

		$(document).on('click', '#editharga', function() {
			var Indexnya = $(this).parent().parent().index();
			$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input').prop('type', 'text').val('');
			$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) span').hide();
			$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) input').val('');
			HitungTotalBayar();
		});

		$('#id_pelanggan').select2({
			placeholder: 'Pilih Pasien',
			allowClear: true
		});

		$('#id_pelanggan').change(function() {
			if ($(this).val() !== '') {
				$.ajax({
					url: "<?php echo site_url('penjualan/ajax_pelanggan2'); ?>",
					type: "POST",
					cache: false,
					data: "id_pelanggan=" + $(this).val(),
					dataType: 'json',
					success: function(json) {
						$('#telp_pelanggan').html(json.telp);
						$('#alamat_pelanggan').html(json.alamat);
						$('#info_tambahan_pelanggan').html(json.info_tambahan);
						$('#id_herbalis').val(json.herbalis);
						$('#nrmp').val(json.nrmp);
						$('#tanggal_kembali').val(json.tgl_kembali);
						/*
											$(".id_herbalis2" ).replaceWith( "<input id='id_herbalis' readonly='readonly' class='form-control' type='text' name='nama_herbalis'> value='"+val(json.herbalis)+"'");*/
					}
				});
			} else {
				$('#telp_pelanggan').html('<small><i>Tidak ada</i></small>');
				$('#alamat_pelanggan').html('<small><i>Tidak ada</i></small>');
				$('#info_tambahan_pelanggan').html('<small><i>Tidak ada</i></small>');
			}
		});

		$('#BarisBaru').click(function() {
			BarisBaru();
		});

		$("#TabelTransaksi tbody").find('input[type=text],textarea,select').filter(':visible:first').focus();
	});

	function BarisBaru() {
		var Nomor = $('#TabelTransaksi tbody tr').length + 1;
		var Baris = "<tr>";
		Baris += "<td>" + Nomor + "</td>";
		Baris += "<td>";
		Baris += "<input type='text' class='form-control' name='kode_barang[]' id='pencarian_kode' placeholder='Ketik Kode' autocomplete=’off’>";
		Baris += "<div id='hasil_pencarian'></div>";
		Baris += "</td>";
		Baris += "<td></td>";
		Baris += "<td>";
		Baris += "<input type='hidden' id='satuan' name='satuan[]'>";
		Baris += "<span></span>";
		Baris += "</td>";
		Baris += "<td>";
		Baris += "<input type='hidden' class='form-control' name='harga_satuan[]' id='hargasatuannya2'>";
		Baris += "<span id='hargasatuannya'></span>";
		Baris += "</td>";
		Baris += "<td><input type='text' class='form-control' id='jumlah_beli' name='jumlah_beli[]' onkeypress='return check_int(event)' disabled></td>";
		Baris += "<td>";
		Baris += "<input type='hidden' name='sub_total_awal[]' id='valtotal'>";
		Baris += "<span></span>";
		Baris += "</td>";
		Baris += "<td><input type='number' step='any' class='form-control' id='discount' name='discount[]' disabled></td>";
		Baris += "<td>";
		Baris += "<input type='hidden' step='any' name='discountnya[]' id='discountnya'>";
		Baris += "<span></span>";
		Baris += "</td>";
		Baris += "<td>";
		Baris += "<input type='hidden' name='sub_total[]' id='valtotal2'>";
		Baris += "<span></span>";
		Baris += "</td>";
		Baris += "<td><button class='btn btn-default' id='HapusBaris'><i class='fa fa-times' style='color:red;'></i></button> <button class='btn btn-default' id='editharga'><i class='fa fa-check' style='color:red;'></i></button></td>";
		Baris += "</tr>";

		$('#TabelTransaksi tbody').append(Baris);

		$('#TabelTransaksi tbody tr').each(function() {
			$(this).find('td:nth-child(2) input').focus();
		});

		HitungTotalBayar();
	}

	$(document).on('click', '#HapusBaris', function(e) {
		e.preventDefault();
		$(this).parent().parent().remove();

		var Nomor = 1;
		$('#TabelTransaksi tbody tr').each(function() {
			$(this).find('td:nth-child(1)').html(Nomor);
			Nomor++;
		});

		HitungTotalBayar();
	});

	function AutoCompleteGue(Lebar, KataKunci, Indexnya) {
		$('div#hasil_pencarian').hide();
		var Lebar = Lebar + 25;

		var Registered = '';
		$('#TabelTransaksi tbody tr').each(function() {
			if (Indexnya !== $(this).index()) {
				if ($(this).find('td:nth-child(2) input').val() !== '') {
					Registered += $(this).find('td:nth-child(2) input').val() + ',';
				}
			}
		});

		if (Registered !== '') {
			Registered = Registered.replace(/,\s*$/, "");
		}

		$.ajax({
			url: "<?php echo site_url('penjualan/ajax-kode2'); ?>",
			type: "POST",
			cache: false,
			data: 'keyword=' + KataKunci + '&registered=' + Registered,
			dataType: 'json',
			success: function(json) {
				if (json.status == 1) {
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').css({
						'width': Lebar + 'px'
					});
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').show('fast');
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').html(json.datanya);
				}
				if (json.status == 0) {
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3)').html('');
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').val('');
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) span').html('');
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input').val('');
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) span').html('');
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) input').prop('disabled', true).val('');
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(7) input').val(0);
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(7) span').html('');
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(8) input').prop('disabled', true).val('');

				}
			}
		});

		HitungTotalBayar();
	}

	$(document).on('keyup', '#pencarian_kode', function(e) {
		if ($(this).val() !== '') {
			var charCode = e.which || e.keyCode;
			if (charCode == 40) {
				if ($('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').length > 0) {
					var Selanjutnya = $('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').next();
					$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').removeClass('autocomplete_active');

					Selanjutnya.addClass('autocomplete_active');
				} else {
					$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li:first').addClass('autocomplete_active');
				}
			} else if (charCode == 38) {
				if ($('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').length > 0) {
					var Sebelumnya = $('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').prev();
					$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').removeClass('autocomplete_active');

					Sebelumnya.addClass('autocomplete_active');
				} else {
					$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian li:first').addClass('autocomplete_active');
				}
			} else if (charCode == 13) {
				var Field = $('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)');
				var Kodenya = Field.find('div#hasil_pencarian li.autocomplete_active span#kodenya').html();
				var Barangnya = Field.find('div#hasil_pencarian li.autocomplete_active span#barangnya').html();
				var Harganya = Field.find('div#hasil_pencarian li.autocomplete_active span#harganya').html();
				var Satuannya = Field.find('div#hasil_pencarian li.autocomplete_active span#satuannya').html();

				Field.find('div#hasil_pencarian').hide();
				Field.find('input').val(Kodenya);

				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(3)').html(Barangnya);
				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(4) input').val(Satuannya);
				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(4) span').html(Satuannya);
				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(5) input').val(Harganya);
				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(5) span').html(to_rupiah(Harganya));
				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(6) input').removeAttr('disabled').val(1);
				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(8) input').removeAttr('disabled').val('');
				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(7) input').val(Harganya);
				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(7) span').html(to_rupiah(Harganya));
				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(10) input').val(Harganya);
				$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(10) span').html(to_rupiah(Harganya));

				var IndexIni = $(this).parent().parent().index() + 1;
				var TotalIndex = $('#TabelTransaksi tbody tr').length;
				if (IndexIni == TotalIndex) {
					BarisBaru();

					$('html, body').animate({
						scrollTop: $(document).height()
					}, 0);
				} else {
					$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(5) input').focus();
				}
			} else {
				AutoCompleteGue($(this).width(), $(this).val(), $(this).parent().parent().index());
			}
		} else {
			$('#TabelTransaksi tbody tr:eq(' + $(this).parent().parent().index() + ') td:nth-child(2)').find('div#hasil_pencarian').hide();
		}

		HitungTotalBayar();
	});

	$(document).on('click', '#daftar-autocomplete li', function() {
		$(this).parent().parent().parent().find('input').val($(this).find('span#kodenya').html());

		var Indexnya = $(this).parent().parent().parent().parent().index();
		var NamaBarang = $(this).find('span#barangnya').html();
		var Harganya = $(this).find('span#harganya').html();
		var Satuannya = $(this).find('span#satuannya').html();

		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').hide();
		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3)').html(NamaBarang);
		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').val(Satuannya);
		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) span').html(Satuannya);
		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input').val(Harganya);
		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) span').html(to_rupiah(Harganya));
		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) input').removeAttr('disabled').val(1);
		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(8) input').removeAttr('disabled').val('');
		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(7) input').val(Harganya);
		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(7) span').html(to_rupiah(Harganya));
		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(10) input').val(Harganya);
		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(10) span').html(to_rupiah(Harganya));

		var IndexIni = Indexnya + 1;
		var TotalIndex = $('#TabelTransaksi tbody tr').length;
		if (IndexIni == TotalIndex) {
			BarisBaru();
			$('html, body').animate({
				scrollTop: $(document).height()
			}, 0);
		} else {
			$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) input').focus();
		}

		HitungTotalBayar();
	});

	$(document).on('keyup', '#jumlah_beli', function() {
		var Indexnya = $(this).parent().parent().index();
		var Harga = $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input').val();
		var JumlahBeli = $(this).val();
		var KodeBarang = $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2) input').val();

		$.ajax({
			url: "<?php echo site_url('barang/cek-stok'); ?>",
			type: "POST",
			cache: false,
			data: "kode_barang=" + encodeURI(KodeBarang) + "&stok=" + JumlahBeli,
			dataType: 'json',
			success: function(data) {
				if (data.status == 1) {
					var SubTotal = parseInt(Harga) * parseInt(JumlahBeli);
					if (SubTotal > 0) {
						var SubTotalVal = SubTotal;
						SubTotal = to_rupiah(SubTotal);
					} else {
						SubTotal = '';
						var SubTotalVal = 0;
					}

					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(7) input').val(SubTotalVal);
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(7) span').html(SubTotal);
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(10) input').val(SubTotalVal);
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(10) span').html(SubTotal);
					HitungTotalBayar();
				}
				if (data.status == 0) {
					SubTotal = to_rupiah(Harga);

					$('.modal-dialog').removeClass('modal-lg');
					$('.modal-dialog').addClass('modal-sm');
					$('#ModalHeader').html('Oops !');
					$('#ModalContent').html(data.pesan);
					$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok, Saya Mengerti</button>");
					$('#ModalGue').modal('show');

					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) input').val('1');
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(7) input').val(Harga);
					$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(7) span').html(SubTotal);
					HitungTotalBayar();
				}
			}
		});
	});

	$(document).on('keyup', '#discount', function() {
		var Indexnya = $(this).parent().parent().index();
		var Harga = $('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(7) input').val();
		var discount = $(this).val();


		var SubTotal = parseInt(Harga) * parseFloat(discount) / 100;
		var SubTotalVal = parseInt(Harga) - parseInt(SubTotal);
		if (SubTotal > 0) {
			var SubTotal2 = SubTotal;
			SubTotal = to_rupiah(SubTotal);
		} else {
			SubTotal = '';
			var SubTotal2 = 0;
		}
		if (SubTotalVal > 0) {
			var SubTotalVal2 = SubTotalVal;
			SubTotalVal = to_rupiah(SubTotalVal);
		} else {
			SubTotalVal = '';
			var SubTotalVal2 = 0;
		}

		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(9) input').val(SubTotal2);
		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(9) span').html(SubTotal);
		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(10) input').val(SubTotalVal2);
		$('#TabelTransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(10) span').html(SubTotalVal);

		HitungTotalBayar();
		HitungTotaldiscount();

	});

	$(document).on('keyup', '#discc', function() {
		var Indexnya = $(this).parent().parent().index();
		var Harga = $('#Totalitemdiscount').val();
		var discount = $(this).val();


		var SubTotal = parseInt(Harga) * parseFloat(discount) / 100;
		var SubTotalVal = parseInt(Harga) - parseInt(SubTotal);
		if (SubTotal > 0) {
			var SubTotal2 = SubTotal;
			SubTotal = to_rupiah(SubTotal);
		} else {
			SubTotal = '';
			var SubTotal2 = 0;
		}
		if (SubTotalVal > 0) {
			var SubTotalVal2 = SubTotalVal;
			SubTotalVal = to_rupiah(SubTotalVal);
		} else {
			SubTotalVal = '';
			var SubTotalVal2 = 0;
		}

		if (parseInt(Harga) >= parseInt(SubTotal2)) {
			var Selisih = parseInt(Harga) - parseInt(SubTotal2);
			$('#TotalBayarHidden3').val(to_rupiah(Selisih));
			$('#TotalBayarHidden2').val(Selisih);
			$('#TotalBayarHidden').val(Selisih);
			$('#Totaldiscounthidden').val(SubTotal2);
			$('#discount_all').val(to_rupiah(SubTotal2));
		} else {
			$('#TotalBayarHidden3').val('');
		}

	});

	$(document).on('keydown', '#discount', function(e) {
		var charCode = e.which || e.keyCode;
		if (charCode == 9) {
			var Indexnya = $(this).parent().parent().index() + 1;
			var TotalIndex = $('#TabelTransaksi tbody tr').length;
			if (Indexnya == TotalIndex) {
				BarisBaru();
				return false;
			}
		}

		HitungTotaldiscount();
	});

	$(document).on('keydown', '#jumlah_beli', function(e) {
		var charCode = e.which || e.keyCode;
		if (charCode == 9) {
			var Indexnya = $(this).parent().parent().index() + 1;
			var TotalIndex = $('#TabelTransaksi tbody tr').length;
			if (Indexnya == TotalIndex) {
				BarisBaru();
				return false;
			}
		}

		HitungTotalBayar();
	});

	$(document).on('keyup', '#UangCash', function() {
		HitungTotalKembalian();
	});

	$(document).on('keyup', '#discount_all', function() {
		HitungTotalalldiscount();
	});


	function HitungTotalBayar() {
		/*
		 var Discount = $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(8) input').val();
		 var Total3 = $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(9) input').val();*/
		var Total = 0;
		$('#TabelTransaksi tbody tr').each(function() {
			if ($(this).find('td:nth-child(10) input').val() > 0) {
				var SubTotal = $(this).find('td:nth-child(10) input').val();
				Total = parseInt(Total) + parseInt(SubTotal);

			}
		});

		$('#TotalBayar').html(to_rupiah(Total));
		$('#TotalBayarHidden').val(Total);
		$('#TotalBayarHidden2').val(Total);
		$('#Totalitemdiscount').val(Total);


		$('#UangCash').val('');
		$('#UangKembali').val('');
	}

	function HitungTotaldiscount() {
		var TotalBayar = $('#TotalBayarHidden').val();
		var Total = 0;
		var Total2 = 0;
		$('#TabelTransaksi tbody tr').each(function() {
			if ($(this).find('td:nth-child(9) input').val() > 0) {
				var SubTotal = $(this).find('td:nth-child(9) input').val();
				Total = parseInt(Total) + parseInt(SubTotal);
				Total2 = parseInt(Total) + parseInt(TotalBayar);
			}
		});

		$('#TotalBayar').html(to_rupiah(Total2));
		$('#Totaldiscount').html(to_rupiah(Total));
		$('#TotalBayarHidden3').val(to_rupiah(TotalBayar));
		$('#Totaldiscounthidden').val(Total);
		$('#discount_all').val(Total);
		$('#Totalitemdiscount').val(Total2);
	}

	function HitungTotalKembalian() {
		var Cash = $('#UangCash').val();
		var TotalBayar = $('#TotalBayarHidden2').val();

		if (parseInt(Cash) >= parseInt(TotalBayar)) {
			var Selisih = parseInt(Cash) - parseInt(TotalBayar);
			$('#UangKembali').val((Selisih));
		} else {
			$('#UangKembali').val('');
		}
	}

	function HitungTotalalldiscount() {
		var Cash = $('#discount_all').val();
		var TotalBayar = $('#Totalitemdiscount').val();

		if (parseInt(TotalBayar) >= parseInt(Cash)) {
			var Selisih = parseInt(TotalBayar) - parseInt(Cash);
			$('#TotalBayarHidden3').val(to_rupiah(Selisih));
			$('#TotalBayarHidden2').val(Selisih);
			$('#TotalBayarHidden').val(Selisih);
			$('#Totaldiscounthidden').val(Cash);
		} else {
			$('#TotalBayarHidden3').val('');
		}
	}

	function to_rupiah(angka) {
		var rev = parseInt(angka, 10).toString().split('').reverse().join('');
		var rev2 = '';
		for (var i = 0; i < rev.length; i++) {
			rev2 += rev[i];
			if ((i + 1) % 3 === 0 && i !== (rev.length - 1)) {
				rev2 += '.';
			}
		}
		return 'Rp. ' + rev2.split('').reverse().join('');
	}

	function check_int(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode;
		return (charCode >= 48 && charCode <= 57 || charCode == 8);
	}

	$(document).on('keydown', 'body', function(e) {
		var charCode = (e.which) ? e.which : event.keyCode;

		if (charCode == 117) //F6
		{
			HapusBaris();
			return false;
		}

		if (charCode == 118) //F7
		{
			BarisBaru();
			return false;
		}

		if (charCode == 119) //F8
		{
			$('#UangCash').focus();
			return false;
		}

		if (charCode == 120) //F9
		{
			CetakStruk();
			return false;
		}

		if (charCode == 121) //F10
		{
			$('.modal-dialog').removeClass('modal-lg');
			$('.modal-dialog').addClass('modal-sm');
			$('#ModalHeader').html('Konfirmasi');
			$('#ModalContent').html("Apakah anda yakin ingin menyimpan transaksi ini ?");
			$('#ModalFooter').html("<button type='button' class='btn btn-primary' id='SimpanTransaksi'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
			$('#ModalGue').modal('show');

			setTimeout(function() {
				$('button#SimpanTransaksi').focus();
			}, 500);

			return false;
		}

	});

	$(document).on('click', '#Simpann', function() {
		$('.modal-dialog').removeClass('modal-lg');
		$('.modal-dialog').addClass('modal-sm');
		$('#ModalHeader').html('Konfirmasi');
		$('#ModalContent').html("Apakah anda yakin ingin menyimpan transaksi ini ?");
		$('#ModalFooter').html("<button type='button' class='btn btn-primary' id='SimpanTransaksi'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
		$('#ModalGue').modal('show');

		setTimeout(function() {
			$('button#SimpanTransaksi').focus();
		}, 500);
	});

	$(document).on('click', '#pending', function() {
		$('.modal-dialog').removeClass('modal-lg');
		$('.modal-dialog').addClass('modal-sm');
		$('#ModalHeader').html('Konfirmasi');
		$('#ModalContent').html("Apakah anda yakin ingin Pending transaksi ini ?");
		$('#ModalFooter').html("<button type='button' class='btn btn-primary' id='pending2'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
		$('#ModalGue').modal('show');

		setTimeout(function() {
			$('button#pending2').focus();
		}, 500);
	});

	$(document).on('click', 'button#SimpanTransaksi', function() {
		SimpanTransaksi();
	});

	$(document).on('click', 'button#CetakStruk', function() {
		CetakStruk();
	});

	$(document).on('click', 'button#pending2', function() {
		pending();
	});

	function SimpanTransaksi() {
		var FormData = "nomor_nota=" + encodeURI($('#nomor_nota').val());
		FormData += "&tanggal=" + encodeURI($('#tanggal').val());
		FormData += "&id_kasir=" + $('#id_kasir').val();
		FormData += "&id_pelanggan=" + $('#id_pelanggan').val();
		FormData += "&nama_herbalis=" + $('#id_herbalis').val();
		FormData += "&aty_kota=" + $('#aty').val();
		FormData += "&tanggal_kembali=" + $('#tanggal_kembali').val();
		FormData += "&" + $('#TabelTransaksi tbody input').serialize();
		FormData += "&cash=" + $('#UangCash').val();
		FormData += "&catatan=" + encodeURI($('#catatan').val());
		FormData += "&grand_total=" + $('#TotalBayarHidden').val();
		FormData += "&total_discount=" + $('#Totaldiscounthidden').val();
		FormData += "&total_awal=" + $('#Totalitemdiscount').val();

		$.ajax({
			url: "<?php echo site_url('penjualan/transaksi2'); ?>",
			type: "POST",
			cache: false,
			data: FormData,
			dataType: 'json',
			success: function(data) {
				if (data.status == 1) {
					alert(data.pesan);
					window.location.href = "<?php echo site_url('penjualan/transaksi2'); ?>";
				} else {
					$('.modal-dialog').removeClass('modal-lg');
					$('.modal-dialog').addClass('modal-sm');
					$('#ModalHeader').html('Oops !');
					$('#ModalContent').html(data.pesan);
					$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
					$('#ModalGue').modal('show');
				}
			}
		});

		if ($('#TotalBayarHidden').val() > 0) {
			if ($('#UangCash').val() !== '') {
				var FormData = "nomor_nota=" + encodeURI($('#nomor_nota').val());
				FormData += "&tanggal=" + encodeURI($('#tanggal').val());
				FormData += "&id_kasir=" + $('#id_kasir').val();
				FormData += "&id_pelanggan=" + $('#id_pelanggan').val();
				FormData += "&" + $('#TabelTransaksi tbody input').serialize();
				FormData += "&cash=" + $('#UangCash').val();
				FormData += "&catatan=" + encodeURI($('#catatan').val());
				FormData += "&grand_total=" + $('#TotalBayarHidden').val();
				FormData += "&total_discount=" + $('#Totaldiscounthidden').val();
				FormData += "&total_awal=" + $('#Totalitemdiscount').val();
				FormData += "&nama_herbalis=" + $('#id_herbalis').val();
				FormData += "&aty_kota=" + $('#aty').val();
				FormData += "&tanggal_kembali=" + $('#tanggal_kembali').val();
				FormData += "&nrmp=" + $('#nrmp').val();

				window.open("<?php echo site_url('penjualan/transaksi-cetak2/?'); ?>" + FormData, '_blank');
			} else {
				$('.modal-dialog').removeClass('modal-lg');
				$('.modal-dialog').addClass('modal-sm');
				$('#ModalHeader').html('Oops !');
				$('#ModalContent').html('Harap masukan Total Bayar');
				$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
				$('#ModalGue').modal('show');
			}
		} else {
			$('.modal-dialog').removeClass('modal-lg');
			$('.modal-dialog').addClass('modal-sm');
			$('#ModalHeader').html('Oops !');
			$('#ModalContent').html('Harap pilih barang terlebih dahulu');
			$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
			$('#ModalGue').modal('show');

		}
	}

	function pending() {
		var FormData = "nomor_nota=" + encodeURI($('#nomor_nota').val());
		FormData += "&tanggal=" + encodeURI($('#tanggal').val());
		FormData += "&id_kasir=" + $('#id_kasir').val();
		FormData += "&id_pelanggan=" + $('#id_pelanggan').val();
		FormData += "&nama_herbalis=" + $('#id_herbalis').val();
		FormData += "&tanggal_kembali=" + $('#tanggal_kembali').val();
		FormData += "&" + $('#TabelTransaksi tbody input').serialize();
		FormData += "&cash=" + $('#UangCash').val();
		FormData += "&catatan=" + encodeURI($('#catatan').val());
		FormData += "&grand_total=" + $('#TotalBayarHidden').val();
		FormData += "&total_discount=" + $('#Totaldiscounthidden').val();
		FormData += "&total_awal=" + $('#Totalitemdiscount').val();

		$.ajax({
			url: "<?php echo site_url('penjualan/transaksi2_pending'); ?>",
			type: "POST",
			cache: false,
			data: FormData,
			dataType: 'json',
			success: function(data) {
				if (data.status == 1) {
					alert(data.pesan);
					window.location.href = "<?php echo site_url('penjualan/transaksi2_pending'); ?>";
				} else {
					$('.modal-dialog').removeClass('modal-lg');
					$('.modal-dialog').addClass('modal-sm');
					$('#ModalHeader').html('Oops !');
					$('#ModalContent').html(data.pesan);
					$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
					$('#ModalGue').modal('show');
				}
			}
		});
	}

	$(document).on('click', '#TambahPelanggan', function(e) {
		e.preventDefault();

		$('.modal-dialog').removeClass('modal-sm');
		$('.modal-dialog').removeClass('modal-lg');
		$('#ModalHeader').html('Tambah Pelanggan');
		$('#ModalContent').load($(this).attr('href'));
		$('#ModalGue').modal('show');
	});

	function CetakStruk() {
		if ($('#TotalBayarHidden').val() > 0) {
			if ($('#UangCash').val() !== '') {
				var FormData = "nomor_nota=" + encodeURI($('#nomor_nota').val());
				FormData += "&tanggal=" + encodeURI($('#tanggal').val());
				FormData += "&id_kasir=" + $('#id_kasir').val();
				FormData += "&id_pelanggan=" + $('#id_pelanggan').val();
				FormData += "&" + $('#TabelTransaksi tbody input').serialize();
				FormData += "&cash=" + $('#UangCash').val();
				FormData += "&catatan=" + encodeURI($('#catatan').val());
				FormData += "&grand_total=" + $('#TotalBayarHidden').val();
				FormData += "&nama_herbalis=" + $('#id_herbalis').val();
				FormData += "&tanggal_kembali=" + $('#tanggal_kembali').val();
				FormData += "&total_discount=" + $('#Totaldiscounthidden').val();
				FormData += "&total_awal=" + $('#Totalitemdiscount').val();
				FormData += "&nrmp=" + $('#nrmp').val();

				window.open("<?php echo site_url('penjualan/transaksi-cetak2/?'); ?>" + FormData, '_blank');
			} else {
				$('.modal-dialog').removeClass('modal-lg');
				$('.modal-dialog').addClass('modal-sm');
				$('#ModalHeader').html('Oops !');
				$('#ModalContent').html('Harap masukan Total Bayar');
				$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
				$('#ModalGue').modal('show');
			}
		} else {
			$('.modal-dialog').removeClass('modal-lg');
			$('.modal-dialog').addClass('modal-sm');
			$('#ModalHeader').html('Oops !');
			$('#ModalContent').html('Harap pilih barang terlebih dahulu');
			$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
			$('#ModalGue').modal('show');

		}
	}
</script>

<?php $this->load->view('include/footer'); ?>