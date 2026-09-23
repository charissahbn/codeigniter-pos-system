<?= view('templates/header', ['title' => $title]) ?>

<h1>User Accounts</h1>

<p>Below is the list of staff accounts.</p>

<table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Full Name</th>
            <th>created_at</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= esc($user['username']) ?></td>
                <td><?= esc($user['full_name']) ?></td>
                <td><?= esc($user['created_at']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= view('templates/footer') ?>