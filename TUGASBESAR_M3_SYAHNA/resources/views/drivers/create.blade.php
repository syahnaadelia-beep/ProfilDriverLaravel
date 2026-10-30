
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Driver</title>
</head>
<body>
    <div class="container">
        <h1>Tambah Data Driver</h1>

        <form action="{{ route('drivers.store') }}" method="POST">
            @csrf

            <label>Nama Driver</label><br>
            <input type="text" name="nama" required>
            <br><br>

            <label>Nomor SIM</label><br>
            <input type="text" name="nomor_sim" required>
            <br><br>

            <label>Masa Berlaku SIM</label><br>
            <input type="date" name="exp_sim" required>
            <br><br>

            <label>Kontak</label><br>
            <input type="text" name="kontak" required>
            <br><br>

            <label>Status</label><br>
            <select name="status" required>
                <option value="Aktif">Aktif</option>
                <option value="Sedang Bertugas">Sedang Bertugas</option>
                <option value="Non-Aktif">Non-Aktif</option>
            </select>
            <br><br>

            <label>Catatan</label><br>
            <textarea name="catatan"></textarea>
            <br><br>

            <button type="submit">Simpan Driver</button>
            <a href="{{ route('drivers.index') }}">Kembali</a>
        </form>
    </div>
</body>
</html>
