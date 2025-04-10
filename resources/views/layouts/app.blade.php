<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Prestige</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Fonturi Premium -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;600&display=swap" rel="stylesheet">
    <!-- AOS Animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <!-- Stiluri personalizate -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login_register.css') }}">

    @stack("styles")
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-light shadow-sm position-relative navbarbg">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                         @if(session('locale') == 'ro')
                            <img src="{{ asset('images/flags/ro.jpg') }}" alt="Română" class="me-2" width="20" height="15">
                        @else
                            <img src="{{ asset('images/flags/en.jpg') }}" alt="English" class="me-2" width="20" height="15">
                        @endif

                    </button>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="{{ route('lang.switch', 'ro') }}">
                            <img src="{{ asset('images/flags/ro.jpg') }}" alt="Română" class="me-2" width="20" height="15">
                            Română
                        </a></li>
                        <li><a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">
                            <img src="{{ asset('images/flags/en.jpg') }}" alt="English" class="me-2" width="20" height="15">
                            English
                        </a></li>
                    </ul>
                </div>
            </div>

            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </button>


            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto d-flex flex-wrap justify-content-center">
                    <li class="nav-item"><a class="nav-link" href="/">@lang('navbar.home')</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('aboutUs')}}">@lang('navbar.aboutus')</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('services')}}">@lang('navbar.services')</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">@lang('navbar.contact')</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">@lang('navbar.blog')</a></li>
                    <li class="nav-item">
                        <a class="btn btn-programare" style="width: 250px;" href="/programare">@lang('navbar.appointment')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://wa.me/40749141491" target="_blank">
                            <img src="{{asset('images/whatsapp.png')}}" class="whatsapp-image" alt="WhatsApp" />
                            WhatsApp
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#phone">
                            <img src="{{asset('images/telephone.png')}}" class="whatsapp-image" alt="Telefon" />
                            0749141491
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Buton Autentificare -->
            <div class="auth-container d-none d-lg-block">
                <button class="btn btn-outline-light btn-autentification" id="authButton">@lang('navbar.login')</button>
            </div>
        </div>
    </nav>


<!-- Modal de autentificare -->
@include('components.auth-modal')

<!-- Conținut din pagini -->
<main>
    @yield('content')
</main>
<footer class="footer py-5">
    <div class="container">
        <div class="row">
            <!-- Coloană cu informații de contact -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-uppercase font-weight-bold mb-3">@lang('footer.contact')</h5>
                <p><strong>@lang('footer.adress'):</strong> @lang('footer.street')  Carol Telbisz 6, Timisoara</p>
                <p><strong>@lang('footer.phone'):</strong> <a href="tel:+40749141491" >+40 749 141 491</a></p>
                <p><strong>@lang('footer.email'):</strong> <a href="mailto:contact@salon.ro" >contact@salon.ro</a></p>
            </div>

            <!-- Coloană cu linkuri utile -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-uppercase font-weight-bold mb-3">@lang('footer.links')</h5>
                <ul >
                    <li><a href="/despre-noi" class=" hover-effect">@lang('footer.about_us')</a></li>
                    <li><a href="/servicii" class="hover-effect">@lang('footer.services')</a></li>
                    <li><a href="/contact" class="hover-effect">@lang('footer.contact')</a></li>
                    <li><a href="/machiaj-profesional" class="hover-effect">@lang('footer.about_makeup_professional')</a></li>
                </ul>
            </div>

            <!-- Coloană cu rețele sociale -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-uppercase font-weight-bold mb-3">@lang('footer.follow_us')</h5>
                <p>@lang('footer.follow')</p>
                <div class="d-flex justify-content-center">
                    <a href="#" class="me-4">
                        <img src="{{asset('images/facebook.png')}}" class="icon-images" alt="Facebook"/>
                    </a><a href="#" class="me-4">
                        <img src="{{asset('images/instagram.png')}}" class="icon-images" alt="Instagram"/>
                    </a><a href="#">
                        <img src="{{asset('images/tik-tok.png')}}" class="icon-images" alt="Tiktok"/>
                    </a>
                </div>
            </div>

            <!-- Coloană cu orar -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-uppercase font-weight-bold mb-3">@lang('footer.schedule')</h5>
                <ul>
                    <li>@lang('footer.monday_friday')</li>
                    <li>@lang('footer.saturday')</li>
                    <li>@lang('footer.sunday')</li>
                </ul>
            </div>
        </div>

        <hr class="bg-black">

        <!-- Copyright -->
        <div class="text-center">
            <p>&copy; 2025 @lang('footer.rights')</p>
        </div>
    </div>
</footer>
<!-- Buton de întoarcere sus -->
<button onclick="window.scrollTo(0, 0)" class="btn btn-warning btn-circle" id="back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>


<!-- Bootstrap & AOS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

@stack('scripts')
<script>




    document.addEventListener("DOMContentLoaded", function () {
        const flipButtons = document.querySelectorAll(".flip-btn");
        const modalWrapper = document.querySelector(".modal-dialog");

        flipButtons.forEach((btn) => {
            btn.addEventListener("click", function (e) {
                e.preventDefault();
                modalWrapper.classList.toggle("flip-active");
            });
        });
    });

    AOS.init();

    // Afișează butonul doar când utilizatorul face scroll în jos
window.onscroll = function() {
    var backToTopButton = document.getElementById("back-to-top");

    // Dacă utilizatorul este la mai mult de 100px de sus
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        backToTopButton.style.display = "flex"; // Arată butonul
    } else {
        backToTopButton.style.display = "none"; // Ascunde butonul
    }
};

// La click pe buton, pagina va reveni sus
document.getElementById("back-to-top").addEventListener("click", function() {
    window.scrollTo({top: 0, behavior: 'smooth'});
});


document.addEventListener('DOMContentLoaded', function() {
        // Selectează butonul de autentificare și modalul
        const authButton = document.getElementById('authButton');
        const authModal = document.getElementById('authModal');
        const closeButton = authModal.querySelector('.btn-close');

        // Afișează modalul când butonul este apăsat
        authButton.addEventListener('click', function() {
            authModal.classList.add('show');
            authModal.style.display = 'block';
            document.body.classList.add('modal-open');
        });

        // Închide modalul dacă se face click în afara acestuia
        window.addEventListener('click', function(event) {
            if (event.target === authModal) {
                authModal.classList.remove('show');
                authModal.style.display = 'none';
                document.body.classList.remove('modal-open');
            }
        });

        // Închide modalul când butonul de închidere este apăsat
        closeButton.addEventListener('click', function() {
            authModal.classList.remove('show');
            authModal.style.display = 'none';
            document.body.classList.remove('modal-open');
        });
    });
</script>

</body>
</html>
