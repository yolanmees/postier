<div class="flex bg-gray-400 w-full align-center">
  <div class="w-full mx-4 my-auto">
    <h2 class="text-3xl py-2 font-bold ">
      {{ $title ?? 'Postier'}}
    </h2>
  </div>
  <div class="flex content-end">
    @if ($newButton)
      <a href="{{ route($newButton) }}" class="bg-white hover:bg-gray-100 text-black font-bold py-2 px-4 m-2 rounded inline-flex items-center" type="button" name="button">New</a>
    @endif
    @if ($saveButton)
      <button class="bg-white hover:bg-gray-100 text-black font-bold py-2 px-4 m-2 rounded inline-flex items-center" type="submit" name="button" form="postierForm">Save</button>
    @endif
    @if ($cancelButton)
      <a href="{{ url()->previous() }}" class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 m-2 rounded inline-flex items-center" type="button" name="button">Cancel</a>
    @endif
  </div>
</div>
