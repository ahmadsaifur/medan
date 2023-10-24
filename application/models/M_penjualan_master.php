<?php
class M_penjualan_master extends CI_Model
{
	function insert_master($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis,  $bayar, $grand_total, $catatan, $tanggal_kembali, $sales_pam)
	{
		$dt = array(
			'nomor_nota' => $nomor_nota,
			'tanggal' => $tanggal,
			'total_awal' => $total_awal,
			'grand_total' => $grand_total,
			'discount_total' => $harga_discount,
			'bayar' => $bayar,
			'keterangan_lain' => $catatan,
			'id_pelanggan' => (empty($id_pelanggan)) ? NULL : $id_pelanggan,
			'nama_herbalis' => (empty($id_herbalis)) ? NULL : $id_herbalis,
			'id_user' => $id_kasir,
			'keterangan' => 'pasien klinik',
			'tanggal_kembali' => date('d F Y', strtotime($tanggal_kembali)),
			'status' => 'pending',
			'nama_sales' => $sales_pam
		);

		return $this->db->insert('pj_penjualan_master', $dt);
	}

	function insert_master_tanpatanggal($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis,  $bayar, $grand_total, $catatan, $sales_pam)
	{
		$dt = array(
			'nomor_nota' => $nomor_nota,
			'tanggal' => $tanggal,
			'total_awal' => $total_awal,
			'grand_total' => $grand_total,
			'discount_total' => $harga_discount,
			'bayar' => $bayar,
			'keterangan_lain' => $catatan,
			'id_pelanggan' => (empty($id_pelanggan)) ? NULL : $id_pelanggan,
			'nama_herbalis' => (empty($id_herbalis)) ? NULL : $id_herbalis,
			'id_user' => $id_kasir,
			'keterangan' => 'pasien klinik',
			'status' => 'pending',
			'nama_sales' => $sales_pam
		);

		return $this->db->insert('pj_penjualan_master', $dt);
	}

	function insert_master2_tanpatanggal($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis_ori, $id_herbalis, $aty_kota,  $bayar, $grand_total, $catatan)
	{
		$dt = array(
			'nomor_nota' => $nomor_nota,
			'tanggal' => $tanggal,
			'total_awal' => $total_awal,
			'grand_total' => $grand_total,
			'discount_total' => $harga_discount,
			'bayar' => $bayar,
			'keterangan_lain' => $catatan,
			'id_pelanggan' => (empty($id_pelanggan)) ? NULL : $id_pelanggan,
			'nama_herbalis' => (empty($id_herbalis_ori)) ? NULL : $id_herbalis_ori,
			'nama_sales' => (empty($id_herbalis)) ? NULL : $id_herbalis,
			'ATY_kota' => (empty($aty_kota)) ? NULL : $aty_kota,
			'id_user' => $id_kasir,
			'keterangan' => 'pasien online',
			'status' => 'pending'
		);

		return $this->db->insert('pj_penjualan_master', $dt);
	}

	function insert_master2($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis_ori, $id_herbalis, $aty_kota,  $bayar, $grand_total, $catatan, $tanggal_kembali)
	{
		$dt = array(
			'nomor_nota' => $nomor_nota,
			'tanggal' => $tanggal,
			'total_awal' => $total_awal,
			'grand_total' => $grand_total,
			'discount_total' => $harga_discount,
			'bayar' => $bayar,
			'keterangan_lain' => $catatan,
			'id_pelanggan' => (empty($id_pelanggan)) ? NULL : $id_pelanggan,
			'nama_herbalis' => (empty($id_herbalis_ori)) ? NULL : $id_herbalis_ori,
			'nama_sales' => (empty($id_herbalis)) ? NULL : $id_herbalis,
			'ATY_kota' => (empty($aty_kota)) ? NULL : $aty_kota,
			'tanggal_kembali' => date('d F Y', strtotime($tanggal_kembali)),
			'id_user' => $id_kasir,
			'keterangan' => 'pasien online',
			'status' => 'pending'
		);

		return $this->db->insert('pj_penjualan_master', $dt);
	}

	function insert_master2_pending($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis,  $bayar, $grand_total, $catatan)
	{
		$dt = array(
			'nomor_nota' => $nomor_nota,
			'tanggal' => $tanggal,
			'total_awal' => $total_awal,
			'grand_total' => $grand_total,
			'discount_total' => $harga_discount,
			'bayar' => $bayar,
			'keterangan_lain' => $catatan,
			'id_pelanggan' => (empty($id_pelanggan)) ? NULL : $id_pelanggan,
			'nama_sales' => (empty($id_herbalis)) ? NULL : $id_herbalis,
			'id_user' => $id_kasir,
			'keterangan' => 'pasien online',
			'status' => 'tahan'
		);

		return $this->db->insert('pj_penjualan_master', $dt);
	}

	function insert_master_pending($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis,  $bayar, $grand_total, $catatan, $tanggal_kembali, $sales_pam)
	{
		$dt = array(
			'nomor_nota' => $nomor_nota,
			'tanggal' => $tanggal,
			'total_awal' => $total_awal,
			'grand_total' => $grand_total,
			'discount_total' => $harga_discount,
			'bayar' => $bayar,
			'keterangan_lain' => $catatan,
			'id_pelanggan' => (empty($id_pelanggan)) ? NULL : $id_pelanggan,
			'nama_herbalis' => (empty($id_herbalis)) ? NULL : $id_herbalis,
			'id_user' => $id_kasir,
			'keterangan' => 'pasien klinik',
			'tanggal_kembali' => date('d F Y', strtotime($tanggal_kembali)),
			'status' => 'tahan',
			'nama_sales' => $sales_pam
		);

		return $this->db->insert('pj_penjualan_master', $dt);
	}

