<?php
    require_once("../controller/koneksi_alamat.php");
    switch ($_GET['jenis']){
        case 'kota':
        $id_provinsi = $_POST['id_provinsi'];
        if($id_provinsi == ''){
            exit;
        }else{
            $query = mysqli_query($conn_alamat,"SELECT * FROM regencies WHERE province_id ='$id_provinsi' ORDER BY name ASC") or die ('Query Gagal');
            while($data = mysqli_fetch_array($query)){
                echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
            }
            exit;
        }
        break;

        case 'kecamatan':
        $id_kota = $_POST['id_kota'];
        if($id_kota == ''){
            exit;
        }else{
            $query = mysqli_query($conn_alamat,"SELECT * FROM districts WHERE regency_id ='$id_kota' ORDER BY name ASC") or die ('Query Gagal');
            while($data = mysqli_fetch_array($query)){
                echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
            }
            exit;
        }
        break;

        
        case 'kelurahan':
            $id_kecamatan = $_POST['id_kecamatan'];
            if($id_kecamatan == ''){
                exit;
            }else{
                $query = mysqli_query($conn_alamat,"SELECT * FROM villages WHERE district_id ='$id_kecamatan' ORDER BY name ASC") or die ('Query Gagal');
                while($data = mysqli_fetch_array($query)){
                    echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
                }
                exit;
            }
            break;
    }
?>