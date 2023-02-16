@extends('admin.adminLayout')
@section('title', '網站資訊 -  ')
@section('content')
    @parent
    <div class="box">
        <div class="field">
            <form method="post" action="/admin/updateWebInfo">
                <label class="label"><i class="fas fa-blog"></i>網站名稱</label>
                <div class="control">
                    <input name="webName" class="input" type="text" value="{{$data[0]->tittle}}">
                </div>
                <br>
                <label class="label"><i class="fas fa-link"></i>網站網址</label>
                <div class="control">
                    <input name="URL" class="input" type="text" value="{{$data[13]->tittle}}">
                </div>
                <br>
                <label class="label"><i class="far fa-image"></i>LOGO</label>
                <div class="control">
                    <input name="Logo" class="input" type="text" value="{{$data[5]->tittle}}">
                </div>
                <br>
                <label class="label"><i class="fas fa-map-pin"></i>KeyWords</label>
                <div class="control">
                    <input name="keyWords" class="input" type="text" value="{{$data[1]->tittle}}">
                </div>
                <br>
                <label class="label">首頁顯示文章數量</label>
                <div class="control">
                    <input name="HomePostNum" class="input" type="number" value="{{$data[7]->tittle}}">
                </div>
                <br>
                <label class="label">網站描述</label>
                <div class="control">
                    <textarea name="descripition" class="textarea" type="text">{{$data[2]->tittle}}</textarea>
                </div>
                <br>
                <label class="label">網站頂部</label>
                <div class="control">
                    <textarea name="header" class="textarea" type="text" value="">{{$data[4]->tittle}}</textarea>
                </div>
                <br>
                <label class="label">網站底部</label>
                <div class="control">
                    <textarea name="footer" class="textarea" type="text" value="">{{$data[3]->tittle}}</textarea>
                </div>
                <br>
                <label class="label"><i class="fab fa-facebook"></i>Facebook</label>
                <div class="control">
                    <input name="FB" class="input" type="text" value="{{$data[20]->tittle}}">
                </div>
                <br>
                <label class="label"><i class="fab fa-instagram-square"></i>Instagram</label>
                <div class="control">
                    <input name="IG" class="input" type="text" value="{{$data[21]->tittle}}">
                </div>
                <br>
                <label class="label"><i class="fab fa-twitter"></i>Twitter</label>
                <div class="control">
                    <input name="TWITTER" class="input" type="text" value="{{$data[22]->tittle}}">
                </div>
                <br>
                <label class="label"><i class="fab fa-apple"></i>ApplePodcast</label>
                <div class="control">
                    <input name="APPLEPODCAST" class="input" type="text" value="{{$data[23]->tittle}}">
                </div>
                <br>
                <label class="label"><i class="fab fa-google"></i>GooglePodcast</label>
                <div class="control">
                    <input name="GOOGLEPODCAST" class="input" type="text" value="{{$data[24]->tittle}}">
                </div>
                <br>
                <label class="label"><i class="far fa-image"></i>首頁廣告1</label>
                <div class="control">
                    <label class="label">網址（僅限內部網址）</label>
                    <input name="HomeAds1Url" class="input" type="text" value="{{$data[25]->tittle}}">
                    <label class="label">圖片網址（留空隱藏廣告）<a href="/admin/uploadFiles" target="_blank">上傳圖片</a></label>
                    <input name="Home1AdsImg" class="input" type="text" value="{{$data[26]->tittle}}">
                </div>
                <br>
                <label class="label"><i class="far fa-image"></i>首頁廣告2</label>
                <div class="control">
                    <label class="label">網址（僅限內部網址）</label>
                    <input name="Home2AdsUrl" class="input" type="text" value="{{$data[27]->tittle}}">
                    <label class="label">圖片網址（留空隱藏廣告）<a href="/admin/uploadFiles" target="_blank">上傳圖片</a></label>
                    <input name="Home2AdsImg" class="input" type="text" value="{{$data[28]->tittle}}">
                </div>
                <br>
                <div class="control">
                    <button class="button is-link is-outlined is-large is-fullwidth" type="submit">確認</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@endsection
