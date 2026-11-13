<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Driver Profesional</title>

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
                            400: '#a1a1aa',
                            500: '#71717a',
                            600: '#52525b',
                            700: '#3f3f46',
                            800: '#27272a',
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

        {{-- FORM INPUT DRIVER --}}
        <section class="mb-6 rounded-md border border-mono-200 bg-white p-5 sm:p-6">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h1 class="text-lg font-bold tracking-wide">
                        FORM INPUT DRIVER
                    </h1>
                    <p class="mt-1 text-sm text-mono-500">
                        Tambahkan data dan informasi pengemudi.
                    </p>
                </div>
                <span class="text-xs text-mono-500">RENTAL MOBIL</span>
            </div>

            @if (session('success'))
                <div class="mb-4 rounded border border-mono-300 bg-mono-100 px-4 py-3 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 rounded border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <p class="font-semibold">Periksa kembali data yang kamu masukkan:</p>
                    <ul class="mt-2 list-inside list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('drivers.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="nama" class="mb-1.5 block text-sm font-medium">
                            Nama Driver Profesional *
                        </label>
                        <input
                            id="nama"
                            name="nama"
                            type="text"
                            value="{{ old('nama') }}"
                            placeholder="Masukkan nama driver"
                            required
                            class="w-full rounded border border-mono-300 px-3 py-2.5 text-sm outline-none focus:border-mono-900"
                        >
                    </div>

                    <div>
                        <label for="nomor_sim" class="mb-1.5 block text-sm font-medium">
                            Nomor SIM Aktif *
                        </label>
                        <input
                            id="nomor_sim"
                            name="nomor_sim"
                            type="text"
                            value="{{ old('nomor_sim') }}"
                            placeholder="Masukkan nomor SIM"
                            required
                            class="w-full rounded border border-mono-300 px-3 py-2.5 text-sm outline-none focus:border-mono-900"
                        >
                    </div>

                    <div>
                        <label for="exp_sim" class="mb-1.5 block text-sm font-medium">
                            Masa Berlaku SIM *
                        </label>
                        <input
                            id="exp_sim"
                            name="exp_sim"
                            type="date"
                            value="{{ old('exp_sim') }}"
                            required
                            class="w-full rounded border border-mono-300 px-3 py-2.5 text-sm outline-none focus:border-mono-900"
                        >
                    </div>

                    <div>
                        <label for="kontak" class="mb-1.5 block text-sm font-medium">
                            Nomor Kontak / Telepon *
                        </label>
                        <input
                            id="kontak"
                            name="kontak"
                            type="text"
                            value="{{ old('kontak') }}"
                            placeholder="Masukkan nomor telepon"
                            required
                            class="w-full rounded border border-mono-300 px-3 py-2.5 text-sm outline-none focus:border-mono-900"
                        >
                    </div>

                    <div>
                        <label for="status" class="mb-1.5 block text-sm font-medium">
                            Status Keaktifan *
                        </label>
                        <select
                            id="status"
                            name="status"
                            required
                            class="w-full rounded border border-mono-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-mono-900"
                        >
                            <option value="Aktif" @selected(old('status') === 'Aktif')>Aktif (Tersedia)</option>
                            <option value="Sedang Bertugas" @selected(old('status') === 'Sedang Bertugas')>Sedang Bertugas</option>
                            <option value="Non-Aktif" @selected(old('status') === 'Non-Aktif')>Non-Aktif</option>
                        </select>
                    </div>

                    <div>
                        <label for="catatan" class="mb-1.5 block text-sm font-medium">
                            Catatan Profil / Keahlian
                        </label>
                        <textarea
                            id="catatan"
                            name="catatan"
                            rows="2"
                            placeholder="Contoh: Menguasai rute Jawa-Bali"
                            class="w-full resize-y rounded border border-mono-300 px-3 py-2.5 text-sm outline-none focus:border-mono-900"
                        >{{ old('catatan') }}</textarea>
                    </div>
                </div>

                <div class="mt-5 flex flex-wrap gap-2">
                    <button
                        type="submit"
                        class="flex-1 rounded bg-mono-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-mono-700"
                    >
                        Simpan Data
                    </button>
                    <button
                        type="reset"
                        class="rounded border border-mono-300 px-5 py-2.5 text-sm hover:bg-mono-100"
                    >
                        Reset
                    </button>
                </div>
            </form>
        </section>

        {{-- DAFTAR DRIVER --}}
        <section class="rounded-md border border-mono-200 bg-white p-5 sm:p-6">
            <div class="mb-5 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h2 class="text-lg font-bold tracking-wide">
                        DAFTAR DRIVER &amp; PENGEMUDI
                    </h2>
                    <p class="mt-1 text-sm text-mono-500">
                        Kelola status keaktifan, kontak, dan nomor SIM driver.
                    </p>
                </div>

                <div class="flex flex-col gap-2 sm:flex-row">
                    <input
                        id="searchDriver"
                        type="search"
                        placeholder="Cari nama atau SIM..."
                        class="rounded border border-mono-300 px-3 py-2 text-sm outline-none focus:border-mono-900"
                    >
                    <select
                        id="filterStatus"
                        class="rounded border border-mono-300 bg-white px-3 py-2 text-sm outline-none focus:border-mono-900"
                    >
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="sedang bertugas">Sedang Bertugas</option>
                        <option value="non-aktif">Non-Aktif</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 text-sm text-mono-500">
                Total driver: <span id="totalDriver">{{ $drivers->count() }}</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[850px] border-collapse text-left text-sm">
                    <thead>
                        <tr class="border-y border-mono-200 bg-mono-100 text-xs uppercase tracking-wide text-mono-700">
                            <th class="px-3 py-3">No</th>
                            <th class="px-3 py-3">Nama &amp; Profil</th>
                            <th class="px-3 py-3">Nomor SIM / Exp</th>
                            <th class="px-3 py-3">Kontak</th>
                            <th class="px-3 py-3">Status</th>
                            <th class="px-3 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="driverTable">
                        @forelse ($drivers as $driver)
                            <tr
                                class="driver-row border-b border-mono-200 align-top hover:bg-mono-50"
                                data-search="{{ strtolower($driver->nama . ' ' . $driver->nomor_sim . ' ' . $driver->kontak . ' ' . $driver->catatan) }}"
                                data-status="{{ strtolower($driver->status) }}"
                            >
                                <td class="row-number px-3 py-4 text-mono-500">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-3 py-4">
                                    <p class="font-semibold">{{ $driver->nama }}</p>
                                    <p class="mt-1 max-w-xs text-xs leading-5 text-mono-500">
                                        {{ $driver->catatan ?: 'Belum ada catatan profil.' }}
                                    </p>
                                </td>

                                <td class="px-3 py-4">
                                    <p>{{ $driver->nomor_sim }}</p>
                                    <p class="mt-1 text-xs text-mono-500">
                                        Exp:
                                        {{ $driver->exp_sim ? \Carbon\Carbon::parse($driver->exp_sim)->format('Y-m-d') : '-' }}
                                    </p>
                                </td>

                                <td class="px-3 py-4">{{ $driver->kontak }}</td>

                                <td class="px-3 py-4">
                                    <span class="inline-block rounded border border-mono-300 bg-mono-100 px-2.5 py-1 text-xs font-medium">
                                        {{ $driver->status }}
                                    </span>
                                </td>

                                <td class="px-3 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a
                                            href="{{ route('drivers.edit', $driver->id) }}"
                                            class="rounded border border-mono-300 px-3 py-1.5 text-xs hover:bg-mono-100"
                                        >
                                            Edit
                                        </a>

                                        @if(auth()->user()->role === 'admin')
    <form
        action="{{ route('drivers.destroy', $driver->id) }}"
        method="POST"
        onsubmit="return confirm('Yakin ingin menghapus data driver ini?')"
    >
        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="rounded border border-mono-300 px-3 py-1.5 text-xs hover:border-mono-900"
        >
            Hapus
        </button>
    </form>
