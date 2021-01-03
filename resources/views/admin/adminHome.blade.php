@extends('admin.adminLayout')
@section('title', '首頁 -  ')
@section('content')
    @parent
    <section class="hero is-info welcome is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Hello～
                </h1>
                <h2 class="subtitle">
                    <br>
                    <p>今天想和大家分享一些什麼呢？</p>
                </h2>
            </div>
        </div>
    </section>
    <br>
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    留言板
                </h1>
                <h2 class="subtitle">
                    寫文章寫累了嗎？和大家分享一些事情吧
                </h2>
            </div>
        </div>
    </section>
    <div class="container content">
        <div id="mb" class="box" style="overflow:scroll; height:700px;">
            @if(!empty($mbData))
                @foreach($mbData as $key=>$value)
                <article id="{{ $key }}" class="media">
                    <div class="media-left">
                        <figure class="image is-48x48">
                            <img src="/{{$value['avatar']}}" alt="Image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>{{$value['userID']}}</strong> &nbsp; at &nbsp; <small>{{$value['date']}}</small>
                                <br>
                                {{$value['content']}}
                            </p>
                        </div>
                    </div>
                </article>
                <hr>
                @endforeach
            @endif
        </div>
        <div class="box">
            <article class="media">
                <div class="media-left">
                    <figure class="image is-48x48">
                        <img src="/{{$selfUserData[0]->Avatar}}" alt="Image">
                    </figure>
                </div>
                <div class="media-content">
                    <div class="content">
                        <form method="POST" action="./admin/updatemb">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="field has-addons">
                                <div class="control is-expanded">
                                    <textarea name="content" class="input"></textarea>
                                </div>
                                <div class="control">
                                    <button class="button is-link is-outlined">送出訊息</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </div>
    </div>
@endsection
