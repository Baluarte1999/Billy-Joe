<?php include 'header.php'; ?>

<h2 class="text-3xl font-semibold mb-4">Contact Us</h2>
<p>If you have any questions, feel free to reach out to us. We're here to help!</p>

<form action="contact_process.php" method="POST" class="mt-6">
  <div class="mb-4">
    <label for="name" class="block">Name:</label>
    <input type="text" name="name" id="name" class="w-full p-2 bg-gray-800 border border-gray-700 rounded" required>
  </div>
  <div class="mb-4">
    <label for="email" class="block">Email:</label>
    <input type="email" name="email" id="email" class="w-full p-2 bg-gray-800 border border-gray-700 rounded" required>
  </div>
  <div class="mb-4">
    <label for="message" class="block">Message:</label>
    <textarea name="message" id="message" class="w-full p-2 bg-gray-800 border border-gray-700 rounded" required></textarea>
  </div>
  <button type="submit" class="bg-purple-600 hover:bg-purple-500 px-4 py-2 rounded">Submit</button>
</form>

<?php include 'footer.php'; ?>
