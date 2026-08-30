<?php
if (isset($_SESSION['admin_sing'])){
    unset($_SESSION['admin_sing']);
}
redirect('../');
