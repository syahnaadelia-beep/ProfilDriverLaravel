```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Driver</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        mono: {
                            50: '#fafafa',
                            100: '#f4f4f5',
                            200: '#e4e4e7',
                            300: '#d4d4d8',
                            500: '#71717a',
                            700: '#3f3f46',
                            900: '#18181b'
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-mono-50 text-mono-900">
    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

        <section class="mx-auto max-w-4xl rounded-md border border-mono-200 bg-white p-5 sm:p-6">
            <div class="mb-6 flex items-center justify-between border-b border-mono-200 pb-4">
                <div>
                    <h1 class="text-lg font-bold tracking-wide">EDIT DATA DRIVER</h1>
                    <p class="mt-1 text-sm text-mono-500">
                        Perbarui informasi profil pengemudi.
                    </p>
                </div>

                <a href="{{ route('drivers.index') }}"
                   class="text-sm text-mono-500 underline hover:text-mono-900">
                    Batal Edit
                </a>
            </div>

            @if ($errors->any())
                <div class="mb-4 rounded border border-red-300 bg-red-50 p-3 text-sm text-red-700">
                    <ul class="list-inside list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="nama" class="mb-1.5 block text-sm font-medium">
                            Nama Driver Profesional *
                        </label>
                        <input id="nama" name="nama" type="text" required
                            value="{{ old('nama', $driver->nama) }}"
                            class="w-full rounded border border-mono-300 px-3 py-2.5 text-sm outline-none focus:border-mono-900">
                    </div>

                    <div>
                        <label for="nomor_sim" class="mb-1.5 block text-sm font-medium">
                            Nomor SIM Aktif *
                        </label>
                        <input id="nomor_sim" name="nomor_sim" type="text" required
                            value="{{ old('nomor_sim', $driver->nomor_sim) }}"
                            class="w-full rounded border border-mono-300 px-3 py-2.5 text-sm outline-none focus:border-mono-900">
                    </div>

                    <div>
                        <label for="exp_sim" class="mb-1.5 block text-sm font-medium">
                            Masa Berlaku SIM *
                        </label>
                        <input id="exp_sim" name="exp_sim" type="date" required
                            value="{{ old('exp_sim', $driver->exp_sim ? \Carbon\Carbon::parse($driver->exp_sim)->format('Y-m-d') : '') }}"
                            class="w-full rounded border border-mono-300 px-3 py-2.5 text-sm outline-none focus:border-mono-900">
                    </div>

                    <div>
                        <label for="kontak" class="mb-1.5 block text-sm font-medium">
                            Nomor Kontak / Telepon *
                        </label>
                        <input id="kontak" name="kontak" type="text" required
                            value="{{ old('kontak', $driver->kontak) }}"
                            class="w-full rounded border border-mono-300 px-3 py-2.5 text-sm outline-none focus:border-mono-900">
                    </div>

                    <div>
                        <label for="status" class="mb-1.5 block text-sm font-medium">
                            Status Keaktifan *
                        </label>
                        <select id="status" name="status" required
                            class="w-full rounded border border-mono-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-mono-900">
                            <option value="Aktif" @selected(old('status', $driver->status) === 'Aktif')>Aktif (Tersedia)</option>
                            <option value="Sedang Bertugas" @selected(old('status', $driver->status) === 'Sedang Bertugas')>Sedang Bertugas</option>
                            <option value="Non-Aktif" @selected(old('status', $driver->status) === 'Non-Aktif')>Non-Aktif</option>
                        </select>
                    </div>

                    <div>
                        <label for="catatan" class="mb-1.5 block text-sm font-medium">
                            Catatan Profil / Keahlian
                        </label>
                        <textarea id="catatan" name="catatan" rows="3"
                            class="w-full resize-y rounded border border-mono-300 px-3 py-2.5 text-sm outline-none focus:border-mono-900">{{ old('catatan', $driver->catatan) }}</textarea>
                    </div>
                </div>

                <div class="mt-6 flex gap-2">
                    <button type="submit"
                        class="flex-1 rounded bg-mono-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-mono-700">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('drivers.index') }}"
                        class="rounded border border-mono-300 px-5 py-2.5 text-sm hover:bg-mono-100">
                        Kembali
                    </a>
                </div>
            </form>
        </section>
        </footer>
    </main>
</body>
</html>
```