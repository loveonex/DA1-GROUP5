<?php
$website = "http://localhost/ASM_DU_AN";
$url_root = "/ASM_DU_AN";
$url_admin = $url_root . "/admin/";
$url_images = $url_root . "/images/";

$image_path = $_SERVER['DOCUMENT_ROOT'] . $url_images;

function save_file($name, $address){
    $image = $_FILES[$name];
    $fileName = $image['name'];
    $part = $address . $fileName;
    move_uploaded_file($image['tmp_name'], $part);
}

function getConnection(){
    $dbHost = "mysql:host=localhost;dbname=asm_du_an";
    $dbName = 'root';
    $dbPass ='';
    $connection = new PDO($dbHost, $dbName, $dbPass);
    return $connection;
}

function execute($sql){
    $args = array_slice(func_get_args(), 1);
    try {
        $conn = getConnection();
        $statement = $conn->prepare($sql);
        $statement->execute($args);
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}

function query($sql){
    try {
        $conn = getConnection();
        $statement = $conn->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}

function query_one($sql){
    $args = array_slice(func_get_args(), 1);
    try {
        $conn = getConnection();
        $statement = $conn->prepare($sql);
        $statement->execute($args);
        return $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}
?>