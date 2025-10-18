<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Tasks<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Tasks</h1>

<p><a href="<?= site_url('/tasks/new') ?>">New task</a></p>

<ul>
  <?php foreach ($tasks as $task): ?>
    <li>
      <a href="<?= site_url('/tasks/show/' . $task->id) ?>">
        <?= esc($task->description) ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>

<?= $this->endSection() ?>