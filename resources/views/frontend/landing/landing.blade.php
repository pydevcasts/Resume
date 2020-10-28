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
                    <a href="#hom" class="nav-link">Home</a>
                </li>
                <li>
                    <a href="#about" class="nav-link">About</a>
                </li>
                <li>
                    <a href="#service" class="nav-link">Services</a>
                </li>
                <li>
                    <a href="#experience" class="nav-link">Experience</a>
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
</body>

</html>