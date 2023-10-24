<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * CLASS NAME : Penjualan
 * ------------------------------------------------------------------------
 *
 * @author     Muhammad Akbar <muslim.politekniktelkom@gmail.com>
 * @copyright  2016
 * @license    http://aplikasiphp.net
 *
 */

class Penjualan extends MY_Controller
{
	/*function __construct()
	{
		parent::__construct();
		if($this->session->userdata('ap_level') == 'inventory'){
			$this->history();
		}
	}*/

	public function index()
	{
		$this->transaksi();
	}

	public function transaksi()
	{
		$level = $this->session->userdata('ap_level');
		// cekvar($level);
		if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {
			if ($_POST) {
				// cekvar($_POST);
				if (!empty($_POST['kode_barang'])) {
					$total = 0;
					foreach ($_POST['kode_barang'] as $k) {
						if (!empty($k)) {
							$total++;
						}
					}
					// cekvar($total);
					if ($total > 0) {
						$this->load->library('form_validation');
						$this->form_validation->set_rules('nomor_nota', 'Nomor Nota', 'trim|required|max_length[40]|alpha_numeric|callback_cek_nota[nomor_nota]');
						$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');

						$no = 0;
						foreach ($_POST['kode_barang'] as $d) {
							if (!empty($d)) {/*
								$this->form_validation->set_rules('kode_barang['.$no.']','Kode Barang #'.($no + 1), 'trim|required|max_length[40]|callback_cek_kode_barang[kode_barang['.$no.']]');*/
								$this->form_validation->set_rules('jumlah_beli[' . $no . ']', 'Qty #' . ($no + 1), 'trim|numeric|required|callback_cek_nol[jumlah_beli[' . $no . ']]');
							}

							$no++;
						}
						// cekvar($_POST['kode_barang']);
						$this->form_validation->set_rules('cash', 'Total Bayar', 'trim|numeric|required|max_length[17]');
						$this->form_validation->set_rules('catatan', 'Catatan', 'trim|max_length[1000]');

						$this->form_validation->set_message('required', '%s harus diisi');
						$this->form_validation->set_message('cek_kode_barang', '%s tidak ditemukan');
						$this->form_validation->set_message('cek_nota', '%s sudah ada');
						$this->form_validation->set_message('cek_nol', '%s tidak boleh nol');
						$this->form_validation->set_message('alpha_numeric', '%s Harus huruf / angka !');

						if ($this->form_validation->run() == true) {
							$nomor_nota 	= $this->input->post('nomor_nota');
							$tanggal		= $this->input->post('tanggal');
							$id_kasir		= $this->input->post('id_kasir');
							$id_pelanggan	= $this->input->post('id_pelanggan');
							$id_herbalis	= $this->input->post('nama_herbalis');
							$bayar			= $this->input->post('cash');
							$grand_total	= $this->input->post('grand_total');
							$harga_discount = $this->input->post('total_discount');
							$total_awal     = $this->input->post('total_awal');
							$tanggal_kembali	= $this->input->post('tanggal_kembali');
							$catatan		= $this->clean_tag_input($this->input->post('catatan'));
							$sales_pam		= $this->input->post('sales_pam');
							// cekvar($bayar);
							if ($bayar < $grand_total) {
								$this->query_error("Cash Kurang");
							} else {
								$this->load->model('m_penjualan_master');
								if ($tanggal_kembali == '') {
									$master = $this->m_penjualan_master->insert_master_tanpatanggal($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis, $bayar, $grand_total, $catatan, $sales_pam);
								} else {

									$master = $this->m_penjualan_master->insert_master($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis, $bayar, $grand_total, $catatan, $tanggal_kembali, $sales_pam);
								}
								if ($master) {
									$id_master 	= $this->m_penjualan_master->get_id($nomor_nota)->row()->id_penjualan_m;
									$inserted	= 0;

									$this->load->model('m_penjualan_detail');
									$this->load->model('m_barang');

									$no_array	= 0;
									foreach ($_POST['kode_barang'] as $k) {
										if (!empty($k)) {
											// cekvar($_POST);
											$kode_barang 	= $_POST['kode_barang'][$no_array];
											$jumlah_beli 	= $_POST['jumlah_beli'][$no_array];
											$harga_satuan 	= $_POST['harga_satuan'][$no_array];
											$satuan 		= $_POST['satuan'][$no_array];
											$discount 		= $_POST['discount'][$no_array];
											$discountnya 	= $_POST['discountnya'][$no_array];
											$sub_total 		= $_POST['sub_total_awal'][$no_array];
											$grand_total 	= $_POST['sub_total'][$no_array];
											$id_barang		= $this->m_barang->get_id($kode_barang)->row()->id_barang;

											$insert_detail	= $this->m_penjualan_detail->insert_detail2($id_master, $id_barang, $jumlah_beli, $satuan, $harga_satuan, $discount, $discountnya, $sub_total, $grand_total, $tanggal, $id_herbalis, $id_pelanggan, $sales_pam);/*
											$this->m_barang->update_stok($id_barang, $jumlah_beli);*/
											if ($insert_detail) {
												$this->m_penjualan_detail->update_pelanggan2($id_herbalis, $id_pelanggan, $tanggal_kembali);
												$inserted++;
											}
										}

										$no_array++;
									}

									if ($inserted > 0) {
										echo json_encode(array('status' => 1, 'pesan' => "Transaksi berhasil disimpan !"));
									} else {
										$this->query_error();
									}
								} else {
									$this->query_error();
								}
							}
						} else {
							echo json_encode(array('status' => 0, 'pesan' => validation_errors("<font color='red'>- ", "</font><br />")));
						}
					} else {
						$this->query_error("Harap masukan minimal 1 kode barang !");
					}
				} else {
					$this->query_error("Harap masukan minimal 1 kode barang !");
				}
			} else {
				$this->load->model('m_user');
				$this->load->model('m_pelanggan');

				$dt['kasirnya'] = $this->m_user->list_kasir();
				$dt['pelanggan'] = $this->m_pelanggan->get_all();
				$dt['herbalis'] = $this->m_pelanggan->get_all_herbalis();
				$this->output->cache(0.1);
				$this->load->view('penjualan/transaksi', $dt);
			}
		}
	}

	public function transaksi2()
	{
		$level = $this->session->userdata('ap_level');

		if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {
			if ($_POST) {
				if (!empty($_POST['kode_barang'])) {
					$total = 0;
					foreach ($_POST['kode_barang'] as $k) {
						if (!empty($k)) {
							$total++;
						}
					}
					if ($total > 0) {
						$this->load->library('form_validation');
						$this->form_validation->set_rules('nomor_nota', 'Nomor Nota', 'trim|required|max_length[40]|alpha_numeric|callback_cek_nota[nomor_nota]');
						$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');

						$no = 0;
						foreach ($_POST['kode_barang'] as $d) {
							if (!empty($d)) {/*
								$this->form_validation->set_rules('kode_barang['.$no.']','Kode Barang #'.($no + 1), 'trim|required|max_length[40]|callback_cek_kode_barang[kode_barang['.$no.']]');*/
								$this->form_validation->set_rules('jumlah_beli[' . $no . ']', 'Qty #' . ($no + 1), 'trim|numeric|required|callback_cek_nol[jumlah_beli[' . $no . ']]');
							}

							$no++;
						}

						$this->form_validation->set_rules('cash', 'Total Bayar', 'trim|numeric|required|max_length[17]');
						$this->form_validation->set_rules('catatan', 'Catatan', 'trim|max_length[1000]');

						$this->form_validation->set_message('required', '%s harus diisi');
						$this->form_validation->set_message('cek_kode_barang', '%s tidak ditemukan');
						$this->form_validation->set_message('cek_nota', '%s sudah ada');
						$this->form_validation->set_message('cek_nol', '%s tidak boleh nol');
						$this->form_validation->set_message('alpha_numeric', '%s Harus huruf / angka !');


						if ($this->form_validation->run() == TRUE) {
							$nomor_nota 	= $this->input->post('nomor_nota');
							$tanggal		= $this->input->post('tanggal');
							$id_kasir		= $this->input->post('id_kasir');
							$id_pelanggan	= $this->input->post('id_pelanggan');
							$id_herbalis_ori = $this->input->post('nama_herbalis_ori');
							$id_herbalis	= $this->input->post('nama_herbalis');
							$aty_kota		= $this->input->post('aty_kota');
							$bayar			= $this->input->post('cash');
							$grand_total	= $this->input->post('grand_total');
							$harga_discount = $this->input->post('total_discount');
							$total_awal     = $this->input->post('total_awal');
							$tanggal_kembali	= $this->input->post('tanggal_kembali');
							$catatan		= $this->clean_tag_input($this->input->post('catatan'));
							// cekvar($nomor_nota);
							if ($bayar < $grand_total) {
								$this->query_error("Cash Kurang");
							} else {
								$this->load->model('m_penjualan_master');

								if ($tanggal_kembali == '') {
									$master = $this->m_penjualan_master->insert_master2_tanpatanggal($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis_ori, $id_herbalis, $aty_kota, $bayar, $grand_total, $catatan);
								} else {

									$master = $this->m_penjualan_master->insert_master2($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis_ori, $id_herbalis, $aty_kota, $bayar, $grand_total, $catatan, $tanggal_kembali);
								}


								$id_master 	= $this->m_penjualan_master->get_id($nomor_nota)->row()->id_penjualan_m;
								$inserted	= 0;

								$this->load->model('m_penjualan_detail');
								$this->load->model('m_barang');

								$no_array	= 0;
								foreach ($_POST['kode_barang'] as $k) {
									if (!empty($k)) {
										// cekvar($_POST);
										// cekdb();
										$kode_barang 	= $_POST['kode_barang'][$no_array];
										$jumlah_beli 	= $_POST['jumlah_beli'][$no_array];
										$harga_satuan 	= $_POST['harga_satuan'][$no_array];
										$satuan 		= $_POST['satuan'][$no_array];
										$discount 		= $_POST['discount'][$no_array];
										$discountnya 	= $_POST['discountnya'][$no_array];
										$sub_total 		= $_POST['sub_total_awal'][$no_array];
										$grand_total 	= $_POST['sub_total'][$no_array];
										$id_barang		= $this->m_barang->get_id_online($kode_barang)->row()->id_barang;

										$insert_detail = $this->m_penjualan_detail->insert_detail($id_master, $id_barang, $jumlah_beli, $satuan, $harga_satuan, $discount, $discountnya, $sub_total, $grand_total, $tanggal, $id_herbalis, $aty_kota, $id_pelanggan);
										// cekdb();
										if ($insert_detail) {
											$this->m_barang->update_stok3($id_barang, $jumlah_beli);
											$this->m_penjualan_detail->update_pelanggan($id_herbalis, $id_pelanggan);
										}
										$inserted++;
									}
									// cekdb();

									$no_array++;
								}
								if ($inserted != 0) {
									echo json_encode(array('status' => 1, 'pesan' => "Transaksi berhasil disimpan !"));
								} else {
									$this->query_error();
								}
							}
						} else {
							echo json_encode(array('status' => 0, 'pesan' => validation_errors("<font color='red'>- ", "</font><br />")));
							cekdb();
						}
					} else {
						$this->query_error("Harap masukan minimal 1 kode barang !");
					}
				} else {
					$this->query_error("Harap masukan minimal 1 kode barang !");
				}
			} else {
				$this->load->model('m_user');
				$this->load->model('m_pelanggan');

				$dt['kasirnya'] = $this->m_user->list_kasir();
				$dt['pelanggan'] = $this->m_pelanggan->get_all_online();
				$dt['sales'] = $this->m_pelanggan->get_all_sales();
				$dt['herbalis'] = $this->m_pelanggan->get_all_herbalis();
				$this->output->cache(0.1);
				$this->load->view('penjualan/transaksi2', $dt);
			}
		}
	}

