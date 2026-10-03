<?= view('templates/header', ['title' => $title]) ?>

<h1><?= esc($title) ?></h1>

<?php if (isset($validation)): ?>
    <div style="color: red;">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="<?= site_url('customers') ?>" method="post">
    <?= csrf_field() ?>

   <div>
    <label for="full_name">Full Name</label>
    <input
        type="text"
        id="full_name"
        name="full_name"
        value="<?= old('full_name') ?>"
    >
</div>

<br>

<div>
    <label for="email">Email Address</label>
    <input
        type="email"
        id="email"
        name="email"
        value="<?= old('email') ?>"
    >
</div>

<br>

<div>
    <label for="phone">Phone Number</label>
    <input
        type="text"
        id="phone"
        name="phone"
        value="<?= old('phone') ?>"
    >
</div>

<br>

    <button type="submit">Save Customer</button>
</form>

<p>
    <a href="<?= site_url('customers') ?>">Back to Customer Accounts</a>
</p>

<?= view('templates/footer') ?>