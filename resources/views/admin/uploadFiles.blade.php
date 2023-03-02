@extends('admin.adminLayout')
@section('title', '檔案上傳 -  ')
@section('content')
@parent
<div class="box">
    <div class="field is-grouped-center is-fullwidth">
        @if($data=="false")
        <form method="post" action="/admin/uploadFiles" enctype="multipart/form-data">
            <div id="filebtn" class="file is-large is-link is-outlined has-name has-text-centered is-boxed is-fullwidth">
                <label class="file-label">
                    <input class="file-input" type="file" name="myFile" accept="image/jpeg,image/jpg,image/gif,image/png,image/JPEG,image/JPG,image/GIF,image/PNG">
                    <span class="file-cta">
                    <span class="file-icon">
                    <i class="fas fa-file-upload"></i>
                    </span>
                    <span class="file-label">選擇檔案</span>
                    </span>
                    <span class="file-name has-text-centered">沒有選擇檔案</span>
                </label>
            </div>
            <script>
            const fileInput = document.querySelector('#filebtn input[type=file]');
            fileInput.onchange = () => {
                if (fileInput.files.length > 0) {
                const fileName = document.querySelector('#filebtn .file-name');
                fileName.textContent = fileInput.files[0].name;
                }
            }
            </script>
            <br>
            <div class="control">
                <button class="button is-link is-outlined is-large is-fullwidth" type="submit"><i class="fas fa-upload"></i>&nbsp;上傳</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
        @else
        <div class="notification is-primary is-light has-text-centered">
            <script>
                const copyClick = () => {
                    navigator.clipboard.writeText(document.getElementById('fileUrl').value)
                    .then(
                        () => { document.getElementById('copyMsg').style.display = "block" }
                    );
                }
            </script>
            <p class="is-size-4"><i class="fas fa-check-circle"></i>&nbsp;檔案上傳成功!</p>
            <p class="is-size-5 m-3"><a href="{{$data}}">{{$data}}</a></p>
            <div class="control">
                <input id="fileUrl" readonly class="input is-large is-fullwidth" value="{{$data}}" />
            </div>
            <article id="copyMsg" style="display: none;" class="message is-success mt-3">
                <div class="message-body"><i class="fas fa-check-circle"></i>&nbsp;連結已經複製到剪貼簿！</div>
            </article>
        </div>
        <button onclick="copyClick()" class="button is-primary is-outlined is-large is-fullwidth">複製連結</button><br/>
        <a href="/admin/uploadFiles"><button style="width: 100%;" class="button is-link is-large is-outlined">繼續上傳</button></a>
        @endif
    </div>
</div>
@endsection
