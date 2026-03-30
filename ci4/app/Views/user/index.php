<?= $this->include('template/header'); ?>

<h1><?= $title; ?></h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($users)) : ?>
            <?php foreach ($users as $row) : ?>
                <tr>
                    <td><?= esc($row['id']); ?></td>
                    <td><?= esc($row['username']); ?></td>
                    <td><?= esc($row['useremail']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="3">Belum ada data.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->include('template/footer'); ?>
