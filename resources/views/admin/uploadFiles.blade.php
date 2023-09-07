@extends('admin.adminLayout')
@section('title', '檔案上傳 -  ')
@section('content')
@parent
<div class="box">
    <div class="field is-grouped-center is-fullwidth">
        @if( $error !== "")
        <article id="copyMsg" style="display: none;" class="message is-danger mt-3">
            <div class="message-body"><i class="fas fa-times mr-2"></i>{{ $error }}</div>
        </article>
        @endif

        @if($data == "false")
        <form method="post" action="/admin/uploadFiles" enctype="multipart/form-data">
            <div id="filebtn" class="file is-medium is-link is-outlined has-name has-text-centered is-boxed is-fullwidth">
                <label class="file-label">
                    <input class="file-input" type="file" name="myFile[]" multiple accept="image/jpeg,image/jpg,image/gif,image/png,image/JPEG,image/JPG,image/GIF,image/PNG">
                    <span class="file-cta">
                    <span class="file-icon">
                    <i class="fas fa-file-upload"></i>
                    </span>
                    <span class="file-label">選擇檔案</span>
                    </span>
                    <span class="file-name has-text-centered p-3">請選擇要上傳的檔案</span>
                </label>
            </div>
            <div class="control mt-3">
                <button class="button is-link is-outlined is-large is-fullwidth" type="submit"><i class="fas fa-upload mr-2"></i>上傳</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
        @else

        <div class="notification is-primary is-light has-text-centered">
            <p class="is-size-4"><i class="fas fa-check-circle mr-2"></i>檔案上傳成功！</p>
        </div>

        @foreach($data as $item)
        <div class="columns">
            <div class="column is-8 has-text-centered">
                <p class="is-size-5 m-3"><a href="{{$item}}">{{$item}}</a></p>
            </div>
            <div class="column has-text-centered">
                <button id="{{ $item }}" onclick="copyClick($item)" class="button is-primary is-outlined">
                    <i class="fas fa-copy"></i>
                    <i class="fas fa-check-circle"></i>
                </button>
            </div>
        </div>
        @endforeach

        <article id="copyMsg" style="display: none;" class="message is-success is-small mt-3">
            <div class="message-body"><i class="fas fa-check-circle mr-2"></i>連結已經複製到剪貼簿！</div>
        </article>

        <a href="/admin/uploadFiles"><button style="width: 100%;" class="button is-link is-large is-outlined">繼續上傳</button></a>
        @endif
    </div>
</div>

<script>
    const copyClick = (itemId) => {
        navigator.clipboard.writeText(itemId)
        .then(
            () => { 
                targetBtn = document.getElementById(itemId);
                targetBtn.innerHTML = '<i class="fas fa-check-circle"></i>';
                targetBtn.classList.remove('is-primary');
                targetBtn.classList.toggle('is-success');
            }
        );
    }

    const fileInput = document.querySelector('#filebtn input[type=file]');

    fileInput.onchange = () => {
        if (fileInput.files.length > 0) {
            const fileName = document.querySelector('#filebtn .file-name');
            fileName.innerHTML = '';
            for(var i = 0; i < fileInput.files.length; i++) { 
                fileName.innerHTML += fileInput.files[i].name + "\n";
            }
        }
    }
</script>
@endsection
