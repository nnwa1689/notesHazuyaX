@extends('admin.adminLayout')
@section('title', '編輯作品詳細資訊 -  ')
@section('content')
    @parent
    <div class="box">
        <form method="post" action="/admin/updateWorksDetail/{{ isset($WorkDetail[0] -> PID) ? $WorkDetail[0] -> PID : 'new' }}">
            <div class="control">
                <label class="is-size-5">作品識別碼（例如英文名稱）</label>
                <input class="input is-medium mb-3" type="text" name="WorksID" value="{{ isset($WorkDetail[0] -> WorksID) ? $WorkDetail[0] -> WorksID : '' }}">
            </div>
            <div class="control">
                <label class="is-size-5">排列順序</label>
                <input class="input is-medium mb-3" type="text" name="OrderID" value="{{ isset($WorkDetail[0] -> OrderID) ? $WorkDetail[0] -> OrderID : '' }}">
            </div>
            <div class="control">
                <label class="is-size-5">作品名稱</label>
                <input class="input is-medium mb-3" type="text" name="WorksName" value="{{ isset($WorkDetail[0] -> WorksName) ? $WorkDetail[0] -> WorksName : '' }}">
            </div>
            <div class="control">
                <label class="is-size-5">作品簡述</label>
                <input class="input is-medium mb-3" type="text" name="ShortIntro" value="{{ isset($WorkDetail[0] -> ShortIntro) ? $WorkDetail[0] -> ShortIntro : '' }}">
            </div>
            <div class="control">
                <label class="is-size-5">客戶名稱</label>
                <input class="input is-medium mb-3" type="text" name="Customer" value="{{ isset($WorkDetail[0] -> Customer) ? $WorkDetail[0] -> Customer : '' }}">
            </div>
            <div class="control">
                <label class="is-size-5">作品預覽圖</label>
                <input class="input is-medium mb-3" type="text" name="CoverImage" value="{{ isset($WorkDetail[0] -> CoverImage) ? $WorkDetail[0] -> CoverImage : '' }}">
            </div>
            <div class="control">
                <label class="is-size-5">作品連結（若無留空）</label>
                <input class="input is-medium mb-3" type="text" name="Url" value="{{ isset($WorkDetail[0] -> Url) ? $WorkDetail[0] -> Url : '' }}">
            </div>
            <hr/>
            <div class="control">
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
                        valid_children : '-p[img],h1[img],h2[img],h3[img],h4[img],+div[img],span[img]'
                        //automatic_uploads: true,
                        //image_uploadtab: true,
                        //images_upload_handler: example_image_upload_handler,
                    });
                </script>
                <textarea name="Intro" id="longIntro" cols="139" rows="30" value="">{{ isset($WorkDetail[0] -> Intro) ? $WorkDetail[0] -> Intro : '' }}</textarea>
                <!--EditorEnd-->
                <hr/>
            </div>
            <label class="is-size-5">作品作者（最多5位，若沒有則留空）</label>
            @for ($i = 1; $i < 6; $i++)
            <div class="columns">
                <div class="column is-one-fifth has-text-centered">
                    作者{{$i}}
                    <input hidden name="{{ 'staff'.$i.'_StaffPID' }}" type="text" value="{{ isset($WorkDetail[0] -> WorksStaff[$i - 1] -> PID) ? $WorkDetail[0] -> WorksStaff[$i - 1] -> PID : '' }}">
                </div>
                <div class="column is-one-fifth">
                    <input class="input" name="{{ 'staff'.$i.'_name' }}" type="text" placeholder="作者名字" value="{{ isset($WorkDetail[0] -> WorksStaff[$i - 1] -> StaffName) ? $WorkDetail[0] -> WorksStaff[$i - 1] -> StaffName : '' }}">
                </div>
                <div class="column is-one-fifth">
                    <input class="input" name="{{ 'staff'.$i.'_title' }}" type="text" placeholder="作者職稱" value="{{ isset($WorkDetail[0] -> WorksStaff[$i - 1] -> StaffTitle) ? $WorkDetail[0] -> WorksStaff[$i - 1] -> StaffTitle : '' }}">
                </div>
                <div class="column is-one-fifth">
                    <input class="input" name="{{ 'staff'.$i.'_Image' }}" type="text" placeholder="作者頭像" value="{{ isset($WorkDetail[0] -> WorksStaff[$i - 1] -> StaffImage) ? $WorkDetail[0] -> WorksStaff[$i - 1] -> StaffImage : '' }}">
                </div>
                <div class="column is-one-fifth">
                    <input class="input" name="{{ 'staff'.$i.'_Url' }}" type="text" placeholder="作者網站連結" value="{{ isset($WorkDetail[0] -> WorksStaff[$i - 1] -> StaffUrl) ? $WorkDetail[0] -> WorksStaff[$i - 1] -> StaffUrl : '' }}">
                </div>
            </div>
            @endfor
            <hr/>
            <div class="control">
                <button style="width: 100%" class="button is-link is-outlined is-large" type="submit">更新簡介／名稱</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection
