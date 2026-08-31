<?php
if (!isset($_SESSION)){
    if (session_status() === PHP_SESSION_NONE) { session_start(); }

}