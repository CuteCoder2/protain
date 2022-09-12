
<nav class="bg-blue-600 border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900 fixed top-0 w-screen z-20">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
    <a href="{{ route('home') }}" class="flex items-center">
        <img src="{{ asset('images/logo.png') }}" class="mr-3 h-24 w-18 " alt="logo">
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"></span>
    </a>
    <div class="flex items-center md:order-2 ">
        <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>

        <img class="w-20 h-20 rounded-full" src="{{ asset(Auth::user()->image) }}" />
        </button>
        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 " id="user-dropdown" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(661px, 82px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
          <div class="py-3 px-4 text-center">
            <span class="block text-sm text-gray-900 dark:text-white">
                {{ Auth::user()->nom }}
                {{ Auth::user()->prenom }}
            </span>
          </div>
          <ul class="py-1" aria-labelledby="user-menu-button">
            <li>
              <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
              <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
            </li>
            <li>
              <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}" class="inline w-full">
                    @csrf
                    <button type="submit" href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full">Sign out</button>
                </form>
            </li>
          </ul>
        </div>
    </div>
  </nav>


