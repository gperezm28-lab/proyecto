<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Registrarse<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Crear cuenta</h1>

<?php if (session()->has('errors')): ?>
  <ul>
    <?php foreach(session('errors') as $error): ?>
      <li><?= esc($error) ?></li>
    <?php endforeach ?>
  </ul>
<?php endif ?>

<?= form_open('/signup/create') ?>
  <div>
    <label for="name">Nombre</label>
    <input type="text" id="name" name="name" value="<?= old('name') ?? esc($user['name']) ?>">
  </div>

  <div>
    <label for="email">Correo</label>
    <input type="email" id="email" name="email" value="<?= old('email') ?? esc($user['email']) ?>">
  </div>

  <div>
    <label for="password">Contraseña</label>
    <input type="password" id="password" name="password">
  </div>

  <div>
    <label for="password_confirmation">Confirmar contraseña</label>
    <input type="password" id="password_confirmation" name="password_confirmation">
  </div>

  <button>Crear cuenta</button>
  <a href="<?= site_url('/login') ?>">Ya tengo cuenta</a>
<?= form_close() ?>

<?= $this->endSection() ?>