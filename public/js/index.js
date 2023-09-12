/**
 * index.blade.php Javascript
 * By TedWu
 * 20230805
 */

var indexDotInterval = 0;

function AmendZero(str) {
    return str.toString().length > 1 ? str.toString() : "0" + str.toString();
}

function indexInit(){

    indexDotInterval = setInterval(() => {
        $("#dot").toggleClass("has-text-link");
        $("#dot").toggleClass("has-text-light");
    }, 2000);

    var dtnow = new Date();
    $("#hour").text(AmendZero(dtnow.getHours()));
    $("#min").text(AmendZero(dtnow.getMinutes()));

    addEventListener("mousemove", (event) => {
        var hourtime = Math.floor(Math.random() * 24) + 1;
        var mintime = Math.floor(Math.random() * 60);
        $("#hour").text(AmendZero(hourtime));
        $("#min").text(AmendZero(mintime));
    });

    var typed = new Typed("#title1", {
        strings:['<span class="has-text-link has-text-shadow">Warmth</span>',],
        stringsElement: '#typed-strings',
        typeSpeed: 20,
        startDelay: 2000,
        loop: false,
        cursorChar: '',
    });

    var typed2 = new Typed("#title2", {
        strings:['<span class="has-text-link has-text-shadow">＆</span><span class="has-text-primary has-text-shadow">Relaxation</span>',],
        stringsElement: '#typed-strings',
        typeSpeed: 20,
        startDelay: 3000,
        loop: false,
        cursorChar: '',
    });
}

