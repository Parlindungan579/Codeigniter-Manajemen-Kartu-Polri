<?php

class MkpModel extends CI_Model
{

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function insert_batch($table = null, $data = array())
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->insert_batch($table, $data);
        }
    }

    public function cek_login()
    {
        $user_id        = set_value('user_id');
        $password       = set_value('password');

        $result         = $this->db->where('user_id', $user_id)
            ->where('password', md5($password))
            ->limit(1)
            ->get('user');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    public function cek_nrp()
    {
        $nrp            = set_value('jenis_request');
        $result         = $this->db->where('jenis_request', $nrp)
            ->limit(1)
            ->get('master');
        if (($result->num_rows() > 0)) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    public function cek_isPati()
    {
        $check  = set_value('isPati');
        $query  = $this->db->where('isPati="1"', $check)
            ->get('master');
        $total = $query->num_rows();
        return $total;
    }

    public function buatSuratAksi()
    {
        $check  = set_value('isPati');
        $result         = $this->db->where('isPati="0"', $check)
            ->limit(1)
            ->get('master');
        if (($result->num_rows() > 0)) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    public function update($data, $id)
    {
        $query = $this->db->update("master", $data, $id);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }


    function insert_csv($data)
    {
        $this->db->insert('master', $data);
    }

    public function all_personel()
    {
        $fetch_data = $this->db->select()
            ->from('master')
            ->get();
        if ($fetch_data->num_rows() > 0) {
            return $fetch_data->result();
        } else {
            return $fetch_data->result();
        }
    }

    public function detailPersonel($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('master');
        return $query->result();
    }
}
