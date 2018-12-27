<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	// Select Query
	function login($account_name,$account_password)
	{
		$this->db->select('*');
		$this->db->from('account');
		$this->db->where('account_name', $account_name);
		$this->db->where('account_password', $account_password);
		$this->db->where('account_role', '0');

		return $this->db->get();
	}
	function select_pengguna()
	{
		$this->db->select('*');
		$this->db->from('user');

		return $this->db->get();
	}
	function select_peralatan()
	{
		$this->db->select('*');
		$this->db->from('peralatan');

		return $this->db->get();
	}
	function select_ruangan()
	{
		$this->db->select('*');
		$this->db->from('ruangan');

		return $this->db->get();
	}
	function select_paketan()
	{
		$this->db->select('*');
		$this->db->from('paketan');

		return $this->db->get();
	}
	function select_penyewaan()
	{
		$this->db->select('*');
		$this->db->from('penyewaan');

		return $this->db->get();
	}


	function select_pembayaran()
	{
		$this->db->select('*');
		$this->db->from('pembayaran');

		return $this->db->get();
	}

	function select_pengguna_get($id_user)
	{
		$this->db->from('user');
		$this->db->where('id_user', $id_user);

		return $this->db->get();
	}
	function select_peralatan_get($id_peralatan)
	{
		$this->db->from('peralatan');
		$this->db->where('id_peralatan', $id_peralatan);

		return $this->db->get();
	}
	function select_paketan_get($id_paketan)
	{
		$this->db->from('paketan');
		$this->db->where('id_paketan', $id_paketan);

		return $this->db->get();
	}
	function select_paketandetail_get($id_paketan)
	{
		$this->db->from('paketan_detail');
		$this->db->where('id_paketan', $id_paketan);

		return $this->db->get();
	}
	function select_ruangan_get($id_ruangan)
	{
		$this->db->from('ruangan');
		$this->db->where('id_ruangan', $id_ruangan);

		return $this->db->get();
	}

	function insert_pengguna($data)
	{
		return $this->db->insert('user',$data);
	}
	function insert_peralatan($data)
	{
		return $this->db->insert('peralatan',$data);
	}
	function insert_paketan($data)
	{
		$this->db->insert('paketan',$data);
		$insert_id = $this->db->insert_id();
   		return  $insert_id;
	}
	function insert_detail_paketan($data)
	{
		return $this->db->insert('paketan_detail',$data);
	}
	function insert_ruangan($data)
	{
		return $this->db->insert('ruangan',$data);
	}

	function delete_pengguna($id_user)
	{
		$this->db->where('id_user',$id_user);
		return $this->db->delete('user');
	}
	function delete_peralatan($id_peralatan)
	{
		$this->db->where('id_peralatan',$id_peralatan);
		return $this->db->delete('peralatan');
	}
	function delete_ruangan($id_ruangan)
	{
		$this->db->where('id_ruangan',$id_ruangan);
		return $this->db->delete('ruangan');
	}
	function delete_paketan($id_paketan)
	{
		$this->db->where('id_paketan',$id_paketan);
		return $this->db->delete('paketan');
	}
	function delete_detailpaketan($id_paketan)
	{
		$this->db->where('id_paketan',$id_paketan);
		return $this->db->delete('paketan_detail');
	}

	function update_pengguna($data,$id_user)
	{
		$this->db->where('id_user',$id_user);
		return $this->db->update('user', $data);
	}
	function update_peralatan($data,$id_peralatan)
	{
		$this->db->where('id_peralatan',$id_peralatan);
		return $this->db->update('peralatan', $data);
	}
	function update_ruangan($data,$id_ruangan)
	{
		$this->db->where('id_ruangan',$id_ruangan);
		return $this->db->update('ruangan', $data);
	}
	function update_paketan($data,$id_paketan)
	{
		$this->db->where('id_paketan',$id_paketan);
		return $this->db->update('paketan', $data);
	}
	function update_status_penyewaan($data,$id_penyewaan)
	{
		$this->db->where('id_penyewaan',$id_penyewaan);
		return $this->db->update('penyewaan', $data);
	}


}
