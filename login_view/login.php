<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login Page</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../js/validation.js" defer></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="max-h-screen">
  <section class="border-red-500 bg-green-300 min-h-screen flex items-center justify-center">
    <div class="bg-gray-100 p-5 flex rounded-2xl shadow-lg max-w-3xl">
      <div class="md:w-full px-5"> <!-- Changed width to full -->
        <h2 class="text-2xl font-bold text-[#002D74]">Login</h2>
        <p class="text-sm mt-4 text-[#002D74]">If you have an account, please login</p>
        <form class="mt-6" action="../action/login_action.php" method="POST" name="loginForm" id="loginForm" onsubmit="return validateForm()">
          <div>
            <label class="block text-gray-700">Email Address</label>
            <input type="email" name="email" id="email" placeholder="Enter Email Address"
              class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
              autofocus autocomplete required>
          </div>

          <div class="mt-4">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" minlength="6"
              class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
              required>
          </div>

          <button type="submit"
                class="w-full block bg-green-400 hover:bg-blue-300 focus:bg-blue-300 text-white font-semibold rounded-lg
                px-4 py-3 mt-6" name="signInBtn" id="signInBtn">Log In</button>
        </form>

        <div class="text-sm flex justify-between items-center mt-3">
          <p>If you don't have an account...</p>
          <a href="register.php" class="py-2 px-5 ml-3 bg-green-300 border rounded-xl hover:scale-110 duration-300 border-purple-400">Register</a>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
