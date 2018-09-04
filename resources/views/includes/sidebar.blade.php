<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span></button>
      <a class="navbar-brand" href="#"><span>Post</span>ier</a>
      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
          <em class="fas fa-envelope"></em><span class="label label-danger">0</span>
        </a>
          <ul class="dropdown-menu dropdown-messages">
            <li>
              <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                <img alt="image" class="img-circle" src="#">
                </a>
                <div class="message-body"><small class="pull-right">0 mins geleden</small>
                  <a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
                <br /><small class="text-muted">1:24 pm - 25/03/2018</small></div>
              </div>
            </li>
            <li class="divider"></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
          <em class="fas fa-bell"></em><span class="label label-info">0</span>
        </a>
          <ul class="dropdown-menu dropdown-alerts">
            <li><a href="#">
              <div><em class="fa fa-envelope"></em> 0 New Message
                <span class="pull-right text-muted small">0 mins ago</span></div>
            </a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  <div class="profile-sidebar">
    <div class="profile-userpic">
      <img src="#" class="img-responsive" alt="">
    </div>
    <div class="profile-usertitle">
      <div class="profile-usertitle-name">Yolan Mees</div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="divider"></div>
  <form role="search">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Search">
    </div>
  </form>
  <ul class="nav menu">
    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/"><em class="fas fa-home"></em> Dashboard</a></li>
    <li class="{{ Request::is('connections') ? 'active' : '' }}"><a href="/connections"><em class="fas fa-plug">&nbsp;</em> Connections</a></li>
    <li class="{{ Request::is('posts') ? 'active' : '' }}"><a href="/posts"><em class="fas fa-exchange-alt">&nbsp;</em> Posts</a></li>
    <li class="parent "><a data-toggle="collapse" href="#">
      <em class="fa fa-plus">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#" class="icon pull-right"><em class="fa fa-plus"></em></span>
      </a>
      <ul class="children collapse" id="sub-item-1">
        <li><a class="" href="#">
          <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
        </a></li>
      </ul>
    </li>
    <li><a href="#"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
  </ul>
</div><!--/.sidebar-->
