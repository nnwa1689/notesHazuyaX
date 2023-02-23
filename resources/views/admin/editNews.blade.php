@extends('admin.adminLayout')
@section('title', '公告編輯 -  ')
@section('content')
    @parent
    <div class="box">
        <form method="post" action="/admin/{{isset($postData[0]->PostId) ? 'updateNews/'.$postData[0]->PostId : 'newNews'}}">
            <div class="control">
                <input class="input is-large" type="text" name="postTitle" value="{{isset($postData[0]->PostTittle) ? $postData[0]->PostTittle : '' }}">
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
            <textarea name="cont" id="cont" cols="139" rows="30" value="">{{isset($postData[0]->PostContant) ? $postData[0]->PostContant : ''}}</textarea>
            <hr>
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <!--Date Selector-->
                            <link rel="stylesheet" href="{{asset('css/bulma-calendar.min.css')}}">
                            <script src="/js/bulma-calendar.min.js"></script>
                            <input class="input" id="date" type="date" name="date" value="{{isset($postData[0]->PostDate) ? $postData[0]->PostDate : $postData['date']}}">
                            <script>
                                // Initialize all input of type date
                                var calendars = bulmaCalendar.attach('[type="date"]', {dateFormat: 'YYYY-MM-DD', color:'link', displayMode: 'dialog'});

                                // Loop on each calendar initialized
                                for(var i = 0; i < calendars.length; i++) {
                                    // Add listener to select event
                                    calendars[i].on('select', date => {
                                        console.log(date);
                                    });
                                }
                                // To access to bulmaCalendar instance of an element
                                var element = document.querySelector('#date');
                                if (element) {
                                    // bulmaCalendar instance is available as element.bulmaCalendar
                                    element.bulmaCalendar.on('select', function(datepicker) {
                                        console.log(datepicker.data.value());
                                    });
                                }
                            </script>
                            <!--Date End-->
                        </p>
                    </div>
                </div>

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
                                $('#competance option[value={{isset($postData[0]->Competence) ? $postData[0]->Competence : 'public'}}]').attr('selected', 'selected');//自動取得目前設定值
                            </script>
                        </div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="control">
                <button style="width: 100%" class="button is-link is-outlined" type="submit">發表／編輯公告</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection
