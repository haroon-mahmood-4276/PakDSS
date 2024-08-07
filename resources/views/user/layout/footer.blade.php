<footer class="landing-footer bg-white footer-text">
    <div class="footer-top">
        <div class="container">
            <div class="row gx-0 gy-4 g-md-5">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <a href="landing-page.html" class="app-brand-link mb-4">
                        <span class="app-brand-text demo footer-link fw-bold">{{ env('APP_NAME') }}</span>
                    </a>
                    <p class="footer-text footer-logo-description mb-4">
                        Pakistan's best online shopping store with 15+ million products at resounding discounts in
                        Karachi | Lahore | Islamabad | All across Pakistan with cash on delivery (COD).
                    </p>
                    <form class="footer-form">
                        <label for="footer-email" class="small">Subscribe to newsletter</label>
                        <div class="d-flex mt-1">
                            <input type="email" class="form-control rounded-0 rounded-start-bottom rounded-start-top"
                                id="footer-email" placeholder="Your email" />
                            <button type="submit"
                                class="btn btn-primary shadow-none rounded-0 rounded-end-bottom rounded-end-top">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12">
                    <h6 class="footer-title mb-4">Get to Know Us</h6>
                    <ul class="list-unstyled">
                        <li class="mb-1">
                            <a href="pricing-page.html" class="footer-link">About Us</a>
                        </li>
                        <li class="mb-1">
                            <a href="pricing-page.html" class="footer-link">Contact Us</a>
                        </li>
                        <li class="mb-1">
                            <a href="pricing-page.html" class="footer-link">How to Buy</a>
                        </li>
                        <li class="mb-1">
                            <a href="help-center-landing.html" class="footer-link">Help Center</a>
                        </li>
                        <li class="mb-1">
                            <a href="help-center-landing.html" class="footer-link">Return/Refund Policy</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12">
                    <h6 class="footer-title mb-4">Connect with Us</h6>
                    <ul class="list-unstyled">
                        <li class="mb-1">
                            <a href="pricing-page.html" class="footer-link">Facebook</a>
                        </li>
                        <li class="mb-1">
                            <a href="help-center-landing.html" class="footer-link">X</a>
                        </li>
                        <li class="mb-1">
                            <a href="help-center-landing.html" class="footer-link">Instagram</a>
                        </li>
                        <li class="mb-1">
                            <a href="help-center-landing.html" class="footer-link">YouTube</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12">
                    <h6 class="footer-title mb-4">Let Us Help You</h6>
                    <ul class="list-unstyled">
                        <li class="mb-1">
                            <a href="help-center-landing.html" class="footer-link">Your Account</a>
                        </li>
                        <li class="mb-1">
                            <a href="help-center-landing.html" class="footer-link">PakDSS Blog</a>
                        </li>
                        <li class="mb-1">
                            <a href="help-center-landing.html" class="footer-link">Returns Centre</a>
                        </li>
                        <li class="mb-1">
                            <a href="help-center-landing.html" class="footer-link">Recalls and Product Safety Alerts</a>
                        </li>
                        <li class="mb-1">
                            <a href="help-center-landing.html" class="footer-link">100% Purchase Protection</a>
                        </li>
                        <li class="mb-1">
                            <span class="footer-link">NTN Number: </span>
                        </li>
                        <li class="mb-1">
                            <span class="footer-link">STRN Number: </span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <h6 class="footer-title mb-4">Download our app</h6>
                    <a href="javascript:void(0);" class="d-block footer-link mb-3 pb-2"><img
                            src="{{ asset('admin-assets') }}/img/front-pages/landing-page/apple-icon.png"
                            alt="apple icon" /></a>
                    <a href="javascript:void(0);" class="d-block footer-link"><img
                            src="{{ asset('admin-assets') }}/img/front-pages/landing-page/google-play-icon.png"
                            alt="google play icon" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-3">
        <div
            class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
            <div class="mb-2 mb-md-0">
                <span class="footer-text">©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </span>
                <a href="{{ env('APP_URL') }}" target="_blank" class="fw-medium text-white footer-link">PakDSS,</a>
                <span class="footer-text"> Made with ❤️ for a you.</span>
            </div>
            <div>
                <a href="https://github.com/pixinvent" class="footer-link me-3" target="_blank">
                    <img src="{{ asset('admin-assets') }}/img/front-pages/icons/github-light.png" alt="github icon"
                        data-app-light-img="front-pages/icons/github-light.png"
                        data-app-dark-img="front-pages/icons/github-dark.png" />
                </a>
                <a href="https://www.facebook.com/pixinvents/" class="footer-link me-3" target="_blank">
                    <img src="{{ asset('admin-assets') }}/img/front-pages/icons/facebook-light.png"
                        alt="facebook icon" data-app-light-img="front-pages/icons/facebook-light.png"
                        data-app-dark-img="front-pages/icons/facebook-dark.png" />
                </a>
                <a href="https://twitter.com/pixinvents" class="footer-link me-3" target="_blank">
                    <img src="{{ asset('admin-assets') }}/img/front-pages/icons/twitter-light.png" alt="twitter icon"
                        data-app-light-img="front-pages/icons/twitter-light.png"
                        data-app-dark-img="front-pages/icons/twitter-dark.png" />
                </a>
                <a href="https://www.instagram.com/pixinvents/" class="footer-link" target="_blank">
                    <img src="{{ asset('admin-assets') }}/img/front-pages/icons/instagram-light.png" alt="google icon"
                        data-app-light-img="front-pages/icons/instagram-light.png"
                        data-app-dark-img="front-pages/icons/instagram-dark.png" />
                </a>
            </div>
        </div>
    </div>
</footer>
