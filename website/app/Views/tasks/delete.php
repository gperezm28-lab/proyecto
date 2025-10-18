<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Delete task<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Delete task</h1>

<p>Are you sure you want to delete this task?</p>

<dl>
  <dt>ID</dt>
  <dd><?= $task->id ?></dd>

  <dt>Description</dt>
  <dd><?= esc($task->description) ?></dd>
</dl>

<form action="<?= site_url('/tasks/destroy/' . $task->id) ?>" method="post">
  <button type="submit">Yes, delete</button>
  <a href="<?= site_url('/tasks/show/' . $task->id) ?>">Cancel</a>
</form>

<?= $this->endSection() ?>