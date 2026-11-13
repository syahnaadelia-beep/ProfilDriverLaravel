
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Profil Driver</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white w-full max-w-md p-8 rounded-xl shadow-sm border border-gray-200">

        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-900">
                PROFIL DRIVER
            </h1>
            <p class="text-sm text-gray-500 mt-2">
                Silakan login untuk mengakses sistem
            </p>
        </div>

        <?php if($errors->any()): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('login.process')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-5">
                <label class="block text-sm font-medium mb-2">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    value="<?php echo e(old('email')); ?>"
                    placeholder="Masukkan email"
                    required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black"
                >
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium mb-2">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-black text-white py-3 rounded-lg font-semibold hover:bg-gray-800"
            >
                Login
            </button>
        </form>

    </div>

</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/ProfilDriverLaravel/TUGASBESAR_M3_SYAHNA/resources/views/auth/login.blade.php ENDPATH**/ ?>