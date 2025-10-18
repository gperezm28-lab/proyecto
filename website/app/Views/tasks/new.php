<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>New task<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>New task</h1>

<form action="<?= site_url('tasks/create') ?>" method="post">
  <?= $this->include('tasks/_form') ?>
  <button>Save</button>
  <a href="<?= site_url('/tasks') ?>">Cancel</a>
</form>

<?= $this->endSection() ?>