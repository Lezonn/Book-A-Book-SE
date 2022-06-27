<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap');

    a{
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
    }

    .logout{
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
    }

    .fa-user {
        color: white;
    }

    .fa-cart-shopping{
      color : white;
      margin: 0px 20px
    }

    .fa-right-from-bracket {
        color: white;
    }

    form {
        margin-bottom: 0 !important;
    }

    .search {
        margin-right: 4%;
    }

    .logout-form {
        padding: auto 0;
        margin: 0 30px !important;
    }

    .fas {
        width: ;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Book A Book</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @if (!Request::is('stores') && !Request::is('profile*') && !Request::is('cart'))
            <li class="nav-item">
                <a class="nav-link active" href="/stores/{{ $store->slug }}">Home</a>
              </li>
          @endif

          <li class="nav-item">
            <a class="nav-link active" href="/stores">Stores</a>
          </li>
        </ul>

        @if (!Request::is('stores') && !Request::is('profile*') && !Request::is('cart') )
        <div class="d-flex mb-0 search">
            <form action="/stores/{{ $store->slug }}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                </div>
            </form>
        </div>
        @endif

        <form action="/profile">
            <div class="input-group">
                <button type="submit" class="logout bg-dark border-0"><i class="fas fa-user fa-xl"></i></button>
            </div>
        </form>
        <form action="/cart">
            <div class="input-group">
                <button type="submit" class="bg-dark border-0"><i class="fas fa-cart-shopping fa-xl"></i></button>
            </div>
        </form>

        <form action="/logout" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout bg-dark border-0"><i class="fas fa-right-from-bracket fa-xl"></i></button>
        </form>

      </div>
    </div>
</nav>