	public function transaksi2_pending()
	{
		$level = $this->session->userdata('ap_level');
		if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {
			if ($_POST) {
				if (!empty($_POST['kode_barang'])) {
					$total = 0;
					foreach ($_POST['kode_barang'] as $k) {
						if (!empty($k)) {
							$total++;
						}
					}

					if ($total > 0) {
						$this->load->library('form_validation');
						$this->form_validation->set_rules('nomor_nota', 'Nomor Nota', 'trim|required|max_length[40]|alpha_numeric|callback_cek_nota[nomor_nota]');
						$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');

						$no = 0;
						foreach ($_POST['kode_barang'] as $d) {
							if (!empty($d)) {/*
								$this->form_validation->set_rules('kode_barang['.$no.']','Kode Barang #'.($no + 1), 'trim|required|max_length[40]|callback_cek_kode_barang[kode_barang['.$no.']]');*/
								$this->form_validation->set_rules('jumlah_beli[' . $no . ']', 'Qty #' . ($no + 1), 'trim|numeric|required|callback_cek_nol[jumlah_beli[' . $no . ']]');
							}

							$no++;
						}

						$this->form_validation->set_rules('cash', 'Total Bayar', 'trim|numeric|required|max_length[17]');
						$this->form_validation->set_rules('catatan', 'Catatan', 'trim|max_length[1000]');

						$this->form_validation->set_message('required', '%s harus diisi');
						$this->form_validation->set_message('cek_kode_barang', '%s tidak ditemukan');
						$this->form_validation->set_message('cek_nota', '%s sudah ada');
						$this->form_validation->set_message('cek_nol', '%s tidak boleh nol');
						$this->form_validation->set_message('alpha_numeric', '%s Harus huruf / angka !');

						if ($this->form_validation->run() == true) {
							$nomor_nota 	= $this->input->post('nomor_nota');
							$tanggal		= $this->input->post('tanggal');
							$id_kasir		= $this->input->post('id_kasir');
							$id_pelanggan	= $this->input->post('id_pelanggan');
							$id_herbalis	= $this->input->post('nama_herbalis');
							$bayar			= $this->input->post('cash');
							$grand_total	= $this->input->post('grand_total');
							$harga_discount = $this->input->post('total_discount');
							$total_awal     = $this->input->post('total_awal');
							$tanggal_kembali	= $this->input->post('tanggal_kembali');
							$catatan		= $this->clean_tag_input($this->input->post('catatan'));

							if ($bayar < $grand_total) {
								$this->query_error("Cash Kurang");
							} else {
								$this->load->model('m_penjualan_master');
								if ($tanggal_kembali == '') {
									$master = $this->m_penjualan_master->insert_master2_pending_tanpatanggal($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis, $bayar, $grand_total, $catatan);
								} else {
									$master = $this->m_penjualan_master->insert_master2_pending($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis, $bayar, $grand_total, $catatan, $tanggal_kembali);
								}
								if ($master) {
									$id_master 	= $this->m_penjualan_master->get_id($nomor_nota)->row()->id_penjualan_m;
									$inserted	= 0;

									$this->load->model('m_penjualan_detail');
									$this->load->model('m_barang');

									$no_array	= 0;
									foreach ($_POST['kode_barang'] as $k) {
										if (!empty($k)) {
											$kode_barang 	= $_POST['kode_barang'][$no_array];
											$jumlah_beli 	= $_POST['jumlah_beli'][$no_array];
											$harga_satuan 	= $_POST['harga_satuan'][$no_array];
											$discount 	= $_POST['discount'][$no_array];
											$discountnya 	= $_POST['discountnya'][$no_array];
											$sub_total 		= $_POST['sub_total'][$no_array];
											$id_barang		= $this->m_barang->get_id_online($kode_barang)->row()->id_barang;

											$insert_detail	= $this->m_penjualan_detail->insert_detail($id_master, $id_barang, $jumlah_beli, $harga_satuan, $discount, $discountnya, $sub_total, $tanggal, $id_herbalis, $id_pelanggan);
											if ($insert_detail) {
												$this->m_barang->update_stok3($id_barang, $jumlah_beli);
												$this->m_penjualan_detail->update_pelanggan($id_herbalis, $id_pelanggan);
												$inserted++;
											}
										}

										$no_array++;
									}

									if ($inserted > 0) {
										echo json_encode(array('status' => 1, 'pesan' => "Transaksi berhasil disimpan !"));
									} else {
										$this->query_error();
									}
								} else {
									$this->query_error();
								}
							}
						} else {
							echo json_encode(array('status' => 0, 'pesan' => validation_errors("<font color='red'>- ", "</font><br />")));
						}
					} else {
						$this->query_error("Harap masukan minimal 1 kode barang !");
					}
				} else {
					$this->query_error("Harap masukan minimal 1 kode barang !");
				}
			} else {
				$this->load->model('m_user');
				$this->load->model('m_pelanggan');

				$dt['kasirnya'] = $this->m_user->list_kasir();
				$dt['pelanggan'] = $this->m_pelanggan->get_all_online();
				$dt['sales'] = $this->m_pelanggan->get_all_sales();
				$dt['herbalis'] = $this->m_pelanggan->get_all_herbalis();
				$this->output->cache(0.1);
				$this->load->view('penjualan/transaksi2', $dt);
			}
		}
	}

