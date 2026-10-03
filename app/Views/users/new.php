<?= view('templates/header', ['title' => $title]) ?>

<h1><?= esc($title) ?></h1>

<?php if (isset($validation)): ?>
    <div style="color: red;">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="<?= site_url('users') ?>" method="post">
    <?= csrf_field() ?>

    <div>
    <label for="username">Username</label>
    <input
        type="text"
        id="username"
        name="username"
        value="<?= esc(old('username')) ?>"
    >
</div>

<br>

   <div>
    <label for="full_name">Full Name</label>
    <input
        type="text"
        id="full_name"
        name="full_name"
        value="<?= esc(old('full_name')) ?>"
    >
</div>

<br>

    <button type="submit">Save User</button>
</form>

<p>
    <a href="<?= site_url('users') ?>">Back to User Accounts</a>
</p>

<?= view('templates/footer') ?>