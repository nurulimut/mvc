<?php

class About extends Controller{
    public function index($nama = 'Nurul Hasanah', $pekerjaan = 'Mahasiswa', $umur = 18) 
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About Me'; 
        $this->view('templates/Header', $data);
        $this->view('About/index', $data);
        $this->view('templates/Footer');
    }
    public function Page()
    {
        $data['judul'] = 'Pages';
        $this->view('templates/Header', $data);
        $this->view('About/Page');
        $this->view('templates/Footer');
    }
}