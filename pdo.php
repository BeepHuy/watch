<?php
    // MỞ KẾT NỐI
    function connection(){
        $user = 'root';
        $pass = '';
        $conn = new PDO('mysql:host=localhost;dbname=watch', $user, $pass);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }

    // THỰC HIỆN CÂU LỆNH THÊM, SỬA, XOÁ
    function execute($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
        }catch(PDOException $e){
            throw $e;
        }finally{
            unset($conn);
        }
    }

    // TRUY VẤN NHIỀU BẢN GHI
    function query_all($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
            $rows = $stmt -> fetchAll();
            return $rows;
        }catch(PDOException $e){
            throw $e;
        }finally{
            unset($conn);
        }
    }
   
    // TRUY VẤN MỘT BẢN GHI
    function query_one($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
            $row = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }catch(PDOException $e){
            throw $e;
        }finally{
            unset($conn);
        }
    }
    
    // TRUY VẤN MỘT GIÁ TRỊ
    function query_value($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
            $row = $stmt -> fetch(PDO::FETCH_ASSOC);
            return array_values($row)[0];
        }catch(PDOException $e){
            throw $e;
        }finally{
            unset($conn);
        }
    }
    
?>