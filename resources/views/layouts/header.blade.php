<header id="header" class="">
  <div class="header-custom container">
      <div class="header-nav-custom row">
          <nav class="navbar navbar-toggleable-md bg-faded navbar-custom">
              <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
          <!-- <a class="navbar-brand" href="{{url('/')}}"><img src="../public/img/logo.png" /></a> -->
              <a class="navbar-brand" href="{{url('/')}}">Viet Marketplace</a>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav navbar-custom-header primary-header-custom mr-auto mt-2 mt-md-0">
                      @if(Auth::check())

                          <li class="nav-item">
                              <a class="nav-link" href="{{route('getupload')}}">Đăng tin</a>
                          </li>

                          <li class="nav-item">
                              <a class="nav-link" href="{{route('MyStore')}}">Cửa hàng của tôi</a>
                          </li>

                          <li class="nav-item">
                              <a class="nav-link" href="{{route('myMark')}}">Xem sau</a>
                          </li>
                          </li>
                      @endif
                      <li class="nav-item sign-in">
                          <a class="nav-link" href="{{route('Map')}}">Bản đồ</a>
                      </li>

                      {{--<li class="nav-item">
                        <a class="nav-link" href="#">Về chúng tôi</a>
                      </li>--}}
                  </ul>
                  <ul class="navbar-nav my-2 my-lg-0 primary-header-logged-custom">
                      @if(Auth::check())
                          {{--<li class="img-wish-header img-status-header">--}}
                              {{--<img alt="{!! Auth::user()->username !!}" src="../public/img/wish.png " class="img-circle img-status-custom">--}}
                              {{--<span class="badge badge-danger">{!! $stock_author->count() !!}</span>--}}
                          {{--</li>--}}
                          {{--<li class="img-order-header img-status-header">--}}
                              {{--<img alt="{!! Auth::user()->username !!}" src="../public/img/order.png " class="img-circle img-status-custom">--}}
                          {{--</li>--}}
                          {{--<li class="img-stock-header img-status-header">--}}
                              {{--<img alt="{!! Auth::user()->username !!}" src="../public/img/stock.png " class="img-circle img-status-custom">--}}
                          {{--</li>--}}
                          <li class="img-avatar-header">
                              <img alt="{!! Auth::user()->username !!}" src="{!! asset('resources/upload/user/') !!}/{!! Auth::user()->avatar !!}" class="img-circle img-ava-header">
                          </li>
                          <li class="dropdown dropdown-custom open">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{Auth::user()->username}}
                              </button>
                              <div class="dropdown-menu profile-dropdown-custom" aria-labelledby="dropdownMenu1">
                                  <a class="dropdown-item" href="{!! url('profile', [Auth::user()->username]) !!}">Hồ sơ</a>
                                  <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
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