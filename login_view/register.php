<!DOCTYPE html>
<html lang="en">

<head>
  <title>Register Page</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../js/form-validation.js" defer></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="max-h-screen bg-green-300 flex items-center justify-center">
  <div class="bg-gray-100 p-10 rounded-lg shadow-lg max-w-3xl w-full" style="margin-top: 200pt;">
    <h2 class="text-3xl font-bold text-[#002D74] mb-6">Register</h2>
    <form action="../action/register_action.php" method="POST" name="registerForm" id="registerForm" class="grid grid-cols-1 gap-4" onsubmit="return validatePasswordsMatch();">

      <div>
        <label class="block text-gray-700">Username</label>
        <input type="text" name="username" id="username" placeholder="Enter Username"
          class="w-full px-4 py-3 rounded-lg bg-gray-200 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none"
          autocomplete required>
      </div>

      <div>
        <label class="block text-gray-700">Farm Name</label>
        <input type="text" name="farmName" id="farmName" placeholder="Enter Farm Name"
          class="w-full px-4 py-3 rounded-lg bg-gray-200 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none"
          required>
      </div>

      <div>
        <label class="block text-gray-700">Location</label>
        <input type="text" name="location" id="location" placeholder="Enter Location"
          class="w-full px-4 py-3 rounded-lg bg-gray-200 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none"
          required>
      </div>

      <div>
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter Email Address"
          class="w-full px-4 py-3 rounded-lg bg-gray-200 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none"
          autocomplete required>
      </div>

      <div>
        <label class="block text-gray-700">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter Password" minlength="6"
          class="w-full px-4 py-3 rounded-lg bg-gray-200 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none"
          required>
      </div>

      <div>
        <label class="block text-gray-700">Retype Password</label>
        <input type="password" name="retypePassword" id="retypePassword" placeholder="Retype Password" minlength="6"
          class="w-full px-4 py-3 rounded-lg bg-gray-200 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none"
          required>
      </div>

      <button type="submit"
        class="w-full block bg-green-400 hover:bg-purple-300 focus:bg-blue-300 text-white font-semibold rounded-lg
                px-4 py-3 mt-6" name="registerBtn" id="registerBtn">Register</button>
    </form>
  </div>
</body>

</html>

