<?php 

/**
 * summary
 */
class Mahasiswa_model extends CI_Model{
	public function getAllMahasiswa()
	{
		// //menggunakan cara pertama
		// $query = $this->db->get('mahasiswa');
		// return &query->result_array();
		// menggunakan cara cepat methode chaining // pemanggilan database
	return $this->db->get('mahasiswa')->result_array();

	}

	public function getAllJurusan()
	{
		return $this->db->get('jurusan')->result_array();
	}

	public function Penelusuran()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('matakuliah', $keyword);
		$this->db->or_like('semester', $keyword);
		$this->db->or_like('jurusan', $keyword);
		return $this->db->get('mahasiswa')->result_array();
	}

	public function ubahDataMahasiswa($id)
	{
		$data = [
			// "nama" => htmlspecialchars($_POST["nama"]), jika tdk mengunakan CI
			// //atau cara lain
		    "kode" => $this->input->post('kode', true),
		    "matakuliah" => $this->input->post('matakuliah', true),
		    "sks" => $this->input->post('sks'),
		    "semester" => $this->input->post('semester', true),
		    "jurusan" => $this->input->post('jurusan', true),
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('mahasiswa', $data);
	}

	public function hapusDataMahasiswa($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('mahasiswa');
	}

}



