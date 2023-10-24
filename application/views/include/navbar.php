<?php
$controller = $this->router->fetch_class();
$level = $this->session->userdata('ap_level');
?>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo site_url(); ?>">
				<img alt="<?php echo config_item('web_title'); ?>" src="<?php echo config_item('img'); ?>Alkindiherbal1.png">
			</a>
		</div>

		<p class="navbar-text">Anda login sebagai <?php echo $this->session->userdata('ap_level_caption'); ?></p>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">

				<?php if($level == 'admin' OR $level == 'keuangan' OR $level == 'kasir' OR $level == 'inventory' OR $level == 'kasir_2') { ?>
				<li class="dropdown <?php if($controller == 'penjualan') { echo 'active'; } ?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-shopping-cart fa-fw'></i> Penjualan <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<?php if($level !== 'inventory'  ){ ?>
						<li><a href="<?php echo site_url('penjualan/transaksi'); ?>">Transaksi Klinik</a></li>
						<?php } ?>
						<?php if($level !== 'inventory' ){ ?>
						<li><a href="<?php echo site_url('penjualan/transaksi2'); ?>">Transaksi Online</a></li>
						<?php } ?>
						<?php if($level !== 'inventory' ){ ?>
						<li><a href="<?php echo site_url('penjualan/transaksi_pending'); ?>">Transaksi Pending</a></li>
                        <?php } ?>
                        
						<li><a href="<?php echo site_url('penjualan/history'); ?>">History Penjualan klinik</a></li>
						
						<li><a href="<?php echo site_url('penjualan/history_online'); ?>">History Penjualan online</a></li>
						<!-- 
						<li><a href="<?php echo site_url('penjualan/history_stok_klinik'); ?>">History Stok Klinik</a></li> -->
						<?php if($level !== 'inventory' ){ ?>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo site_url('penjualan/pelanggan'); ?>">Data Pasien</a></li>
						<?php } ?>
						
						<?php if($level !== 'inventory' ){ ?>
						<li role="separator" class="divider"></li>
						<li><a href="https://alkindikasir.com/medan/pengiriman/index.html" target="_blank">Format Pengiriman Landscape</a></li>
						<li><a href="https://alkindikasir.com/medan/pengiriman/potrait/index.html" target="_blank">Format Pengiriman Potrait</a></li>
						<?php } ?>
					</ul>
				</li>
				<?php } ?>

				<li class="dropdown <?php if($controller == 'barang') { echo 'active'; } ?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-cube fa-fw'></i> Obat <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('barang'); ?>">Semua Obat</a></li>
						<li role="separator" class="divider"></li><!-- 
						<li><a href="<?php echo site_url('barang/list-merek'); ?>">List Merek</a></li> -->
						<li><a href="<?php echo site_url('barang/barang_klinik'); ?>">Obat Klinik</a></li>
						<li><a href="<?php echo site_url('barang/barang_online'); ?>">Obat Online</a></li>
						<li><a href="<?php echo site_url('barang/history_brg_klinik'); ?>">History Klinik</a></li>
						<li><a href="<?php echo site_url('barang/history_brg_online'); ?>">HIstory Online</a></li><!-- 
						<li><a href="<?php echo site_url('barang/list-kategori'); ?>">Kategori Obat</a></li> -->
					</ul>
				</li>
				<?php if($level == 'admin' OR $level == 'kasir' OR $level == 'keuangan' OR $level == 'inventory' ) { ?>
				<li class="dropdown <?php if($controller == 'jasa') { echo 'active'; } ?>">
					<a href="<?php echo site_url('jasa'); ?>" aria-haspopup="true" ><i class='fa fa-eyedropper fa-fw'></i> Jasa </a>
				</li>
				<?php } ?>

				<?php if($level == 'admin' OR $level == 'kasir' OR $level == 'keuangan') { ?>
				<li <?php if($controller == 'laporan') { echo "class='active'"; } ?>>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-file-text-o fa-fw'></i> laporan <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('laporan'); ?>">Laporan Per Item Klinik</a></li>
						<li><a href="<?php echo site_url('laporan/laporan_peritem'); ?>">Laporan Per Item Online</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo site_url('laporan/laporan_pasienklinik'); ?>">Laporan Pasien Klinik</a></li>
						<li><a href="<?php echo site_url('laporan/laporan_pasien'); ?>">Laporan Pasien Online</a></li>
						<li><a href="<?php echo site_url('laporan/laporan_pasien_ATY'); ?>">Laporan Pasien Online ATY</a></li>
						<li><a href="<?php echo site_url('laporan/laporan_obatklinik'); ?>">Laporan Obat Klinik </a></li>
						<li><a href="<?php echo site_url('laporan/laporan_obat'); ?>">Laporan Obat Online</a></li>
						<li><a href="<?php echo site_url('laporan/laporan_obat_ATY'); ?>">Laporan Obat Online ATY</a></li>
						<li><a href="<?php echo site_url('laporan/laporan_sales_perproduk'); ?>">Laporan Sales Per Produk</a></li>
						<li><a href="<?php echo site_url('laporan/laporan_sales_perproduk_ATY'); ?>">Laporan Sales Per Produk ATY</a></li>
						<li><a href="<?php echo site_url('laporan/laporan_sales'); ?>">Laporan Sales</a></li>
						<li><a href="<?php echo site_url('laporan/laporan_sales_ATY'); ?>">Laporan Sales ATY</a></li>
						<li><a href="<?php echo site_url('laporan/laporan_sales_pam'); ?>">Laporan Sales PAM</a></li>
						<li><a href="<?php echo site_url('laporan/laporan_herbalis'); ?>">Laporan Herbalis</a></li>
					</ul>
					
				</li>
				<?php } ?>

				<?php if($level == 'admin') { ?>
				<li <?php if($controller == 'user') { echo "class='active'"; } ?>><a href="<?php echo site_url('user'); ?>"><i class='fa fa-users fa-fw'></i> List User</a></li>
				<?php } ?>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-user fa-fw'></i> <?php echo $this->session->userdata('ap_nama'); ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('user/ubah-password'); ?>" id='GantiPass'>Ubah Password</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo site_url('secure/logout'); ?>"><i class='fa fa-sign-out fa-fw'></i> Log Out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<script>
$(document).on('click', '#GantiPass', function(e){
	e.preventDefault();

	$('.modal-dialog').removeClass('modal-lg');
	$('.modal-dialog').addClass('modal-sm');
	$('#ModalHeader').html('Ubah Password');
	$('#ModalContent').load($(this).attr('href'));
	$('#ModalGue').modal('show');
});
</script>