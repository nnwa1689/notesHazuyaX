@extends('admin.adminLayout')
@section('title', '編輯分類／系列詳細資訊 -  ')
@section('content')
    @parent
    <div class="box">
        <form method="post" action="/admin/updateCategoryDetail/{{ $categoryData[0] -> ClassId }}">
            <div class="control">
            <label class="subtitle is-5">分類/系列名稱</label>
                <input class="input is-medium" type="text" name="ClassName" value="{{ $categoryData[0] -> ClassName }}">
            </div>
            <hr/>
            <div class="control">
                <label class="subtitle is-5">分類/系列簡介</label>
                <textarea class="textarea is-medium" maxlength="250" name="shortIntro" id="shortIntro" cols="139" rows="5" value="">{{ $categoryData[0] -> Short_Intro }}</textarea>
            <hr>
            <!--Text Editor-->
            <script src="/js/tinymce/tinymce.min.js"></script>
            <script>
                const example_image_upload_handler = (blobInfo, progress) => new Promise((resolve, reject) => {
                    const xhr = new XMLHttpRequest();
                    console.log(blobInfo);
                    xhr.withCredentials = false;
                    xhr.open('POST', '/admin/uploadFiles');

                    xhr.upload.onprogress = (e) => {
                        progress(e.loaded / e.total * 100);
                    };

                    xhr.onload = () => {
                        if (xhr.status === 403) {
                        reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
                        return;
                        }

                        if (xhr.status < 200 || xhr.status >= 300) {
                        reject('HTTP Error: ' + xhr.status);
                        return;
                        }

                        const json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.location != 'string') {
                        reject('Invalid JSON: ' + xhr.responseText);
                        return;
                        }

                        resolve(json.location);
                    };

                    xhr.onerror = () => {
                        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                    };

                    const formData = new FormData();
                    formData.append('myFile', blobInfo.blob(), blobInfo.filename());
                    console.log(formData);

                    xhr.send(formData);
                });

                tinymce.init({
                    language: 'zh_TW',
                    selector: '#longIntro',
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
            <textarea name="longIntro" id="longIntro" cols="139" rows="30" value="">{{ $categoryData[0] -> Long_Intro }}</textarea>
            <!--EditorEnd-->
            <hr>
            <div class="control">
                <button style="width: 100%" class="button is-link is-outlined is-large" type="submit">更新簡介／名稱</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection
