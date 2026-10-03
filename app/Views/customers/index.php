<?= view('templates/header', ['title' => $title]) ?>

<h1>Customer Accounts</h1>
<p>
    <a href="<?= site_url('customers/new') ?>">Add New Customer</a>
</p>
<p>Below is the list of registered customers.</p>

<table>
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Action</th>
            <th>Created At</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= esc($customer['full_name']) ?></td>
                <td><?= esc($customer['email']) ?></td>
                <td><?= esc($customer['phone']) ?></td>
                 <td><?= esc($customer['created_at']) ?></td>
                 <td>
    <a href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">
        Edit
    </a>
</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= view('templates/footer') ?>