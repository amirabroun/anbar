<?php
if (isset($_POST['action'])&& $_POST['action']=== 'change_address'){

        $user_id =getIdUsers($_SESSION['user_sing']);
        $change = updateAddressByuser_id($user_id['id']);

        if ($change){
            changeIsDefault();
        }

}
