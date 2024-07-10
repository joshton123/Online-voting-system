<?php
    include("connect.php");

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $image = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : '';
    $temp_name = isset($_FILES['photo']['tmp_name']) ? $_FILES['photo']['tmp_name'] : '';

    $role = isset($_POST['role']) ? $_POST['role'] : '';

    if($password == $cpassword){
        move_uploaded_file($temp_name, "../uploads/$image");
        $insert = mysqli_query($connect, "INSERT INTO USER (name, mobile, address, password, photo, role, status, votes) VALUES ('$name', '$mobile', '$address', '$password', '$image', '$role', 0, 0)");

        if($insert)
        {
            echo '
            <script>
            alert("REGISTRATION SUCCESSFUL");
            window.location = "../frontpage/index.html";
            </script>';
        }
        else
        {
            echo '
            <script>
            alert("Some error occurred");
            window.location = "../routes/register.html";
            </script>';
        }
    } else {
        echo '
            <script>
            alert("Password and confirm Password do not match");
            window.location = "../routes/register.html";
            </script>';
    }
?>
