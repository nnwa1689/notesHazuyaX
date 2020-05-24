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
            <hr>
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input" type="text" name="date" value="{{isset($postData[0]->PostDate) ? $postData[0]->PostDate : $postData['date']}}">
                            <span class="icon is-small is-left">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
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
