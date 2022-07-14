<?php

defined('BASEPATH') or exit('No direct script access allowed');

class faktur extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    function insertHeader($data)
    {
        return $this->db->insert('header_faktur', $data);
    }

    function insertDetail($data)
    {
        return $this->db->insert('detail_faktur', $data);
    }

    function checkFaktur($noFaktur)
    {
        return $this->db->get_where('header_faktur', array('no_faktur' => $noFaktur));
    }


    function getAllFakturUnExported($tahunPajak, $masaPajak, $suplier)
    {
        $this->datatables->select('no_faktur, fm, kdjstrx, fg_pengganti, masa_pajak, tahun_pajak, tgl_faktur, npwp, nama_pbf, alamat_lengkap, dpp, ppn, ppnbm, is_creditable, diskon, harga_jual, nama, npwp_rs, alamat, tgl, exported, inserted_at');
        $this->datatables->from('header_faktur');

        if ($tahunPajak != 'null') {
            $this->datatables->where('tahun_pajak', $tahunPajak);
        }

        if ($masaPajak != 'null') {
            $this->datatables->where('masa_pajak', $masaPajak);
        }

        if ($suplier != 'null') {
            $this->datatables->where('nama_pbf', $suplier);
        }

        $this->datatables->where('exported', 0);

        return $this->datatables->generate();
    }

    function getAllFakturExported($tahunPajak, $masaPajak, $suplier)
    {
        $this->datatables->select('no_faktur, fm, kdjstrx, fg_pengganti, masa_pajak, tahun_pajak, tgl_faktur, npwp, nama_pbf, alamat_lengkap, dpp, ppn, ppnbm, is_creditable, diskon, harga_jual, nama, npwp_rs, alamat, tgl, exported, inserted_at');
        $this->datatables->from('header_faktur');

        if ($tahunPajak != 'null') {
            $this->datatables->where('tahun_pajak', $tahunPajak);
        }

        if ($masaPajak != 'null') {
            $this->datatables->where('masa_pajak', $masaPajak);
        }

        if ($suplier != 'null') {
            $this->datatables->where('nama_pbf', $suplier);
        }

        $this->datatables->where('exported', 1);

        return $this->datatables->generate();
    }


    function getAllFakturByDate($inserted_at)
    {
        $this->datatables->select('no_faktur, fm, kdjstrx, fg_pengganti, masa_pajak, tahun_pajak, tgl_faktur, npwp, nama_pbf, alamat_lengkap, dpp, ppn, ppnbm, is_creditable, diskon, harga_jual, nama, npwp_rs, alamat, tgl, exported, inserted_at');
        $this->datatables->from('header_faktur');

        $this->datatables->where('inserted_at', $inserted_at);

        return $this->datatables->generate();
    }


    function getDataToExport($inserted_at)
    {
        return $this->db->get_where('header_faktur', array('inserted_at' => $inserted_at))->result();
    }

    function getDataToExportSpecial($tahun, $massa, $pbf, $exported)
    {
        if ($tahun != 'null') {
            $this->db->where('tahun_pajak', trim($tahun));
        }

        if ($massa != 'null') {
            $this->db->where('masa_pajak', $massa);
        }

        if ($pbf != 'null') {
            // $this->db->where('nama_pbf', str_replace('%20', ' ', $pbf));
            $this->db->where('nama_pbf', urldecode($pbf));
        }

        $this->db->where('exported', $exported);

        return $this->db->get('header_faktur')->result();
    }
}
                        
/* End of file faktur.php */
