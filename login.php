<?php
use App\User;
if( isset($_POST["email"]) && isset( $_POST["password"] ) && isset( $_POST["password"] )){
  require_once("vendor/autoload.php"); 
  $userlogin = new User();
  $email = $_POST["email"];
  $password = $_POST["password"];
  $loginoption = $_POST["loginoption"];

  $userlogin->UserLogin( $email, $password, $loginoption );
}


?>
<!DOCTYPE html>
<html
  class="h-full bg-white"
  lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>

    <link
      rel="preconnect"
      href="https://fonts.googleapis.com" />
    <link
      rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet" />

    <style>
      * {
        font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont,
          'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans',
          'Helvetica Neue', sans-serif;
      }
    </style>

    <title>Sign-In To Your Account</title>
  </head>
  <body class="h-full bg-slate-100">
    <div class="flex flex-col justify-center min-h-full py-12 sm:px-6 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2
          class="mt-6 text-2xl font-bold leading-9 tracking-tight text-center text-gray-900">
          Sign In To Your Account
        </h2>
      </div>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
        <div class="px-6 py-12 bg-white shadow sm:rounded-lg sm:px-12">
          <form
            class="space-y-6"
            action="#"
            method="POST">
            <div>
              <label
                for="email"
                class="block text-sm font-medium leading-6 text-gray-900"
                >Email address</label
              >
              <div class="mt-2">
                <input
                  id="email"
                  name="email"
                  type="email"
                  autocomplete="email"
                  required
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 p-2 sm:text-sm sm:leading-6" />
              </div>
            </div>

            <div>
              <label
                for="password"
                class="block text-sm font-medium leading-6 text-gray-900"
                >Password</label
              >
              <div class="mt-2">
                <input
                  id="password"
                  name="password"
                  type="password"
                  autocomplete="current-password"
                  required
                  class="block w-full p-2 text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6" />
              </div>
            </div>

            <div>
            <div class="mb-4">
                    <label
                      for="dropdown"
                      class="block text-sm font-medium text-gray-700">
                      Login Option
                    </label>
                    <div class="relative border border-gray-300 rounded-md">
                      <select
                        class="block w-full pl-3 pr-10 py-2 text-base border-transparent focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm rounded-md"
                        id="dropdown"
                        name="loginoption"
                        >
                        <option value="customer">Customer</option>
                        <option value="admin">Admin</option>
                      </select>
                      <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <svg
                          class="w-5 h-5 text-gray-400"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
       
            </div>




            <div>
              <button
                type="submit"
                class="flex w-full justify-center rounded-md bg-emerald-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
                Sign in
              </button>
            </div>
          </form>
        </div>

        <p class="mt-10 text-sm text-center text-gray-500">
          Don't have an account?
          <a
            href="./register.html"
            class="font-semibold leading-6 text-emerald-600 hover:text-emerald-500"
            Register</a>
        </p>
      </div>
    </div>
  </body>
</html>
