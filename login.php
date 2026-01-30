<?php
/**
 * Login page for dashboard access
 */

require_once __DIR__ . '/auth.php';

$error = '';

// Handle logout
if (isset($_GET['logout'])) {
    logout();
    header('Location: login.php');
    exit;
}

// If already logged in, redirect to dashboard
if (isAuthenticated()) {
    header('Location: chat_ui.php');
    exit;
}

// Handle login attempt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';

    if (login($password)) {
        header('Location: chat_ui.php');
        exit;
    } else {
        $error = 'Invalid password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Serendipity Technology</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --brand-blue: #4FC4F0;
            --brand-orange: #F7B06A;
            --brand-charcoal: #1F2937;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
        <div class="text-center mb-6">
            <img src="img/logo_sm.png" alt="Serendipity Technology" class="h-12 mx-auto mb-4">
            <h1 class="text-xl font-bold text-gray-800">Dashboard Login</h1>
        </div>

        <?php if ($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    autofocus
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#4FC4F0] focus:border-transparent"
                >
            </div>
            <button
                type="submit"
                class="w-full bg-[#4FC4F0] hover:bg-[#3ab0dc] text-white font-semibold py-2 px-4 rounded-md transition-colors"
            >
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-xs text-gray-500">
            <a href="index.html" class="hover:underline">Back to main site</a>
        </p>
    </div>
</body>
</html>
