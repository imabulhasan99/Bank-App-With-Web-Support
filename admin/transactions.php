<?php require_once("../inc/header.php") ?>

    <title>Transactions</title>
  </head>
  <body class="h-full">
    <div class="min-h-full">
      <div class="bg-sky-600 pb-32">
        <!-- Navigation -->


        <?php require_once("../inc/nav.php") ?>


        <header class="py-10">
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-white">
              Transactions
            </h1>
          </div>
        </header>
      </div>

      <main class="-mt-32">
        <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
          <div class="bg-white rounded-lg py-8">
            <!-- List of All The Transactions -->
            <div class="px-4 sm:px-6 lg:px-8">
              <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                  <p class="mt-2 text-sm text-gray-700">
                    List of transactions made by the customers.
                  </p>
                </div>
              </div>
              <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div
                    class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                      <thead>
                        <tr>
                          <th
                            scope="col"
                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                            Customer Name
                          </th>
                          <th
                            scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Amount
                          </th>
                          <th
                            scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Date
                          </th>
                        </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-200 bg-white">
                        <tr>
                          <td
                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-800 sm:pl-0">
                            Bruce Wayne
                          </td>
                          <td
                            class="whitespace-nowrap px-2 py-4 text-sm font-medium text-emerald-600">
                            +$10,240
                          </td>
                          <td
                            class="whitespace-nowrap px-2 py-4 text-sm text-gray-500">
                            29 Sep 2023, 09:25 AM
                          </td>
                        </tr>
                        <tr>
                          <td
                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-800 sm:pl-0">
                            Al Nahian
                          </td>
                          <td
                            class="whitespace-nowrap px-2 py-4 text-sm font-medium text-red-600">
                            -$2,500
                          </td>
                          <td
                            class="whitespace-nowrap px-2 py-4 text-sm text-gray-500">
                            15 Sep 2023, 06:14 PM
                          </td>
                        </tr>
                        <tr>
                          <td
                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-800 sm:pl-0">
                            Muhammad Alp Arslan
                          </td>
                          <td
                            class="whitespace-nowrap px-2 py-4 text-sm font-medium text-emerald-600">
                            +$49,556
                          </td>
                          <td
                            class="whitespace-nowrap px-2 py-4 text-sm text-gray-500">
                            03 Jul 2023, 12:55 AM
                          </td>
                        </tr>

                        <tr>
                          <td
                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-800 sm:pl-0">
                            Povilas Korop
                          </td>
                          <td
                            class="whitespace-nowrap px-2 py-4 text-sm font-medium text-emerald-600">
                            +$6,125
                          </td>
                          <td
                            class="whitespace-nowrap px-2 py-4 text-sm text-gray-500">
                            07 Jun 2023, 10:00 PM
                          </td>
                        </tr>

                        <tr>
                          <td
                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-800 sm:pl-0">
                            Martin Joo
                          </td>
                          <td
                            class="whitespace-nowrap px-2 py-4 text-sm font-medium text-red-600">
                            -$125
                          </td>
                          <td
                            class="whitespace-nowrap px-2 py-4 text-sm text-gray-500">
                            02 Feb 2023, 8:30 PM
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <?php require_once("../inc/footer.php") ?>