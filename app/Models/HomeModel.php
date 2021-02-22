<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $db;
    function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    function pegawaiFindAll($token = null)
    {
        /* static */
        // $sql = "SELECT * FROM pegawai";
        // $query = $db->query($sql);

        /* builder */
        $builder = $this->db->table('pegawai');
        $token == null ? '' : $builder->where(['Token' => $token]);
        $query = $builder->get();

        $this->db->close();

        return $query;
    }

    function pegawaiSimpan($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $builder = $this->db->table('pegawai');
        $builder->insert($data);
    }

    function pegawaiUpdate($token, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');

        $builder = $this->db->table('pegawai');
        $builder->where('Token', $token);
        $builder->update($data);
    }

    function pegawaiDelete($token)
    {
        $builder = $this->db->table('pegawai');
        $builder->delete(['Token' => $token]);
    }
}
