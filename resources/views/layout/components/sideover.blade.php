{{-- <div x-show="openSideOver" x-data="{ openSideOver: {{ $sideover ?? 'false' }} }"> --}}
<div x-show="openSideOver" x-data="{ openSideOver: false }">
  <div x-show="openSideOver" class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
  <div x-show="openSideOver" class="fixed inset-y-0 right-0 pl-10 max-w-full flex">

    <div class="relative w-screen max-w-md">

      <div class="absolute top-0 left-0 -ml-8 pt-4 pr-2 flex sm:-ml-10 sm:pr-4">
        <button type="button" @click="openSideOver = !openSideOver" class="rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
          <span class="sr-only">Close panel</span>
          <!-- Heroicon name: outline/x -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div class="h-full flex flex-col py-6 bg-white shadow-xl overflow-y-scroll">
        <div class="px-4 sm:px-6">
          <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Panel title</h2>
        </div>
        <div class="mt-6 relative flex-1 px-4 sm:px-6">
          <!-- Replace with your content -->
          <div class="absolute inset-0 px-4 sm:px-6">
            <div class="h-full border-2 border-dashed border-gray-200" aria-hidden="true"></div>
          </div>
          <!-- /End replace -->
        </div>
      </div>
    </div>
  </div>
</div>
