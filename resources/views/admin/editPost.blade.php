@extends('admin.adminLayout')
@section('title', '文章編輯 -  ')
@section('content')
    @parent
    <div class="box">
        <form method="post" action="/admin/{{isset($postData[0]->PostId) ? 'updatePost/'.$postData[0]->PostId : 'newPost'}}">
            <div class="control">
                <input class="input is-large" type="text" name="postTitle" value="{{isset($postData[0]->PostTittle) ? $postData[0]->PostTittle : '' }}">
            </div>
            <p><i class="fas fa-user"></i> : {{isset($postData[0]->User) ? $postData[0]->User : $postData['autor']}}</p>
            <hr>
            <!--Text Editor-->
            <script src="/js/tinymce/tinymce.min.js"></script>
            <script>
                tinymce.init({
                    language: 'zh_TW',
                    selector: 'textarea',
                    height: '300',
                    plugins: [
                        "advlist autolink lists link image charmap print preview hr anchor codesample",
                        "searchreplace wordcount visualblocks visualchars code fullscreen",
                        "insertdatetime media nonbreaking save table contextmenu directionality",
                        "emoticons template paste textcolor colorpicker textpattern imagetools",
                    ],
                    toolbar1: "insertfile undo redo | formatselect fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table hr pagebreak blockquote codesample",
                    toolbar2: "bold italic underline strikethrough subscript superscript | forecolor backcolor charmap emoticons | link unlink image media | cut copy paste | insertdatetime fullscreen code",
                    menubar: false,
                    image_advtab: true,
                    relative_urls: false,
                    convert_urls: false,
                });
            </script>
            <textarea name="cont" id="cont" cols="139" rows="30" value="">{{isset($postData[0]->PostContant) ? $postData[0]->PostContant : ''}}</textarea>
            <!--EditorEnd-->
            <hr>
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <!--Date Selector-->
                            <link rel="stylesheet" href="{{asset('css/bulma-calendar.min.css')}}">
                            <script src="/js/bulma-calendar.min.js"></script>
                            <input class="input" id="date" type="datetime" name="date" value="{{isset($postData[0]->PostDate) ? $postData[0]->PostDate : $postData['date']}}">
                            <script>
                                // Initialize all input of type date
                                var calendars = bulmaCalendar.attach('[type="datetime"]', {dateFormat: 'YYYY-MM-DD', timeFormat: 'HH:mm:ss', color:'link', displayMode: 'dialog'});

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
                        <p class="control has-icons-left">
                        <span class="select is-fullwidth">
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
                        </span>
                        </p>
                    </div>
                </div>

                <div class="field-label is-normal">
                    <label class="label"></label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control has-icons-left">
                        <span class="select is-fullwidth">
                            <select name="Classes" id="Classes">
                                @foreach($allCategory as $value)
                                <option value="{{$value->ClassId}}">{{$value->ClassName}}</option>
                                @endforeach
                            </select>
                            <span class="icon is-small is-left">
                                <i class="fas fa-tag"></i>
                            </span>
                            <script>
                                $('#Classes option[value={{isset($postData[0]->ClassId) ? $postData[0]->ClassId : ''}}]').attr('selected', 'selected');//自動取得目前設定值
                            </script>
                        </span>
                        </p>
                    </div>
                </div>

                <div class="field-label is-normal">
                    <label class="label"></label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control has-icons-left">
                        <span class="select is-fullwidth">
                            <select name="reply" id="reply">
                                <option value="Yes">允許</option>
                                <option value="No">不允許</option>
                            </select>
                            <span class="icon is-small is-left">
                                <i class="fas fa-comment-dots"></i>
                            </span>
                            <script>
                                $('#reply option[value={{isset($postData[0]->Reply) ? $postData[0]->Reply : ''}}]').attr('selected', 'selected');//自動取得目前設定值
                            </script>
                        </span>
                        </p>
                    </div>
                </div>

            </div>

            <div class="field">
                    <label class="label">封面圖片｜<a href="/admin/uploadFiles" target="_blank">上傳圖片</a></label>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" name="CoverImage" value="{{isset($postData[0]->CoverImage) ? $postData[0]->CoverImage : ''}}">
                            <span class="icon is-small is-left">
                                <i class="fas fa-images"></i>
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="control">
                <button style="width: 100%" class="button is-link is-outlined" type="submit">發表／編輯文章</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection
