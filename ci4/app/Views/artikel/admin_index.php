<?= $this->include('template/admin_header'); ?>

<h1>Daftar Artikel</h1>

<form method="get" class="form-search">
<input type="text" name="q" value="<?= $q; ?>" placeholder="Cari data">
<input type="submit" value="Cari" class="btn btn-primary">
</form>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($artikel)) : ?>
            <?php foreach ($artikel as $row) : ?>
                <tr>
                    <td><?= esc($row['id']); ?></td>
                    <td>
                        <strong><?= esc($row['judul']); ?></strong><br>
                        <small><?= esc(substr($row['isi'], 0, 60)); ?></small>
                    </td>
                    <td><?= esc($row['status']); ?></td>
                    <td>
                        <a class="btn btn-secondary" href="<?= base_url('/admin/artikel/edit/' . $row['id']); ?>">Ubah</a>
                        <a class="btn btn-danger" href="<?= base_url('/admin/artikel/delete/' . $row['id']); ?>" onclick="return confirm('Yakin?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="4">Belum ada data.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $pager->only(['q'])->links(); ?>

<?= $this->include('template/admin_footer'); ?>