	function insert_master_pending_tanpatanggal($nomor_nota, $tanggal, $total_awal, $harga_discount, $id_kasir, $id_pelanggan, $id_herbalis,  $bayar, $grand_total, $catatan, $sales_pam)
	{
		$dt = array(
			'nomor_nota' => $nomor_nota,
			'tanggal' => $tanggal,
			'total_awal' => $total_awal,
			'grand_total' => $grand_total,
			'discount_total' => $harga_discount,
			'bayar' => $bayar,
			'keterangan_lain' => $catatan,
			'id_pelanggan' => (empty($id_pelanggan)) ? NULL : $id_pelanggan,
			'nama_herbalis' => (empty($id_herbalis)) ? NULL : $id_herbalis,
			'id_user' => $id_kasir,
			'keterangan' => 'pasien klinik',
			'status' => 'tahan',
			'nama_sales' => $sales_pam
		);

		return $this->db->insert('pj_penjualan_master', $dt);
	}

	function get_id($nomor_nota)
	{
		return $this->db
			->select('id_penjualan_m')
			->where('nomor_nota', $nomor_nota)
			->limit(1)
			->get('pj_penjualan_master');
	}

	function fetch_data_penjualan_pending($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "
			SELECT 
				(@row:=@row+1) AS nomor, 
				a.`id_penjualan_m`, 
				a.`nomor_nota` AS nomor_nota, 
				DATE_FORMAT(a.`tanggal`, '%d %b %Y - %H:%i:%s') AS tanggal,
				CONCAT('Rp. ', REPLACE(FORMAT(a.`grand_total`, 0),',','.') ) AS grand_total,
				IF(b.`nama` IS NULL, 'Umum', b.`nama`) AS nama_pelanggan,
				c.`nama` AS kasir,
				a.`keterangan` AS keterangan,
				a.`status` AS status     
			FROM 
				`pj_penjualan_master` AS a 
				LEFT JOIN `pj_pelanggan` AS b ON a.`id_pelanggan` = b.`id_pelanggan` 
				LEFT JOIN `pj_user` AS c ON a.`id_user` = c.`id_user` 
				, (SELECT @row := 0) r WHERE a.status = 'tahan'
				AND a.keterangan = 'pasien online'
				AND  1=1 
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if (!empty($like_value)) {
			$sql .= " AND ( ";
			$sql .= "
				a.`nomor_nota` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR DATE_FORMAT(a.`tanggal`, '%d %b %Y - %H:%i:%s') LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR CONCAT('Rp. ', REPLACE(FORMAT(a.`grand_total`, 0),',','.') ) LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR IF(b.`nama` IS NULL, 'Umum', b.`nama`) LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR c.`nama` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR a.`keterangan_lain` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
			0 => 'nomor',
			1 => 'a.`tanggal`',
			2 => 'nomor_nota',
			3 => 'a.`grand_total`',
			4 => 'nama_pelanggan',
			5 => 'keterangan',
			6 => 'kasir'
		);

		$sql .= " ORDER BY tanggal asc ";
		$sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

		$data['query'] = $this->db->query($sql);
		return $data;
	}

	function fetch_data_penjualan_pending_klinik($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "
			SELECT 
				(@row:=@row+1) AS nomor, 
				a.`id_penjualan_m`, 
				a.`nomor_nota` AS nomor_nota, 
				DATE_FORMAT(a.`tanggal`, '%d %b %Y - %H:%i:%s') AS tanggal,
				CONCAT('Rp. ', REPLACE(FORMAT(a.`grand_total`, 0),',','.') ) AS grand_total,
				IF(b.`nama` IS NULL, 'Umum', b.`nama`) AS nama_pelanggan,
				c.`nama` AS kasir,
				a.`keterangan` AS keterangan,
				a.`status` AS status     
			FROM 
				`pj_penjualan_master` AS a 
				LEFT JOIN `pj_pelanggan` AS b ON a.`id_pelanggan` = b.`id_pelanggan` 
				LEFT JOIN `pj_user` AS c ON a.`id_user` = c.`id_user` 
				, (SELECT @row := 0) r WHERE a.status = 'tahan'
				AND a.keterangan = 'pasien klinik'
				AND  1=1 
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if (!empty($like_value)) {
			$sql .= " AND ( ";
			$sql .= "
				a.`nomor_nota` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR DATE_FORMAT(a.`tanggal`, '%d %b %Y - %H:%i:%s') LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR CONCAT('Rp. ', REPLACE(FORMAT(a.`grand_total`, 0),',','.') ) LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR IF(b.`nama` IS NULL, 'Umum', b.`nama`) LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR c.`nama` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR a.`keterangan_lain` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
			0 => 'nomor',
			1 => 'a.`tanggal`',
			2 => 'nomor_nota',
			3 => 'a.`grand_total`',
			4 => 'nama_pelanggan',
			5 => 'keterangan',
			6 => 'kasir'
		);

		$sql .= " ORDER BY tanggal asc ";
		$sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

		$data['query'] = $this->db->query($sql);
		return $data;
	}

	function fetch_data_penjualan_online($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "
			SELECT 
				(@row:=@row+1) AS nomor, 
				a.`id_penjualan_m`, 
				a.`nomor_nota` AS nomor_nota, 
				DATE_FORMAT(a.`tanggal`, '%d %b %Y - %H:%i:%s') AS tanggal,
				CONCAT('Rp. ', REPLACE(FORMAT(a.`grand_total`, 0),',','.') ) AS grand_total,
				IF(b.`nama` IS NULL, 'Umum', b.`nama`) AS nama_pelanggan,
				c.`nama` AS kasir,
				a.`keterangan` AS keterangan,
				a.`status` AS status     
			FROM 
				`pj_penjualan_master` AS a 
				LEFT JOIN `pj_pelanggan` AS b ON a.`id_pelanggan` = b.`id_pelanggan` 
				LEFT JOIN `pj_user` AS c ON a.`id_user` = c.`id_user` 
				, (SELECT @row := 0) r WHERE a.status = 'ok'
				AND a.keterangan = 'pasien online'
				AND  1=1 
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if (!empty($like_value)) {
			$sql .= " AND ( ";
			$sql .= "
				a.`nomor_nota` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR DATE_FORMAT(a.`tanggal`, '%d %b %Y - %H:%i:%s') LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR CONCAT('Rp. ', REPLACE(FORMAT(a.`grand_total`, 0),',','.') ) LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR IF(b.`nama` IS NULL, 'Umum', b.`nama`) LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR c.`nama` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR a.`keterangan_lain` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
			0 => 'nomor',
			1 => 'a.`tanggal`',
			2 => 'nomor_nota',
			3 => 'a.`grand_total`',
			4 => 'nama_pelanggan',
			5 => 'keterangan',
			6 => 'kasir'
		);

		$sql .= " ORDER BY a.`tanggal` desc ";
		$sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

		$data['query'] = $this->db->query($sql);
		return $data;
	}

