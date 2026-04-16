<?php
// Contoh Class OOP: Mobil
require __DIR__.'/views/header.php';

/**
 * Program sederhana pendefinisian class dan pemanggilan class.
 */

class Mobil
{
    private $warna;
    private $merk;
    private $harga;

    public function __construct()
    {
        $this->warna = "Biru";
        $this->merk  = "BMW";
        $this->harga = "10000000";
    }

    public function gantiWarna($warnaBaru)
    {
        $this->warna = $warnaBaru;
    }

    public function tampilWarna()
    {
        echo "Warna mobilnya : " . $this->warna;
    }
}

// membuat objek mobil
$a = new Mobil();
$b = new Mobil();

?>
<section class="card">
    <h1 class="page-title">Contoh Class OOP: Mobil</h1>
    <p class="page-subtitle">Demo sederhana perubahan warna pada objek mobil.</p>

    <div>
        <strong>Mobil pertama</strong><br>
        <?php $a->tampilWarna(); ?>

        <br>Mobil pertama ganti warna<br>
        <?php
        $a->gantiWarna("Merah");
        $a->tampilWarna();
        ?>

        <br><br><strong>Mobil kedua</strong><br>
        <?php
        $b->gantiWarna("Hijau");
        $b->tampilWarna();
        ?>
    </div>
</section>
<?php
require __DIR__.'/views/footer.php';
