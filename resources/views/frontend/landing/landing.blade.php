<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css/all.css')}}">
  <title>Landing | Resume</title>
</head>

<body>
  <div id="app">
  <header>
        <div class="menu-toggler">
            <div class="bar half start"></div>
            <div class="bar"></div>
            <div class="bar half end"></div>
        </div>
        <nav class="top-nav">
            <ul class="nav-list">
                <li>
                    <a href="#home"  class="{{ Request::is('/') ? 'active' : '' }} nav-link">Home</a>
                </li>
                <li>
                    <a href="#about" class="{{ Request::is('/about') ? 'active' : '' }} nav-link" >About</a>
                </li>
                <li>
                    <a href="#service" class="nav-link">Services</a>
                </li>
                <li>
                    <a href="#gallery" class="nav-link">Experience</a>
                </li>
                <li>
                    <a href="#contact" class="nav-link">Contact</a>
                </li>
            </ul>
        </nav>
    </header>
        <router-view></router-view>
  </div>
  <script src="{{mix('js/app.js')}}"></script>
  <script src="{{asset('js/all.js')}}"></script>
  <script>$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
  
  </script>
  <script>

  </script>
</body>

</html>