@extends('includes.theme')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default articles">
      <div class="panel-heading">
        <ul class="pull-right panel-settings panel-button-tab-right">
					<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
						<em class="fa fa-cogs"></em>
					</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li>
                <ul class="dropdown-settings">
                  <li><a data-insert-step="before" href="#"><i class="fa fa-reply-all fa-rotate-90"></i> Insert Step Before</a></li>
                  <li><a data-insert-step="after" href="#"><i class="fa fa-reply-all fa-rotate-270"></i> Insert Step After</a></li>
                  <li><a data-move-step="up" href="#"><i class="fa fa-long-arrow-up"></i> Move Step Up</a></li>
                  <li><a data-move-step="down" href="#"><i class="fa fa-long-arrow-down"></i> Move Step Down</a></li>
                  <li><a class="duplicate-step" data-insert-step="before" href="#"><i class="fa fa-clone"></i> Duplicate Step</a></li>
                  <li><a class="step remove" href="#"><i class="fa fa-trash"></i> Remove Step</a></li>
                </ul>
							</li>
						</ul>
					</li>
				</ul>
        <ul class="pull-right panel-settings panel-button-tab-right">
          <li class="dropdown">
            <a class="pull-right dropdown-toggle" data-target="#via-js" data-toggle="collapse">
              <i class="fa fa-chevron-down"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="panel-body articles-container">
        <div class="controls">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <select class="form-control" name="">
                  <option selected="selected" value="HttpRequestAction">Request</option>
                  <option value="AssertAction">Assert</option>
                  <option value="SaveVariableAction">Save</option>
                  <option value="ExtractAction">Extract</option>
                  <option value="JavascriptAction">JavaScript</option>
                </select>
              </div>
              <div class="col-md-8">
                <input placeholder="Step Name" class="step-name form-control" type="text" name="" />
              </div>
              <div class="collapse-container collapse in" id="via-js">
                <div class="col-md-4">
                  <select class="http-method-select form-control" name="">
                    <option selected="selected" value="GET">GET</option>
                    <option value="POST">POST</option>
                    <option value="PUT">PUT</option>
                    <option value="PATCH">PATCH</option>
                    <option value="DELETE">DELETE</option>
                    <option value="HEAD">HEAD</option>
                    <option value="OPTIONS">OPTIONS</option>
                  </select>
                </div>
                <div class="col-md-8">
                  <input placeholder="URL" class="step-url form-control" type="text" value="" name="" />
                </div>
                <div class="col-md-12">
                  <div class="sublabel-left">Post Data</div>
                  <textarea data-show-for="" rows="5" class="form-control" style="font-family: monospace;" spellcheck="false" name=""></textarea>
                </div>
                <div class="col-md-12">
                  <div class="sublabel-left">Headers</div>
                  <div class="http-request-header items">
                    <a class="http-request-header add font-12" href="#">+ Add Request Header</a>
                  </div>
                  <div class="col-md-5 header-key">

                  </div>
                  <div class="col-md-1">

                  </div>
                  <div class="col-md-6 header-value">

                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!--End .articles-->
  </div>
</div>
@stop
