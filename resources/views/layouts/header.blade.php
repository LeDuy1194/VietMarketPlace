<header id="header" class="">
  <div class="header-custom container">
      <div class="header-nav-custom row">
          <nav class="navbar navbar-toggleable-md bg-faded navbar-custom">
              <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
          <!-- <a class="navbar-brand" href="{{url('/')}}"><img src="../public/img/logo.png" /></a> -->
              <a class="navbar-brand" href="{{url('/')}}">Viet Marketplace</a>
              <div class="collapse navbar-collapse navbar-custom-header" id="navbarSupportedContent">
                  <ul class="navbar-nav navbar-custom-header primary-header-custom navbar-menu-custom">
                      <li class="nav-item">
                          <div class="dropdown dropdown-cate-custom">
                              <button class="btn btn-secondary dropdown-toggle dropdown-custom-cate-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Danh mục
                              </button>
                              <?php
                              $cateModel = new App\Models\Cate();
                              $cates = $cateModel->getAllCate();
                              ?>
                              <div class="dropdown-menu dropdown-cate-list" aria-labelledby="dropdownMenuButton">
                                  @foreach($cates as $cate)
                                      <a class="dropdown-item" href="{{route('listByCate',[$cate->id])}}">{!! $cate->name !!}</a>
                                  @endforeach
                                  <hr class="hr-custom">
                                  <a class="dropdown-item all-cate-item" href="{{route('listByCate',0)}}">Tất cả tin</a>
                              </div>
                          </div>
                      </li>
                      @if(Auth::check())

                          <li class="nav-item">
                              <a class="nav-link" href="{{route('getupload')}}">Đăng tin</a>
                          </li>

                          {{--<li class="nav-item">
                              <a class="nav-link" href="{{route('MyStore')}}">Cửa hàng của tôi</a>
                          </li>--}}

                          <li class="nav-item">
                              <a class="nav-link" href="{{route('myMark')}}">Xem sau</a>
                          </li>
                          </li>
                          @if(Auth::user()->level == 2)
                              <li class="nav-item">
                                  <a class="nav-link" href="{{route('admin.cate.list')}}">Admin</a>
                              </li>
                          @endif
                      @endif
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('Map')}}">Bản đồ</a>
                      </li>

                      {{--<li class="nav-item">
                        <a class="nav-link" href="#">Về chúng tôi</a>
                      </li>--}}
                  </ul>
                  <ul class="navbar-nav navbar-custom-header primary-header-custom navbar-info-custom">
                      @if(Auth::check())
                          <?php
                          $stockNotiModel = new App\Models\StockNotification();
                          $orderNotiModel = new App\Models\OrderNotification();
                          $stockNotiNoRead = $stockNotiModel->getAllStockNotificationNoRead(Auth::id());
                          $stockNotiNoRead = sizeof($stockNotiNoRead);
                          $orderNotiNoRead = $orderNotiModel->getAllOrderNotificationNoRead(Auth::id());
                          $orderNotiNoRead = sizeof($orderNotiNoRead);
                          $totalMatchNoti = $stockNotiNoRead + $orderNotiNoRead;
                          ?>
                          <li class="notification-status img-status-header">
                              <i class="fa fa-globe noti-status img-status-custom" aria-hidden="true"></i>
                              <span class="print-number-noti">
                                   @if($totalMatchNoti != 0)
                                      <sup class="total-noti">{!! $totalMatchNoti !!}</sup>
                                  @endif
                              </span>
                              <div id="notifications-container-menu">
                                  <div class="notifications-header">
                                      <h3 class="title-noti-menu">Thông báo</h3>
                                  </div>
                                  <div id="notifications-body">
                                      <ul class="nav nav-pills" id="notification-tabs" role="tablist">
                                          <li class="nav-item nav-custom nav-noti-menu nav-stock-noti">
                                              <a class="nav-link active nav-stock-notis" href="#stockNotification" name="btnStockNotification">Tin rao bán
                                                  <span class="badge badge-danger stock-notification-number"></span>
                                              </a>
                                          </li>
                                          <li class="nav-item nav-custom nav-noti-menu nav-order-noti">
                                              <a class="nav-link nav-order-notis" href="#orderNotification" name="btnOrderNotification">Tin tìm mua
                                                  <span class="badge badge-danger order-notification-number"></span>
                                              </a>
                                          </li>
                                      </ul>
                                      <div class="tab-content list-noti-content">
                                          <div class="row tab-pane active content-noti-custom" id="stockNotification" role="tabpanel">
                                          </div>
                                          <div class="row tab-pane content-noti-custom" id="orderNotification" role="tabpanel"></div>
                                      </div>
                                  </div>
                                  <div class="notifications-footer">
                                      <h3 class="see-all-notis">Đánh dấu tất cả đã đọc</h3>
                                  </div>
                              </div>
                          </li>
                          <li class="img-avatar-header img-status-header">
                              <img alt="{!! Auth::user()->username !!}" src="{!! asset('resources/upload/user/') !!}/{!! Auth::user()->avatar !!}" class="img-circle img-ava-header">
                          </li>
                          <li class="dropdown dropdown-custom open img-status-header">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{Auth::user()->username}}
                              </button>
                              <div class="dropdown-menu profile-dropdown-custom" aria-labelledby="dropdownMenu1">
                                  <a class="dropdown-item" href="{!! url('profile', [Auth::user()->username]) !!}">Hồ sơ</a>
                                  <a class="dropdown-item" href="{{route('MyStore')}}">Cửa hàng của tôi</a>
                                  <hr>
                                  <a class="dropdown-item" href="{!! url('logout') !!}">Đăng xuất</a>
                              </div>
                          </li>
                      @else
                          <li class="nav-item">
                              <a class="nav-link" href="{{url('login')}}">Đăng nhập</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{url('register')}}">Đăng ký</a>
                          </li>
                      @endif
                  </ul>
              </div>
          </nav>
      </div>
  </div>
</header><!-- /header -->