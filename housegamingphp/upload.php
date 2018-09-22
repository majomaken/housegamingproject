<?php
    require 'conexion.php';

    function validate($file){

        if ($file['user-file']['type'] !== 'image/jpeg' || $file['user-file']['type'] !== 'image/png')
        {
          return false;
        }

        if ($file['user-file']['size'] > 600000)
        {
          return false;
        }

        return true;

    }

    if (validate($_FILES))
    {
        $path = 'Avatar/';

        $type =

        $file = $path.basename($_FILES['user-file']['name']);

        $query = mysqli_query("INSERT INTO Avatar VALUES('','".$file."','".$path."')");

        if (move_uploaded_file($_FILES['user-file']['tmp_name'], $file))
        {
          header('location: avatars.php');
        }
    }
    else {
      echo "error";
    }

?>
