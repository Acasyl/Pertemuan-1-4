<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>

<form action="" method="post">
    <p>
        <input type="text" name="judul" value="<?= $data ? esc($data['judul']) : ''; ?>" style="width:100%;padding:10px;border:1px solid #cfd8e3;border-radius:6px;">
    </p>
    <p>
        <textarea name="isi" cols="50" rows="10" style="width:100%;padding:10px;border:1px solid #cfd8e3;border-radius:6px;"><?= $data ? esc($data['isi']) : ''; ?></textarea>
    </p>
    <p>
        <input type="submit" value="Kirim" class="btn btn-secondary btn-large">
    </p>
</form>

<?= $this->include('template/admin_footer'); ?>
