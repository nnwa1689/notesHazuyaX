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
    <div style="margin: auto; maring-top: 300px; width:70%; height: 40%;">
  <div class="hero-body">
    <div class="container" style="text-align: center;">
    <h1 class="title is-1"><i class="fas fa-exclamation-triangle"></i><br></a></h1>
      <h1 class="title">ＱＱ！<br></h1>
      <h1 class="title">網站出現了一些問題，請稍後再來！</h1>
    </div>
    <hr>
    <div class="control">
    <a href="/"><button style="width: 100%;" class="button is-link">回首頁</button></a>
  </div>
  </div>

    <p>
    </p>
    </div>
</body>
</html>
