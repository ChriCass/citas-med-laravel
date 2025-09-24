<!-- Nav (estático) con Alpine.js; conserva <x-application-mark/> -->
<nav x-data="{ open:false, userOpen:false, teamOpen:false }" class="bg-white border-b border-gray-100">
  <style>[x-cloak]{display:none}</style>

  <!-- Primary Navigation -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
          <a href="#">
            <!-- Conserva el componente -->
            <x-application-mark class="block h-9 w-auto" />
          </a>
        </div>

        <!-- Links -->
        <div class="hidden sm:flex sm:ms-10 sm:-my-px space-x-8">
           
           
          <a href="{{route('login')}}"
             class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
            Login
          </a>
        </div>
      </div>

      <!-- Right side -->
      <div class="hidden sm:flex sm:items-center sm:ms-6">
    
         
        <div class="relative ms-3" @keydown.escape="userOpen=false">
          <button @click="userOpen=!userOpen"
                  class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
            John Doe
            <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
            </svg>
          </button>

          <!-- Menu -->
          <div x-cloak x-show="userOpen" x-transition
               @click.outside="userOpen=false"
               class="absolute right-0 mt-2 w-48 rounded-md bg-white shadow-lg ring-1 ring-black/5 z-20">
            <div class="px-4 py-2 text-xs text-gray-400">Manage Account</div>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">API Tokens</a>
            <div class="my-2 border-t border-gray-200"></div>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Log Out</a>
          </div>
        </div>
      </div>

      <!-- Hamburger -->
      <div class="-me-2 flex items-center sm:hidden">
        <button @click="open=!open"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
          <svg class="size-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"/>
            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div x-cloak :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
      <a href="#"
         class="block ps-3 pe-4 py-2 border-l-4 border-indigo-500 text-base font-medium text-indigo-700 bg-indigo-50">
        Dashboard
      </a>
      <a href="#"
         class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">
        Projects
      </a>
      <a href="#"
         class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">
        Reports
      </a>
    </div>

    <!-- User box -->
    <div class="pt-4 pb-1 border-t border-gray-200">
      <div class="flex items-center px-4">
        <div class="shrink-0 me-3">
          <img class="size-10 rounded-full object-cover"
               src="https://i.pravatar.cc/100?img=3"
               alt="Avatar">
        </div>
        <div>
          <div class="font-medium text-base text-gray-800">John Doe</div>
          <div class="font-medium text-sm text-gray-500">john@example.com</div>
        </div>
      </div>

      <div class="mt-3 space-y-1">
        <a href="#" class="block ps-3 pe-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50">Profile</a>
        <a href="#" class="block ps-3 pe-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50">API Tokens</a>
        <a href="#" class="block ps-3 pe-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50">Log Out</a>

        <!-- Teams -->
        <div class="border-t border-gray-200 my-2"></div>
        <div class="px-4 py-2 text-xs text-gray-400">Manage Team</div>
        <a href="#" class="block ps-3 pe-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50">Team Settings</a>
        <a href="#" class="block ps-3 pe-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50">Create New Team</a>

        <div class="border-t border-gray-200 my-2"></div>
        <div class="px-4 py-2 text-xs text-gray-400">Switch Teams</div>
        <a href="#" class="block ps-3 pe-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50">Team Alpha</a>
        <a href="#" class="block ps-3 pe-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50">Team Beta</a>
      </div>
    </div>
  </div>
</nav>
 
