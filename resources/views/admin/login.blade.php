<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登入</title>
    <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}css/bulma.css">
    <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}css/fontawesome-all.css">
    <!-- Bulma Version 0.8.x-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <!-- Recaptcha V3-->
    <script src='https://www.google.com/recaptcha/api.js?hl="zh-tw"'></script>
    <script>
        function onSubmit(token) {
            document.getElementById("login-form").submit();
        }
    </script>
</head>

<body>
    <section class="hero is-fullheight">
        <div class="hero-body m-0 p-0">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <a href="{{$webData['webConfig'][13]->tittle}}">
                        <img width="128" height="128" src="{{$webData['webConfig'][13]->tittle}}images/NotesHZ_ICON_2023.png">
                    </a>
                    <div class="box">
                        <form action="login" id="login-form" method="post">
                        @if(isset($error))
                        <div class="notification is-danger">
                            {{$error}}
                        </div>
                        @endif
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input name="username" class="input is-large" type="text" placeholder="帳號" autofocus="">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input name="password" class="input is-large" type="password" placeholder="密碼">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-unlock"></i>
                                    </span>
                                </div>
                            </div>
                            <br>
                            @csrf
                            <button 
                                class="button is-outlined is-primary is-large is-fullwidth g-recaptcha"
                                data-sitekey="{{ $siteKey }}" 
                                data-callback='onSubmit' 
                                data-action='submit'
                                >
                                登入！╰(*°▽°*)╯
                            </button>
                        </form>
                    </div>
                </div>
                <p>Made with 💗 by 44 Seconds Studio.</p>
            </div>
        </div>
    </section>
</body>
</html>
