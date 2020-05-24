@extends('admin.adminLayout')
@section('title', '檔案上傳 -  ')
@section('content')
    @parent
    <div class="box">
    <div class="field">
    @if($data=="false")
        <form method="post" action="/admin/uploadFiles" enctype="multipart/form-data">
        <div id="filebtn" class="file is-large has-name is-boxed">
    <label class="file-label">
        <input class="file-input" type="file" name="myFile" accept="image/jpeg,image/jpg,image/gif,image/png,image/JPEG,image/JPG,image/GIF,image/PNG">
        <span class="file-cta">
        <span class="file-icon">
        <i class="fas fa-file-upload"></i>
        </span>
        <span class="file-label">選擇檔案</span>
        </span>
        <span class="file-name">沒有選擇檔案</span>
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
        <button class="button is-link is-outlined" type="submit">上傳</button>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    @else
    <div class="notification is-primary is-light">
        <p>檔案上傳成功!</p>
        <p><a href="{{$data}}">{{$data}}</a></p>
    </div>
    <a href="/admin/uploadFiles"><button style="width: 100%;" class="button is-link">繼續上傳</button></a>
    @endif
    </div>
</div>
@endsection
