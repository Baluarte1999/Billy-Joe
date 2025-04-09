<?php include 'header.php'; ?>

<h2 class="text-3xl font-semibold mb-4">Login</h2>

<form action="login_process.php" method="POST">
  <div class="mb-4">
    <label for="email" class="block">Email:</label>
    <input type="email" name="email" id="email" class="w-full p-2 bg-gray-800 border border-gray-700 rounded" required>
  </div>
  <div class="mb-4">
    <label for="password" class="block">Password:</label>
    <input type="password" name="password" id="password" class="w-full p-2 bg-gray-800 border border-gray-700 rounded" required>
  </div>
  <button type="submit" class="bg-purple-600 hover:bg-purple-500 px-4 py-2 rounded">Login</button>
</form>

<?php include 'footer.php'; ?>
