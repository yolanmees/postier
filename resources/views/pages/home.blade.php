@extends('includes.theme')
@section('content')
  <div class="panel panel-container">
    <div class="row">
      <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-teal panel-widget border-right">
          <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
            <div class="large">120</div>
            <div class="text-muted">New Orders</div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-blue panel-widget border-right">
          <div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
            <div class="large">52</div>
            <div class="text-muted">Comments</div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-orange panel-widget border-right">
          <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
            <div class="large">24</div>
            <div class="text-muted">New Users</div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-red panel-widget ">
          <div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
            <div class="large">25.2k</div>
            <div class="text-muted">Page Views</div>
          </div>
        </div>
      </div>
    </div><!--/.row-->
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Site Traffic Overview
          <ul class="pull-right panel-settings panel-button-tab-right">
            <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
              <em class="fa fa-cogs"></em>
            </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li>
                  <ul class="dropdown-settings">
                    <li><a href="#">
                      <em class="fa fa-cog"></em> Settings 1
                    </a></li>
                    <li class="divider"></li>
                    <li><a href="#">
                      <em class="fa fa-cog"></em> Settings 2
                    </a></li>
                    <li class="divider"></li>
                    <li><a href="#">
                      <em class="fa fa-cog"></em> Settings 3
                    </a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
        <div class="panel-body">
          <div class="canvas-wrapper">
            <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-xs-6 col-md-3">
      <div class="panel panel-default">
        <div class="panel-body easypiechart-panel">
          <h4>New Orders</h4>
          <div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span></div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-md-3">
      <div class="panel panel-default">
        <div class="panel-body easypiechart-panel">
          <h4>Comments</h4>
          <div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span></div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-md-3">
      <div class="panel panel-default">
        <div class="panel-body easypiechart-panel">
          <h4>New Users</h4>
          <div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">56%</span></div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-md-3">
      <div class="panel panel-default">
        <div class="panel-body easypiechart-panel">
          <h4>Visitors</h4>
          <div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent">27%</span></div>
        </div>
      </div>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default chat">
        <div class="panel-heading">
          Chat
          <ul class="pull-right panel-settings panel-button-tab-right">
            <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
              <em class="fa fa-cogs"></em>
            </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li>
                  <ul class="dropdown-settings">
                    <li><a href="#">
                      <em class="fa fa-cog"></em> Settings 1
                    </a></li>
                    <li class="divider"></li>
                    <li><a href="#">
                      <em class="fa fa-cog"></em> Settings 2
                    </a></li>
                    <li class="divider"></li>
                    <li><a href="#">
                      <em class="fa fa-cog"></em> Settings 3
                    </a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
        <div class="panel-body">
          <ul>
            <li class="left clearfix"><span class="chat-img pull-left">
              <img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
              </span>
              <div class="chat-body clearfix">
                <div class="header"><strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc.</p>
              </div>
            </li>
            <li class="right clearfix"><span class="chat-img pull-right">
              <img src="http://placehold.it/60/dde0e6/5f6468" alt="User Avatar" class="img-circle" />
              </span>
              <div class="chat-body clearfix">
                <div class="header"><strong class="pull-left primary-font">Jane Doe</strong> <small class="text-muted">6 mins ago</small></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc.</p>
              </div>
            </li>
            <li class="left clearfix"><span class="chat-img pull-left">
              <img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
              </span>
              <div class="chat-body clearfix">
                <div class="header"><strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc.</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="panel-footer">
          <div class="input-group">
            <input id="btn-input" type="text" class="form-control input-md" placeholder="Type your message here..." /><span class="input-group-btn">
              <button class="btn btn-primary btn-md" id="btn-chat">Send</button>
          </span></div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          To-do List
          <ul class="pull-right panel-settings panel-button-tab-right">
            <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
              <em class="fa fa-cogs"></em>
            </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li>
                  <ul class="dropdown-settings">
                    <li><a href="#">
                      <em class="fa fa-cog"></em> Settings 1
                    </a></li>
                    <li class="divider"></li>
                    <li><a href="#">
                      <em class="fa fa-cog"></em> Settings 2
                    </a></li>
                    <li class="divider"></li>
                    <li><a href="#">
                      <em class="fa fa-cog"></em> Settings 3
                    </a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
        <div class="panel-body">
          <ul class="todo-list">
            <li class="todo-list-item">
              <div class="checkbox">
                <input type="checkbox" id="checkbox-1" />
                <label for="checkbox-1">Make coffee</label>
              </div>
              <div class="pull-right action-buttons"><a href="#" class="trash">
                <em class="fa fa-trash"></em>
              </a></div>
            </li>
            <li class="todo-list-item">
              <div class="checkbox">
                <input type="checkbox" id="checkbox-2" />
                <label for="checkbox-2">Check emails</label>
              </div>
              <div class="pull-right action-buttons"><a href="#" class="trash">
                <em class="fa fa-trash"></em>
              </a></div>
            </li>
            <li class="todo-list-item">
              <div class="checkbox">
                <input type="checkbox" id="checkbox-3" />
                <label for="checkbox-3">Reply to Jane</label>
              </div>
              <div class="pull-right action-buttons"><a href="#" class="trash">
                <em class="fa fa-trash"></em>
              </a></div>
            </li>
            <li class="todo-list-item">
              <div class="checkbox">
                <input type="checkbox" id="checkbox-4" />
                <label for="checkbox-4">Make more coffee</label>
              </div>
              <div class="pull-right action-buttons"><a href="#" class="trash">
                <em class="fa fa-trash"></em>
              </a></div>
            </li>
            <li class="todo-list-item">
              <div class="checkbox">
                <input type="checkbox" id="checkbox-5" />
                <label for="checkbox-5">Work on the new design</label>
              </div>
              <div class="pull-right action-buttons"><a href="#" class="trash">
                <em class="fa fa-trash"></em>
              </a></div>
            </li>
            <li class="todo-list-item">
              <div class="checkbox">
                <input type="checkbox" id="checkbox-6" />
                <label for="checkbox-6">Get feedback on design</label>
              </div>
              <div class="pull-right action-buttons"><a href="#" class="trash">
                <em class="fa fa-trash"></em>
              </a></div>
            </li>
          </ul>
        </div>
        <div class="panel-footer">
          <div class="input-group">
            <input id="btn-input" type="text" class="form-control input-md" placeholder="Add new task" /><span class="input-group-btn">
              <button class="btn btn-primary btn-md" id="btn-todo">Add</button>
          </span></div>
        </div>
      </div>
    </div><!--/.col-->


    <div class="col-md-6">
      <div class="panel panel-default ">
        <div class="panel-heading">
          Timeline
          <ul class="pull-right panel-settings panel-button-tab-right">
            <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
              <em class="fa fa-cogs"></em>
            </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li>
                  <ul class="dropdown-settings">
                    <li><a href="#">
                      <em class="fa fa-cog"></em> Settings 1
                    </a></li>
                    <li class="divider"></li>
                    <li><a href="#">
                      <em class="fa fa-cog"></em> Settings 2
                    </a></li>
                    <li class="divider"></li>
                    <li><a href="#">
                      <em class="fa fa-cog"></em> Settings 3
                    </a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
        <div class="panel-body timeline-container">
          <ul class="timeline">
            <li>
              <div class="timeline-badge"><em class="glyphicon glyphicon-pushpin"></em></div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
                </div>
                <div class="timeline-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-badge primary"><em class="glyphicon glyphicon-link"></em></div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
                </div>
                <div class="timeline-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-badge"><em class="glyphicon glyphicon-camera"></em></div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
                </div>
                <div class="timeline-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-badge"><em class="glyphicon glyphicon-paperclip"></em></div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
                </div>
                <div class="timeline-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div><!--/.col-->
    <div class="col-sm-12">
      <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
    </div>
  </div><!--/.row-->
@stop
