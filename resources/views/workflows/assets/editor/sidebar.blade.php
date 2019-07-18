<nav class="col-md-2 d-none d-md-block bg-light sidebar" style="display: none !important; min-height: 100vh; top: 35px;" id="menuFormatters">
  <div class="sidebar-sticky">
    @include('workflows.assets.editor.formatters')
  </div>
</nav>
<nav class="col-md-2 d-none d-md-block bg-light sidebar" style="display: none !important; min-height: 100vh; top: 35px;" id="menuSteps">
  <div class="sidebar-sticky">
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>STEPS</span>
      <a class="d-flex align-items-center text-muted" id="closeSteps">
        <svg transform="rotate(-45 0 0)" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle" ><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
      </a>
    </h6>
    <ul class="nav flex-column mb-2" id="steps">
    </ul>
  </div>
</nav>



<!-- @include('workflows.assets.editor.requests') -->
