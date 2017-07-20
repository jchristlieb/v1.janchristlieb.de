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


                // Enable the tooltip bootstrap class
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });

                var navbar = $('div.nav-bg-default');

                $("button.navbar-toggler ").click(function(){
                    navbar.addClass("nav-bg-scroll");
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
                var nav_position = $('#site-intro').offset();
                var navbar = $('div.nav-bg-default');


                $(document).scroll(function () {
                    var y = $(this).scrollTop();
                    if (y >= nav_position.top) {
                        navbar.addClass('nav-bg-scroll');
                    } else {
                        navbar.removeClass('nav-bg-scroll');
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
                            if(char === '<')index= sentence.indexOf('>',index);
                            document.getElementById(id).innerHTML= sentence.substr(0,index);
                            if(++index === sentence.length){
                                clearInterval(timer);
                            }
                        }, speed);

                } //printGreeting
                printGreeting(
                    'about',
                    '<h1 class="introduction">Hi, ich bin Jan</h1>' +
                    '<p>Ich entwickle Webseiten und digitale Marketing Strategien. Interessiert? <a class="lets-talk" href="#contact">Lass uns reden</a></p>',
                    50
                );

            }
        },
        // Fire those code on all Template service pages
        'page_template_service_page': {
            init: function () {
                // JavaScript to be fired on all pages
            },
            finalize: function () {
                // JavaScript to be fired on all pages, after page specific JS is fired

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

                // When the user scrolls down to TOC element, show the back-to-toc-button
                var toc_position = $('#toc').offset();

                $(window).on('scroll', function () {
                    var y = $(this).scrollTop();
                    if (y >= toc_position.top) {
                        document.getElementById("toc-btn").style.display = "block";
                    } else {
                        document.getElementById("toc-btn").style.display = "none";
                    }
                });

                // When the user clicks on the back-to-toc-button, scroll to the toc
                $("#toc-btn").click(function() {
                    $('html, body').animate({
                        scrollTop: $("#toc").offset().top
                    }, 400);
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