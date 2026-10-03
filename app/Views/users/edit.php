<?= view('templates/header', ['title' => $title]) ?>

<h1><?= esc($title) ?></h1>

<?php if (isset($validation)): ?>
    <div style="color: red;">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form
    action="<?= site_url('users/' . $user['id'] . '/update') ?>"
    method="post"
    enctype="multipart/form-data"
>
<div>
    <label for="username">Username</label>
    <input
        type="text"
        id="username"
        name="username"
        value="<?= esc(old('username', $user['username'])) ?>"
    >
</div>

<br>
    <div>
    <label for="full_name">Full Name</label>
    <input
        type="text"
        id="full_name"
        name="full_name"
        value="<?= esc(old('full_name', $user['full_name'])) ?>"
    >
</div>

<br>

<div>
    <label for="avatar">Profile Picture</label>
    <input
        type="file"
        id="avatar"
        name="avatar"
        accept=".jpg,.jpeg,.png"
    >
    <small>JPG or PNG only, maximum 2MB.</small>
</div>

<br>
    <button type="submit">Update User</button>
</form>

<p>
    <a href="<?= site_url('users') ?>">Back to User Accounts</a>
</p>

<?= view('templates/footer') ?>