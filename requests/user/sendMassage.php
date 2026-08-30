<?php
if (isset($_POST['action'])&& $_POST['action']=== 'sendMassage'){

        $_SESSION['sendMassage'] = 'yes';

    header("Location:login.php");

}

if (isset($_POST['action'])&& $_POST['action']=== 'finishCart'){

        $_SESSION['finishCart'] = 'yes';

    header("Location:login.php");

}
