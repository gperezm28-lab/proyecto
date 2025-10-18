<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Edit task<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Edit task</h1>

<form action="<?= site_url('tasks/update/' . $task->id) ?>" method="post">
  <?= $this->include('tasks/_form') ?>
  <button>Save</button>
  <a href="<?= site_url('/tasks/show/' . $task->id) ?>">Cancel</a>
</form>

<?= $this->endSection() ?>