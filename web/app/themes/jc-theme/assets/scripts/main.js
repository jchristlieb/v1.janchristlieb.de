/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    var Sage;
    Sage = {
        // All pages
        'common': {
            init: function () {
                // JavaScript to be fired on all pages
            },
            finalize: function () {
                // JavaScript to be fired on all pages, after page specific JS is fired

                // do not show the a title attribute on mouse-over but keep it for screen readers
                $(document).ready(function(){
                    $("a").hover(function(){
                        $(this).attr("rel", $(this).attr("title"));
                        $(this).removeAttr("title");
                    }, function(){
                        $(this).attr("title", $(this).attr("rel"));
                        $(this).removeAttr("rel");
                    });
                });


                // Navbar Toggle switch between bars and x
                $('.navbar-toggler').click(function(){
                    $(this).find('i').toggleClass('fa-bars fa-times');
                });


                // If hover on .dropdown add .highlight to parent menu item
                $(document).ready(function(){
                    $(".dropdown").hover(
                        function() {
                            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                            $(this).toggleClass('highlight');
                        },
                        function() {
                            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                            $(this).toggleClass('highlight');
                        }
                    );
                });

                // Navbar color change
                var navPosition = $('#site-intro').offset();
                var navbarArea = $('#primary-navigation');


                $(document).scroll(function () {
                    var y = $(this).scrollTop();
                    if (y >= navPosition.top) {
                        navbarArea.addClass('nav-bg-scroll');
                    } else {
                        navbarArea.removeClass('nav-bg-scroll');
                    }
                });

            }
        },
        // Home page
        'home': {
            init: function () {
                // JavaScript to be fired on the home page
            },
            finalize: function () {
                // JavaScript to be fired on the home page, after the init JS


                function printGreeting(id, sentence, speed) {
                    var index = 0,
                        timer = setInterval(function() {
                            var char= sentence.charAt(index);
                            if(char === '<'){
                                index = sentence.indexOf('>',index);
                            }
                            document.getElementById(id).innerHTML= sentence.substr(0,index);
                            if(++index === sentence.length){
                                clearInterval(timer);
                            }
                        }, speed);

                } //printGreeting
                printGreeting(
                    'about',
                    '<h1 class="introduction">Hi, ich bin Jan</h1>' +
                    '<p class="lead">Ich entwickle <a href="#teasers">Webseiten</a> und digitale <a href="#teasers">Marketing Strategien</a>. Interessiert? <a class="lets-talk" href="#contact">Lass uns reden</a></p>',
                    50
                );

                $(function() {
                    $('.card').matchHeight(options);
                });


            }
        },
        // Fire those code on all service pages
        'page_template_template_service_page': {
            init: function () {
                // JavaScript to be fired on all pages
            },
            finalize: function () {
                // JavaScript to be fired on all service pages, after page specific JS is fired

                $(function () {
                    $('#img-enlarge').on('click', function () {
                        $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
                        $('#enlargeImageModal').modal('show');
                    });
                });


                // Fadein/out Toc button based on window position
                var backToToc = $('#toc-btn');
                $(document).scroll(function () {
                    var y = $(this).scrollTop();
                    if (y >= $(window).height()) {
                        backToToc.fadeIn();
                    } else {
                        backToToc.fadeOut();
                    }
                });


                // Resize and reposition SideKickButtons at SM Screen Size
                $(document).ready(function () {
                    var sidekick_btn = $("#toc-btn, #qa-btn");

                    if ($(window).width() < 576) {
                        sidekick_btn.removeClass('fa-2x');
                        sidekick_btn.addClass('btn-sidekick-mobile');
                    } else {
                        sidekick_btn.addClass('fa-2x','btn-sidekick');
                        sidekick_btn.removeClass('btn-sidekick-mobile');
                    }
                });



                $(document).ready(function(){
                    // Add smooth scrolling to all links
                    $(".animated-link").on('click', function(event) {

                        // Make sure this.hash has a value before overriding default behavior
                        if (this.hash !== "") {
                            // Prevent default anchor click behavior
                            event.preventDefault();

                            // Store hash
                            var hash = this.hash;

                            $('html, body').animate({
                                scrollTop: $(hash).offset().top
                            }, 400, function(){

                                // Add hash (#) to URL when done scrolling (default click behavior)
                                window.location.hash = hash;
                            });
                        } // End if
                    });
                });


                // When the user clicks on the back-to-toc-button, scroll back to toc
                $("#toc-btn").click(function() {
                    $('html, body').animate({
                        scrollTop: $("#toc").offset().top
                    }, 400);
                });


            } // End finalize function
        }, // End page specific function
        // Fire those code on all single project pages
        'single_projects': {
            init: function () {
                // JavaScript to be fired on all pages



                function showDevices() {
                    if ($(window).width() < 768) {
                        $('.show-all-devices').css({ "display" : "none" });
                        $('.show-mobile-only').css({ "display" : "inherit" });
                    } else {
                        $('.show-all-devices').css({ "display" : "inherit" });
                        $('.show-mobile-only').css({ "display" : "none" });
                    }
                }

                $( window ).on('load', showDevices );
                $( window ).on('resize', showDevices );

            },
            finalize: function () {
                // JavaScript to be fired on all single project template pages, after page specific JS is fired

                $("#switchDevice, #device").click(function() {
                    if ($(".device-wrapper").hasClass("desktop")) {
                        $(".device-wrapper, .container").addClass("tablet").removeClass("desktop");
                        $(".screenshot-desktop").css({ "display" : "none" });
                        $(".screenshot-tablet").css({ "display" : "inherit" });
                        $(".screenshot-mobile").css({ "display" : "none" });
                    } else if ($(".device-wrapper").hasClass("mobile")) {
                        $(".device-wrapper, .container").addClass("desktop").removeClass("mobile").removeClass("tablet");
                        $(".screenshot-desktop").css({ "display" : "inherit" });
                        $(".screenshot-tablet").css({ "display" : "none" });
                        $(".screenshot-mobile").css({ "display" : "none" });
                    } else if ($(".device-wrapper").hasClass("tablet")) {
                        $(".device-wrapper, .container").addClass("mobile");
                        $(".screenshot-desktop").css({ "display" : "none" });
                        $(".screenshot-tablet").css({ "display" : "none" });
                        $(".screenshot-mobile").css({ "display" : "inherit" });
                    }

                });


            } // End finalize function
        }, // End page specific function




    }; // End of DOM-based routing function

    // The routing fires all common scripts, followed by the page specific scripts.
    // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function(func, funcname, args) {
            var fire;
            var namespace = Sage;
            funcname = (funcname === undefined) ? 'init' : funcname;
            fire = func !== '';
            fire = fire && namespace[func];
            fire = fire && typeof namespace[func][funcname] === 'function';

            if (fire) {
                namespace[func][funcname](args);
            }
        },
        loadEvents: function() {
            // Fire common init JS
            UTIL.fire('common');

            // Fire page-specific init JS, and then finalize JS
            $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
                UTIL.fire(classnm);
                UTIL.fire(classnm, 'finalize');
            });

            // Fire common finalize JS
            UTIL.fire('common', 'finalize');
        }
    };

    // Load Events
    $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.