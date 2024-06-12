<?php

include_once 'lib/database.php';

abstract class User {

    private $db;

    abstract public function allGuest();

    public function getDb() {
        return $this->db;
    }

    public function __construct()
    {
        $this->db = new Database();
    }

    public function showGuest(){
        $query = "SELECT * FROM tbl_pengunjung ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }
}

class Guest extends User{

    public function addGuest($data, $file){
        $name = $data['nama'];
        $tujuan = $data['tujuan'];
        $nohp = $data['nohp'];
        $alamat = $data['alamat'];

        if (empty($name) || empty($tujuan) || empty($nohp) || empty($alamat)) {
            $msg = "Data TIDAK BOLEH Kosong";
            return $msg;
        }else {
            $query = "INSERT INTO `tbl_pengunjung`(`nama`, `tujuan`, `nohp`, `alamat`) VALUES ('$name', '$tujuan', '$nohp', '$alamat')";

            $result = $this->getDb()->insert($query);

            if ($result){
                $msg = "Data BERHASIL Dimasukkan";
                return $msg;
            }else {
                $msg = "Data GAGAL Dimasukkan, Silahkan coba lagi";
                return $msg;
            }
        }
    }

    public function allGuest(){
        $result = $this->showGuest();
        return $result;
    }

    public function getGstById($id) {
        $query = "SELECT * FROM tbl_pengunjung WHERE id = '$id'";
        $result = $this->getDb()->select($query);
        return $result;
    }

        // Update Guest
    public function updateGuest($data, $file, $id) {
        $name = $data['nama'];
        $tujuan = $data['tujuan'];
        $nohp = $data['nohp'];
        $alamat = $data['alamat'];

        if (empty($name) || empty($tujuan) || empty($nohp) || empty($alamat)) {
            $msg = "Data TIDAK BOLEH Kosong";
            return $msg;
        }else {
            $query = "UPDATE tbl_pengunjung SET nama='$name', tujuan='$tujuan', nohp='$nohp', alamat='$alamat' WHERE id = '$id'";

            $result = $this->getDb()->insert($query);

            if ($result){
                $msg = "Data BERHASIL Diperbaharui";
                return $msg;
            }else {
                $msg = "Data GAGAL Diperbarui, Silahkan coba lagi";
                return $msg;
            }
        }
    }

        // Delete Guest
    public function delGuest($id) {
        $del_query = "DELETE FROM tbl_pengunjung WHERE id = '$id'";
        $del = $this->getDb()->delete($del_query);
        if ($del){
            $msg = "Data BERHASIL Dihapus";
            return $msg;
        }else {
            $msg = "Data GAGAL Dihapus, Silahkan coba lagi";
            return $msg;
        }
    }

}

?> 