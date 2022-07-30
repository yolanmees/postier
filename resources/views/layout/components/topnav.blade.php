<div class="bg-gray-100 w-full" x-data="{ openUserMenu: false }">
  {{-- TOP NAV --}}
  <div class="w-full bg-white h-12">
    <div class="grid grid-cols-6 gap-4">
      <div lass="flex">

      </div>
      <div   class="flex col-end-7 justify-end">
        <div class="rounded-full hover:bg-gray-300 m-2 w-8 justify-end">
          <svg @click="openUserMenu = !openUserMenu" class="" style="width: 30px"  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        </div>
      </div>
    </div>
  </div>

  <div x-show="openUserMenu" class="flex absolute top-12 bg-white right-4">
    <div class="flex h-12"></div>
    <div class="nav">
      <div class="nav-item flex align-middle px-4 my-2 hover:bg-gray-400">
        <svg class="" style="width: 30px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
        <a class="mx-2 my-2" href="/user/profile">Account</a>
      </div>
      <div class="nav-item flex align-middle px-4 my-2 hover:bg-gray-400">
        <svg class="" style="width: 30px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
        <a class="mx-2 my-2" href="/settings">Settings</a>
      </div>
      <div class="nav-item flex align-middle px-4 my-2 hover:bg-gray-400">
        <svg class="" style="width: 30px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
        <a class="mx-2 my-2" href=/logout>Logout</a>
      </div>
    </div>
  </div>

  @include('layout.components.pageview')
</div>
