/**
 *
 */

const openMenu = () => {
    gsap.to(".fullMenu", {
            duration: 1.2,
            width: "24rem",
            ease: "Circ.easeInOut"
        });
}

const closeMenu = () => {
    gsap.to(".fullMenu", {
            duration: 1.2,
            width: "0rem",
            ease: "Circ.easeInOut"
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
    console.log("%c*44 Seconds Studio* 嗨，很高興在這裡看到你！", "padding:5px 15px; color: #F2F3F3; font-size: 14px; border: 2px solid #366ED8; background:#064ACB;border-radius:5px;");
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
    }).observe(document.querySelector('#scroll-zone'));

    new kursor({
        type: 3,
        color: "#064ACB"
    });

    const FirstEntryPageLoading = () => {
        var tl = gsap.timeline();
        tl.add(
            gsap.fromTo("#pageloader4",
            {
                x: 0,
            }
            ,
            {
                duration: 0.25,
                x: "-100vw",
                ease: "Circ.easeInOut",
            })
        );
        tl.add(
            gsap.fromTo("#pageloader3",
            {
                x: 0,
            }
            ,
            {
                duration: 0.25,
                x: "-100vw",
                ease: "Circ.easeInOut",
            })
        );
        tl.add(
            gsap.fromTo("#pageloader2",
            {
                x: 0,
            }
            ,
            {
                duration: 0.25,
                x: "-100vw",
                ease: "Circ.easeInOut",
            })
        );
        tl.add(
            gsap.fromTo("#pageloader1",
            {
                x: 0,
            }
            ,
            {
                duration: 0.25,
                x: "-100vw",
                ease: "Circ.easeInOut",
            })
        );
        return tl;
    }

    const EntryPageLoading = () => {
        var tl = gsap.timeline();
        tl.add(
            gsap.fromTo("#pageloader1",
            {
                x: "-100vw",
            }
            ,
            {
                duration: 0.25,
                x: 0,
                ease: "Circ.easeInOut",
            })
        );
        tl.add(
            gsap.fromTo("#pageloader2",
            {
                x: "-100vw",
            }
            ,
            {
                duration: 0.25,
                x: 0,
                ease: "Circ.easeInOut",
            })
        );

        tl.add(
            gsap.fromTo("#pageloader3",
            {
                x: "-100vw",
            }
            ,
            {
                duration: 0.25,
                x: 0,
                ease: "Circ.easeInOut",
            })
        );

        tl.add(
            gsap.fromTo("#pageloader4",
            {
                x: "-100vw",
            }
            ,
            {
                duration: 0.25,
                x: 0,
                ease: "Circ.easeInOut",
            })
        );
        return tl;
    }

    const LeavePageLoading = () => {
        return gsap.fromTo(".pageloader",
        {
            x: "0",
        }
        ,
        {
            duration: 0.25,
            x: "+100vw",
            ease: "Circ.easeInOut",
        });
    }

    //First Entry PageLoading
    setTimeout(() => {
        FirstEntryPageLoading();
    }, 250);

    barba.init({
        sync: true,
        transitions: [{
            leave(data) {
                return EntryPageLoading();
            },
            after(data) {
                return LeavePageLoading();
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
