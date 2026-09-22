<h2>Edit Tiket</h2>

<form method="POST">

    <label>Nama Tiket</label>
    <br>

    <input
        type="text"
        name="nama_tiket"
        value="<?= $tiket['nama_tiket']; ?>"
        required
    >

    <br><br>

    <label>Harga Tiket</label>
    <br>

    <input
        type="number"
        name="harga"
        value="<?= $tiket['harga']; ?>"
        min="0"
        required
    >

    <br><br>

    <button type="submit">
        Update
    </button>

    <a href="index.php?action=tiket">
        Batal
    </a>

</form>