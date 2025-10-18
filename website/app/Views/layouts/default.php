<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Mi proyecto CodeIgniter</title>
</head>
<body>

<?php if (session()->has('warning')): ?>
  <div class="warning"><?= esc(session('warning')) ?></div>
<?php endif; ?>

<?php if (session()->has('info')): ?>
  <div class="info"><?= esc(session('info')) ?></div>
<?php endif; ?>

<?php if (session()->has('errors')): ?>
  <ul style="color:red;">
    <?php foreach ((array) session('errors') as $err): ?>
      <li><?= esc($err) ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?= $this->renderSection('content') ?>
<nav>
  <a href="<?= site_url('/') ?>">Home</a>
  <a href="<?= site_url('/tasks') ?>">Tasks</a>

  <?php if (session('is_logged')): ?>
    <span>Hola, <?= esc(session('user_name')) ?></span>
    <a href="<?= site_url('/logout') ?>">Salir</a>
  <?php else: ?>
    <a href="<?= site_url('/login') ?>">Entrar</a>
    <a href="<?= site_url('/signup') ?>">Registrarse</a>
  <?php endif ?>
</nav>
<hr>

</body>
</html>