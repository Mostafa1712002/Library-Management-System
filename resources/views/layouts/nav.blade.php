  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
              {{ config('app.name', 'Laravel') }}
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('message.Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav me-auto">

              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ms-auto">
                  <!-- Authentication Links -->
                  @guest
                  @if (Route::has('login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('message.login') }}</a>
                  </li>
                  @endif
                  @if(app()->getLocale() == 'ar')


                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('toggle-lang','en') }}" "> English</a>
                  </li>
                  @else
                  <li class=" nav-item">
                          <a class="nav-link" href="{{ route('toggle-lang','ar') }}" "> العربيه</a>
                  </li>
                  @endIf
                  @if (Route::has('register'))
                  <li class=" nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('message.register') }}</a>
                  </li>

                  @endif
                  @else
                  <li class="nav-item dropdown">


                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                      </a>

                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                              {{ __('message.logout') }}
                          </a>


                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </div>
                  </li>
                  @endguest
              </ul>
          </div>
      </div>
  </nav>
  <main>
      <section class="py-5 text-center container">
          <div class="row py-lg-5">
              <div class="col-lg-6 col-md-8 mx-auto">
                  <h1 class="fw-light">Library Management System</h1>
                  <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>

              </div>
          </div>
      </section>

      <div class="row">
          <div class="col-lg-6 col-md-8 mx-auto">
              <p>
                  @if (Route::has('login'))
                  <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                      @auth
                      @if(admin())
                      <a href="{{ route('books.create') }}" class="btn btn-primary my-2">create book</a>
                      <a href="{{ route('tags.create') }}" class="btn btn-primary my-2">add tag</a>
                      @endIf
                      <a href="{{ route('orders.index') }}" class="btn btn-primary my-2">orders</a>
                      @endIf
                  </div>
                  @endif
                  @include('flash::message')

              </p>
          </div>
      </div>
