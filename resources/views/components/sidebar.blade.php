
<aside class="fixed  top-32 w-48 z-20 " aria-label="Sidebar">
    <div class="overflow-y-auto py-4 px-3 bg-blue-600 w-full h-screen rounded dark:bg-gray-800">
       <ul class="space-y-2">
          <li>
             <a href="{{ route('home') }}" class="flex items-center p-2 text-base  text-gray-900 font-bold rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg aria-hidden="true" class="w-6 h-6 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                <span class="ml-3">Accuille</span>
             </a>
          </li>
          <li>
             <a href="{{ route('service') }}" method="post" class="flex items-center p-2 text-base text-gray-900 font-bold rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                @csrf
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                <span class="ml-3">Service</span>
             </a>
          </li>
          <li>
             <a href="{{ route('client') }}" class="flex items-center p-2 text-base text-gray-900 font-bold rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6  transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Client</span>
             </a>
          </li>
          <li>
             <a href="{{ route('commande') }}" class="flex items-center p-2 text-base text-gray-900 font-bold rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Commande</span>
             </a>
          </li>
          <li>
             <a href="{{ route('allvercement') }}" class="flex items-center p-2 text-base text-gray-900 font-bold rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <i class="fa fa-money flex-shrink-0 w-6 h-6 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                <span class="flex-1 ml-3 whitespace-nowrap">Vercement</span>
             </a>
          </li>
          <li>
             <a href="{{ route('allusers') }}" class="flex items-center p-2 text-base font-bold text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <i class="fa fa-users flex-shrink-0 w-6 h-6 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                <span class="flex-1 ml-3 whitespace-nowrap">Utillisateur</span>
             </a>
          </li>
       </ul>
    </div>
 </aside>
