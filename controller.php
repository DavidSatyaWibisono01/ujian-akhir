<?php

    $conn = mysqli_connect("localhost", "root", "", "s6c_475");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $kotak = [];
        while( $box = mysqli_fetch_assoc($result) ){
            $kotak[] = $box;
        }
        return $kotak;
    }


    function input($data){
            global $conn;
            $id_pelanggan = $data['id_pelanggan'];
            $nama = htmlspecialchars($data["nama"]);
            $alamat = htmlspecialchars($data["alamat"]);
            $no_telp = htmlspecialchars($data["no_telp"]);
        
            $query = "INSERT INTO tbl_pelanggan (id_pelanggan, Nama, Alamat, no_telp)
                            VALUES 
                    ('$id_pelanggan', '$nama', '$alamat', '$no_telp')";
        
            mysqli_query($conn, $query);

            return mysqli_affected_rows($conn);
    }

    function delete($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM tbl_pelanggan WHERE id_pelanggan = $id");

        return mysqli_affected_rows($conn);
    }

    function update($data){
        global $conn;
        $id_pelanggan = $data["id_pelanggan"];
        $nama = htmlspecialchars($data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $no_telp = htmlspecialchars($data["no_telp"]);

        $query = "UPDATE tbl_pelanggan SET
                    nama = '$nama',
                    alamat = '$alamat',
                    no_telp = '$no_telp'
                WHERE id_pelanggan = $id_pelanggan
        ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
?>