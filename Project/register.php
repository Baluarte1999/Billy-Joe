<?php include 'header.php'; ?>

<h2 class="text-3xl font-semibold mb-4">Register</h2>

<form action="register_process.php" method="POST">
  <div class="mb-4">
    <label for="username" class="block">Username:</label>
    <input type="text" name="username" id="username" class="w-full p-2 bg-gray-800 border border-gray-700 rounded" required>
  </div>
  <div class="mb-4">
    <label for="email" class="block">Email:</label>
    <input type="email" name="email" id="email" class="w-full p-2 bg-gray-800 border border-gray-700 rounded" required>
  </div>
  <div class="mb-4">
    <label for="password" class="block">Password:</label>
    <input type="password" name="password" id="password" class="w-full p-2 bg-gray-800 border border-gray-700 rounded" required>
  </div>
  <div class="mb-4">
    <label for="confirm_password" class="block">Confirm Password:</label>
    <input type="password" name="confirm_password" id="confirm_password" class="w-full p-2 bg-gray-800 border border-gray-700 rounded" required>
  </div>
  <button type="submit" class="bg-purple-600 hover:bg-purple-500 px-4 py-2 rounded">Register</button>
</form>

<?php include 'footer.php'; ?>
