<!------------ Start Footer Section ------------>

<footer class="footer bg-custom text-white">
    <div class="container">
        <!-- First Row -->
        <div class="row py-5">
            <div class="col-md-4">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/RFS.svg') }}" alt="Logo" class="footer-logo mb-6"></a>
                <p class="footer-description" style="text-align:justify; font-size: 12px;">
                    At RFS Logo Design, we turn logo dreams into reality for clients worldwide.
                    With a knack for creating stunning, sophisticated logos at budget-friendly
                    prices, we cater to every industry. Get in touch with us today!</p>
                <div class="social-icons">
                    {{-- <a href="#"><i class="bi bi-whatsapp"></i></a> --}}
                    <a href="https://www.facebook.com/rfslogodesign/" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/rfs_logodesign/" target="_blank"><i
                            class="bi bi-instagram"></i></a>
                    {{-- <a href="#"><i class="bi bi-twitter"></i></a> --}}
                    {{-- <a href="#"><i class="bi bi-linkedin"></i></a> --}}
                </div>
            </div>
            {{-- <div class="col-md-2"> --}}
            <div class="col-12 col-sm-12 col-lg-2 col-xl-2">
                <h5>About Company</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/about-us') }}">About Us</a></li>
                    <li><a href="{{ url('/how-it-works') }}">How it Works</a></li>
                    <li><a href="{{ url('/frequently-asked-question') }}">FAQ</a></li>
                    <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                    <li><a href="{{ url('site-map') }}">Sitemap</a></li>
                </ul>
            </div>


            {{-- <div class="col-md-2"> --}}
            <div class="col-12 col-sm-12 col-lg-2 col-xl-2">
                <h5>Top Locations</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/logo-design-california') }}">California Logo Design</a></li>
                    <li><a href="{{ url('/logo-design-florida') }}">Florida Logo Design</a></li>
                    <li><a href="{{ url('/logo-design-texas') }}">Texas Logo Design</a></li>
                    <li><a href="{{ url('/logo-design-pennsylvania') }}">Pennsylvania Logo Design</a></li>
                    <li><a href="{{ url('/logo-design-illinois') }}">Illinois Logo Design</a></li>
                    <li><a href="{{ url('/logo-design-ohio') }}">Ohio Logo Design</a></li>
                    <li><a href="{{ url('/logo-design-new-jersey') }}">New Jersey Logo Design</a></li>
                    <li><a href="{{ url('/logo-design-arizona') }}">Arizona Logo Design</a></li>
                    <li><a href="{{ url('/logo-design-new-york') }}">New York Logo Design</a></li>
                    <li><a href="{{ url('/logo-design-virginia') }}">Virginia Logo Design</a></li>
                </ul>
            </div>


            {{-- <div class="col-md-2"> --}}
            <div class="col-12 col-sm-12 col-lg-2 col-xl-2">
                <h5>Other Services</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('printing') }}">Printing</a></li>
                    <li><a href="{{ url('stationery-designing') }}">Stationery Designing</a></li>
                    <li><a href="{{ url('graphic-designing') }}">Graphic Designing</a></li>
                    <li><a href="{{ url('website-design-development') }}">Website Design Development</a></li>
                    <li><a href="{{ url('custom-website-design-development') }}">Custom Website Design Development</a>
                    </li>
                    <li><a href="{{ url('wordpress-website-development') }}">Wordpress Website Development</a></li>
                    <li><a href="{{ url('shopify-website-development') }}">Shopify Website Development</a></li>
                    <li><a href="{{ url('e-commerce-website-development') }}">E-commerce Website Development</a></li>
                </ul>
            </div>

        </div>

        <!-- Second Row -->
        <div class="row border-top py-3">
            <div class="col-md-6">
                <p>&copy; 2024 RFSLogoDesign</p>
            </div>

            <div class="col-md-6 text-md-end">
                <a href="{{ url('terms-condition') }}" class="footer-link">Terms & Conditions</a> |
                <a href="{{ url('privacy-policy') }}" class="footer-link">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>
