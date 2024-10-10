<?php 

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Dosen';
        $data['dosen'] = $this->Dosen_model->getAllDosen(); // Changed getALLDosen to getAllDosen
        if ($this->input->post('keyword')) {
            $data['dosen'] = $this->Dosen_model->cariDataDosen();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('dosen/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|is_unique[Dosen.nip]');
        $this->form_validation->set_rules('namadosen', 'namaDosen', 'required|is_unique[Dosen.namadosen]');
        if ($this->form_validation->run() == false) { 
            $this->load->view('templates/header', $data);
            $this->load->view('dosen/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Dosen_model->tambahDataDosen();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('dosen');
        }
    }

    public function ubah()
    {
        $data['judul'] = 'Form Ubah Data Dosen';
        $this->form_validation->set_rules('nip', 'NIP', 'required|is_unique[Dosen.nip]');
        $this->form_validation->set_rules('namadosen', 'NamaDosen', 'required|is_unique[Dosen.namadosen]');
        
        if ($this->form_validation->run() == false) { 
            $this->load->view('templates/header', $data);
            $this->load->view('dosen/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Dosen_model->ubahDataDosen();
            $this->session->set_flashdata('flash', 'diubah'); // Corrected flash message
            redirect('dosen'); // Only one redirect statement
        }
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Dosen';
        $data['dosen'] = $this->Dosen_model->getDosenById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('dosen/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->Dosen_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('dosen');
    }
}