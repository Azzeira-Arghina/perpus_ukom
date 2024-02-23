<?php
require('../function.php');
if (isset($_POST['update'])) {
    $Username   = mysqli_real_escape_string($conn, $_POST['username']);
    $Password   = mysqli_real_escape_string($conn, $_POST['password']);
    $Email      = mysqli_real_escape_string($conn, $_POST['email']);
    $Fullname   = mysqli_real_escape_string($conn, $_POST['name']);
    $Alamat      = mysqli_real_escape_string($conn, $_POST['alamat']);
    $Status      = mysqli_real_escape_string($conn, $_POST['status']);

    $encrypt    = md5($Password);
    $result     = mysqli_query($conn, "UPDATE users SET Username = $Username, Password = $Password, Nama_Lengkap = $Nama, Email = $Email, No_Telp = $Telepon, Level = $Level, Blokir = $Blokir");
	// $result = mysqli_query($conn, "UPDATE users SET name='$Name', age='$Age', email='$Email' WHERE id=$ID");

    if(mysqli_query($conn, $result))
    {
        header("Location: ../dash.php?module=user");
    }
}
?>
<?php
$Username = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE username='$Username'");
while ($res = mysqli_fetch_array($result)) {
    $Username   =   $res["Username"];
    $Password   =   $res["Password"];
    $Nama       =   $res["Nama_Lengkap"];
    $Email      =   $res["Email"];
    $Telepon    =   $res["No_Telp"];
    $Level      =   $res["Level"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>EDIT DATA MAHASISWA</title>
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center pb-5">UPDATE DATA USER</h1>
        <form action="update.php" method="post">
            <div class="row mb-3">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-4">
                    <input type="text" name="username" class="form-control" value="<?php echo $Username; ?>" id="username">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-4">
                    <input type="text" name="password" class="form-control" value="<?php echo $Password; ?>" id="password">
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-4">
                    <input type="text" name="nama" class="form-control" value="<?php echo $Nama; ?>" id="nama">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-4">
                    <input type="text" name="email" class="form-control" value="<?php echo $Email; ?>" id="email">
                </div>
            </div>
            <div class="row mb-3">
                <label for="tlp" class="col-sm-2 col-form-label">Nomor Hp</label>
                <div class="col-sm-4">
                    <input type="text" name="tlp" class="form-control" value="<?php echo $Telepon; ?>" id="tlp">
                </div>
            </div>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Level</legend>
                <div class="col-sm-10">
                    <div class="form-check">

                        <?php
                            // echo "<input type='radio' name='level' value='Admin' " . ($res['level'] == 'Admin' ? 'checked' : '') . "> Laki-laki<br>";
                            // echo "<input type='radio' name='level' value='User' " . ($res['level'] == 'User' ? 'checked' : '') . "> Perempuan<br>";

                            $sql = "SHOW COLUMNS FROM users WHERE Field = 'Level'";
                            $query = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($query);
                                                
                            $options = explode(",", str_replace("'", "", substr($row['Type'], 5, (strlen($row['Type'])-6))));
                            foreach ($options as $option) {
                                echo "<input class='form-check-input' type='radio' name='level' id='$option' value='$Level' required>";
                                echo "<label for='$option'>$option</label><br>";
                            }
                        ?>
                    </div>
                </div>
            </fieldset>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Blokir User?</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <?php
                                $sql = "SHOW COLUMNS FROM users WHERE Field = 'Blokir'";
                                $query = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($query);
                                $options = explode(",", str_replace("'", "", substr($row['Type'], 5, (strlen($row['Type'])-6))));
                                foreach ($options as $option) {
                                    echo "<input class='form-check-input' type='radio' name='blokir' id='$option' value='$option' required>";
                                    echo "<label for='$option'>$option</label><br>"; 
                                }
                        ?>
                    </div>
                </div>
            </fieldset>
            <div class="d-flex mb-3">
                <div class="me-auto p-2">
                    <button type="submit" class="btn btn-primary" name="update">Update data</button>
                </div>
                <div class="p-2"><a href="../dash.php?module=user" type="submit" class="btn btn-danger">Go to Home</a></div>
            </div>
        </form>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>