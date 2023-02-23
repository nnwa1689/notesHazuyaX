@extends('admin.adminLayout')
@section('title', '公告編輯 -  ')
@section('content')
    @parent
    <div class="box">
        <form method="post" action="/admin/{{isset($pageData[0]->PageId) ? 'updatePage/'.$pageData[0]->PageId : 'newPage'}}">
            <div class="control">
                <input class="input is-large" type="text" name="pageTitle" value="{{isset($pageData[0]->PageName) ? $pageData[0]->PageName : '' }}">
            </div>
            <div class="control">
                <label>PageID</label>
                <input class="input" type="text" name="pageID" value="{{isset($pageData[0]->PageId) ? $pageData[0]->PageId : '' }}">
            </div>
            <hr>
            <script src="/js/tinymce/tinymce.min.js"></script>
            <script>
                tinymce.init({
                    language: 'zh_TW',
                    selector: 'textarea',
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
            <textarea name="cont" id="cont" cols="139" rows="30" value="">{{isset($pageData[0]->PageContant) ? $pageData[0]->PageContant : ''}}</textarea>
            <hr>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label"></label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <span class="control has-icons-left">
                        <div class="select is-fullwidth">
                            <select name="competance" id="competance">
                                <option value="public">公開</option>
                                <option value="private">私有</option>
                            </select>
                            <span class="icon is-small is-left">
                                <i class="fas fa-eye"></i>
                            </span>
                            <script>
                                $('#competance option[value={{isset($pageData[0]->Competence) ? $pageData[0]->Competence : 'public'}}]').attr('selected', 'selected');//自動取得目前設定值
                            </script>
                        </div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="control">
                <button style="width: 100%" class="button is-link is-outlined" type="submit">送出</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection
