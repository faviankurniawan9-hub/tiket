<h2>Kasir Penjualan Tiket</h2>

<form method="POST" action="index.php?action=penjualan_simpan">

    <label>Nama Pembeli</label>
    <br>

    <input
        type="text"
        name="nama"
        required
    >

    <br><br>


    <label>Pilih Tiket</label>
    <br>

    <select
        name="tiket_id"
        id="tiket"
        onchange="ubahHarga()"
        required
    >

        <?php while ($row = mysqli_fetch_assoc($tiket)) : ?>

            <option
                value="<?= $row['id']; ?>"
                data-harga="<?= $row['harga']; ?>"
            >

                <?= $row['nama_tiket']; ?>
                -
                Rp<?= number_format($row['harga'], 0, ',', '.'); ?>

            </option>

        <?php endwhile; ?>

    </select>

    <br><br>


    <label>Harga Tiket</label>
    <br>

    <input
        type="number"
        name="harga"
        id="harga"
        readonly
    >

    <br><br>


    <label>Jumlah Tiket</label>
    <br>

    <input
        type="number"
        name="jumlah"
        id="jumlah"
        value="1"
        min="1"
        oninput="hitung()"
        required
    >

    <br><br>


    <label>Subtotal</label>
    <br>

    <input
        type="number"
        id="subtotal"
        readonly
    >

    <br><br>


    <label>Diskon (%)</label>
    <br>

    <input
        type="number"
        name="diskon_persen"
        id="diskon_persen"
        value="0"
        min="0"
        max="100"
        oninput="hitung()"
    >

    <br><br>


    <label>Nilai Diskon</label>
    <br>

    <input
        type="number"
        id="nilai_diskon"
        readonly
    >

    <br><br>


    <label>Total Bayar</label>
    <br>

    <input
        type="number"
        name="total"
        id="total"
        readonly
    >

    <br><br>


    <label>Uang Bayar</label>
    <br>

    <input
        type="number"
        name="bayar"
        id="bayar"
        oninput="hitung()"
        required
    >

    <br><br>


    <label>Kembalian</label>
    <br>

    <input
        type="number"
        name="kembalian"
        id="kembalian"
        readonly
    >

    <br><br>


    <button type="submit">
        SIMPAN TRANSAKSI
    </button>

</form>


<hr>

<h2>Record Penjualan</h2>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Nama Pembeli</th>
        <th>Tiket</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
        <th>Diskon</th>
        <th>Total</th>
        <th>Bayar</th>
        <th>Kembalian</th>
        <th>Waktu</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($penjualan)) : ?>

        <tr>

            <td>
                <?= $row['id']; ?>
            </td>

            <td>
                <?= $row['nama_pembeli']; ?>
            </td>

            <td>
                <?= $row['nama_tiket']; ?>
            </td>

            <td>
                Rp<?= number_format($row['harga'], 0, ',', '.'); ?>
            </td>

            <td>
                <?= $row['jumlah']; ?>
            </td>

            <td>
                Rp<?= number_format(
                    $row['harga'] * $row['jumlah'],
                    0,
                    ',',
                    '.'
                ); ?>
            </td>

            <td>
                <?= isset($row['diskon_persen'])
                    ? $row['diskon_persen'] . '%'
                    : '0%';
                ?>
            </td>

            <td>
                Rp<?= number_format(
                    $row['total'],
                    0,
                    ',',
                    '.'
                ); ?>
            </td>

            <td>
                Rp<?= number_format(
                    $row['bayar'],
                    0,
                    ',',
                    '.'
                ); ?>
            </td>

            <td>
                Rp<?= number_format(
                    $row['kembalian'],
                    0,
                    ',',
                    '.'
                ); ?>
            </td>

            <td>
                <?= $row['created_at']; ?>
            </td>

        </tr>

    <?php endwhile; ?>

</table>


<script>

function ubahHarga() {

    let tiket = document.getElementById("tiket");

    let harga =
        tiket.options[tiket.selectedIndex]
        .getAttribute("data-harga");

    document.getElementById("harga").value = harga;

    hitung();
}


function hitung() {

    let harga =
        Number(document.getElementById("harga").value);

    let jumlah =
        Number(document.getElementById("jumlah").value);

    let diskonPersen =
        Number(document.getElementById("diskon_persen").value);

    let bayar =
        Number(document.getElementById("bayar").value);


    // Harga x jumlah
    let subtotal = harga * jumlah;


    // Menghitung nilai diskon
    let nilaiDiskon =
        subtotal * diskonPersen / 100;


    // Total setelah diskon
    let total =
        subtotal - nilaiDiskon;


    // Menghitung kembalian
    let kembalian =
        bayar - total;


    document.getElementById("subtotal").value =
        subtotal;

    document.getElementById("nilai_diskon").value =
        nilaiDiskon;

    document.getElementById("total").value =
        total;


    if (bayar >= total) {

        document.getElementById("kembalian").value =
            kembalian;

    } else {

        document.getElementById("kembalian").value = 0;

    }

}


ubahHarga();

</script>