	function fetch_data_penjualan($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "
			SELECT 
				(@row:=@row+1) AS nomor, 
				a.`id_penjualan_m`, 
				a.`nomor_nota` AS nomor_nota, 
				DATE_FORMAT(a.`tanggal`, '%d %b %Y - %H:%i:%s') AS tanggal,
				CONCAT('Rp. ', REPLACE(FORMAT(a.`grand_total`, 0),',','.') ) AS grand_total,
				IF(b.`nama` IS NULL, 'Umum', b.`nama`) AS nama_pelanggan,
				c.`nama` AS kasir,
				a.`keterangan` AS keterangan,
				a.`status` AS status     
			FROM 
				`pj_penjualan_master` AS a 
				LEFT JOIN `pj_pelanggan` AS b ON a.`id_pelanggan` = b.`id_pelanggan` 
				LEFT JOIN `pj_user` AS c ON a.`id_user` = c.`id_user` 
				, (SELECT @row := 0) r WHERE a.status = 'ok'
				AND a.keterangan = 'pasien klinik'
				AND  1=1 
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if (!empty($like_value)) {
			$sql .= " AND ( ";
			$sql .= "
				a.`nomor_nota` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR DATE_FORMAT(a.`tanggal`, '%d %b %Y - %H:%i:%s') LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR CONCAT('Rp. ', REPLACE(FORMAT(a.`grand_total`, 0),',','.') ) LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR IF(b.`nama` IS NULL, 'Umum', b.`nama`) LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR c.`nama` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR a.`keterangan_lain` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
			0 => 'nomor',
			1 => 'a.`tanggal`',
			2 => 'nomor_nota',
			3 => 'a.`grand_total`',
			4 => 'nama_pelanggan',
			5 => 'keterangan',
			6 => 'kasir'
		);

		$sql .= " ORDER BY a.`tanggal` desc ";
		$sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

		$data['query'] = $this->db->query($sql);
		return $data;
	}

	function fetch_data_penjualan_apotek($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "
			SELECT 
				(@row:=@row+1) AS nomor, 
				a.`id_penjualan_m`, 
				a.`nomor_nota` AS nomor_nota, 
				DATE_FORMAT(a.`tanggal`, '%d %b %Y - %H:%i:%s') AS tanggal,
				CONCAT('Rp. ', REPLACE(FORMAT(a.`grand_total`, 0),',','.') ) AS grand_total,
				IF(b.`nama` IS NULL, 'Umum', b.`nama`) AS nama_pelanggan,
				c.`nama` AS kasir,
				a.`keterangan` AS keterangan,
				a.`status` AS status     
			FROM 
				`pj_penjualan_master` AS a 
				LEFT JOIN `pj_pelanggan` AS b ON a.`id_pelanggan` = b.`id_pelanggan` 
				LEFT JOIN `pj_user` AS c ON a.`id_user` = c.`id_user` 
				, (SELECT @row := 0) r WHERE a.status = 'pending'
				AND a.keterangan = 'pasien klinik'
				AND  1=1 
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if (!empty($like_value)) {
			$sql .= " AND ( ";
			$sql .= "
				a.`nomor_nota` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR DATE_FORMAT(a.`tanggal`, '%d %b %Y - %H:%i:%s') LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR CONCAT('Rp. ', REPLACE(FORMAT(a.`grand_total`, 0),',','.') ) LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR IF(b.`nama` IS NULL, 'Umum', b.`nama`) LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR c.`nama` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR a.`keterangan_lain` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
			0 => 'nomor',
			1 => 'a.`tanggal`',
			2 => 'nomor_nota',
			3 => 'a.`grand_total`',
			4 => 'nama_pelanggan',
			5 => 'keterangan',
			6 => 'kasir'
		);

		$sql .= " ORDER BY tanggal asc ";
		$sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

		$data['query'] = $this->db->query($sql);
		return $data;
	}

	function fetch_data_penjualan_apotek_online($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "
			SELECT 
				(@row:=@row+1) AS nomor, 
				a.`id_penjualan_m`, 
				a.`nomor_nota` AS nomor_nota, 
				DATE_FORMAT(a.`tanggal`, '%d %b %Y - %H:%i:%s') AS tanggal,
				CONCAT('Rp. ', REPLACE(FORMAT(a.`grand_total`, 0),',','.') ) AS grand_total,
				IF(b.`nama` IS NULL, 'Umum', b.`nama`) AS nama_pelanggan,
				c.`nama` AS kasir,
				a.`keterangan` AS keterangan,
				a.`status` AS status     
			FROM 
				`pj_penjualan_master` AS a 
				LEFT JOIN `pj_pelanggan` AS b ON a.`id_pelanggan` = b.`id_pelanggan` 
				LEFT JOIN `pj_user` AS c ON a.`id_user` = c.`id_user` 
				, (SELECT @row := 0) r WHERE a.status = 'pending'
				AND a.keterangan = 'pasien online'
				AND  1=1 
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if (!empty($like_value)) {
			$sql .= " AND ( ";
			$sql .= "
				a.`nomor_nota` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR DATE_FORMAT(a.`tanggal`, '%d %b %Y - %H:%i:%s') LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR CONCAT('Rp. ', REPLACE(FORMAT(a.`grand_total`, 0),',','.') ) LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR IF(b.`nama` IS NULL, 'Umum', b.`nama`) LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR c.`nama` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
				OR a.`keterangan_lain` LIKE '%" . $this->db->escape_like_str($like_value) . "%' 
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
			0 => 'nomor',
			1 => 'a.`tanggal`',
			2 => 'nomor_nota',
			3 => 'a.`grand_total`',
			4 => 'nama_pelanggan',
			5 => 'keterangan',
			6 => 'kasir'
		);

		$sql .= " ORDER BY tanggal DESC ";
		$sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

		$data['query'] = $this->db->query($sql);
		return $data;
	}

