<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>作者登入</title>
    <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}css/bulma.css">
    <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}css/fontawesome-all.css">
    <!-- Bulma Version 0.8.x-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <script src='https://www.google.com/recaptcha/api.js?hl="zh-tw"'></script>
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">

                    <div class="box">
                    <img src="{{ asset('logo.png') }}">
                    <hr>
                        <form action="login" method="post">
                        @if(isset($error))
                        <div class="notification is-danger">
                            {{$error}}
                        </div>
                        @endif
                            <div class="field">
                                <div class="control">
                                    <input name="username" class="input is-large" type="text" placeholder="帳號" autofocus="">
                                </div>
                            </div>

                            <br>

                            <div class="field">
                                <div class="control">
                                    <input name="password" class="input is-large" type="password" placeholder="密碼">
                                </div>
                            </div>
                            <br>
                            <div id="recaptcha">
                                <div class="g-recaptcha" data-sitekey="6LfDakIUAAAAAB2htHJvZLPkjlTFr5reRyZJpdLJ"></div>
                            </div>
                            <br>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="button is-outlined is-link is-large is-fullwidth">登入<i class="fa fa-sign-in" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <p class="has-text-grey">
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
