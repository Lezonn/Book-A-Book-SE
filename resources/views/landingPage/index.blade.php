<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/landingPage/landingPage.css" rel="stylesheet">

    <!-- Bootstrap scripts -->
    <script src="https://kit.fontawesome.com/41c370cdc2.js" crossorigin="anonymous"></script>
</head>

<body>

    <section class="container-fluid home">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#store">Our Store</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="d-flex justify-content-center home-text">
            <h1 class="home-title">Book A Book</h1>
            <p class="home-description d-block">
                A room without books like a body without soul.
            </p>
            <p class="home-description d-block">
                When we are collecting books, we are collecting happiness.
            </p>
            <p class="home-description d-block">
                Let's start collecting happiness with book a book !
            </p>
            <a href="/login">
                <button type="button" class="btn btn-dark btn-explore">Explore Now</button>
            </a>

        </div>
    </section>

    <section class="container-fluid ways d-flex">
        <h1 class="ways-title mt-3">Easiest way to book a book</h1>
        <hr class="line mb-5">
        <div class="steps d-flex align-items-center">
            <div class="card step" style="width: 15rem;">
                <img src={{ asset('images/landingPage/search.png') }} class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-text">SEARCH</h4>
                </div>
            </div>

            <div class="card step" style="width: 15rem;">
                <img src={{ asset('images/landingPage/book.png') }} class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-text">BOOK</h4>
                </div>
            </div>

            <div class="card step" style="width: 15rem;">
                <img src={{ asset('images/landingPage/payment.png') }} class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-text">PAYMENT</h4>
                </div>
            </div>

            <div class="card step" style="width: 15rem;">
                <img src={{ asset('images/landingPage/pickup.png') }} class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-text">PICKUP</h4>
                </div>
            </div>
        </div>
        <hr class="line mt-5 mb-5">
    </section>

    <section class="store" id="store">
        <div id="carouselStore" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselStore" data-bs-slide-to="0" class="active slide-indicator" aria-current="true" aria-label="Slide {{ 1 }}"></button>
            @foreach ( $stores as $store )
                @if($loop->iteration == 1)
                    @continue
                @endif
              <button type="button" data-bs-target="#carouselStore" data-bs-slide-to="{{ $loop->iteration - 1 }}" class="slide-indicator" aria-current="true" aria-label="Slide {{ $loop->iteration }}"></button>
            @endforeach
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src={{ $stores[0]->image ? asset('storage/' . $stores[0]->image) : 'https://source.unsplash.com/1600x900?book' }} class="img-fluid mt-3" alt="{{ $stores[0]->store_name }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $stores[0]->store_name }}</h5>
                        <p>{{ $stores[0]->store_address }}</p>
                    </div>
                </div>
                @foreach ( $stores as $store )

                @if($loop->iteration == 1)
                    @continue
                @endif

                <div class="carousel-item" data-bs-interval="10000">
                    <img src={{ $store->image ? asset('storage/' . $store->image) : 'https://source.unsplash.com/1600x900?book' }} class="img-fluid mt-3" alt="{{ $store->store_name }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $store->store_name }}</h5>
                        <p>{{ $store->store_address }}</p>
                    </div>
                </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselStore" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselStore" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="about-us" id="about">
        <div class="about-text">
            <h2 class="about-title">ABOUT US</h2>
            <hr class="line mt-5 mb-5">
            <div>
                <p class="about-content">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas illum consequuntur cumque veniam dolorum nam, repellat nihil, rem qui ut modi, itaque fugiat! Qui praesentium maxime corporis necessitatibus officiis voluptatibus neque? Neque repudiandae eos iusto, repellat veniam quam possimus dicta nesciunt voluptatibus aspernatur esse? Sunt impedit eligendi enim consequuntur nisi?
                </p>
            </div>
        </div>
    </section>

    <footer class="d-flex justify-content-center align-items-center" id="footer">
        <div class="social">
            <i class="social-icon fab fa-facebook fa-2x"></i>
            <i class="social-icon fab fa-twitter fa-2x"></i>
            <i class="social-icon fab fa-instagram fa-2x"></i>
            <i class="social-icon fas fa-envelope fa-2x"></i>
        </div>
        <p>©Copyright 2022 Book a Book</p>
      </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