	public function transaksi_pending_utama()
	{
		$level = $this->session->userdata('ap_level');
		if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {
			if ($_POST) {
				if (!empty($_POST['kode_barang'])) {
					$total = 0;
					foreach ($_POST['kode_barang'] as $k) {
						if (!empty($k)) {
							$total++;
						}
					}

					if ($total > 0) {
						$this->load->library('form_validation');
						$this->form_validation->set_rules('nomor_nota', 'Nomor Nota', 'trim|required|max_length[40]|alpha_numeric|callback_cek_nota[nomor_nota]');
						$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');

						$no = 0;
						foreach ($_POST['kode_barang'] as $d) {
							if (!empty($d)) {/*
								$this->form_validation->set_rules('kode_barang['.$no.']','Kode Barang #'.($no + 1), 'trim|required|max_length[40]|callback_cek_kode_barang[kode_barang['.$no.']]');*/
								$this->form_validation->set_rules('jumlah_beli[' . $no . ']', 'Qty #' . ($no + 1), 'trim|numeric|required|callback_cek_nol[jumlah_beli[' . $no . ']]');
							}

							$no++;
						}

						$this->form_validation->set_rules('cash', 'Total Bayar', 'trim|numeric|required|max_length[17]');
						$this->form_validation->set_rules('catatan', 'Catatan', 'trim|max_length[1000]');

						$this->form_validation->set_message('required', '%s harus diisi');
						$this->form_validation->set_message('cek_kode_barang', '%s tidak ditemukan');
						$this->form_validation->set_message('cek_nota', '%s sudah ada');
						$this->form_validation->set_message('cek_nol', '%s tidak boleh nol');
						$this->form_validation->set_message('alpha_numeric', '%s Harus huruf / angka !');

						if ($this->form_validation->run() == true) {
							$nomor_nota 	= $this->input->post('nomor_nota');
							$tanggal		= $this->input->post('tanggal');
							$id_kasir		= $this->input->post('id_kasir');
							$id_pelanggan	= $this->input->post('id_pelanggan');
							$id_herbalis	= $this->input->post('nama_herbalis');
							$bayar			= $this->input->post('cash');
							$grand_total	= $this->input->post('grand_total');
							$harga_discount = $this->input->post('total_discount');
							$total_awal     = $this->input->post('total_awal');
							$tanggal_kembali	= $this->input->post('tanggal_kembali');
							$catatan		= $this->clean_tag_input($this->input->post('catatan'));
							$sales_pam		= $this->input->post('sales_pam');
							if ($bayar < $grand_total) {
								$this->query_error("Cash Kurang");
							} else {
								$this->load->model('m_penjualan_master');
								if ($tanggal_kembali == '') {
									$master = $this->m_penjualan_master->insert_master_pending_tanpatanggal($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis, $bayar, $grand_total, $catatan, $sales_pam);
								} else {

									$master = $this->m_penjualan_master->insert_master_pending($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis, $bayar, $grand_total, $catatan, $tanggal_kembali, $sales_pam);
								}
								if ($master) {
									$id_master 	= $this->m_penjualan_master->get_id($nomor_nota)->row()->id_penjualan_m;
									$inserted	= 0;

									$this->load->model('m_penjualan_detail');
									$this->load->model('m_barang');

									$no_array	= 0;
									foreach ($_POST['kode_barang'] as $k) {
										if (!empty($k)) {
											$kode_barang 	= $_POST['kode_barang'][$no_array];
											$jumlah_beli 	= $_POST['jumlah_beli'][$no_array];
											$harga_satuan 	= $_POST['harga_satuan'][$no_array];
											$discount 	= $_POST['discount'][$no_array];
											$discountnya 	= $_POST['discountnya'][$no_array];
											$sub_total 		= $_POST['sub_total'][$no_array];
											$id_barang		= $this->m_barang->get_id($kode_barang)->row()->id_barang;

											$insert_detail	= $this->m_penjualan_detail->insert_detail2($id_master, $id_barang, $jumlah_beli, $harga_satuan, $discount, $discountnya, $sub_total, $tanggal, $id_herbalis, $id_pelanggan, $sales_pam);/*
											$this->m_barang->update_stok($id_barang, $jumlah_beli);*/
											if ($insert_detail) {
												$this->m_penjualan_detail->update_pelanggan2($id_herbalis, $id_pelanggan, $tanggal_kembali);
												$inserted++;
											}
										}

										$no_array++;
									}

									if ($inserted > 0) {
										echo json_encode(array('status' => 1, 'pesan' => "Transaksi berhasil disimpan !"));
									} else {
										$this->query_error();
									}
								} else {
									$this->query_error();
								}
							}
						} else {
							echo json_encode(array('status' => 0, 'pesan' => validation_errors("<font color='red'>- ", "</font><br />")));
						}
					} else {
						$this->query_error("Harap masukan minimal 1 kode barang !");
					}
				} else {
					$this->query_error("Harap masukan minimal 1 kode barang !");
				}
			} else {
				$this->load->model('m_user');
				$this->load->model('m_pelanggan');

				$dt['kasirnya'] = $this->m_user->list_kasir();
				$dt['pelanggan'] = $this->m_pelanggan->get_all();
				$dt['herbalis'] = $this->m_pelanggan->get_all_herbalis();
				$this->output->cache(0.1);
				$this->load->view('penjualan/transaksi', $dt);
			}
		}
	}


	public function cek_nota($nota)
	{
		$this->load->model('m_penjualan_master');
		$cek = $this->m_penjualan_master->cek_nota_validasi($nota);

		if ($cek->num_rows() > 0) {
			return FALSE;
		}
		return TRUE;
	}

	public function transaksi_cetak()
	{
		$nomor_nota 	= $this->input->get('nomor_nota');
		$tanggal		= $this->input->get('tanggal');
		$id_kasir		= $this->input->get('id_kasir');
		$id_pelanggan	= $this->input->get('id_pelanggan');
		$cash			= $this->input->get('cash');
		$satuan			= $this->input->get('satuan');
		$catatan		= $this->input->get('catatan');
		$grand_total	= $this->input->get('grand_total');
		$nama_herbalis	= $this->input->get('nama_herbalis');
		$sales_pam		= $this->input->get('sales_pam');
		$tanggal_kembali	= $this->input->get('tanggal_kembali');
		$harga_discount = $this->input->get('total_discount');
		$total_awal     = $this->input->get('total_awal');
		$no = 0;
		$discount2	= $_GET['discount'][$no];


		$this->load->model('m_user');
		$kasir = $this->m_user->get_baris($id_kasir)->row()->nama;

		$this->load->model('m_pelanggan');
		$pelanggan = 'umum';
		// cekvar($id_pelanggan);
		if (!empty($id_pelanggan)) {
			$pelanggan_2 = $this->m_pelanggan->get_baris($id_pelanggan)->row();
			$pelanggan = $pelanggan_2->nama;
			$nrmp		= $pelanggan_2->nrmp;
		}
		// cekvar($pelanggan);
		$this->load->library('cfpdf');
		$pdf = new FPDF('L', 'mm', 'A5');
		$pdf->SetMargins(10, 5.50, 6.35);
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'b', 14);

