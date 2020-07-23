<!-- home about contact profile yae arr lone ko template ta ku htal yu -->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lupus Electronic Voting</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('clean_blog/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('clean_blog/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{ asset('clean_blog/css/clean-blog.min.css') }}" rel="stylesheet">

<style type="text/css">
.products {
    position: relative;
    width: 100%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.products:hover .image {
  opacity: 0.3;
}

.products:hover .middle {
  opacity: 1;
}

.text {
  background-color: white;
  color: white;
  font-size: 16px;
}



.zoom {
    padding: 3px;
    transition: transform .2s;
    width: 300px;
    height: 180px;
    margin: 0 auto;
}

.zoom:hover {
    -ms-transform: scale(1.3); /* IE 9 */
    -webkit-transform: scale(1.3); /* Safari 3-8 */
    transform: scale(1.3); 
}
</style>

</head>

<body background="{{asset('img/bg.jpg')}}">

  <!-- Navigation -->

  <nav class="navbar navbar-expand-lg navbar-light bg-info py-4 shadow">

  <div class="container">
  <a href="{{route('index')}}" class="navbar-brand"><img src="{{ asset('img/logo2.jpg') }}" class="mx-2" width="80px" height="80px">Online Voting System</a>

  <button class="navbar-toggler" data-toggle="collapse" data-target="#myNav">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div id="myNav" class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a href="{{route('index')}}" class="nav-link">HOME</a></li>
      <li class="nav-item"><a href="{{route('about')}}" class="nav-link">ABOUT</a></li>
      <li class="nav-item"><a href="{{route('help')}}" class="nav-link">HELP</a></li>
      @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
    </ul>
  </div>
  </div>
    
  </nav>
  

@yield('content') <!-- Empty space name -->

  <!-- Footer -->
  <footer class="bg-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="https://twitter.com/">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://facebook.com/">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://github.com/">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p align="center">Copyright &copy; Your Website 2019</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('clean_blog/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('clean_blog/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ asset('clean_blog/js/clean-blog.min.js') }}"></script>

</body>

</html>
