<!-----<h5 class="text-center cent" style="margin-top: 2px; color: white; background-color: rgb(99, 2, 2);">PLACES OF NOTE </h5>
<br>
<hr>

<div class="container-fluid">
        <div class="row">
<div class="col-sm-4">
    <div class="card">
<img src="{{ url('pages/image/IMG_5072.jpg') }}" alt="event" width="100%" height="50%">
<h6 class="card-title text-center">Erin Ijesha Waterfall</h6>
</div>
</div>

<div class="col-sm-4">
    <div class="card">
<img src="{{ url('pages/image/IMG_5071.jpg') }}" alt="event" width="100%" height="50%">
<h6 class="card-title text-center">Osun Osogbo Groove</h6>
</div>
</div>

<div class="col-sm-4">
    <div class="card">
<img src="{{ url('pages/image/IMG_5073.jpg') }}" alt="event" width="100%" height="50%">
<h6 class="card-title text-center">Ooni's Palace Ile-Ife</h6>
</div>
</div>

</div>
 </div>---->
<!---<div class="container-fluid mt-5">
    <div class="row bga">
        <div class="col-sm-3">
            <h5 class="ml-5" style="color: rgb(105, 3, 3);">Product</h5>
            <ul>
                <li>Key Feature</li>
                <li>Event Ticketing</li>
                <li>Booking</li>
                <li>Online Promotion</li>
            </ul>
        </div>
        <div class="col-sm-3">
            <h5 class="ml-5" style="color: rgb(105, 3, 3);">Explore More</h5>
            <ul>
                <li>Event Promoter</li>
                <li>Sell Tickets</li>
                <li>Event Organiser</li>
            </ul>
        </div>
        <div class="col-sm-3">
            <h5 class="ml-5" style="color: rgb(105, 3, 3);">Connect With Us</h5>
            <ul class="text-left">
                <li>Event Promoter</li>
                <li> <i class="fab fa-instagram"></i> <span>&nbsp; instagram</span></li>
                <li><i class="fab fa-telegram"></i><span>&nbsp; telegram</span></li>
                <li><i class="fab fa-facebook"></i><span>&nbsp; facebook</span></li>
            </ul>
        </div>
        <div class="col-sm-3">
            <h5 style="color: rgb(105, 3, 3);">Payment Available</h5>
        </div>
    </div>
</div>--->
<button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-level-up" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- //move top -->

    <!-- common jquery plugin -->
    <script src="{{ asset('pages/assets/js/jquery-3.3.1.min.js')}}"></script>
    <!-- //common jquery plugin -->

    <!-- slider-js -->
    <script src="{{ asset('pages/assets/js/jquery.min.js') }}"></script>
    <script src=" {{ asset('pages/assets/js/modernizr-2.6.2.min.js') }}"></script>
    <script src=" {{ asset('pages/assets/js/jquery.zoomslider.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- //slider-js -->

    <!-- owl carousel -->
    <script src="pages/assets/js/owl.carousel.js"></script>
    <!-- script for tesimonials carousel slider -->
    <script>
        $(document).ready(function () {
            $("#owl-demo2").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: false,
                        loop: false
                    }
                }
            })
        })
    </script>
    <!-- //script for tesimonials carousel slider -->

    <!-- theme switch js (light and dark)-->
    <script src="pages/assets/js/theme-change.js"></script>
    <script>
        function autoType(elementClass, typingSpeed) {
            var thhis = $(elementClass);
            thhis.css({
                "position": "relative",
                "display": "inline-block"
            });
            thhis.prepend('<div class="cursor" style="right: initial; left:0;"></div>');
            thhis = thhis.find(".text-js");
            var text = thhis.text().trim().split('');
            var amntOfChars = text.length;
            var newString = "";
            thhis.text("|");
            setTimeout(function () {
                thhis.css("opacity", 1);
                thhis.prev().removeAttr("style");
                thhis.text("");
                for (var i = 0; i < amntOfChars; i++) {
                    (function (i, char) {
                        setTimeout(function () {
                            newString += char;
                            thhis.text(newString);
                        }, i * typingSpeed);
                    })(i + 1, text[i]);
                }
            }, 1500);
        }

        $(document).ready(function () {
            // Now to start autoTyping just call the autoType function with the
            // class of outer div
            // The second paramter is the speed between each letter is typed.
            autoType(".type-js", 200);
        });
    </script>
    <!-- //theme switch js (light and dark)-->

    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!--bootstrap-->
    <script src="{{ asset('pages/assets/js/bootstrap.min.js') }}"></script>
    <script>
        function preventclick(id){
        document.getElementById(id).addEventListener('click', function(e)
        {
         e.preventDefault();
         Swal.fire('Check back');

        })
        }
         preventclick('prevent-contact');
          preventclick('prevent-about');
    </script>