		$pdf->Cell(110, 0, 'KPRJ ALKINDI', 0, 0, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(30, 0, 'Kepada Yth :', 0, 1, 'R');

		$pdf->SetFont('Arial', '', 8, 5);
		$pdf->Cell(120, 7, 'Jl. SIDORUKUN, PULO BRAYAN DARAT II, KEC. MEDAN TIM, KOTA MEDAN', 0, 0, 'L');

		$pdf->SetFont('Arial', '', 8, 5);
		$pdf->Cell(60, 7, '' . $pelanggan . '', 0, 1, 'L');
		$pdf->Cell(120, 1, '0819-820-221', 0, 0, 'L');

		$pdf->Cell(60, -1, 'JADWAL DATANG KEMBALI : ' . $tanggal_kembali . '', 0, 1, 'L');

		$pdf->Cell(120, 0, '', 0, 0, 'L');
		$pdf->Cell(80, 7, 'HERBALIS : ' . $nama_herbalis . '', 0, 1, 'L');
		$pdf->Cell(120, 0, '', 0, 0, 'L');
		$pdf->Cell(80, -1, 'NRMP : ' . $nrmp . '', 0, 0, 'L');
		$pdf->Ln();
		/*$pdf->Cell(25, 4, 'Nota', 0, 0, 'L'); 
		$pdf->Cell(85, 4, $nomor_nota, 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(25, 4, 'Tanggal', 0, 0, 'L'); 
		$pdf->Cell(85, 4, date('d-M-Y H:i:s', strtotime($tanggal)), 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(25, 4, 'Kasir', 0, 0, 'L'); 
		$pdf->Cell(85, 4, $kasir, 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(25, 4, 'Pelanggan', 0, 0, 'L'); 
		$pdf->Cell(85, 4, $pelanggan, 0, 0, 'L');
		$pdf->Ln();
		$pdf->Ln();*/

		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(187, 4, 'KWITANSI PEMBELIAN', 0, 1, 'C');

		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(85, 2, 'Tanggal : ' . date('d/m/Y - h:i:s a', strtotime($tanggal)) . '', 0, 0, 'L');
		$pdf->Cell(100, 2.5, 'Sales : ' . $sales_pam . '', 0, 1, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(170, 2, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(10, 1.5, 'No', 0, 0, 'L');
		$pdf->Cell(50, 1.5, 'Nama Produk', 0, 0, 'L');
		$pdf->Cell(15, 1.5, 'Qty', 0, 0, 'L');
		$pdf->Cell(25, 1.5, 'Harga', 0, 0, 'L');
		$pdf->Cell(25, 1.5, 'Subtotal', 0, 0, 'L');
		$pdf->Cell(15, 1.5, 'Disc', 0, 0, 'L');
		$pdf->Cell(25, 1.5, 'Discount', 0, 0, 'L');
		$pdf->Cell(30, 1.5, 'Grand Total', 0, 0, 'L');
		$pdf->Ln();

		$pdf->Cell(130, 3, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();

		$this->load->model('m_barang');
		$this->load->helper('text');

		$nomor = 0;
		$no = 0;
		foreach ($_GET['kode_barang'] as $kd) {
			$nomor = $nomor + 1;
			if (!empty($kd)) {
				$nama_barang = $this->m_barang->get_id($kd)->row();
				$nama_jasa = $this->m_barang->get_id_jasa($kd)->row();
				if (!empty($nama_jasa)) {
					$nama_jasa = $this->m_barang->get_id_jasa($kd)->row()->nama_barang;
				}
				if (!empty($nama_barang)) {
					$nama_barang = $this->m_barang->get_id_jasa($kd)->row()->nama_barang;
				}
				if (!empty($nama_barang2)) {
					$nama_barang2 = $this->m_barang->get_id2($kd)->row()->nama_barang;
				}
				$nama_barang = character_limiter($nama_barang, 20, '..');
				$nama_jasa = character_limiter($nama_jasa, 20, '..');
				$pdf->SetFont('Arial', '', 9);
				$pdf->Cell(10, 3.5, $nomor, 0, 0, 'L');
				$pdf->Cell(50, 3.5, (!empty($nama_barang)) ? $nama_barang : $nama_jasa, 0, 0, 'L');
				$pdf->Cell(15, 3.5, '' . $_GET['jumlah_beli'][$no] . ' ' . $_GET['satuan'][$no], 0, 0, 'L');
				$pdf->Cell(25, 3.5, str_replace(',', '.', 'Rp ' . number_format($_GET['harga_satuan'][$no])), 0, 0, 'L');
				$pdf->Cell(25, 3.5, str_replace(',', '.', 'Rp ' . number_format($_GET['sub_total_awal'][$no])), 0, 0, 'L');
				$pdf->Cell(15, 3.5, $_GET['discount'][$no], 0, 0, 'L');
				$pdf->Cell(25, 3.5, str_replace(',', '.', ($_GET['discountnya'][$no])), 0, 0, 'L');
				$pdf->Cell(25, 3.5, str_replace(',', '.', 'Rp ' . number_format($_GET['sub_total'][$no])), 0, 0, 'L');
				$pdf->Ln();

				$no++;
			}
		}

		$pdf->Cell(130, 1, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(10, 3, '', 0, 0, 'L');

		$pdf->Cell(30, 3, 'Diterima Oleh,', 0, 0, 'L');
		$pdf->Cell(5, 3, '', 0, 0, 'L');
		$pdf->Cell(30, 3, 'Hormat kami,', 0, 0, 'L');
		$pdf->Cell(6, 3, '', 0, 0, 'L');
		$pdf->Cell(30, 3, 'Gudang', 0, 0, 'L');
		$pdf->Cell(6, 3, '', 0, 0, 'L');
		$pdf->Cell(20, 3, 'Driver', 0, 0, 'L');
		$pdf->Ln();


		$pdf->Cell(41.3, 3, '', 0, 0, 'L');
		$pdf->Cell(20, 3, '', 0, 0, 'L');
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(103.5, -3, 'Sub Total :', 0, 0, 'R');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(25, -3, 'Rp ' . str_replace(',', '.', number_format($total_awal)), 0, 0, 'L');
		$pdf->Ln();

		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(165, 10, 'Cash Disc :', 0, 0, 'R');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(25, 10, 'Rp ' . ($harga_discount), 0, 0, 'L');
		$pdf->Ln();

		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(165, -3, 'Grand Total :', 0, 0, 'R');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(25, -3, 'Rp ' . str_replace(',', '.', number_format($grand_total)), 0, 0, 'L');
		$pdf->Ln();

		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(165, 10, 'Bayar :', 0, 0, 'R');
		$pdf->Cell(25, 10, 'Rp ' . str_replace(',', '.', number_format($cash)), 0, 0, 'L');
		$pdf->Ln();

		$pdf->Cell(165, -3, 'Kembali :', 0, 0, 'R');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(25, -3, 'Rp ' . str_replace(',', '.', number_format(($cash - $grand_total))), 0, 0, 'L');
		$pdf->Ln();

		$pdf->Cell(40, 5, '( ' . $pelanggan . ' )', 0, 0, 'C');
		$pdf->Cell(3.5, -2, '', 0, 0, 'L');
		$pdf->Cell(21, -2, '( ALKINDI HERBAL )', 0, 0, 'C');
		$pdf->Cell(5, -2, '', 0, 0, 'L');
		$pdf->Cell(35, -2, '  (                                  )', 0, 0, 'C');
		$pdf->Cell(2, -2, '', 0, 0, 'L');
		$pdf->Cell(35, -2, '(                                  )', 0, 0, 'L');
		$pdf->Ln();




		$pdf->Cell(130, 12.5, '--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();

		$pdf->Cell(25, -9.5, 'Catatan : ', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(130, 14.5, '- maaf, barang yang sudah dibeli tidak dapat ditukar atau dikembalikan.', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(130, -8.5, '- Pemesanan Obat Pasien via online :  0812 9008 0004', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(130, 14, (($catatan == '') ? '' : '- ' . $catatan), 0, 0, 'L');
		$pdf->Ln();

		$pdf->Cell(130, -11, '--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');

		$pdf->Ln();
		$pdf->Cell(188, 14, "Terimakasih telah berobat Di klinik Alkindi Herbal", 0, 0, 'C');

		$output = "Kwitansi Pasien " . $pelanggan . ".pdf";
		$pdf->Output();
	}

	public function transaksi_cetak2()
	{
		$nomor_nota 	= $this->input->get('nomor_nota');
		$tanggal		= $this->input->get('tanggal');
		$id_kasir		= $this->input->get('id_kasir');
		$id_pelanggan	= $this->input->get('id_pelanggan');
		$cash			= $this->input->get('cash');
		$catatan		= $this->input->get('catatan');
		$grand_total	= $this->input->get('grand_total');
		$nama_herbalis	= $this->input->get('nama_herbalis');
		$aty_kota		= $this->input->get('aty_kota');
		$tanggal_kembali = $this->input->get('tanggal_kembali');
		$harga_discount = $this->input->get('total_discount');
		$total_awal     = $this->input->get('total_awal');
		$no = 0;
		$discount2	= $_GET['discount'][$no];
		// cekvar($id_pelanggan);

		$this->load->model('m_user');
		$kasir = $this->m_user->get_baris($id_kasir)->row()->nama;

		$this->load->model('m_pelanggan');
		$pelanggan = 'umum';
		if (!empty($id_pelanggan)) {
			$pelanggan_2 = $this->m_pelanggan->get_baris($id_pelanggan)->row();
			$pelanggan = $pelanggan_2->nama;
			$NRMP	        = $pelanggan_2->nrmp;
		}

		$this->load->library('cfpdf');
		$pdf = new FPDF('L', 'mm', 'A5');
		$pdf->SetMargins(10, 6, 6.35);
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'b', 14);

		$pdf->Cell(110, 0, 'PT ALKINDI', 0, 0, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(30, 0, 'Kepada Yth :', 0, 1, 'R');

		$pdf->SetFont('Arial', '', 8, 5);
		$pdf->Cell(120, 7, 'Jl. SIDORUKUN, PULO BRAYAN DARAT II, KEC. MEDAN TIM, KOTA MEDAN,', 0, 0, 'L');

		$pdf->Cell(60, 7, '' . $pelanggan . '', 0, 1, 'L');

		$pdf->Cell(120, 1, '0819-820-221', 0, 0, 'L');

		$pdf->Cell(60, -1, 'NRMP  ' . ' : ' . ' ' . $NRMP . '', 0, 1, 'L');

		$pdf->Cell(120, 0, '', 0, 0, 'L');
		$pdf->Cell(60, 7, 'SALES  ' . ': ' . ' ' . $nama_herbalis . '', 0, 1, 'L');

		$pdf->Cell(120, 0, '', 0, 0, 'L');
		$pdf->Cell(60, -1, 'KOTA  ' . '  : ' . ' ' . $aty_kota . '', 0, 0, 'L');
		$pdf->Ln();
		/*$pdf->Cell(25, 4, 'Nota', 0, 0, 'L'); 
		$pdf->Cell(85, 4, $nomor_nota, 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(25, 4, 'Tanggal', 0, 0, 'L'); 
		$pdf->Cell(85, 4, date('d-M-Y H:i:s', strtotime($tanggal)), 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(25, 4, 'Kasir', 0, 0, 'L'); 
		$pdf->Cell(85, 4, $kasir, 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(25, 4, 'Pelanggan', 0, 0, 'L'); 
		$pdf->Cell(85, 4, $pelanggan, 0, 0, 'L');
		$pdf->Ln();
		$pdf->Ln();*/

		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(187, 4, 'KWITANSI PEMBELIAN', 0, 1, 'C');

		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(85, 1, 'Tanggal : ' . date('d/m/Y - h:i:s a', strtotime($tanggal)) . '', 0, 1, 'L');

		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(170, 3.5, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();

		$pdf->Cell(10, 1, 'No', 0, 0, 'L');
		$pdf->Cell(50, 1, 'Nama Produk', 0, 0, 'L');
		$pdf->Cell(15, 1, 'Qty', 0, 0, 'L');
		$pdf->Cell(25, 1, 'Harga', 0, 0, 'L');
		$pdf->Cell(25, 1, 'Subtotal', 0, 0, 'L');
		$pdf->Cell(15, 1, 'Disc', 0, 0, 'L');
		$pdf->Cell(25, 1, 'Discount', 0, 0, 'L');
		$pdf->Cell(30, 1, 'Grand Total', 0, 0, 'L');
		$pdf->Ln();

		$pdf->Cell(130, 3, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();

		$this->load->model('m_barang');
		$this->load->helper('text');

		$nomor = 0;
		$no = 0;
		foreach ($_GET['kode_barang'] as $kd) {
			$nomor = $nomor + 1;
			if (!empty($kd)) {
				$nama_barang = $this->m_barang->get_id($kd)->row();
				$nama_jasa = $this->m_barang->get_id_jasa($kd)->row();
				$nama_barang2 = $this->m_barang->get_id2($kd)->row();
				if (!empty($nama_jasa)) {
					$nama_jasa = $this->m_barang->get_id_jasa($kd)->row()->nama_barang;
				}
				if (!empty($nama_barang)) {
					$nama_barang = $this->m_barang->get_id_jasa($kd)->row()->nama_barang;
				}
				if (!empty($nama_barang2)) {
					$nama_barang2 = $this->m_barang->get_id2($kd)->row()->nama_barang;
				}
				$nama_barang = character_limiter($nama_barang, 20, '..');
				$nama_jasa = character_limiter($nama_jasa, 20, '..');
				$pdf->SetFont('Arial', '', 9);
				$pdf->Cell(10, 3.5, $nomor, 0, 0, 'L');
				$pdf->Cell(50, 3.5, (!empty($nama_barang)) ? $nama_barang : $nama_barang2, 0, 0, 'L');
				$pdf->Cell(15, 3.5, '' . $_GET['jumlah_beli'][$no] . ' ' . $_GET['satuan'][$no], 0, 0, 'L');
				$pdf->Cell(25, 3.5, str_replace(',', '.', 'Rp ' . number_format($_GET['harga_satuan'][$no])), 0, 0, 'L');
				$pdf->Cell(25, 3.5, str_replace(',', '.', 'Rp ' . number_format($_GET['sub_total_awal'][$no])), 0, 0, 'L');
				$pdf->Cell(15, 3.5, $_GET['discount'][$no], 0, 0, 'L');
				$pdf->Cell(25, 3.5, str_replace(',', '.', ($_GET['discountnya'][$no])), 0, 0, 'L');
				$pdf->Cell(25, 3.5, str_replace(',', '.', 'Rp ' . number_format($_GET['sub_total'][$no])), 0, 0, 'L');
				$pdf->Ln();

				$no++;
			}
		}

		$pdf->Cell(130, 1.5, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();


		$pdf->Cell(10, 3, '', 0, 0, 'L');

		$pdf->Cell(30, 3, 'Diterima Oleh,', 0, 0, 'L');
		$pdf->Cell(5, 3, '', 0, 0, 'L');
		$pdf->Cell(30, 3, 'Hormat kami,', 0, 0, 'L');
		$pdf->Cell(5, 3, '', 0, 0, 'L');
		$pdf->Cell(30, 3, 'Gudang', 0, 0, 'L');
		$pdf->Cell(8, 3, '', 0, 0, 'L');
		$pdf->Cell(20, 3, 'Driver', 0, 0, 'L');
		$pdf->Ln();


		$pdf->Cell(41.5, 3, '', 0, 0, 'L');
		$pdf->Cell(20, 5, '', 0, 0, 'L');
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(103.5, -3, 'Sub Total :', 0, 0, 'R');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(25, -3, 'Rp ' . str_replace(',', '.', number_format($total_awal)), 0, 0, 'L');
		$pdf->Ln();

		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(165, 10, 'Cash Disc :', 0, 0, 'R');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(25, 10, 'Rp ' . ($harga_discount), 0, 0, 'L');
		$pdf->Ln();

		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(165, -3, 'Grand Total :', 0, 0, 'R');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(25, -3, 'Rp ' . str_replace(',', '.', number_format($grand_total)), 0, 0, 'L');
		$pdf->Ln();

		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(165, 10, 'Bayar :', 0, 0, 'R');
		$pdf->Cell(25, 10, 'Rp ' . str_replace(',', '.', number_format($cash)), 0, 0, 'L');
		$pdf->Ln();

		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(165, -3, 'Kembali :', 0, 0, 'R');
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(25, -3, 'Rp ' . str_replace(',', '.', number_format(($cash - $grand_total))), 0, 0, 'L');
		$pdf->Ln();

		$pdf->Cell(40, 17, '( ' . $pelanggan . ' )', 0, 0, 'C');
		$pdf->Cell(5, 10, '', 0, 0, 'L');
		$pdf->Cell(20, 10, '( PT ALKINDI )', 0, 0, 'C');
		$pdf->Cell(5, 10, '', 0, 0, 'L');
		$pdf->Cell(35, 10, '  (                                  )', 0, 0, 'C');
		$pdf->Cell(2, 10, '', 0, 0, 'L');
		$pdf->Cell(35, 10, '(                                  )', 0, 0, 'L');
		$pdf->Ln();

		$pdf->Cell(130, 0.5, '---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');
		$pdf->Ln();

		$pdf->Cell(25, 3, 'Catatan : ', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(130, 3, '- maaf, barang yang sudah dibeli tidak dapat ditukar atau dikembalikan.', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(130, 3, (($catatan == '') ? '' : '- ' . $catatan), 0, 0, 'L');
		$pdf->Ln();

		$pdf->Cell(130, 1, '---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'L');

		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(188, 0, "Terimakasih telah berobat Di Klinik Alkindi Herbal", 0, 0, 'C');

		/*$output="Kwitansi Pasien ".$pelanggan.".pdf";*/
		$pdf->Output();/*$output,'D'*/
	}

	public function ajax_pelanggan()
	{
		if ($this->input->is_ajax_request()) {
			$id_pelanggan = $this->input->post('id_pelanggan');
			$this->load->model('m_pelanggan');

			$data = $this->m_pelanggan->get_baris2($id_pelanggan)->row();
			$json['telp']			= (!empty($data->telp)) ? $data->telp : "<small><i>Tidak ada</i></small>";
			$json['alamat']			= (!empty($data->alamat)) ? preg_replace("/\r\n|\r|\n/", '<br />', $data->alamat) : "<small><i>Tidak ada</i></small>";
			$json['info_tambahan']	= (!empty($data->info_tambahan)) ? preg_replace("/\r\n|\r|\n/", '<br />', $data->info_tambahan) : "<small><i>Tidak ada</i></small>";
			$json['herbalis']		= $data->id_herbalis;
			$json['nrmp']			= $data->nrmp;
			$json['tgl_kembali']	= $data->tgl_kembali;
			echo json_encode($json);
		}
	}

	public function ajax_pelanggan2()
	{
		if ($this->input->is_ajax_request()) {
			$id_pelanggan = $this->input->post('id_pelanggan');
			$this->load->model('m_pelanggan');

			$data = $this->m_pelanggan->get_baris3($id_pelanggan)->row();
			$json['telp']			= (!empty($data->telp)) ? $data->telp : "<small><i>Tidak ada</i></small>";
			$json['alamat']			= (!empty($data->alamat)) ? preg_replace("/\r\n|\r|\n/", '<br />', $data->alamat) : "<small><i>Tidak ada</i></small>";
			$json['info_tambahan']	= (!empty($data->info_tambahan)) ? preg_replace("/\r\n|\r|\n/", '<br />', $data->info_tambahan) : "<small><i>Tidak ada</i></small>";
			$json['herbalis']		= $data->sales;
			$json['nrmp']			= $data->nrmp;
			$json['tgl_kembali']	= $data->tgl_kembali;
			echo json_encode($json);
		}
	}

	public function ajax_kode()
	{
		if ($this->input->is_ajax_request()) {
			$keyword 	= $this->input->post('keyword');
			$registered	= $this->input->post('registered');

			$this->load->model('m_barang');

			$barang = $this->m_barang->cari_kode($keyword, $registered);/*
			$jasa = $this->m_barang->cari_kode_jasa($keyword, $registered);*/

			if ($barang->num_rows() > 0) {
				$json['status'] 	= 1;
				$json['datanya'] 	= "<ul id='daftar-autocomplete' style='width:300px'>";
				foreach ($barang->result() as $b) {
					$json['datanya'] .= "
							<li> 
								
								<b>Tgl Masuk</b> : 
								<span id='tanggalnya'>" . $b->tanggal_masuk . "</span> <br />
								<b>Nama</b> : <br />
								<span id='barangnya'>" . $b->nama_barang . "</span>
								<span id='kodenya'>" . $b->kode_barang . "</span> <br/>
								<b>Stok</b> : <br />
								<span id='stoknya'>" . $b->total_stok . "</span> <br />
								<span id='satuannya' style='display:none;'>" . $b->satuan . "</span>
								<span id='harganya' style='display:none;'>" . $b->harga . "</span>
							</li>
						";
				}

				$json['datanya'] .= "</ul>";
			}

			/*else if ($jasa->num_rows() > 0) {
				$json['status'] 	= 1;
				$json['datanya'] 	= "<ul id='daftar-autocomplete'>";
					foreach($jasa->result() as $b)
					{
						$json['datanya'] .= "
							<li>
								<b>Kode</b> : 
								<span id='kodenya'>".$b->kode_barang."</span> <br />
								<span id='barangnya'>".$b->nama_jasa."</span>
								<span id='harganya' style='display:none;'>".$b->harga."</span>
							</li>
						";
					}
				
				$json['datanya'] .= "</ul>";
				
			}*/ else {
				$json['status'] 	= 0;
			}

			echo json_encode($json);
		}
	}

	public function ajax_kode2()
	{
		if ($this->input->is_ajax_request()) {
			$keyword 	= $this->input->post('keyword');
			$registered	= $this->input->post('registered');

			$this->load->model('m_barang');

			$barang = $this->m_barang->cari_kode2($keyword, $registered);/*
			$jasa = $this->m_barang->cari_kode_jasa($keyword, $registered);*/

			if ($barang->num_rows() > 0) {
				$json['status'] 	= 1;
				$json['datanya'] 	= "<ul id='daftar-autocomplete'>";
				foreach ($barang->result() as $b) {
					$json['datanya'] .= "
							<li> 
								
								<b>Tanggal Masuk</b> : 
								<span id='tanggalnya'>" . $b->tanggal_masuk . "</span> <br />
								<b>Nama</b> :
								<span id='barangnya'>" . $b->nama_barang . "</span>
								<span id='kodenya'>" . $b->kode_barang . "</span> <br/>
								<b>Stok</b> :
								<span id='stoknya'>" . $b->total_stok . "</span> <br />
								<span id='satuannya' style='display:none;'>" . $b->satuan . "</span>
								<span id='harganya' style='display:none;'>" . $b->harga . "</span>
							</li>
						";
				}

				$json['datanya'] .= "</ul>";
			}

			/*else if ($jasa->num_rows() > 0) {
				$json['status'] 	= 1;
				$json['datanya'] 	= "<ul id='daftar-autocomplete'>";
					foreach($jasa->result() as $b)
					{
						$json['datanya'] .= "
							<li>
								<b>Kode</b> : 
								<span id='kodenya'>".$b->kode_barang."</span> <br />
								<span id='barangnya'>".$b->nama_jasa."</span>
								<span id='harganya' style='display:none;'>".$b->harga."</span>
							</li>
						";
					}
				
				$json['datanya'] .= "</ul>";
				
			}*/ else {
				$json['status'] 	= 0;
			}

			echo json_encode($json);
		}
	}

	public function cek_kode_barang($kode)
	{
		$this->load->model('m_barang');
		$cek_kode = $this->m_barang->cek_kode($kode);

		if ($cek_kode->num_rows() > 0) {
			return TRUE;
		}
		return FALSE;
	}

	public function cek_nol($qty)
	{
		if ($qty > 0) {
			return TRUE;
		}
		return FALSE;
	}

	public function history_acc_apotek()
	{
		$level = $this->session->userdata('ap_level');
		if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan' or $level == 'inventory') {
			$this->output->cache(0.1);
			$this->load->view('penjualan/transaksi_history_maudiacc');
		}
	}

	public function history_acc_apotek_online()
	{
		$level = $this->session->userdata('ap_level');
		if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan' or $level == 'inventory') {
			$this->output->cache(0.1);
			$this->load->view('penjualan/transaksi_history_maudiacc_online');
		}
	}

	public function history()
	{
		$level = $this->session->userdata('ap_level');
		if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan' or $level == 'inventory') {
			$this->output->cache(0.1);
			$this->load->view('penjualan/transaksi_history');
		}
	}

	public function history_online()
	{
		$level = $this->session->userdata('ap_level');
		if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan' or $level == 'inventory') {
			$this->output->cache(0.1);
			$this->load->view('penjualan/transaksi_history_online');
		}
	}

	public function transaksi_pending()
	{
		$level = $this->session->userdata('ap_level');
		if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {
			$this->output->cache(0.1);
			$this->load->view('penjualan/transaksi_pending');
		}
	}

	public function transaksi_pending_klinik()
	{
		$level = $this->session->userdata('ap_level');
		if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {
			$this->output->cache(0.1);
			$this->load->view('penjualan/transaksi_pending_klinik');
		}
	}

	public function history_json_pending()
	{
		$this->load->model('m_penjualan_master');
		$level 			= $this->session->userdata('ap_level');

		$requestData	= $_REQUEST;
		$fetch			= $this->m_penjualan_master->fetch_data_penjualan_pending($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach ($query->result_array() as $row) {
			$nestedData = array();

			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['tanggal'];
			$nestedData[]	= "<a href='" . site_url('penjualan/detail-transaksi2/' . $row['id_penjualan_m']) . "' id='LihatDetailTransaksi'><i class='fa fa-file-text-o fa-fw'></i> " . $row['nomor_nota'] . "</a>";
			$nestedData[]	= $row['grand_total'];
			$nestedData[]	= $row['nama_pelanggan'];
			$nestedData[]	= preg_replace("/\r\n|\r|\n/", '<br />', $row['keterangan']);
			$nestedData[]	= $row['kasir'];

			if ($level == 'admin' or $level == 'keuangan' or $level == 'kasir') {
				$nestedData[]	= "<a href='" . site_url('penjualan/acc-transaksi2_pending/' . $row['id_penjualan_m']) . "' id='HapusTransaksi'><i class='fa fa-check'></i> ACC</a>";
			}

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval($requestData['draw']),
			"recordsTotal"    => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"            => $data
		);

		echo json_encode($json_data);
	}

	public function history_json_pending_klinik()
	{
		$this->load->model('m_penjualan_master');
		$level 			= $this->session->userdata('ap_level');

		$requestData	= $_REQUEST;
		$fetch			= $this->m_penjualan_master->fetch_data_penjualan_pending_klinik($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach ($query->result_array() as $row) {
			$nestedData = array();

			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['tanggal'];
			$nestedData[]	= "<a href='" . site_url('penjualan/detail-transaksi/' . $row['id_penjualan_m']) . "' id='LihatDetailTransaksi'><i class='fa fa-file-text-o fa-fw'></i> " . $row['nomor_nota'] . "</a>";
			$nestedData[]	= $row['grand_total'];
			$nestedData[]	= $row['nama_pelanggan'];
			$nestedData[]	= preg_replace("/\r\n|\r|\n/", '<br />', $row['keterangan']);
			$nestedData[]	= $row['kasir'];

			if ($level == 'admin' or $level == 'keuangan' or $level == 'kasir') {
				$nestedData[]	= "<a href='" . site_url('penjualan/acc_transaksi_pending/' . $row['id_penjualan_m']) . "' id='HapusTransaksi'><i class='fa fa-check'></i> ACC</a>";
			}

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval($requestData['draw']),
			"recordsTotal"    => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"            => $data
		);

		echo json_encode($json_data);
	}

	public function history_json()
	{
		$this->load->model('m_penjualan_master');
		$level 			= $this->session->userdata('ap_level');

		$requestData	= $_REQUEST;
		$fetch			= $this->m_penjualan_master->fetch_data_penjualan($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach ($query->result_array() as $row) {
			$nestedData = array();

			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['tanggal'];
			$nestedData[]	= "<a href='" . site_url('penjualan/detail-transaksi/' . $row['id_penjualan_m']) . "' id='LihatDetailTransaksi'><i class='fa fa-file-text-o fa-fw'></i> " . $row['nomor_nota'] . "</a>";
			$nestedData[]	= $row['grand_total'];
			$nestedData[]	= $row['nama_pelanggan'];
			$nestedData[]	= preg_replace("/\r\n|\r|\n/", '<br />', $row['keterangan']);
			$nestedData[]	= $row['kasir'];

			if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan' or $level == 'inventory') {
				$nestedData[]	= "<a href='" . site_url('penjualan/hapus-transaksi/' . $row['id_penjualan_m']) . "' id='HapusTransaksi'><i class='fa fa-trash-o'></i> Hapus</a>";
			}

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval($requestData['draw']),
			"recordsTotal"    => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"            => $data
		);

		echo json_encode($json_data);
	}

	public function history_json_online()
	{
		$this->load->model('m_penjualan_master');
		$level 			= $this->session->userdata('ap_level');

		$requestData	= $_REQUEST;
		$fetch			= $this->m_penjualan_master->fetch_data_penjualan_online($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach ($query->result_array() as $row) {
			$nestedData = array();

			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['tanggal'];
			$nestedData[]	= "<a href='" . site_url('penjualan/detail-transaksi2/' . $row['id_penjualan_m']) . "' id='LihatDetailTransaksi'><i class='fa fa-file-text-o fa-fw'></i> " . $row['nomor_nota'] . "</a>";
			$nestedData[]	= $row['grand_total'];
			$nestedData[]	= $row['nama_pelanggan'];
			$nestedData[]	= preg_replace("/\r\n|\r|\n/", '<br />', $row['keterangan']);
			$nestedData[]	= $row['kasir'];

			if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan' or $level == 'inventory') {
				$nestedData[]	= "<a href='" . site_url('penjualan/hapus-transaksi/' . $row['id_penjualan_m']) . "' id='HapusTransaksi'><i class='fa fa-trash-o'></i> Hapus</a>";
			}

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval($requestData['draw']),
			"recordsTotal"    => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"            => $data
		);

		echo json_encode($json_data);
	}

	public function history_json_apotek()
	{
		$this->load->model('m_penjualan_master');
		$level 			= $this->session->userdata('ap_level');

		$requestData	= $_REQUEST;
		$fetch			= $this->m_penjualan_master->fetch_data_penjualan_apotek($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach ($query->result_array() as $row) {
			$nestedData = array();

			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['tanggal'];
			$nestedData[]	= "<a href='" . site_url('penjualan/detail-transaksi/' . $row['id_penjualan_m']) . "' id='LihatDetailTransaksi'><i class='fa fa-file-text-o fa-fw'></i> " . $row['nomor_nota'] . "</a>";
			$nestedData[]	= $row['grand_total'];
			$nestedData[]	= $row['nama_pelanggan'];
			$nestedData[]	= preg_replace("/\r\n|\r|\n/", '<br />', $row['keterangan']);
			$nestedData[]	= $row['kasir'];

			if ($level == 'admin' or $level == 'inventory') {
				$nestedData[]	= "<a href='" . site_url('penjualan/acc_transaksi/' . $row['id_penjualan_m']) . "' id='HapusTransaksi'><i class='fa fa-check'></i> ACC</a>";
			}

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval($requestData['draw']),
			"recordsTotal"    => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"            => $data
		);

		echo json_encode($json_data);
	}

	public function history_json_apotek_online()
	{
		$this->load->model('m_penjualan_master');
		$level 			= $this->session->userdata('ap_level');

		$requestData	= $_REQUEST;
		$fetch			= $this->m_penjualan_master->fetch_data_penjualan_apotek_online($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach ($query->result_array() as $row) {
			$nestedData = array();

			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['tanggal'];
			$nestedData[]	= "<a href='" . site_url('penjualan/detail-transaksi2/' . $row['id_penjualan_m']) . "' id='LihatDetailTransaksi'><i class='fa fa-file-text-o fa-fw'></i> " . $row['nomor_nota'] . "</a>";
			$nestedData[]	= $row['grand_total'];
			$nestedData[]	= $row['nama_pelanggan'];
			$nestedData[]	= preg_replace("/\r\n|\r|\n/", '<br />', $row['keterangan']);
			$nestedData[]	= $row['kasir'];

			if ($level == 'admin' or $level == 'inventory') {
				$nestedData[]	= "<a href='" . site_url('penjualan/acc_transaksi2/' . $row['id_penjualan_m']) . "' id='HapusTransaksi'><i class='fa fa-check'></i> ACC</a>";
			}

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval($requestData['draw']),
			"recordsTotal"    => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"            => $data
		);

		echo json_encode($json_data);
	}


	public function detail_transaksi($id_penjualan)
	{
		if ($this->input->is_ajax_request()) {
			$this->load->model('m_penjualan_detail');
			$this->load->model('m_penjualan_master');

			$dt['detail'] = $this->m_penjualan_detail->get_detail($id_penjualan);
			$dt['master'] = $this->m_penjualan_master->get_baris($id_penjualan)->row();

			$this->output->cache(0.1);
			$this->load->view('penjualan/transaksi_history_detail', $dt);
		}
	}

	public function detail_transaksi2($id_penjualan)
	{
		if ($this->input->is_ajax_request()) {
			$this->load->model('m_penjualan_detail');
			$this->load->model('m_penjualan_master');

			$dt['detail'] = $this->m_penjualan_detail->get_detail($id_penjualan);
			// cekdb();
			$dt['master'] = $this->m_penjualan_master->get_baris($id_penjualan)->row();

			$this->output->cache(0.1);
			$this->load->view('penjualan/transaksi_history_detail_online', $dt);
		}
	}

	public function hapus_transaksi($id_penjualan)
	{
		if ($this->input->is_ajax_request()) {
			$level 	= $this->session->userdata('ap_level');
			if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan' or $level == 'inventory') {
				$reverse_stok = $this->input->post('reverse_stok');

				$this->load->model('m_penjualan_master');

				$nota 	= $this->m_penjualan_master->get_baris($id_penjualan)->row()->nomor_nota;
				$hapus 	= $this->m_penjualan_master->hapus_transaksi($id_penjualan, $reverse_stok);
				if ($hapus) {
					echo json_encode(array(
						"pesan" => "<font color='green'><i class='fa fa-check'></i> Transaksi <b>" . $nota . "</b> berhasil dihapus !</font>
					"
					));
				} else {
					echo json_encode(array(
						"pesan" => "<font color='red'><i class='fa fa-warning'></i> Terjadi kesalahan, coba lagi !</font>
					"
					));
				}
			}
		}
	}

	public function acc_transaksi($id_penjualan)
	{
		if ($this->input->is_ajax_request()) {
			$level 	= $this->session->userdata('ap_level');
			if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan' or $level == 'inventory') {/*
				$reverse_stok = $this->input->post('reverse_stok');*/

				$this->load->model('m_penjualan_master');

				$nota 	= $this->m_penjualan_master->get_baris($id_penjualan)->row()->nomor_nota;
				$hapus 	= $this->m_penjualan_master->acc_transaksi2($id_penjualan);/*
				$this->m_penjualan_master->update_namaherbalis($id_penjualan);*/
				if ($hapus) {
					echo json_encode(array(
						"pesan" => "<font color='green'><i class='fa fa-check'></i> Transaksi <b>" . $nota . "</b> berhasil di ACC !</font>
					"
					));
				} else {
					echo json_encode(array(
						"pesan" => "<font color='red'><i class='fa fa-warning'></i> Terjadi kesalahan, coba lagi !</font>
						
					"
					));
				}
			}
		}
	}

	public function acc_transaksi2($id_penjualan)
	{
		if ($this->input->is_ajax_request()) {
			$level 	= $this->session->userdata('ap_level');
			if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan' or $level == 'inventory') {/*
				$reverse_stok = $this->input->post('reverse_stok');*/

				$this->load->model('m_penjualan_master');

				$nota 	= $this->m_penjualan_master->get_baris($id_penjualan)->row()->nomor_nota;
				$hapus 	= $this->m_penjualan_master->acc_transaksi($id_penjualan);/*
				$this->m_penjualan_master->update_namaherbalis($id_penjualan);*/
				if ($hapus) {
					echo json_encode(array(
						"pesan" => "<font color='green'><i class='fa fa-check'></i> Transaksi <b>" . $nota . "</b> berhasil di ACC !</font>
					"
					));
				} else {
					echo json_encode(array(
						"pesan" => "<font color='red'><i class='fa fa-warning'></i> Terjadi kesalahan, coba lagi !</font>
						
					"
					));
				}
			}
		}
	}

	public function acc_transaksi_pending($id_penjualan)
	{
		if ($this->input->is_ajax_request()) {
			$level 	= $this->session->userdata('ap_level');
			if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {/*
				$reverse_stok = $this->input->post('reverse_stok');*/

				$this->load->model('m_penjualan_master');

				$nota 	= $this->m_penjualan_master->get_baris($id_penjualan)->row()->nomor_nota;
				$hapus 	= $this->m_penjualan_master->acc_transaksi2_pending($id_penjualan);/*
				$this->m_penjualan_master->update_namaherbalis($id_penjualan);*/
				if ($hapus) {
					echo json_encode(array(
						"pesan" => "<font color='green'><i class='fa fa-check'></i> Transaksi <b>" . $nota . "</b> berhasil di ACC !</font>
					"
					));
				} else {
					echo json_encode(array(
						"pesan" => "<font color='red'><i class='fa fa-warning'></i> Terjadi kesalahan, coba lagi !</font>
						
					"
					));
				}
			}
		}
	}

	public function acc_transaksi2_pending($id_penjualan)
	{
		if ($this->input->is_ajax_request()) {
			$level 	= $this->session->userdata('ap_level');
			if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {/*
				$reverse_stok = $this->input->post('reverse_stok');*/

				$this->load->model('m_penjualan_master');

				$nota 	= $this->m_penjualan_master->get_baris($id_penjualan)->row()->nomor_nota;
				$hapus 	= $this->m_penjualan_master->acc_transaksi_pending($id_penjualan);/*
				$this->m_penjualan_master->update_namaherbalis($id_penjualan);*/
				if ($hapus) {
					echo json_encode(array(
						"pesan" => "<font color='green'><i class='fa fa-check'></i> Transaksi <b>" . $nota . "</b> berhasil di ACC !</font>
					"
					));
				} else {
					echo json_encode(array(
						"pesan" => "<font color='red'><i class='fa fa-warning'></i> Terjadi kesalahan, coba lagi !</font>
						
					"
					));
				}
			}
		}
	}

	public function pelanggan()
	{
		$level = $this->session->userdata('ap_level');
		if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {
			$this->output->cache(0.1);
			$this->load->view('penjualan/pelanggan_data');
		}
	}

	public function pelanggan_Online()
	{
		$level = $this->session->userdata('ap_level');
		if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {
			$this->output->cache(0.1);
			$this->load->view('penjualan/pelanggan_data_online');
		}
	}

	public function pelanggan_json()
	{
		$this->load->model('m_pelanggan');
		$level 			= $this->session->userdata('ap_level');

		$requestData	= $_REQUEST;
		$fetch			= $this->m_pelanggan->fetch_data_pelanggan($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach ($query->result_array() as $row) {
			$nestedData = array();

			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['nrmp'];
			$nestedData[]	= $row['nama'];
			$nestedData[]	= $row['id_herbalis'];
			$nestedData[]	= $row['tgl_kembali'];
			$nestedData[]	= preg_replace("/\r\n|\r|\n/", '<br />', $row['info_tambahan']);
			$nestedData[]	= $row['keterangan'];
			$nestedData[]	= $row['waktu_input'];

			if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {
				$nestedData[]	= "<a href='" . site_url('penjualan/pelanggan-edit/' . $row['id_pelanggan']) . "' id='EditPelanggan'><i class='fa fa-pencil'></i> Edit</a>";
			}

			if ($level == 'admin') {
				$nestedData[]	= "<a href='" . site_url('penjualan/pelanggan-hapus/' . $row['id_pelanggan']) . "' id='HapusPelanggan'><i class='fa fa-trash-o'></i> Hapus</a>";
			}

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval($requestData['draw']),
			"recordsTotal"    => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"            => $data
		);

		echo json_encode($json_data);
	}

	public function pelanggan_json_online()
	{
		$this->load->model('m_pelanggan');
		$level 			= $this->session->userdata('ap_level');

		$requestData	= $_REQUEST;
		$fetch			= $this->m_pelanggan->fetch_data_pelanggan_online($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach ($query->result_array() as $row) {
			$nestedData = array();

			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['nrmp'];
			$nestedData[]	= $row['nama'];
			$nestedData[]	= $row['tgl_kembali'];
			$nestedData[]	= preg_replace("/\r\n|\r|\n/", '<br />', $row['alamat']);
			$nestedData[]	= $row['telp'];
			$nestedData[]	= preg_replace("/\r\n|\r|\n/", '<br />', $row['info_tambahan']);
			$nestedData[]	= $row['keterangan'];
			$nestedData[]	= $row['waktu_input'];

			if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {
				$nestedData[]	= "<a href='" . site_url('penjualan/pelanggan-edit2/' . $row['id_pelanggan']) . "' id='EditPelanggan'><i class='fa fa-pencil'></i> Edit</a>";
			}

			if ($level == 'admin') {
				$nestedData[]	= "<a href='" . site_url('penjualan/pelanggan-hapus/' . $row['id_pelanggan']) . "' id='HapusPelanggan'><i class='fa fa-trash-o'></i> Hapus</a>";
			}

			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval($requestData['draw']),
			"recordsTotal"    => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"            => $data
		);

		echo json_encode($json_data);
	}

	public function tambah_pelanggan()
	{
		$level = $this->session->userdata('ap_level');
		if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {
			if ($_POST) {
				$this->load->library('form_validation');
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required|alpha_spaces|max_length[40]');/*
				$this->form_validation->set_rules('alamat','Alamat','trim|required|max_length[1000]');
				$this->form_validation->set_rules('telepon','Telepon / Handphone','trim|required|numeric|max_length[40]');*/
				$this->form_validation->set_rules('info', 'Info Tambahan Lainnya', 'trim|max_length[1000]');

				$this->form_validation->set_message('alpha_spaces', '%s harus alphabet !');
				$this->form_validation->set_message('numeric', '%s harus angka !');
				$this->form_validation->set_message('required', '%s harus diisi !');
				if ($this->form_validation->run() == FALSE) {
					$this->load->model('m_pelanggan');
					$nrmp 		 = $this->input->post('nrmp');
					$nama 		 = $this->input->post('nama');
					$herbalis 	 = $this->input->post('herbalis');
					$tgl_kembali = $this->input->post('tgl_kembali');
					$alamat 	= $this->clean_tag_input($this->input->post('alamat'));
					$telepon 	= $this->input->post('telepon');
					$info 		= $this->clean_tag_input($this->input->post('info'));

					$unique		= time() . $this->session->userdata('ap_id_user');
					$insert 	= $this->m_pelanggan->tambah_pelanggan($nrmp, $nama, $alamat, $telepon, $info, $unique, $herbalis, $tgl_kembali);
					if ($insert) {
						$id_pelanggan = $this->m_pelanggan->get_dari_kode($unique)->row()->id_pelanggan;
						echo json_encode(array(
							'status' => 1,
							'pesan' => "<div class='alert alert-success'><i class='fa fa-check'></i> <b>" . $nama . "</b> berhasil ditambahkan sebagai pelanggan.</div>",
							'nrmp' => $nrmp,
							'id_pelanggan' => $id_pelanggan,
							'nama' => $nama,
							'alamat' => preg_replace("/\r\n|\r|\n/", '<br />', $alamat),
							'telepon' => $telepon,
							'herbalis' => $herbalis,
							'tgl_kembali' => $tgl_kembali,
						));
					} else {
						$this->query_error();
					}
				} else {
					$this->input_error();
				}
			} else {
				$this->output->cache(0.1);
				$this->load->view('penjualan/pelanggan_tambah');
			}
		}
	}

	public function tambah_pelanggan2()
	{
		$level = $this->session->userdata('ap_level');
		if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {
			if ($_POST) {
				$this->load->library('form_validation');
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required|alpha_spaces|max_length[40]');/*
				$this->form_validation->set_rules('alamat','Alamat','trim|required|max_length[1000]');
				$this->form_validation->set_rules('telepon','Telepon / Handphone','trim|required|numeric|max_length[40]');*/
				$this->form_validation->set_rules('info', 'Info Tambahan Lainnya', 'trim|max_length[1000]');

				$this->form_validation->set_message('alpha_spaces', '%s harus alphabet !');
				$this->form_validation->set_message('numeric', '%s harus angka !');
				$this->form_validation->set_message('required', '%s harus diisi !');
				if ($this->form_validation->run() == false) {
					$this->load->model('m_pelanggan');
					$nrmp 		= $this->input->post('nrmp');
					$nama 		= $this->input->post('nama');
					$tgl_kembali = $this->input->post('tgl_kembali');
					$alamat 	= $this->clean_tag_input($this->input->post('alamat'));
					$telepon 	= $this->input->post('telepon');
					$info 		= $this->clean_tag_input($this->input->post('info'));

					$unique		= time() . $this->session->userdata('ap_id_user');
					$insert 	= $this->m_pelanggan->tambah_pelanggan_online($nrmp, $nama, $tgl_kembali, $alamat, $telepon, $info, $unique);
					if ($insert) {
						$id_pelanggan = $this->m_pelanggan->get_dari_kode($unique)->row()->id_pelanggan;
						echo json_encode(array(
							'status' => 1,
							'pesan' => "<div class='alert alert-success'><i class='fa fa-check'></i> <b>" . $nama . "</b> berhasil ditambahkan sebagai pelanggan.</div>",
							'nrmp' => $nrmp,
							'id_pelanggan' => $id_pelanggan,
							'nama' => $nama,
							'alamat' => preg_replace("/\r\n|\r|\n/", '<br />', $alamat),
							'telepon' => $telepon,
						));
					} else {
						$this->query_error();
					}
				} else {
					$this->input_error();
				}
			} else {
				$this->output->cache(0.1);
				$this->load->view('penjualan/pelanggan_tambah2');
			}
		}
	}

	public function pelanggan_edit2($id_pelanggan = NULL)
	{
		if (!empty($id_pelanggan)) {
			$level = $this->session->userdata('ap_level');
			if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {
				if ($this->input->is_ajax_request()) {
					$this->load->model('m_pelanggan');

					if ($_POST) {
						$this->load->library('form_validation');
						$this->form_validation->set_rules('nama', 'Nama', 'trim|required|alpha_spaces|max_length[40]');/*
						$this->form_validation->set_rules('alamat','Alamat','trim|required|max_length[1000]');
						$this->form_validation->set_rules('telepon','Telepon / Handphone','trim|required|numeric|max_length[40]');*/
						$this->form_validation->set_rules('info', 'Info Tambahan Lainnya', 'trim|max_length[1000]');

						$this->form_validation->set_message('alpha_spaces', '%s harus alphabet !');
						$this->form_validation->set_message('numeric', '%s harus angka !');
						$this->form_validation->set_message('required', '%s harus diisi !');

						if ($this->form_validation->run() == false) {
							$nrmp 		= $this->input->post('nrmp');
							$nama 		= $this->input->post('nama');
							$herbalis 	= $this->input->post('herbalis');
							$tgl_kembali = $this->input->post('tgl_kembali');
							$alamat 	= $this->clean_tag_input($this->input->post('alamat'));
							$telepon 	= $this->input->post('telepon');
							$info 		= $this->clean_tag_input($this->input->post('info'));

							$update 	= $this->m_pelanggan->update_pelanggan2($id_pelanggan, $nrmp, $tgl_kembali, $nama, $alamat, $telepon, $info);
							if ($update) {
								echo json_encode(array(
									'status' => 1,
									'pesan' => "<div class='alert alert-success'><i class='fa fa-check'></i> Data berhasil diupdate.</div>"
								));
							} else {
								$this->query_error();
							}
						} else {
							$this->input_error();
						}
					} else {
						$dt['pelanggan'] = $this->m_pelanggan->get_baris($id_pelanggan)->row();
						$this->output->cache(0.1);
						$this->load->view('penjualan/pelanggan_edit2', $dt);
					}
				}
			}
		}
	}

	public function pelanggan_edit($id_pelanggan = NULL)
	{
		if (!empty($id_pelanggan)) {
			$level = $this->session->userdata('ap_level');
			if ($level == 'admin' or $level == 'kasir' or $level == 'keuangan') {
				if ($this->input->is_ajax_request()) {
					$this->load->model('m_pelanggan');

					if ($_POST) {
						$this->load->library('form_validation');
						$this->form_validation->set_rules('nama', 'Nama', 'trim|required|alpha_spaces|max_length[40]');/*
						$this->form_validation->set_rules('alamat','Alamat','trim|required|max_length[1000]');
						$this->form_validation->set_rules('telepon','Telepon / Handphone','trim|required|numeric|max_length[40]');*/
						$this->form_validation->set_rules('info', 'Info Tambahan Lainnya', 'trim|max_length[1000]');

						$this->form_validation->set_message('alpha_spaces', '%s harus alphabet !');
						$this->form_validation->set_message('numeric', '%s harus angka !');
						$this->form_validation->set_message('required', '%s harus diisi !');

						if ($this->form_validation->run() == false) {
							$nrmp 		= $this->input->post('nrmp');
							$nama 		= $this->input->post('nama');
							$herbalis 	= $this->input->post('herbalis');
							$tgl_kembali = $this->input->post('tgl_kembali');
							$info 		= $this->clean_tag_input($this->input->post('info'));

							$update 	= $this->m_pelanggan->update_pelanggan($id_pelanggan, $nrmp, $nama, $herbalis, $tgl_kembali, $info);
							if ($update) {
								echo json_encode(array(
									'status' => 1,
									'pesan' => "<div class='alert alert-success'><i class='fa fa-check'></i> Data berhasil diupdate.</div>"
								));
							} else {
								$this->query_error();
							}
						} else {
							$this->input_error();
						}
					} else {
						$dt['pelanggan'] = $this->m_pelanggan->get_baris($id_pelanggan)->row();
						$this->output->cache(0.1);
						$this->load->view('penjualan/pelanggan_edit', $dt);
					}
				}
			}
		}
	}

	public function pelanggan_hapus($id_pelanggan)
	{
		$level = $this->session->userdata('ap_level');
		if ($level == 'admin') {
			if ($this->input->is_ajax_request()) {
				$this->load->model('m_pelanggan');
				$hapus = $this->m_pelanggan->hapus_pelanggan($id_pelanggan);
				if ($hapus) {
					echo json_encode(array(
						"pesan" => "<font color='green'><i class='fa fa-check'></i> Data berhasil dihapus !</font>
					"
					));
				} else {
					echo json_encode(array(
						"pesan" => "<font color='red'><i class='fa fa-warning'></i> Terjadi kesalahan, coba lagi !</font>
					"
					));
				}
			}
		}
	}
}
