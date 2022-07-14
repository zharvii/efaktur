<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->model('faktur');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->load->view('page/dashboard');
    }

    function qrScan()
    {
        $this->load->view('template/page/header');
        $this->load->view('page/scan');
        $this->load->view('template/page/footer');
    }

    function scan()
    {
        $url = $this->input->post('data');
        $xml = file_get_contents($url);
        $data = new SimpleXMLElement($xml);
        $json = json_encode($data);
        header('Content-Type: application/json');
        echo $json;
    }

    function checkNoFaktur()
    {
        $param = $this->input->post('nofaktur');
        $count = $this->faktur->checkFaktur($param);
        if ($count->num_rows() > 0) {
            $this->output->set_output('500');
        } else {
            $this->output->set_output('200');
        }
    }

    function insertFaktur()
    {
        $url = $this->input->post('data');
        $type = $this->input->post('state');
        $xml = file_get_contents($url);
        $data = new SimpleXMLElement($xml);
        $json = json_encode($data);

        $diskon = $this->input->post('diskon');
        $total = $this->input->post('total');

        $array = json_decode($json, TRUE);

        $tglExplode = explode('/', $array['tanggalFaktur']);

        $masaPajak = (int) $tglExplode[1];

        $date = str_replace('/', '-', $array['tanggalFaktur']);
        $newDate = date("Y-m-d", strtotime($date));

        $inserted_at = date("Y-m-d");

        if ($type == "multiAssoc") {

            $header = array(
                'no_faktur'         => $array['nomorFaktur'],
                'fm'                => 'FM',
                'kdjstrx'           => $array['kdJenisTransaksi'],
                'fg_pengganti'      => $array['fgPengganti'],
                'masa_pajak'        => (string) $masaPajak,
                'tahun_pajak'       => $tglExplode[2],
                'tgl_faktur'        => $array['tanggalFaktur'],
                'npwp'              => $array['npwpPenjual'],
                'nama_pbf'          => $array['namaPenjual'],
                'alamat_lengkap'    => $array['alamatPenjual'],
                'dpp'               => $array['jumlahDpp'],
                'ppn'               => $array['jumlahPpn'],
                'ppnbm'             => $array['jumlahPpnBm'],
                'is_creditable'     => '1',
                'diskon'            => $diskon,
                'harga_jual'        => $total,
                'nama'              => $array['namaLawanTransaksi'],
                'npwp_rs'           => $array['npwpLawanTransaksi'],
                'alamat'            => $array['alamatLawanTransaksi'],
                'tgl'               => $newDate,
                'exported'          => 0,
                'inserted_at'       => $inserted_at
            );

            if ($this->faktur->insertHeader($header)) {
                for ($x = 0; $x < count($array['detailTransaksi']); $x++) {

                    $detail = array(
                        'no_faktur'         => $array['nomorFaktur'],
                        'diskon'            => $array['detailTransaksi'][$x]['diskon'],
                        'dpp'               => $array['detailTransaksi'][$x]['dpp'],
                        'hargaSatuan'       => $array['detailTransaksi'][$x]['hargaSatuan'],
                        'hargaTotal'        => $array['detailTransaksi'][$x]['hargaTotal'],
                        'jumlahBarang'      => $array['detailTransaksi'][$x]['jumlahBarang'],
                        'nama'              => $array['detailTransaksi'][$x]['nama'],
                        'ppn'               => $array['detailTransaksi'][$x]['ppn'],
                        'ppnbm'             => $array['detailTransaksi'][$x]['ppnbm'],
                        'tarifPpnbm'        => $array['detailTransaksi'][$x]['tarifPpnbm']
                    );
                    $this->faktur->insertDetail($detail);
                }
                echo 'SUCCESS';
            } else {
                echo 'FAILED';
            }
        } else if ($type == "singleAssoc") {
            $header = array(
                'no_faktur'         => $array['nomorFaktur'],
                'fm'                => 'FM',
                'kdjstrx'           => $array['kdJenisTransaksi'],
                'fg_pengganti'      => $array['fgPengganti'],
                'masa_pajak'        => (string) $masaPajak,
                'tahun_pajak'       => $tglExplode[2],
                'tgl_faktur'        => $array['tanggalFaktur'],
                'npwp'              => $array['npwpPenjual'],
                'nama_pbf'          => $array['namaPenjual'],
                'alamat_lengkap'    => $array['alamatPenjual'],
                'dpp'               => $array['jumlahDpp'],
                'ppn'               => $array['jumlahPpn'],
                'ppnbm'             => $array['jumlahPpnBm'],
                'is_creditable'     => '1',
                'diskon'            => $array['detailTransaksi']['diskon'],
                'harga_jual'        => $array['detailTransaksi']['hargaTotal'],
                'nama'              => $array['namaLawanTransaksi'],
                'npwp_rs'           => $array['npwpLawanTransaksi'],
                'alamat'            => $array['alamatLawanTransaksi'],
                'tgl'               => $newDate,
                'exported'          => 0,
                'inserted_at'       => $inserted_at
            );

            if ($this->faktur->insertHeader($header)) {
                $detail = array(
                    'no_faktur'         => $array['nomorFaktur'],
                    'dpp'               => $array['detailTransaksi']['dpp'],
                    'diskon'            => $array['detailTransaksi']['diskon'],
                    'hargaSatuan'       => $array['detailTransaksi']['hargaSatuan'],
                    'hargaTotal'        => $array['detailTransaksi']['hargaTotal'],
                    'jumlahBarang'      => $array['detailTransaksi']['jumlahBarang'],
                    'nama'              => $array['detailTransaksi']['nama'],
                    'ppn'               => $array['detailTransaksi']['ppn'],
                    'ppnbm'             => $array['detailTransaksi']['ppnbm'],
                    'tarifPpnbm'        => $array['detailTransaksi']['tarifPpnbm']
                );
                $this->faktur->insertDetail($detail);
                echo 'SUCCESS';
            } else {
                echo 'FAILED';
            }
        }
    }

    function ManagelistView()
    {
        $this->load->view('page/ManageFaktur');
    }

    function ExportFaktur()
    {
        $this->load->view('page/ExportFaktur');
    }

    function DetailFaktur()
    {
        $data['nofaktur'] = $this->input->get('param');
        $this->load->view('page/DetailFaktur', $data);
    }

    function getAllFakturNonExported()
    {
        $tahunPajak = $this->input->post('tahun');
        $masaPajak = $this->input->post('massa');
        $suplier = $this->input->post('suplier');
        header('Content-Type: application/json');
        echo $this->faktur->getAllFakturUnExported($tahunPajak, $masaPajak, $suplier);
    }

    function getAllFakturExported()
    {
        $tahunPajak = $this->input->post('tahun');
        $masaPajak = $this->input->post('massa');
        $suplier = $this->input->post('suplier');
        header('Content-Type: application/json');
        echo $this->faktur->getAllFakturExported($tahunPajak, $masaPajak, $suplier);
    }


    function getAllByDate()
    {
        $inserted_at = $this->input->post('inserted_at');

        header('Content-Type: application/json');
        echo $this->faktur->getAllFakturByDate($inserted_at);
    }


    function export()
    {
        $exported = array('exported' => '1');
        $tgl = $this->input->get('tgl');
        $filename = 'Faktur' . '(' . $tgl . ')' . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        $faktur = $this->faktur->getDataToExport($tgl);

        $file = fopen('php://output', 'w');

        $header = array('FM,"KD_JENIS_TRANSAKSI","FG_PENGGANTI","NOMOR_FAKTUR","MASA_PAJAK","TAHUN_PAJAK","TANGGAL_FAKTUR","NPWP","NAMA","ALAMAT_LENGKAP","JUMLAH_DPP","JUMLAH_PPN","JUMLAH_PPNBM","IS_CREDITABLE"');
        fputcsv($file, $header);
        foreach ($faktur as $line) {
            $da = array($line->fm, $line->kdjstrx, $line->fg_pengganti, $line->no_faktur, $line->masa_pajak, $line->tahun_pajak, $line->tgl_faktur, $line->npwp, $line->nama_pbf, str_replace(',', '.', $line->alamat_lengkap), $line->dpp, $line->ppn, $line->ppnbm, $line->is_creditable);
            fputcsv($file, array(implode(',', $da)));
            $this->db->update('header_faktur', $exported, array('no_faktur' => $line->no_faktur));
        }
        fclose($file);
        exit;
    }




    function exportFilter()
    {
        $exported = array('exported' => '1');
        $tahun = $this->uri->segment(3);
        $massa = $this->uri->segment(4);
        $pbf = $this->uri->segment(5);
        $export = $this->uri->segment(6);

        $tgl = date("Y-m-d");
        $filename = 'FakturExport' . '(' . $tgl . ')' . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        $faktur = $this->faktur->getDataToExportSpecial($tahun, $massa, $pbf, $export);

        $file = fopen('php://output', 'w');

        $header = array('FM,"KD_JENIS_TRANSAKSI","FG_PENGGANTI","NOMOR_FAKTUR","MASA_PAJAK","TAHUN_PAJAK","TANGGAL_FAKTUR","NPWP","NAMA","ALAMAT_LENGKAP","JUMLAH_DPP","JUMLAH_PPN","JUMLAH_PPNBM","IS_CREDITABLE"');
        fputcsv($file, $header);
        foreach ($faktur as $line) {
            $da = array($line->fm, $line->kdjstrx, $line->fg_pengganti, $line->no_faktur, $line->masa_pajak, $line->tahun_pajak, $line->tgl_faktur, $line->npwp, $line->nama_pbf, str_replace(',', '.', $line->alamat_lengkap), $line->dpp, $line->ppn, $line->ppnbm, $line->is_creditable);
            fputcsv($file, array(implode(',', $da)));
            $this->db->update('header_faktur', $exported, array('no_faktur' => $line->no_faktur));
        }
        fclose($file);
        exit;
    }
}
