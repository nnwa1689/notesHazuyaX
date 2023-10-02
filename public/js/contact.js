/**
 * contact.blade.php Javascript
 * By TedWu
 * 20230805
 */

/**
 * 聯絡我們表單
 */
const submit = () => {
    scroll.scrollTo('top', { 'duration':2 });
    var name = $("#Name").val();
    var email = $("#Email").val();
    var type = $("#Type").val();
    var budgetranges = $("#BudgetRanges").val();
    var content = $("#Content").val();

    $("#suc").css("display", "none");
    $("#error").css("display", "none");
    $("#name_danger").css("display", "none");
    $("#email_danger").css("display", "none");
    $("#Content_danger_danger").css("display", "none");

    $("#Name").removeClass("is-danger");
    $("#Email").removeClass("is-danger");
    $("#Content").removeClass("is-danger");

    if(name.length < 1)
    {
        $("#name_danger").css("display", "block");
        $("#Name").toggleClass("is-danger");
    }

    if(email.length < 1)
    {
        $("#email_danger").css("display", "block");
        $("#Email").toggleClass("is-danger");
    }

    if(content.length < 1)
    {
        $("#Content_danger_danger").css("display", "block");
        $("#Content").toggleClass("is-danger");
    }

    if (name.length < 1 || email.length < 1 || content.length < 5) 
    {
        $("#error").css("display", "block");
    } 
    else 
    {
        $.ajax({
            type: "POST",
            url: "https://strapi.studio-44s.tw/api/holas",
            dataType: "json",
            data: {
                "data": {
                    "Name": name,
                    "Email": email,
                    "Content": content,
                    "BudgetRanges": budgetranges,
                    "Statu": "unsettled",
                    "Type": type
                }
            },
            success: function (response) {
                $("#suc").css("display", "block");
                $("#Name").val("");
                $("#Email").val("");
                $("#Content").val("");
                $("#submit_btn").css("display", "none");
            },
            error: function (thrownError) {
                $("#error").css("display", "block");
            }
        });
    }
}

/**
 *  聯絡我們頁面初始化
 */
const contactInit = () => {
    var typed = new Typed("#titleText", {
        strings:["聊聊<span class=\"has-text-hollow-link ml-2\">Contact.</span>",],
        stringsElement: '#typed-strings',
        typeSpeed: 20,
        startDelay: 1000,
        loop: false,
    });
}
