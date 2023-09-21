/**
 * index.blade.php Javascript
 * By TedWu
 * 20230805
 */

var indexDotInterval = 0;

/**
 * 補足0
 * @param {string} str 
 * @returns 
 */
const AmendZero = (str) => {
    return str.toString().length > 1 ? str.toString() : "0" + str.toString();
}

/**
 * 初始化首頁
 */
const indexInit = () => {

    /** 動態效果 */
    indexDotInterval = setInterval(() => {
        $("#dot").toggleClass("has-text-link");
        $("#dot").toggleClass("has-text-light");
    }, 1500);

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

