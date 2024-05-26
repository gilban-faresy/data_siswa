<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            max-width: 650px;
            margin: auto;
        }
        table {
            width: 100%;
        }
        td {
            padding: 10px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="number"], select {
            width: calc(100% - 16px);
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"], button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button a {
            color: white;
            text-decoration: none;
        }
        button {
            background-color: #6c757d;
        }
        hr {
            border: 1px solid #ccc;
        }
        .record {
            background-color: #ffffff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .record a {
            border-radius: 4px;
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            margin-right: 10px;
        }
        .aedit{
            background-color:#45a049
        }
        .aedit1{
            background-color: #f44336;
        }
    </style>
</head>
<body>

<form method="post" action="">
<h2 style="text-align:center">data Siswa</h2>
    <table>
        <tr>
            <td><label for="nama">Nama</label></td>
            <td><input type="text" id="nama" name="nama" required></td>
        </tr>
        <tr>
            <td><label for="nis">NIS</label></td>
            <td><input type="number" id="nis" name="nis" required></td>
        </tr>
        <tr>
            <td><label for="rayon">Rayon</label></td>
            <td><input type="text" id="rayon" name="rayon" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="kirim" value="Tambah">
                <button><a href="hapus.php">Reset</a></button>
            </td>
        </tr>
    </table>
</form>

<?php 
session_start();

if (!isset($_SESSION['dataStudent'])) {
    $_SESSION['dataStudent'] = array();
}

if(isset($_POST['kirim'])){
    if(!empty($_POST['nama']) && !empty($_POST['nis']) && !empty($_POST['rayon'])){
        $data = [
            'nama' => $_POST['nama'],
            'nis' => $_POST['nis'],
            'rayon' => $_POST['rayon']
        ];
        array_push($_SESSION['dataStudent'], $data);
        header('Location:' . $_SERVER['PHP_SELF']);
        exit;
    }
}

if(isset($_GET['hapus'])){
    $key = $_GET['hapus'];
    unset($_SESSION['dataStudent'][$key]);
    header("Location: datasiswa.php");
    exit;
}

if(!empty($_SESSION['dataStudent'])){
    foreach($_SESSION['dataStudent'] as $key => $value){
        echo '<div class="record">';
        echo "Nama: " . $value['nama'] . "<br>";
        echo "NIS: " . $value['nis'] . "<br>";
        echo "Rayon: " . $value['rayon'] . "<br><br>";
        echo '<a class="aedit1"href="?hapus=' . $key . '">HAPUS</a>';
        echo '<a class="aedit"href="edit.php?edit=' . $key . '">EDIT</a>';
        echo '</div>';
    }
}
?>
</body>
</html>
