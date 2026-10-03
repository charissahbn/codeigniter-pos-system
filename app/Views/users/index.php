<?= view('templates/header', ['title' => $title]) ?>

<h1>User Accounts</h1>

<p>
    <a href="<?= site_url('users/new') ?>">Add New User</a>
</p>

<p>Below is the list of staff accounts.</p>

<table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Full Name</th>
            <th>created_at</th>
            <th>Avatar</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <?php
$avatarUrl = ! empty($user['avatar'])
    ? base_url('uploads/avatars/' . $user['avatar'])
    : base_url('images/default-avatar.jpg');
?>

<td>
    <img
        src="<?= esc($avatarUrl) ?>"
        alt="<?= esc($user['full_name']) ?> avatar"
        width="80"
        height="80"
        style="object-fit: cover; border-radius: 50%;"
    >
</td>
                <td><?= esc($user['username']) ?></td>
                <td><?= esc($user['full_name']) ?></td>
                <td><?= esc($user['created_at']) ?></td>
            </tr>

            <td>
    <a href="<?= site_url('users/' . $user['id'] . '/edit') ?>">
        Edit
    </a>
</td>
        <?php endforeach; ?>
    </tbody>
</table>

<?= view('templates/footer') ?>