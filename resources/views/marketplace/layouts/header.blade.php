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
        margin-right: 4%;
    }

    form {
        margin-right: 4%;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Book A Book</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
        </ul>

        <form class="d-flex mb-0">
          <input class="form-control me-2" type="search" placeholder="Search">
        </form>

        {{-- <div class="nav-item text-nowrap">
            <form action="/logout" method="POST">
              @csrf
                <button type="submit" class="logout nav-link px-3 bg-dark border-0">Logout <span data-feather="log-out"></span> </button>
            </form>
        </div> --}}
        <i class="fa-solid fa-user"></i>
      </div>
    </div>
</nav>
