<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php';

// Pakai alias untuk FPDI
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

class Sertifikat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sertifikat_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['title'] = 'Data Sertifikat';
        $data['sertifikat'] = $this->Sertifikat_model->get_all();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar');
        $this->load->view('content/admin/sertifikat/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah Sertifikat";

        $nama = $this->input->post('nama');
        $stambuk = $this->input->post('stambuk');

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('stambuk', 'Stambuk', 'required');

            if ($this->form_validation->run() === TRUE) {
                $upload_path = FCPATH . 'uploads/pdf/';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0777, true);
                }

                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 2048;
                $config['file_name'] = $nama . '_' . $stambuk;


                $this->upload->initialize($config);

                if (!$this->upload->do_upload('file_pdf')) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];

                    $insert = [
                        'nama' => $nama,
                        'stambuk' => $stambuk,
                        'file_pdf' => $file_name,
                        'status' => '0'
                    ];

                    $this->db->insert('sertifikat', $insert);
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
                    redirect('sertifikat');
                    return;
                }
            }
        }

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar');
        $this->load->view('content/admin/sertifikat/add', $data);
        $this->load->view('layout/footer');
    }

    // public function acc($file_name)
    // {
    //     $this->load->library('pdf');

    //     $source_file = FCPATH . 'uploads/pdf/' . $file_name;
    //     $output_file = FCPATH . 'uploads/pdf/signed_' . $file_name;
    //     $signature_image = FCPATH . 'assets/ttd/ttd.png';

    //     if (!file_exists($source_file)) {
    //         show_error("File PDF tidak ditemukan: $file_name", 404);
    //         return;
    //     }

    //     $this->add_signature_to_pdf($source_file, $output_file, $signature_image);

    //     $public_url = base_url('uploads/pdf/signed_' . $file_name);
    //     echo "Tanda tangan berhasil ditambahkan. <a href='$public_url' target='_blank'>Lihat PDF</a>";
    // }

    // private function add_signature_to_pdf($source_file, $output_file, $signature_image, $x = 150, $y = 250)
    // {
    //     $pdf = new Pdf();

    //     $pageCount = $pdf->setSourceFile($source_file);

    //     for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    //         $tpl = $pdf->importPage($pageNo);
    //         $size = $pdf->getTemplateSize($tpl);

    //         $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
    //         $pdf->useTemplate($tpl);

    //         if ($pageNo == $pageCount) {
    //             $pdf->Image($signature_image, $x, $y, 40);
    //         }
    //     }

    //     $pdf->Output('F', $output_file);
    // }

    // public function edit($id)
    // {
    //     $data['title'] = "Edit Sertifikat";
    //     $data['sertifikat'] = $this->db->get_where('sertifikat', ['id' => $id])->row();

    //     if (!$data['sertifikat']) {
    //         show_404(); // kalau tidak ditemukan
    //     }

    //     if ($this->input->post()) {
    //         $this->form_validation->set_rules('nama', 'Nama', 'required');
    //         $this->form_validation->set_rules('stambuk', 'Stambuk', 'required');

    //         $nama = $this->input->post('nama');
    //         $stambuk = $this->input->post('stambuk');

    //         print_r($data);
    //         die;

    //         if ($this->form_validation->run()) {
    //             $file_name = $data['sertifikat']->file_pdf; // default: file lama

    //             // Upload file baru jika ada
    //             if ($_FILES['file_pdf']['name']) {
    //                 $upload_path = FCPATH . 'uploads/pdf/';
    //                 if (!is_dir($upload_path)) {
    //                     mkdir($upload_path, 0777, true);
    //                 }

    //                 $config['upload_path'] = $upload_path;
    //                 $config['allowed_types'] = 'pdf';
    //                 $config['max_size'] = 2048;

    //                 $this->load->library('upload', $config);

    //                 if ($this->upload->do_upload('file_pdf')) {
    //                     // Hapus file lama
    //                     $old_path = $upload_path . $file_name;
    //                     if (file_exists($old_path)) {
    //                         unlink($old_path);
    //                     }

    //                     $upload_data = $this->upload->data();
    //                     $file_name = $upload_data['file_name'];
    //                 } else {
    //                     $data['upload_error'] = $this->upload->display_errors();
    //                 }
    //             }

    //             $update = [
    //                 'nama' => $this->input->post('nama'),
    //                 'stambuk' => $this->input->post('stambuk'),
    //                 'file_pdf' => $file_name
    //             ];

    //             $this->db->where('id', $id);
    //             $this->db->update('sertifikat', $update);

    //             $this->session->set_flashdata('success', 'Data berhasil diperbarui!');
    //             redirect('sertifikat');
    //         }
    //     }

    //     $this->load->view('layout/header', $data);
    //     $this->load->view('layout/sidebar', $data);
    //     $this->load->view('layout/navbar');
    //     $this->load->view('content/admin/sertifikat/edit', $data);
    //     $this->load->view('layout/footer');
    // }


    public function delete($id)
    {
        $this->db->delete('sertifikat', ['id' => $id]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('sertifikat');
    }

    public function acc_view($file_name)
    {
        $data['file_name'] = $file_name;
        $this->load->view('sertifikat/acc_pdf_view', $data);
    }

    public function save_signature()
    {
        $input = json_decode($this->input->raw_input_stream);

        $file_name = $input->file_name;
        $x = $input->x;
        $y = $input->y;

        $source_file = FCPATH . 'uploads/pdf/' . $file_name;
        $output_file = FCPATH . 'uploads/pdf/signed_' . $file_name;
        $signature_image = FCPATH . 'assets/ttd/ttd.png';

        $this->add_signature_to_pdf($source_file, $output_file, $signature_image, $x, $y);

        echo "Tanda tangan berhasil disimpan di posisi ($x, $y)";
    }


    // Agrh new
    public function generate_pdf()
    {
        $pdf = new Fpdi();

        $file = FCPATH . 'assets/pdf/contoh.pdf';
        $pageCount = $pdf->setSourceFile($file);
        $templateId = $pdf->importPage(1);

        // Ambil ukuran asli
        $size = $pdf->getTemplateSize($templateId);

        // Tambahkan halaman baru dengan ukuran asli PDF
        $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);

        // Tempelkan halaman dan sisipkan tanda tangan
        $pdf->useTemplate($templateId);

        $ttdPath = FCPATH . 'assets/ttd/ttd.png';
        $pdf->Image($ttdPath, $size['width'] - 85, $size['height'] - 50, 15);

        $pdf->Output('I', 'dokumen_dengan_ttd.pdf');
    }
}