	function get_baris($id_penjualan)
	{
		$sql = "
			SELECT 
				a.`nomor_nota`, 
				a.`total_awal`,
				a.`grand_total`,
				a.`discount_total`,
				CONCAT(REPLACE(FORMAT(a.`discount_total`, 0),',','.') ) AS discount_total2,
				a.`tanggal`,
				a.`bayar`,
				a.`id_user` AS id_kasir,
				a.`id_pelanggan`,
				a.`nama_herbalis`,
				a.`nama_sales`,
				a.`ATY_kota`,
				a.`tanggal_kembali`,
				a.`keterangan_lain` AS catatan,
				b.`nama` AS nama_pelanggan,
				b.`alamat` AS alamat_pelanggan,
				b.`telp` AS telp_pelanggan,
				b.`info_tambahan` AS info_pelanggan,
				b.`nrmp` AS nrmp, 
				b.`tgl_kembali`
			FROM 
				`pj_penjualan_master` AS a 
				LEFT JOIN `pj_pelanggan` AS b ON a.`id_pelanggan` = b.`id_pelanggan` 
			WHERE 
				a.`id_penjualan_m` = '" . $id_penjualan . "' 
			LIMIT 1
		";
		return $this->db->query($sql);
	}

	function hapus_transaksi($id_penjualan, $reverse_stok)
	{
		if ($reverse_stok == 'yes') {
			$loop = $this->db
				->select('id_barang, jumlah_beli')
				->where('id_penjualan_m', $id_penjualan)
				->get('pj_penjualan_detail');

			foreach ($loop->result() as $b) {
				$sql = "
					UPDATE `pj_barang` SET `total_stok` = `total_stok` + " . $b->jumlah_beli . " 
					WHERE `id_barang` = '" . $b->id_barang . "' 
				";

				$this->db->query($sql);
			}
		}

		$this->db->where('id_penjualan_m', $id_penjualan)->delete('pj_penjualan_detail');
		return $this->db
			->where('id_penjualan_m', $id_penjualan)
			->delete('pj_penjualan_master');
	}
	function hapus_transaksi2($id_penjualan, $reverse_stok)
	{
		if ($reverse_stok == 'yes') {
			$loop = $this->db
				->select('id_barang, jumlah_beli')
				->where('id_penjualan_m', $id_penjualan)
				->get('pj_penjualan_detail');

			foreach ($loop->result() as $b) {
				$sql = "
					UPDATE `pj_barang` SET `total_stok` = `total_stok` + " . $b->jumlah_beli . " 
					WHERE `id_barang` = '" . $b->id_barang . "' 
				";

				$this->db->query($sql);
			}
		}

		$this->db->where('id_penjualan_m', $id_penjualan)->delete('pj_penjualan_detail');
		return $this->db
			->where('id_penjualan_m', $id_penjualan)
			->delete('pj_penjualan_master');
	}

	function acc_transaksi($id_penjualan)
	{
		$loop = $this->db
			->select('id_barang, jumlah_beli')
			->where('id_penjualan_m', $id_penjualan)
			->get('pj_penjualan_detail');

		foreach ($loop->result() as $b) {
			$sql = "
					UPDATE `pj_barang` SET `total_stok` = `total_stok` - " . $b->jumlah_beli . " 
					WHERE `id_barang` = '" . $b->id_barang . "' AND `id_barang` NOT IN ('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30') 
				";

			$this->db->query($sql);
		}

		$dt['status'] = 'ok';
		return $this->db->where('id_penjualan_m', $id_penjualan)->update('pj_penjualan_master', $dt);/*
		return $this->db->where('id_penjualan_m', $id_penjualan)->delete('pj_penjualan_detail', $dt);*/
	}

	function acc_transaksi2($id_penjualan)
	{
		$loop = $this->db
			->select('id_barang, jumlah_beli')
			->where('id_penjualan_m', $id_penjualan)
			->get('pj_penjualan_detail');

		foreach ($loop->result() as $b) {
			$sql = "
					UPDATE `pj_barang` SET `total_stok` = `total_stok` - " . $b->jumlah_beli . " 
					WHERE `id_barang` = '" . $b->id_barang . "' AND `id_barang` NOT IN ('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30') 
				";

			$this->db->query($sql);
		}

		$dt['status'] = 'ok';
		$dt2['status'] = 'ok';/*
		$dt['id_herbalis'] = ''.$.'';*/
		return $this->db->where('id_penjualan_m', $id_penjualan)->update('pj_penjualan_master', $dt);
		return $this->db->where('id_penjualan_m', $id_penjualan)->update('pj_penjualan_detail', $dt2);
		/*
		return $this->db->where('id_penjualan_m', $id_penjualan)->delete('pj_penjualan_detail', $);*/
	}

	function acc_transaksi_pending($id_penjualan)
	{

		$dt['status'] = 'pending';
		return $this->db->where('id_penjualan_m', $id_penjualan)->update('pj_penjualan_master', $dt);
	}

	function acc_transaksi2_pending($id_penjualan)
	{

		$dt['status'] = 'pending';
		$dt2['status'] = 'ok';
		return $this->db->where('id_penjualan_m', $id_penjualan)->update('pj_penjualan_master', $dt);
		return $this->db->where('id_penjualan_m', $id_penjualan)->update('pj_penjualan_detail', $dt2);
	}

	/*function update_namaherbalis($id_penjualan)
	{
			$loop = $this->db
				->select('nama_herbalis, id_pelanggan')
				->where('id_penjualan_m', $id_penjualan)
				->get('pj_penjualan_detail');

			foreach($loop->result() as $b)
			{
				$sql = "
					UPDATE `pj_pelanggan` SET `id_herbalis` = ".$b->nama_herbalis." 
					WHERE `id_pelanggan` = '".$b->id_pelanggan."'
				";

				$this->db->query($sql);
			}
		
	}*/

