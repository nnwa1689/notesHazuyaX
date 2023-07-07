<html lang="zh-TW">
<head>
    <a id="top"></a>
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
</head>
<body>
    <div class="hero is-fullheight">
      <div class="hero-body has-text-centered  is-justify-content-center">
          <img class="loading-logo" src="{{$webData['webConfig'][13]->tittle}}images/Logo_Loading.png">
          <p class="title is-1">
            <span class="has-text-link has-text-shadow">４０４</span>
          </p>
          <p class="subtitle is-3">迷路惹QQ</p>
          <a href="/"><button class="button is-link is-large">回到起點</button></a>
      </div>
    </div>
</body>
</html>
