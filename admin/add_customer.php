<?php 

require_once("../inc/header.php");

if (isset($_POST["adminCustomerAdd"])) {
  if( isset($_POST['first-name']) && isset($_POST['last-name']) && isset( $_POST['email'] )  && isset( $_POST['password'] )){

    $customerFirstName = $_POST['first-name'];
    $customerLastName = $_POST['last-name'];
    $customerFullName = $customerFirstName.' '.$customerLastName;
    $customerEmail = $_POST['email'];
    $customerPassword = $_POST['password'];
    $customer->customerRegister($customerFullName,$customerEmail,$customerPassword);
    }
  
}
?>


    <title>Add a New Customer</title>
  </head>
  <body class="h-full">
    <div class="min-h-full">
      <div class="pb-32 bg-sky-600">
        <!-- Navigation -->
        
        <?php require_once("../inc/nav.php") ?>

        <header class="py-10">
          <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-white">
              Add a New Customer
            </h1>
          </div>
        </header>
      </div>

      <main class="-mt-32">
        <div class="px-4 pb-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="bg-white rounded-lg">
            <form action="" method="POST"
              class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
              <div class="px-4 py-6 sm:p-8">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-3">
                    <label
                      for="first-name"
                      class="block text-sm font-medium leading-6 text-gray-900"
                      >First Name</label
                    >
                    <div class="mt-2">
                      <input
                        type="text"
                        name="first-name"
                        id="first-name"
                        autocomplete="given-name"
                        required
                        class="block w-full p-2 text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" />
                    </div>
                  </div>

                  <div class="sm:col-span-3">
                    <label
                      for="last-name"
                      class="block text-sm font-medium leading-6 text-gray-900"
                      >Last Name</label
                    >
                    <div class="mt-2">
                      <input
                        type="text"
                        name="last-name"
                        id="last-name"
                        autocomplete="family-name"
                        required
                        class="block w-full p-2 text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" />
                    </div>
                  </div>

                  <div class="sm:col-span-3">
                    <label
                      for="email"
                      class="block text-sm font-medium leading-6 text-gray-900"
                      >Email Address</label
                    >
                    <div class="mt-2">
                      <input
                        type="email"
                        name="email"
                        id="email"
                        autocomplete="email"
                        required
                        class="block w-full p-2 text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" />
                    </div>
                  </div>

                  <div class="sm:col-span-3">
                    <label
                      for="password"
                      class="block text-sm font-medium leading-6 text-gray-900"
                      >Password</label
                    >
                    <div class="mt-2">
                      <input
                        type="password"
                        name="password"
                        id="password"
                        autocomplete="password"
                        required
                        class="block w-full p-2 text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" />
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="flex items-center justify-end px-4 py-4 border-t gap-x-6 border-gray-900/10 sm:px-8">
                <button
                  type="reset"
                  class="text-sm font-semibold leading-6 text-gray-900">
                  Cancel
                </button>
                <button
                  type="submit"
                  name="adminCustomerAdd"
                  class="px-3 py-2 text-sm font-semibold text-white rounded-md shadow-sm bg-sky-600 hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                  Create Customer
                </button>
              </div>
            </form>
          </div>
        </div>
      </main>
    </div>
    
<?php require_once("../inc/footer.php") ?>
