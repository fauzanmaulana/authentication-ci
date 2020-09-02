<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/style/main.css">

    <title>lelangers | <?= $title ?></title>
  </head>
  <body>

  <?php if(isset($role) && $role === 'user') : ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="<?= site_url('/main/home') ?>">Lelangers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= $users[0]['username'] ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?= site_url('main/mybid') ?>">My Bit</a>
                <a class="dropdown-item" href="<?= site_url('main/createbit') ?>">Create Bit</a>
                <a class="dropdown-item" href="<?= site_url('main/logout') ?>">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <? elseif(isset($role) && $role === 'admin'): ?>
      <nav class="navbar navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="<?= site_url('/main/home') ?>"><?= strtoupper($users[0]['username']) ?> DASHBOARD</a>
          <a class="navbar-brand" href="<?= site_url('main/logout') ?>">logout</a>
        </div>
      </nav>

  <?php endif; ?>