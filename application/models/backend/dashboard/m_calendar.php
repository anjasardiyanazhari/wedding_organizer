
<?php

class m_calendar extends CI_Model
{
    function fetch_all_event()
    {
        $this->db->order_by('id_header_transaksi');
        return $this->db->get('tbl_header_transaksi');
    }

    function delete_event($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('events');
    }
}

?>