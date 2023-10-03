<?php 
require_once __DIR__ . '/../vendor/autoload.php'; 

use App\User;
use App\Deposit;
use App\Withdraw;
use App\TransactionManager;

$transaction = new TransactionManager();
$withdraw = new Withdraw();
$depsoit = new Deposit();

if( isset( $_POST['signout'] ) ){
  $user = new User();
  $user->logout();
}


session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php'); 
    exit;
}

?>

<!DOCTYPE html>
<html
  class="h-full bg-white"
  lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>

    <link
      rel="preconnect"
      href="https://fonts.googleapis.com" />
    <link
      rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet" />

    <style>
      * {
        font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont,
          'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans',
          'Helvetica Neue', sans-serif;
      }
    </style>