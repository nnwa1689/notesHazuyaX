/**
 *
 */

const openMenu = () => {
    gsap.to(".fullMenu", {
            duration: 1,
            width: "100%",
            ease: "Power2.easeInOut"
        });
}

const closeMenu = () => {
    gsap.to(".fullMenu", {
            duration: 1,
            width: "0%",
            ease: "Power2.easeInOut"
        });
}

const isMenuOpen = () => {
    if ($('.fullMenu').hasClass('is-on'))
        return true;
    return false;
}

const sleep = (ms) => {
    return new Promise(resolve => setTimeout(resolve, ms));
  }

const layoutInit = async() => {
    console.log("%c*44 Seconds Studio* 嗨，很高興在這裡看到你！", "padding:5px 15px; color: #262728; font-size: 14px; border: 2px solid #366ED8; background:#064ACB;border-radius:5px;");
    console.log("%c來到這裡不太容易吧，歡迎來我們這裡喝喝茶聊聊天唷XD", "padding:5px 15px; color: #064ACB; font-size: 14px; border: 2px solid #000000; background:#F2F3F3;border-radius:5px;");
    console.log("%chttps://studio-44s.tw/contact", "padding:5px 15px; color: #064ACB; font-size: 14px; border: 2px solid #000000; background:#F2F3F3;border-radius:5px;");

    $('.navbar-toggle').click(function(){
        (isMenuOpen() ? closeMenu() : openMenu());
        $('.fullMenu').toggleClass('is-on');
        $('.navbar-toggle').toggleClass('is-navbar-toggle-on');
        $('.navbar-toggle').toggleClass('is-navbar-toggle-close');
    });

    $(".navbar-burger").click(function() {
        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        (isMenuOpen() ? closeMenu() : openMenu());
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });

    $(".fullMenu").click(function() {
        $('.fullMenu').toggleClass('is-on');
        closeMenu();
        $('.navbar-toggle').toggleClass('is-navbar-toggle-on');
        $('.navbar-toggle').toggleClass('is-navbar-toggle-close');
    });

    setTimeout(() => {
        gsap.to(".pageloader", {
            duration: 1.2,
            y: '+120vh',
            ease: "power4.inOut"
        });
    }, 1000);

    var scroll = new LocomotiveScroll(
        {
            el: document.querySelector('#scroll-zone'),
            smooth: true,
            lerp: 0.1,
            repeat: true,
        }
    );

    new ResizeObserver(() => {
        scroll.update();
    }
    ).observe(document.querySelector('#scroll-zone'));


    new kursor({
        type: 3,
        color: "#064ACB"
    });

    barba.init({
        sync: true,
        transitions: [{
            leave(data) {
                return gsap.to(".pageloader", {
                    duration: 0.8,
                    y: 0,
                    ease: "power4.inOut",
                });
            },
            after(data) {
                return gsap.to(".pageloader", {
                    duration: 0.8,
                    y: '+120vh',
                    ease: "power4.inOut",
                    delay: 1
                });
            },
            beforeEnter() {
                scroll.scrollTo('top', { 'duration':0 });
            }
        }]
    });

    barba.hooks.beforeLeave(
        () => {
            clearInterval(indexDotInterval);
        }
    );

    barba.hooks.enter(
        () => {
            Prism.highlightAll();
        }
    );

    barba.hooks.after((data) => {
        let js = data.next.container.querySelectorAll('main script');
        if(js != null){
            js.forEach((item) => {
                eval(item.innerHTML);
            });
        }
    });
}
