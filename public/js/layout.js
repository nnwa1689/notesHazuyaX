/**
 *
 */

const openMenu = () => {
    gsap.to(".fullMenu", {
            duration: 0.4,
            height: "80%",
            ease: "power3.inOut"
        });
}

const closeMenu = () => {
    gsap.to(".fullMenu", {
            duration: 0.4,
            height: "0%",
            ease: "power3.inOut"
        });
}

const isMenuOpen = () => {
    if ($('.fullMenu').hasClass('is-on'))
        return true;
    return false;
}

const layoutInit = () => {
    console.log("%c*44 Seconds Studio* 嗨，很高興在這裡看到你！", "padding:5px 15px; color: #263A29; font-size: 14px; border: 2px solid #E86A33; background:#F2E3DB;border-radius:5px;");
    console.log("%c來到這裡不太容易吧，歡迎來我們這裡喝喝茶聊聊天唷XD", "padding:5px 15px; color: #F2E3DB; font-size: 14px; border: 2px solid #000000; background:#E86A33;border-radius:5px;");
    console.log("%chttps://studio-44s.tw/contact", "padding:5px 15px; color: #F2E3DB; font-size: 14px; border: 2px solid #000000; background:#E86A33;border-radius:5px;");
    
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

    let svg = document.querySelector('#MenuIcon'),
        line1 = svg.querySelector('#mil1'),
        line2 = svg.querySelector('#mil2')

    $(".navbar-toggle").on("mouseenter", () => {
        for(i = 15; i > 4; i--){
            line2.setAttribute('x1', i)
        }

        for(i = 41; i > 30; i--){
            line1.setAttribute('y1', i)
         }
    })

    $(".navbar-toggle").on("mouseleave", ()=>{
        for(i = 4; i < 16; i++){
           
        }

        for(i = 30; i < 41; i++){
           
         }
    })

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
        type: 4,
        color: "#E86A33"
    });

    barba.init({
        sync: true,
        transitions: [{
            leave(data) {
                return gsap.to(".pageloader", {
                    duration: 1.2,
                    y: 0,
                    ease: "power4.inOut",
                });
            },
            after(data) {
                return gsap.to(".pageloader", {
                    duration: 1.2,
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
