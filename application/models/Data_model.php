<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get Account By Account Name And Account Password For Login
	 * @param  [type] $account_name     [description]
	 * @param  [type] $account_password [description]
	 * @return [type]                   [description]
	 */
	function login($id_user,$password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where("(id_user = '$id_user' OR email = '$id_user')");
		$this->db->where('password', $password);
		return $this->db->get();
	}

	/**
	 * [insert_user description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	function insert_user($data)
	{
		return $this->db->insert('user',$data);
	}

	function get_new_katalog()
	{
		return $this->db->query("(SELECT
							id_ruangan AS id,
							nama_ruangan AS nama,
							deskripsi_ruangan AS deskripsi,
							satuan_ruangan AS satuan,
							harga_ruangan AS harga,
							kapasitas_ruangan AS kapasitas,
							gambar_ruangan_1 AS gambar,
							gambar_ruangan_2 AS gambar1,
							0 tipe
							FROM ruangan
							ORDER BY id_ruangan DESC)
							UNION ALL
							(
							SELECT
							id_peralatan AS id,
							nama_peralatan AS nama,
							deskripsi_peralatan AS deskripsi,
							satuan_peralatan AS satuan,
							harga_peralatan AS harga,
							stok_peralatan AS kapasitas,
							gambar_peralatan_1 AS gambar,
							gambar_peralatan_2 AS gambar1,
							1 tipe
							FROM peralatan
							ORDER BY id_peralatan DESC
							)
							LIMIT 4");
	}

	function get_all_katalog()
	{
		return $this->db->query("(SELECT
									id_ruangan AS id,
									nama_ruangan AS nama,
									deskripsi_ruangan AS deskripsi,
									satuan_ruangan AS satuan,
									harga_ruangan AS harga,
									kapasitas_ruangan AS kapasitas,
									gambar_ruangan_1 AS gambar,
									gambar_ruangan_2 AS gambar1,
									0 tipe
									FROM ruangan
									ORDER BY id_ruangan DESC)
									UNION ALL
									(
									SELECT
									id_peralatan AS id,
									nama_peralatan AS nama,
									deskripsi_peralatan AS deskripsi,
									satuan_peralatan AS satuan,
									harga_peralatan AS harga,
									stok_peralatan AS kapasitas,
									gambar_peralatan_1 AS gambar,
									gambar_peralatan_2 AS gambar1,
									1 tipe
									FROM peralatan
									ORDER BY id_peralatan DESC
									)
									UNION ALL
									(
									SELECT
									id_paketan AS id,
									nama_paketan AS nama,
									'' AS deksripsi,
									satuan_paketan AS satuan,
									harga_paketan AS harga,
									kapasitas_ruangan AS kapasitas,
									gambar_ruangan_1 AS gambar,
									gambar_ruangan_2 AS gambar1,
									2 AS tipe
									FROM paketan INNER JOIN ruangan ON paketan.id_ruang = ruangan.id_ruangan
									)");
	}

	function get_search_katalog($nama)
	{
		return $this->db->query("(SELECT
									id_ruangan AS id,
									nama_ruangan AS nama,
									deskripsi_ruangan AS deskripsi,
									satuan_ruangan AS satuan,
									harga_ruangan AS harga,
									gambar_ruangan_1 AS gambar,
									gambar_ruangan_2 AS gambar1,
									0 tipe
									FROM ruangan
									WHERE nama_ruangan LIKE '%".$nama."%'
									)
									UNION ALL
									(
									SELECT
									id_peralatan AS id,
									nama_peralatan AS nama,
									deskripsi_peralatan AS deskripsi,
									satuan_peralatan AS satuan,
									harga_peralatan AS harga,
									gambar_peralatan_1 AS gambar,
									gambar_peralatan_2 AS gambar1,
									1 tipe
									FROM peralatan
									WHERE nama_peralatan LIKE '%".$nama."%'
									)
									UNION ALL
									(
									SELECT
									id_paketan AS id,
									nama_paketan AS nama,
									'' AS deksripsi,
									satuan_paketan AS satuan,
									harga_paketan AS harga,
									gambar_ruangan_1 AS gambar,
									gambar_ruangan_2 AS gambar1,
									2 AS tipe
									FROM paketan INNER JOIN ruangan ON paketan.id_ruang = ruangan.id_ruangan
									WHERE nama_paketan LIKE '%".$nama."%'
									)");
	}

	// function get_histori($id_user)
	// {
	// 	return $this->db->query("SELECT
	// 								a.id_penyewaan,
	// 								b.*
	// 								FROM penyewaan AS a LEFT JOIN
	// 								(
	// 									SELECT 
	// 									b.id_penyewaan,
	// 									c.id_ruangan,
	// 									c.gambar_ruangan_1 as gambar,
	// 									c.deskripsi_ruangan
	// 									FROM 
	// 									penyewaan_detail_nonpaketan AS b INNER JOIN ruangan AS c
	// 									ON b.`id_ruangan` = c.`id_ruangan`
	// 									LIMIT 0,1
	// 								) AS b ON a.`id_penyewaan` = b.id_penyewaan WHERE a.`tipe_penyewaan` = 0 AND a.`id_user` = '$id_user'
	// 								UNION ALL
	// 								SELECT
	// 								a.id_penyewaan,
	// 								c.*
	// 								FROM penyewaan AS a LEFT JOIN
	// 								(
	// 									SELECT 
	// 									c.id_penyewaan,
	// 									d.id_ruang,
	// 									e.gambar_ruangan_1 as gambar,
	// 									e.deskripsi_ruangan
	// 									FROM 
	// 									penyewaan_detail_paketan AS c INNER JOIN paketan AS d 
	// 									ON c.`id_paketan` = d.`id_paketan` INNER JOIN ruangan AS e
	// 									ON d.`id_ruang` = e.`id_ruangan`
	// 								) AS c ON a.`id_penyewaan` = c.id_penyewaan WHERE a.`tipe_penyewaan` = 1 AND a.`id_user` = '$id_user'
	// 							");
	// }

	function get_histori($id_user)
	{
		return $this->db->query("SELECT * FROM penyewaan");
	}


	function cek_bukti_pembayaran($id_penyewaan)
	{
		return $this->db->query("SELECT
									a.id_penyewaan
									FROM penyewaan AS a LEFT JOIN pembayaran AS b
									ON a.`id_penyewaan` = b.`id_penyewaan` 
									WHERE b.id_penyewaan = '$id_penyewaan'
								");
	}


	function upload_bukti($data)
	{
		return $this->db->insert('pembayaran',$data);
	}


	function penyewaan($data)
	{
		return $this->db->insert('penyewaan',$data);
	}


	function penyewaan_detail_nonpaketan($data)
	{
		return $this->db->insert('penyewaan_detail_nonpaketan',$data);
	}


	function penyewaan_detail_paketan($data)
	{
		return $this->db->insert('penyewaan_detail_paketan',$data);
	}

    function get_penyewaan()
    {
        $this->db->from('penyewaan');
        return $this->db->get();
    }

    function cek_status_katalog($id, $waktu_pakai, $waktu_selesai)
    {
    	return $this->db->query("SELECT
									b.`id_peralatan` AS id,
									0 AS tipe
									FROM
									penyewaan AS a INNER JOIN
									`penyewaan_detail_nonpaketan` AS b 
									ON a.`id_penyewaan` = b.`id_penyewaan`
									WHERE b.`id_peralatan` = $id AND 
									(
									DATE('$waktu_pakai') BETWEEN DATE(a.`waktu_pakai`) AND DATE(a.`waktu_selesai`)
									OR 
									DATE('$waktu_selesai') BETWEEN DATE(a.`waktu_pakai`) AND DATE(a.`waktu_selesai`) 
									)
									UNION ALL 
									SELECT
									b.`id_ruangan` AS id,
									1 AS tipe
									FROM
									penyewaan AS a INNER JOIN
									`penyewaan_detail_nonpaketan` AS b 
									ON a.`id_penyewaan` = b.`id_penyewaan`
									WHERE b.`id_ruangan` = $id AND 
									(
									DATE('$waktu_pakai') BETWEEN DATE(a.`waktu_pakai`) AND DATE(a.`waktu_selesai`)
									OR 
									DATE('$waktu_selesai') BETWEEN DATE(a.`waktu_pakai`) AND DATE(a.`waktu_selesai`) 
									)
									UNION ALL 
									SELECT
									b.`id_paketan` AS id,
									2 AS tipe
									FROM
									penyewaan AS a INNER JOIN
									`penyewaan_detail_paketan` AS b 
									ON a.`id_penyewaan` = b.`id_penyewaan`
									WHERE b.`id_paketan` = $id AND 
									(
									DATE('$waktu_pakai') BETWEEN DATE(a.`waktu_pakai`) AND DATE(a.`waktu_selesai`)
									OR 
									DATE('$waktu_selesai') BETWEEN DATE(a.`waktu_pakai`) AND DATE(a.`waktu_selesai`) 
									)"
		);
    }

    function delete_penyewaan($id_penyewaan)
    {
		$this->db->where('id_penyewaan',$id_penyewaan);
		return $this->db->delete('penyewaan');
    }
}
