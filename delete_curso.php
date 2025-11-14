<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if(!isset($_SESSION)){
        session_start();
    }
    if($_SESSION["id"]!=1){
        echo "<script>alert('VOCE NÃO É ADMIN!'); window.location.href='index.php';</script>";
    } else {
        include ("include\conexao.php");
        foreach($_POST as $id){
            $response = $conn->query("SELECT `img_path` FROM `cursos` WHERE id=$id");
            $img = $response->fetch_assoc();
            unlink($img["img_path"]);
            $remove_table = "DROP TABLE `$id`";
            $remove_row = "DELETE FROM `cursos` WHERE id=$id";
            $conn->query($remove_table);
            $conn->query($remove_row);
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
?>