@endif
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-3 py-8 text-center text-mono-500">
                                    Belum ada data driver.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <p id="noResults" class="hidden py-8 text-center text-sm text-mono-500">
                    Driver tidak ditemukan.
                </p>
            </div>

            <div class="mt-5 border-t border-mono-200 pt-4 text-xs text-mono-500">
                Rental Mobil — Pengelolaan Driver
            </div>
        </section>
    </main>

    <script>
        const searchInput = document.getElementById('searchDriver');
        const statusFilter = document.getElementById('filterStatus');
        const rows = Array.from(document.querySelectorAll('.driver-row'));
        const totalDriver = document.getElementById('totalDriver');
        const noResults = document.getElementById('noResults');

        function filterDrivers() {
            const keyword = searchInput.value.toLowerCase().trim();
            const selectedStatus = statusFilter.value.toLowerCase();
            let visibleCount = 0;

            rows.forEach((row) => {
                const searchText = row.dataset.search || '';
                const status = row.dataset.status || '';

                const matchesSearch = searchText.includes(keyword);
                const matchesStatus = !selectedStatus || status === selectedStatus;
                const visible = matchesSearch && matchesStatus;

                row.classList.toggle('hidden', !visible);

                if (visible) {
                    visibleCount++;
                    row.querySelector('.row-number').textContent = visibleCount;
                }
            });

            totalDriver.textContent = visibleCount;
            noResults.classList.toggle('hidden', visibleCount !== 0);
        }

        searchInput.addEventListener('input', filterDrivers);
        statusFilter.addEventListener('change', filterDrivers);
    </script>
</body>
</html>
```