	function laporan_penjualan($from, $to)
	{
		$sql = "
			SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, a.`harga_satuan`, a.`total`, a.`jumlah_beli`, a.`grand_total`, CONCAT('Rp. ', REPLACE(FORMAT(a.`discount`, 0),',','.') ) AS discount,  a.`disc`,
				(
					SELECT 
						nomor_nota 
					FROM 
						`pj_penjualan_master` AS d 
					WHERE 
						d.`id_penjualan_m` = a.`id_penjualan_m`  
					LIMIT 1
				) AS nomor_nota, 
				(
					SELECT 
						nrmp 
					FROM 
						`pj_pelanggan` AS d 
					WHERE 
						d.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS nrmp, 
				(
					SELECT 
						nama 
					FROM 
						`pj_pelanggan` AS d 
					WHERE 
						d.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS nama_pasien, 
				(
					SELECT 
						satuan 
					FROM 
						`pj_barang` AS d 
					WHERE 
						d.`id_barang` = a.`id_barang`  
					LIMIT 1
				) AS satuan, 
				(
					SELECT 
						nama_barang 
					FROM 
						`pj_barang` AS d 
					WHERE 
						d.`id_barang` = a.`id_barang`  
					LIMIT 1
				) AS nama_barang
				
				
			FROM 
				`pj_penjualan_detail` AS a 
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
				AND a.`keterangan` = 'pasien klinik'
			ORDER BY 
				a.`tanggal` ASC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualan_online($from, $to)
	{
		$sql = "
			SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, a.`harga_satuan`, a.`total`, a.`jumlah_beli`,a.`grand_total`, CONCAT('Rp. ', REPLACE(FORMAT(a.`discount`, 0),',','.') ) AS discount,  a.`disc`,
				(
					SELECT 
						nomor_nota 
					FROM 
						`pj_penjualan_master` AS d 
					WHERE 
						d.`id_penjualan_m` = a.`id_penjualan_m`  
					LIMIT 1
				) AS nomor_nota, 
				(
					SELECT 
						nrmp 
					FROM 
						`pj_pelanggan` AS d 
					WHERE 
						d.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS nrmp, 
				(
					SELECT 
						nama 
					FROM 
						`pj_pelanggan` AS d 
					WHERE 
						d.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS nama_pasien, 
				(
					SELECT 
						satuan 
					FROM 
						`pj_barang` AS d 
					WHERE 
						d.`id_barang` = a.`id_barang`  
					LIMIT 1
				) AS satuan, 
				(
					SELECT 
						nama_barang 
					FROM 
						`pj_barang` AS d 
					WHERE 
						d.`id_barang` = a.`id_barang`  
					LIMIT 1
				) AS nama_barang
				
			FROM 
				`pj_penjualan_detail` AS a 
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
				AND a.`keterangan` = 'pasien online'
			ORDER BY 
				a.`tanggal` ASC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualansales($from, $to)
	{
		$sql = "
		SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, a.`nama_sales`,SUM(a.`grand_total`) AS total_penjualan, 
				(
					SELECT 
						SUM(b.`jumlah_beli`) 
					FROM 
						`pj_penjualan_detail` AS b 
					WHERE
                    	b.`nama_sales` = a.`nama_sales`
                    	AND b.`nama_sales` NOT IN  ('')
                    	AND SUBSTR(b.`tanggal`, 1, 10) >= '" . $from . "' 
						AND SUBSTR(b.`tanggal`, 1, 10) <= '" . $to . "'
						AND b.`ATY_kota` NOT IN  ('aty_mdn','aty_sby','aty_mksr','aty_bali')
					LIMIT 1
				) AS total_Obat 
				
			FROM 
				`pj_penjualan_master` AS a 
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
                AND a.`keterangan` = 'pasien online'/*
                AND a.`nama_sales` NOT IN  ('')*/
                AND a.`ATY_kota` IS NULL
            GROUP BY
            	a.`nama_sales`
			ORDER BY 
				a.`tanggal` ASC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualansales_ATY($from, $to, $aty)
	{
		$sql = "
		SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, a.`nama_sales`,SUM(a.`grand_total`) AS total_penjualan, 
				(
					SELECT 
						SUM(b.`jumlah_beli`) 
					FROM 
						`pj_penjualan_detail` AS b 
					WHERE
                    	a.`nama_sales` = b.`nama_sales`
                    	AND SUBSTR(b.`tanggal`, 1, 10) >= '" . $from . "' 
						AND SUBSTR(b.`tanggal`, 1, 10) <= '" . $to . "'
						AND b.`keterangan` = 'pasien online'
						AND b.`ATY_kota` = '" . $aty . "'
					LIMIT 1
				) AS total_Obat 
				
			FROM 
				`pj_penjualan_master` AS a 
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
                AND a.`keterangan` = 'pasien online'
                AND a.`ATY_kota` = '" . $aty . "'
            GROUP BY
            	a.`nama_sales`
			ORDER BY 
				a.`tanggal` ASC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualansales_ATY_semua_kota($from, $to)
	{
		$sql = "
		SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, a.`nama_sales`,SUM(a.`grand_total`) AS total_penjualan, 
				(
					SELECT 
						SUM(b.`jumlah_beli`) 
					FROM 
						`pj_penjualan_detail` AS b 
					WHERE
                    	b.`nama_sales` = a.`nama_sales`/*
                    	AND b.`nama_sales` NOT IN  ('')*/
                    	AND SUBSTR(b.`tanggal`, 1, 10) >= '" . $from . "' 
						AND SUBSTR(b.`tanggal`, 1, 10) <= '" . $to . "'
						AND b.`ATY_kota` not in (' ')
					LIMIT 1
				) AS total_Obat 
				
			FROM 
				`pj_penjualan_master` AS a 
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
                AND a.`keterangan` = 'pasien online'/*
                AND a.`nama_sales` NOT IN  ('')*/
                AND a.`ATY_kota` not in (' ')
            GROUP BY
            	a.`nama_sales`
			ORDER BY 
				a.`tanggal` ASC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualansales_pam($from, $to)
	{
		/*$sql = "
		SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, a.`nama_sales`,SUM(a.`grand_total`) AS total_penjualan, 
				
				(
					SELECT 
						SUM(c.`jumlah_beli`) 
					FROM 
						`pj_penjualan_detail` AS c 
					WHERE
                    	SUBSTR(c.`tanggal`, 1, 10) >= '".$from."' 
						AND SUBSTR(c.`tanggal`, 1, 10) <= '".$to."'
                    	AND c.`nama_sales` = 'PAM'
                    	
					LIMIT 1
				) AS total_Obat 
				
			FROM 
				`pj_penjualan_master` AS a 
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '".$from."' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '".$to."'
				AND a.`nama_sales` = 'PAM'
                AND a.`keterangan` = 'pasien klinik'
            GROUP BY
            	a.`nama_sales`
			ORDER BY 
				a.`tanggal` DESC
		";*/
		$sql = "SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal,IF(b.`nama` IS NULL, 'Umum', b.`nama`) AS nama_pelanggan, a.`nama_sales`,a.`grand_total` AS total_penjualan, 
				
				(
					SELECT 
						sum(c.`jumlah_beli`) 
					FROM 
						`pj_penjualan_detail` AS c 
					WHERE
                    	SUBSTR(c.`tanggal`, 1, 10) >= '" . $from . "' 
						AND SUBSTR(c.`tanggal`, 1, 10) <= '" . $to . "'
                    	AND c.`nama_sales` = 'PAM'
						AND c.`id_penjualan_m` = a.`id_penjualan_m`
                    	
					LIMIT 1
				) AS total_Obat 
				
			FROM 
				`pj_penjualan_master` AS a 
                LEFT JOIN `pj_pelanggan` AS b ON a.`id_pelanggan` = b.`id_pelanggan`
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
				AND a.`nama_sales` = 'PAM'
                AND a.`keterangan` = 'pasien klinik'
			ORDER BY 
				a.`tanggal` DESC
				";

		return $this->db->query($sql);
	}

	function laporan_penjualansales_perproduk($from, $to, $sales)
	{
		$sql = "
		SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, a.`nama_sales`, a.`id_penjualan_m`,
				(
					SELECT d.`nama_barang`
					FROM 
						`pj_barang` AS d 
					WHERE
                    	d.`id_barang` = a.`id_barang`
					LIMIT 1
				) AS nama_barang,
                sum(a.`jumlah_beli`) AS jumlah_beli,
                sum(a.`grand_total`) AS total
				/*
				(
					SELECT sum(b.`grand_total`)
					FROM 
						`pj_penjualan_detail` AS b 
					WHERE
                    	b.`id_barang` = a.`id_barang`
                        AND b.`nama_sales` = '" . $sales . "'
                        AND b.`ATY_kota` NOT IN  ('aty_mdn','aty_sby','aty_mksr','aty_bali')
					LIMIT 1
				) AS total,
                (
					SELECT 
                    	sum(c.`jumlah_beli`)
					FROM 
						`pj_penjualan_detail` AS c 
					WHERE
                    	c.`id_barang` = a.`id_barang`
                        AND c.`nama_sales` = '" . $sales . "'
                        AND c.`ATY_kota` NOT IN  ('aty_mdn','aty_sby','aty_mksr','aty_bali')
					LIMIT 1
				) AS jumlah_beli*/

			FROM 
				`pj_penjualan_detail` AS a 
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
				AND a.`ATY_kota` NOT IN  ('aty_mdn','aty_sby','aty_mksr','aty_bali')
            AND a.`keterangan` = 'pasien online'
            AND a.`nama_sales` = '" . $sales . "'
            GROUP BY 
            	nama_barang
			ORDER BY 
			a.`nama_sales` ASC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualansales_perproduk_ATY($from, $to, $sales, $aty)
	{
		$sql = "
		SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, a.`nama_sales`, a.`id_penjualan_m`,
				(
					SELECT d.`nama_barang`
					FROM 
						`pj_barang` AS d 
					WHERE
                    	d.`id_barang` = a.`id_barang`
					LIMIT 1
				) AS nama_barang,
                sum(a.`jumlah_beli`) AS jumlah_beli,
                sum(a.`grand_total`) AS total
				/*
				(
					SELECT sum(b.`grand_total`)
					FROM 
						`pj_penjualan_detail` AS b 
					WHERE
                    	b.`id_barang` = a.`id_barang`
                        AND b.`nama_sales` = '" . $sales . "'
					LIMIT 1
				) AS total,
                (
					SELECT 
                    	sum(c.`jumlah_beli`)
					FROM 
						`pj_penjualan_detail` AS c 
					WHERE
                    	c.`id_barang` = a.`id_barang`
                        AND c.`nama_sales` = '" . $sales . "'
					LIMIT 1
				) AS jumlah_beli*/

			FROM 
				`pj_penjualan_detail` AS a 
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
            AND a.`keterangan` = 'pasien online'
            AND a.`nama_sales` = '" . $sales . "'
            AND a.`ATY_kota` = '" . $aty . "'/*
            AND a.`ATY_kota` NOT IN  ('')*/
            GROUP BY 
            	nama_barang
			ORDER BY 
			a.`nama_sales` ASC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualanpasien($from, $to)
	{
		$sql = "
			SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, SUM(a.`grand_total`) AS total_penjualan, /*a.`id_penjualan_m`*/
				/*(
					SELECT 
						SUM(b.`grand_total`) 
					FROM 
						`pj_penjualan_master` AS b 
					WHERE 
						b.`id_pelanggan` = a.`id_pelanggan`
						AND b.`keterangan` = 'pasien online'/*
						SUBSTR(b.`tanggal`, 1, 10) = SUBSTR(a.`tanggal`, 1, 10)
					LIMIT 1
				) AS total_penjualan,*/
				(
					SELECT 
						nrmp 
					FROM 
						`pj_pelanggan` AS d 
					WHERE 
						d.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS nrmp, 
				(
					SELECT 
						nama 
					FROM 
						`pj_pelanggan` AS d 
					WHERE 
						d.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS nama_pasien, 
				(
					SELECT 
						SUM(c.`jumlah_beli`) 
					FROM 
						`pj_penjualan_detail` AS c 
					WHERE 
						c.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS total_Obat 
				
			FROM 
				`pj_penjualan_master` AS a 
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
				AND a.`keterangan` = 'pasien online'
				AND a.`status` ='ok'
				AND a.`ATY_kota` IS NULL/*
				AND a.`status` NOT IN  ('tahan')*/
			GROUP BY
            	nama_pasien
			ORDER BY 
				total_penjualan DESC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualanpasien_ATY($from, $to, $aty)
	{
		$sql = "
			SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, SUM(a.`grand_total`) AS total_penjualan, /*a.`id_penjualan_m`*/
				/*(
					SELECT 
						SUM(b.`grand_total`) 
					FROM 
						`pj_penjualan_master` AS b 
					WHERE 
						b.`id_pelanggan` = a.`id_pelanggan`
						AND b.`keterangan` = 'pasien online'/*
						SUBSTR(b.`tanggal`, 1, 10) = SUBSTR(a.`tanggal`, 1, 10)
					LIMIT 1
				) AS total_penjualan,*/
				(
					SELECT 
						nrmp 
					FROM 
						`pj_pelanggan` AS d 
					WHERE 
						d.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS nrmp, 
				(
					SELECT 
						nama 
					FROM 
						`pj_pelanggan` AS d 
					WHERE 
						d.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS nama_pasien, 
				(
					SELECT 
						SUM(c.`jumlah_beli`) 
					FROM 
						`pj_penjualan_detail` AS c 
					WHERE 
						c.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS total_Obat 
				
			FROM 
				`pj_penjualan_master` AS a 
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
				AND a.`keterangan` = 'pasien online'
				AND a.`status` ='ok'
				AND a.`ATY_kota` ='" . $aty . "'/*
				AND a.`ATY_kota` NOT IN  ('')*//*
				AND a.`status` NOT IN  ('tahan')*/
			GROUP BY
            	nama_pasien
			ORDER BY 
				total_penjualan DESC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualanpasien_ATY_semua_kota($from, $to)
	{
		$sql = "
			SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, SUM(a.`grand_total`) AS total_penjualan, a.ATY_kota, /*a.`id_penjualan_m`*/
				/*(
					SELECT 
						SUM(b.`grand_total`) 
					FROM 
						`pj_penjualan_master` AS b 
					WHERE 
						b.`id_pelanggan` = a.`id_pelanggan`
						AND b.`keterangan` = 'pasien online'/*
						SUBSTR(b.`tanggal`, 1, 10) = SUBSTR(a.`tanggal`, 1, 10)
					LIMIT 1
				) AS total_penjualan,*/
				(
					SELECT 
						nrmp 
					FROM 
						`pj_pelanggan` AS d 
					WHERE 
						d.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS nrmp, 
				(
					SELECT 
						nama 
					FROM 
						`pj_pelanggan` AS d 
					WHERE 
						d.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS nama_pasien, 
				(
					SELECT 
						SUM(c.`jumlah_beli`) 
					FROM 
						`pj_penjualan_detail` AS c 
					WHERE 
						c.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS total_Obat 
				
			FROM 
				`pj_penjualan_master` AS a 
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
				AND a.`keterangan` = 'pasien online'
				AND a.`status` ='ok'
				AND a.`ATY_kota` NOT IN  ('')/*
				AND a.`status` NOT IN  ('tahan')*/
			GROUP BY
            	nama_pasien
			ORDER BY 
				a.ATY_kota ASC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualanpasien_klinik($from, $to)
	{
		$sql = "
			SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, SUM(a.`grand_total`) AS total_penjualan, /*a.`id_penjualan_m`*/
				/*(
					SELECT 
						SUM(b.`grand_total`) 
					FROM 
						`pj_penjualan_master` AS b 
					WHERE 
						
				        AND b.`id_pelanggan` = a.`id_pelanggan`
						AND b.`keterangan` = 'pasien klinik'
						
					LIMIT 1
				) AS total_penjualan,*/
				(
					SELECT 
						nrmp 
					FROM 
						`pj_pelanggan` AS d 
					WHERE 
						d.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS nrmp, 
				(
					SELECT 
						nama 
					FROM 
						`pj_pelanggan` AS d 
					WHERE 
						d.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS nama_pasien, 
				(
					SELECT 
						SUM(c.`jumlah_beli`) 
					FROM 
						`pj_penjualan_detail` AS c 
					WHERE 
						c.`id_pelanggan` = a.`id_pelanggan`  
					LIMIT 1
				) AS total_Obat 
				
			FROM 
				`pj_penjualan_master` AS a 
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
				AND a.`keterangan` = 'pasien klinik' 
				AND a.`status` ='ok'/*
				AND a.`status` NOT IN  ('tahan')*/
			GROUP BY
            	nama_pasien
			ORDER BY 
				a.`tanggal` DESC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualanobat($from, $to)
	{
		$sql = "
			SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, a.`id_barang`,SUM(a.`jumlah_beli`) AS total_Obat, AVG(a.`harga_satuan`) AS harga_satuan,SUM(a.`grand_total`) AS total_penjualan,/*a.`id_penjualan_m`*/
				
				(
					SELECT 
						nama_barang 
					FROM 
						`pj_barang` AS d 
					WHERE 
						d.`id_barang` = a.`id_barang`  
					LIMIT 1
				) AS nama_obat, 
				(
					SELECT 
						satuan 
					FROM 
						`pj_barang` AS e 
					WHERE 
						e.`id_barang` = a.`id_barang`  
					LIMIT 1
				) AS satuan
				
				FROM 
				`pj_penjualan_detail` AS a 
				WHERE 
					SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "'
					AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
					AND a.`keterangan` = 'pasien online'
					AND a.`ATY_kota` = ' '/*
					AND a.`nama_sales` NOT IN (' ')*/
				GROUP BY
	            	nama_obat
				ORDER BY 
					nama_obat ASC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualanobat_ATY($from, $to, $aty)
	{
		$sql = "
			SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, a.`id_barang`,SUM(a.`jumlah_beli`) AS total_Obat, AVG(a.`harga_satuan`) AS harga_satuan,SUM(a.`grand_total`) AS total_penjualan,/*a.`id_penjualan_m`*/
				
				(
					SELECT 
						nama_barang 
					FROM 
						`pj_barang` AS d 
					WHERE 
						d.`id_barang` = a.`id_barang`  
					LIMIT 1
				) AS nama_obat, 
				(
					SELECT 
						satuan 
					FROM 
						`pj_barang` AS e 
					WHERE 
						e.`id_barang` = a.`id_barang`  
					LIMIT 1
				) AS satuan
				
				FROM 
				`pj_penjualan_detail` AS a 
				WHERE 
					SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "'
					AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
					AND a.`keterangan` = 'pasien online'
					AND a.`ATY_kota` ='" . $aty . "'/*
					AND a.`ATY_kota` NOT IN  ('')*/
				GROUP BY
	            	nama_obat
				ORDER BY 
					nama_obat ASC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualanobat_ATY_semua_kota($from, $to)
	{
		$sql = "
			SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, a.`id_barang`,SUM(a.`jumlah_beli`) AS total_Obat, AVG(a.`harga_satuan`) AS harga_satuan,SUM(a.`grand_total`) AS total_penjualan,/*a.`id_penjualan_m`*/
				
				(
					SELECT 
						nama_barang 
					FROM 
						`pj_barang` AS d 
					WHERE 
						d.`id_barang` = a.`id_barang`  
					LIMIT 1
				) AS nama_obat, 
				(
					SELECT 
						satuan 
					FROM 
						`pj_barang` AS e 
					WHERE 
						e.`id_barang` = a.`id_barang`  
					LIMIT 1
				) AS satuan
				
				FROM 
				`pj_penjualan_detail` AS a 
				WHERE 
					SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "'
					AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
					AND a.`keterangan` = 'pasien online'/*
					AND a.`ATY_kota` ='" . $aty . "'*/
					AND a.`ATY_kota` NOT IN  ('')
				GROUP BY
	            	nama_obat
				ORDER BY 
					nama_obat ASC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualanobat_klinik($from, $to)
	{
		$sql = "
			SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, a.`id_barang`,SUM(a.`jumlah_beli`) AS total_Obat, AVG(a.`harga_satuan`) AS harga_satuan,SUM(a.`grand_total`) AS total_penjualan,/*a.`id_penjualan_m`*/
				
				(
					SELECT 
						nama_barang 
					FROM 
						`pj_barang` AS d 
					WHERE 
						d.`id_barang` = a.`id_barang`  
					LIMIT 1
				) AS nama_obat, 
				(
					SELECT 
						satuan 
					FROM 
						`pj_barang` AS e 
					WHERE 
						e.`id_barang` = a.`id_barang`  
					LIMIT 1
				) AS satuan
				
				FROM 
				`pj_penjualan_detail` AS a 
				WHERE 
					SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "'
					AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
					AND a.`keterangan` = 'pasien klinik' 
				GROUP BY
	            	nama_obat
				ORDER BY 
					nama_obat DESC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualanherbalis($from, $to)
	{
		$sql = "
		SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, a.`nama_herbalis`, a.`id_pelanggan`,
				(
					SELECT 
						SUM(b.`grand_total`)
					FROM 
						`pj_penjualan_detail` AS b 
					WHERE 
					    SUBSTR(b.`tanggal`, 1, 10) >= '" . $from . "' 
				        AND SUBSTR(b.`tanggal`, 1, 10) <= '" . $to . "'
						AND b.`nama_herbalis` = a.`nama_herbalis`
						AND b.`keterangan` = 'pasien klinik'
                        AND b.`nama_sales` not in ('PAM')
                        AND b.`nama_herbalis` not in ('')
					LIMIT 1
				) AS total_penjualan, 
				(
					SELECT 
						SUM(c.`jumlah_beli`) 
					FROM 
						`pj_penjualan_detail` AS c 
					WHERE
					    SUBSTR(c.`tanggal`, 1, 10) >= '" . $from . "' 
				        AND SUBSTR(c.`tanggal`, 1, 10) <= '" . $to . "'
                    	AND c.`nama_herbalis` = a.`nama_herbalis`
                    	AND c.`keterangan` = 'pasien klinik'
                        AND c.`nama_sales` not in ('PAM')
                        AND c.`nama_herbalis` not in ('')
					LIMIT 1
				) AS total_Obat 
				
			FROM 
				`pj_penjualan_master` AS a 
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
                AND a.`keterangan` = 'pasien klinik'
                AND a.`nama_sales` not in ('PAM')
                AND a.`nama_herbalis` not in ('')
            GROUP BY
            	a.`nama_herbalis`
			ORDER BY 
				a.`tanggal` ASC
		";

		return $this->db->query($sql);
	}

	function laporan_penjualanherbalis_perproduk($from, $to, $kde_herbalis)
	{
		$sql = "
		SELECT 
				DISTINCT(SUBSTR(a.`tanggal`, 1, 10)) AS tanggal, a.`nama_herbalis`, a.`id_penjualan_m`,
				(
					SELECT d.`nama_barang`
					FROM 
						`pj_barang` AS d 
					WHERE
                    	d.`id_barang` = a.`id_barang`
					LIMIT 1
				) AS nama_barang,
                sum(a.`jumlah_beli`) AS jumlah_beli,
                sum(a.`grand_total`) AS total
			FROM 
				`pj_penjualan_detail` AS a 
			WHERE 
				SUBSTR(a.`tanggal`, 1, 10) >= '" . $from . "' 
				AND SUBSTR(a.`tanggal`, 1, 10) <= '" . $to . "'
            AND a.`keterangan` = 'pasien klinik'
            AND a.`nama_herbalis` = '" . $kde_herbalis . "'
            AND a.`nama_sales` not in ('PAM')
            AND a.`nama_herbalis` not in ('')
            GROUP BY 
            	nama_barang
			ORDER BY 
			a.`nama_herbalis` ASC
		";

		return $this->db->query($sql);
	}

	function cek_nota_validasi($nota)
	{
		return $this->db->select('nomor_nota')->where('nomor_nota', $nota)->limit(1)->get('pj_penjualan_master');
	}
}
