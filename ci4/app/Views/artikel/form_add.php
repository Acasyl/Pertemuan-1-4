<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>

<form action="" method="post">
    <p>
        <input type="text" name="judul" placeholder="Judul" style="width:100%;padding:10px;border:1px solid #cfd8e3;border-radius:6px;">
    </p>
    <p>
        <textarea name="isi" cols="50" rows="10" placeholder="Isi artikel" style="width:100%;padding:10px;border:1px solid #cfd8e3;border-radius:6px;"></textarea>
    </p>
    <p>
        <input type="submit" value="Kirim" class="btn btn-secondary btn-large">
    </p>
</form>

<?= $this->include('template/admin_footer'); ?>
