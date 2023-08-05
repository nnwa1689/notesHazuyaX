/**
 * index.blade.php Javascript
 * By TedWu
 * 20230805
 */

function AmendZero(str) {
    return str.toString().length > 1 ? str.toString() : "0" + str.toString();
}

function indexInit(){
    setInterval(() => {
        $("#dot").toggleClass("has-text-link");
        $("#dot").toggleClass("has-text-light");
    }, 1000);

    var dtnow = new Date();
    $("#hour").text(AmendZero(dtnow.getHours()));
    $("#min").text(AmendZero(dtnow.getMinutes()));

    addEventListener("mousemove", (event) => {
        var hourtime = Math.floor(Math.random() * 24) + 1;
        var mintime = Math.floor(Math.random() * 60);
        $("#hour").text(AmendZero(hourtime));
        $("#min").text(AmendZero(mintime));
    });
}

