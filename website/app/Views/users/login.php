<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Iniciar sesión<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Iniciar sesión</h1>

<?php if (session()->has('warning')): ?>
  <div style="color:red"><?= esc(session('warning')) ?></div>
<?php endif ?>

<?= form_open('/login/attempt') ?>
  <label>Correo</label>
  <input type="email" name="email" value="<?= old('email') ?>"><br>

  <label>Contraseña</label>
  <input type="password" name="password"><br>

  <button type="submit">Entrar</button>
  <a href="<?= site_url('/signup') ?>">Registrarse</a>
<?= form_close() ?>

<?= $this->endSection() ?>