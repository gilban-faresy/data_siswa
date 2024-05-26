<?php
session_start();

if (!isset($_GET['edit'])) {
    header('Location: datasiswa.php');
    exit;
}

$key = $_GET['edit'];

$data = $_SESSION['dataStudent'][$key];

// validasi data yang di-update
if (isset($_POST['update'])) {
    if (!empty($_POST['nama']) && !empty($_POST['nis']) && !empty($_POST['rayon'])) {
        $_SESSION['dataStudent'][$key] = [
            'nama' => $_POST['nama'],
            'nis' => $_POST['nis'],
            'rayon' => $_POST['rayon']
        ];
        header('Location: datasiswa.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT FORM</title>
    <style>

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
}

td {
    padding: 10px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

button a {
    text-decoration: none;
    color: white;
}

button {
    background-color: #f44336;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #e41e1e;
}

table tr:last-child td {
    text-align: right;
}

</style>
</head>
<body>
<form method="post" action="">
    <table align="center">
        <tr>
            <td><label for="nama">Nama</label></td>
            <td><input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required></td>
        </tr>
        <tr>
            <td><label for="nis">NIS</label></td>
            <td><input type="number" id="nis" name="nis" value="<?php echo $data['nis']; ?>" required></td>
        </tr>
        <tr>
            <td><label for="rayon">Rayon</label></td>
            <td><input type="text" id="rayon" name="rayon" value="<?php echo $data['rayon']; ?>" required></td>
        </tr>
        <tr>
            <td><input type="submit" name="update" value="Update"></td>
            <td><button><a href="datasiswa.php">Cancel</a></button></td>
        </tr>
    </table>
</form>
</body>
</html>
