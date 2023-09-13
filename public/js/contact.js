/**
 * contact.blade.php Javascript
 * By TedWu
 * 20230805
 */

function submit() {
    var name = $("#Name").val();
    var email = $("#Email").val();
    var type = $("#Type").val();
    var budgetranges = $("#BudgetRanges").val();
    var content = $("#Content").val();

    $("#suc").css("display", "none");
    $("#error").css("display", "none");

    if (name.length < 1 || email.length < 1 || content.length < 5) {
        $("#error").css("display", "block");
    } else {
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
            },
            error: function (thrownError) {
                $("#error").css("display", "block");
            }
        });
    }
}

function contactInit() {
    var typed = new Typed("#titleText", {
        strings:["聊聊天<br/><span class=\"has-text-hollow-link ml-2\">Contact.</span>",],
        stringsElement: '#typed-strings',
        typeSpeed: 70,
        startDelay: 2000,
        loop: false,
    });
}
