<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Iniciar sesión<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1>Iniciar sesión</h1>

    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('login/attempt') ?>" method="post">
        <?= csrf_field() ?>

        <div>
            <label for="email">Correo</label>
            <input type="email" name="email" id="email" value="<?= old('email') ?>" required>
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <label>
                <input type="checkbox" name="remember" value="1" <?= old('remember') ? 'checked' : '' ?>>
                Recordarme
            </label>
        </div>

        <button type="submit">Entrar</button>
    </form>

    <p>¿No tienes cuenta? <a href="<?= site_url('signup') ?>">Regístrate</a></p>
<?= $this->endSection() ?>