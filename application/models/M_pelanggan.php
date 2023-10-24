<?php
class M_pelanggan extends CI_Model
{
	function get_all()
	{

	$sql = ("
			SELECT 
				a.`id_pelanggan`,
				a.`nrmp`,
				a.`nama`,
				b.`nama` AS nama_herbalis,
				a.`alamat`,
				a.`telp`,
				a.`info_tambahan`,
				DATE_FORMAT(a.`waktu_input`, '%d %b %Y - %H:%i:%s') AS waktu_input 
			FROM 
				`pj_pelanggan` AS a 
				LEFT JOIN `pj_herbalis` AS b ON a.`id_herbalis` = b.`id_herbalis`
				 where a.`dihapus` = 'tidak'
				 AND a.`keterangan` = 'pasien klinik'  
		");
		
	return $this->db->query($sql);
	
	}

	function get_all_online()
	{

	$sql = ("
			SELECT 
				a.`id_pelanggan`,
				a.`nrmp`,
				a.`nama`,
				b.`nama` AS nama_herbalis,
				a.`alamat`,
				a.`telp`,
				a.`info_tambahan`,
				DATE_FORMAT(a.`waktu_input`, '%d %b %Y - %H:%i:%s') AS waktu_input 
			FROM 
				`pj_pelanggan` AS a 
				LEFT JOIN `pj_herbalis` AS b ON a.`id_herbalis` = b.`id_herbalis`
				 where a.`dihapus` = 'tidak'
				 AND a.`keterangan` = 'pasien online'  
		");
		
	return $this->db->query($sql);
	
	}

	function get_baris($id_pelanggan)
	{
		return $this->db
			->select('id_pelanggan, nrmp, nama, id_herbalis, tgl_kembali, alamat, telp, info_tambahan')
			->where('id_pelanggan', $id_pelanggan)
			->limit(1)
			->get('pj_pelanggan');
	}

	function get_baris2($id_pelanggan)
	{
		$sql = ("
			SELECT 
				`id_pelanggan`,
				`nrmp`,
				`nama`,
				`id_herbalis`,
				`alamat`,
				`telp`,
				`info_tambahan`,
				`keterangan`,
				`tgl_kembali`,
				DATE_FORMAT(`waktu_input`, '%d %b %Y - %H:%i:%s') AS waktu_input 
			FROM 
				`pj_pelanggan`
				where `id_pelanggan`= '".$id_pelanggan."'
				AND `dihapus` = 'tidak'
				AND `keterangan` = 'pasien klinik' 
		");
		
	return $this->db->query($sql);
	
	}

	function get_baris3($id_pelanggan)
	{
		$sql = ("
			SELECT 
				a.`id_pelanggan`,
				a.`nrmp`,
				a.`nama`,
				b.`nama_herbalis`,
				a.`alamat`,
				a.`telp`,
				a.`info_tambahan`,
				a.`sales`,
				a.`keterangan`,
				a.`tgl_kembali`,
				DATE_FORMAT(a.`waktu_input`, '%d %b %Y - %H:%i:%s') AS waktu_input 
			FROM 
				`pj_pelanggan` AS a 
				LEFT JOIN `pj_herbalis` AS b ON a.`id_herbalis` = b.`id_herbalis`
				where a.`id_pelanggan`= '".$id_pelanggan."'
				AND a.`dihapus` = 'tidak'
				AND a.`keterangan` = 'pasien online' 
		");
		
	return $this->db->query($sql);
	
	}

	function fetch_data_pelanggan($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "
			SELECT 
				(@row:=@row+1) AS nomor, 
				a.`id_pelanggan`, 
				a.`nrmp`, 
				a.`nama`, 
				a.`id_herbalis`, 
				DATE_FORMAT(a.`tgl_kembali`, '%d %M %Y') AS tgl_kembali, 
				a.`alamat`,
				a.`telp`,
				a.`info_tambahan`,
				a.`keterangan`,
				DATE_FORMAT(a.`waktu_input`, '%d %b %Y') AS waktu_input 
			FROM 
				`pj_pelanggan` AS a 
				, (SELECT @row := 0) r WHERE 1=1 
				AND a.`dihapus` = 'tidak' 
				AND a.`keterangan` = 'pasien klinik' 
		";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();
		
		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				a.`nama` LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR a.`alamat` LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR a.`telp` LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR a.`info_tambahan` LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR DATE_FORMAT(a.`waktu_input`, '%d %b %Y - %H:%i:%s') LIKE '%".$this->db->escape_like_str($like_value)."%' 
			";
			$sql .= " ) ";
		}
		
		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomor',
			1 => 'a.`nama`',
			2 => 'a.`alamat`',
			3 => 'a.`telp`',
			4 => 'a.`info_tambahan`',
			5 => 'a.`waktu_input`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}

	function fetch_data_pelanggan_online($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "
			SELECT 
				(@row:=@row+1) AS nomor, 
				a.`id_pelanggan`,
				a.`nrmp`,
				a.`nama`, 
				a.`alamat`,
				DATE_FORMAT(a.`tgl_kembali`, '%d %M %Y') AS tgl_kembali,
				a.`telp`,
				a.`info_tambahan`,
				a.`keterangan`,
				DATE_FORMAT(a.`waktu_input`, '%d %b %Y') AS waktu_input 
			FROM 
				`pj_pelanggan` AS a 
				, (SELECT @row := 0) r WHERE 1=1 
				AND a.`dihapus` = 'tidak' 
				AND a.`keterangan` = 'pasien online' 
		";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();
		
		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				a.`nama` LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR a.`alamat` LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR a.`telp` LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR a.`info_tambahan` LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR DATE_FORMAT(a.`waktu_input`, '%d %b %Y - %H:%i:%s') LIKE '%".$this->db->escape_like_str($like_value)."%' 
			";
			$sql .= " ) ";
		}
		
		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomor',
			1 => 'a.`nama`',
			2 => 'a.`alamat`',
			3 => 'a.`telp`',
			4 => 'a.`info_tambahan`',
			5 => 'a.`waktu_input`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}

	function tambah_pelanggan($nrmp, $nama, $alamat, $telepon, $info, $unique, $herbalis, $tgl_kembali)
	{
		date_default_timezone_set("Asia/Jakarta");
		$dt = array(
			'nrmp' => $nrmp,
			'nama' => $nama,
			'id_herbalis' => $herbalis,
			'alamat' => $alamat,
			'telp' => $telepon,
			'info_tambahan' => $info,
			'waktu_input' => date('Y-m-d H:i:s'),
			'dihapus' => 'tidak',
			'kode_unik' => $unique,
			'tgl_kembali' =>$tgl_kembali,
			'keterangan' => 'pasien klinik'
			 /*date('d F Y', strtotime($tgl_kembali))*/
		);

		return $this->db->insert('pj_pelanggan', $dt);
	}

	function tambah_pelanggan_online($nrmp, $nama, $tgl_kembali, $alamat, $telepon, $info, $unique)
	{
		date_default_timezone_set("Asia/Jakarta");

		$dt = array(
			'nrmp' => $nrmp,
			'nama' => $nama,
			'alamat' => $alamat,
			'telp' => $telepon,
			'info_tambahan' => $info,
			'waktu_input' => date('Y-m-d H:i:s'),
			'dihapus' => 'tidak',
			'kode_unik' => $unique,
			'tgl_kembali' =>$tgl_kembali,
			'keterangan' => 'pasien online'
		);

		return $this->db->insert('pj_pelanggan', $dt);
	}
    
    function update_pelanggan($id_pelanggan, $nrmp, $nama, $herbalis, $tgl_kembali, $info)
	{
		$dt = array(
			'nrmp' => $nrmp,
			'nama' => $nama,
			'id_herbalis' => $herbalis,
			'tgl_kembali' => $tgl_kembali,
			'info_tambahan' => $info
		);

		return $this->db
			->where('id_pelanggan', $id_pelanggan)
			->update('pj_pelanggan', $dt);
	}
    
	function update_pelanggan2($id_pelanggan, $nrmp, $tgl_kembali, $nama, $alamat, $telepon, $info)
	{
		$dt = array(
			'nrmp' => $nrmp,
			'nama' => $nama,
			'alamat' => $alamat,
			'tgl_kembali' => $tgl_kembali,
			'telp' => $telepon,
			'info_tambahan' => $info
		);

		return $this->db
			->where('id_pelanggan', $id_pelanggan)
			->update('pj_pelanggan', $dt);
	}

	function hapus_pelanggan($id_pelanggan)
	{
		$dt = array(
			'dihapus' => 'ya'
		);

		return $this->db
			->where('id_pelanggan', $id_pelanggan)
			->update('pj_pelanggan', $dt);
	}

	function get_dari_kode($kode_unik)
	{
		return $this->db
			->select('id_pelanggan')
			->where('kode_unik', $kode_unik)
			->limit(1)
			->get('pj_pelanggan');
	}


	/*================== HERBALIS ===================*/
	function get_all_herbalis()
	{
		return $this->db
			->select('id_herbalis, nama, nama_herbalis')
			->order_by('nama_herbalis','asc')
			->get('pj_herbalis');
	}

	function get_all_sales()
	{
		return $this->db
			->select('id_sales, nama_sales')
			->order_by('nama_sales','asc')
			->get('pj_sales');
	}
}