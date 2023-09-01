<html lang="zh-TW">
  <head>
      <meta charset="UTF-8">
      <meta name="description" content="{{$webData['webConfig'][2]->tittle}}">
      <meta name="keywords" content="{{$webData['webConfig'][1]->tittle}}">
      <title>@yield('title'){{$webData['webConfig'][0]->tittle}}</title>
      <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}css/bulma.css">
      <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}css/fontawesome-all.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="{{asset('favicon.png')}}" type="image/png">
      <a>{!! $webData['webConfig'][4]->tittle !!}</a>
      <script src="{{$webData['webConfig'][13]->tittle}}js/jquery-3.3.1.min.js"></script>
      <script src="{{$webData['webConfig'][13]->tittle}}js/typed.umd.js"></script>
  </head>
  <body>
  <section class="hero is-fullheight">
      <div class="hero-body">
          <div class="container has-text-centered">
            <img class="loading-logo" src="{{$webData['webConfig'][13]->tittle}}images/Logo_Loading.png">
            <p class="title is-1">
              <span id="errText" class="has-text-link has-text-shadow"></span>
            </p>
            <p class="subtitle is-3 mt-3 mb-3">好像發生了問題，可能回首頁或晚點再來~</p>
            <a href="/"><button class="button is-link is-large">回到起點</button></a>
          </div>
      </div>
  </section>
  </body>
  <script id="mainScript">
    var typed = new Typed("#errText", {
        strings:["5 0 0",],
        stringsElement: '#typed-strings',
        typeSpeed: 30,
        startDelay: 1000,
        backSpeed: 70,
        backDelay: 2000,
        loop: true,
    });
  </script>
</html>
