@extends('admin.adminLayout')
@section('title', '網站資訊 -  ')
@section('content')
    @parent
    @if(isset($msg))
    <article class="message is-danger">
        <div class="message-body">
            {{$msg}}
        </div>
    </article>
    @endif
    <form method="post" action="/admin/updateMySetting">
        <div class="box">
            <div class="image is-128x128" style="margin-left: auto; margin-right: auto;">
                <figure class="image is-1by1">
                    <img class="is-rounded" src="{{$userData[0]->Avatar}}">
                </figure>
            </div>
            <hr>
            <div class="field is-grouped">
                <p class="control is-expanded">
                    <input class="input" type="text" name="avatar" value="{{$userData[0]->Avatar}}">
                </p>
                <p class="control">
                    <a class="button is-link is-outlined" target="_blank" href="/admin/uploadFiles">點我可以上傳圖片</a>
                </p>
            </div>

        </div>

        <div class="box">

            <div class="field is-horizontal">
                <div class="field-label is-medium">
                    <label class="label">UserName</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <fieldset disabled>
                    <div class="control">
                        <input class="input is-medium" type="text" value="{{$userData[0]->username}}">
                    </div>
                    </div>
                </div>
            </div>
            <article class="message is-warning">
                <div class="message-body">
                    UserName在建立帳號後就無法變更！
                </div>
            </article>

            <div class="field is-horizontal">
                <div class="field-label is-medium">
                    <label class="label">暱稱</label>
                </div>
                <div class="field-body">
                    <div class="field">
                    <div class="control">
                        <input class="input is-medium" type="text" name="Yourname" value="{{$userData[0]->Yourname}}">
                    </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-medium">
                    <label class="label">Email</label>
                </div>
                <div class="field-body">
                    <div class="field">
                    <div class="control">
                        <input class="input is-medium" type="text" name="Email" value="{{$userData[0]->Email}}">
                    </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-medium">
                    <label class="label">個人簽章</label>
                </div>
                <div class="field-body">
                    <div class="field">
                    <div class="control">
                        <textarea class="textarea" name="Signature">{{$userData[0]->Signature}}</textarea>
                    </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-medium">
                    <label class="label">檔案背景圖片</label>
                </div>
                <div class="field-body">
                    <div class="field">
                    <div class="control">
                        <input class="input is-medium" type="text" name="PersonBackground" value="{{$userData[0]->PersonBackground}}">
                    </div>
                    </div>
                </div>
            </div>
            <article class="message">
                <div class="message-body">
                    留空會套用預設的藍色背景ㄛ！
                </div>
            </article>

        </div>

        <div class="box">
        <script src="/js/tinymce/tinymce.min.js"></script>
            <script>
                tinymce.init({
                    language: 'zh_TW',
                    selector: '#IntroductionSelf',
                    content_css: "/css/editerContent.css",
                    plugins:
                        'advlist autolink lists link image charmap preview hr anchor codesample searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor colorpicker textpattern imagetools'
                    ,
                    height: '500',
                    //toolbar: 'undo redo | styles | bold italic  | link image codesample | code fullscreen',
                    toolbar1: "undo redo | styles | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table hr pagebreak blockquote codesample",
                    toolbar2: "bold italic underline strikethrough subscript superscript | forecolor backcolor charmap emoticons | link unlink image media | insertdatetime fullscreen code",
                    contextmenu: 'undo redo | inserttable | cell row column deletetable',
                    menubar: false,
                    image_advtab: true,
                    relative_urls: false,
                    convert_urls: false,
                    //automatic_uploads: true,
                    //image_uploadtab: true,
                    //images_upload_handler: example_image_upload_handler,
                });
            </script>
            <textarea name="IntroductionSelf" id="IntroductionSelf" cols="139" rows="30" value="">{{$userData[0]->IntroductionSelf}}</textarea>
        </div>

        <div class="box">
            <div class="field is-horizontal">
                <div class="field-label is-medium">
                    <label class="label">新密碼</label>
                </div>
                <div class="field-body">
                    <div class="field">
                    <div class="control">
                        <input class="input is-medium" type="password" name="newPw">
                    </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-medium">
                    <label class="label">確認新密碼</label>
                </div>
                <div class="field-body">
                    <div class="field">
                    <div class="control">
                        <input class="input is-medium" type="password" name="reNewPw">
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box">
                <label class="label">請輸入舊密碼，驗證身份</label>
            <div class="field-body">
                <div class="field">
                <div class="control">
                    <input class="input is-medium" type="password" name="oldPw">
                </div>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="control">
                    <button style="width: 100%" class="button is-link is-outlined" type="submit">確認</button>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection
