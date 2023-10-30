const useMaxWidth = () => {
    return document.body.clientWidth > 1200 ? 1200 : document.body.clientWidth;
}

const aboutInit = () => {
    var titletype = new Typed("#titleText", {
        strings:["關於<span class=\"has-text-hollow-link ml-2\">About.</span>",],
        stringsElement: '#typed-strings',
        typeSpeed: 20,
        startDelay: 1000,
        loop: false,
    });

    let canvas = document.getElementById("canvas");
    canvas.height = 350;
    const engine = Matter.Engine.create({
        render: {
            element: document.getElementById("canvas"),
            canvas: canvas,
            options: {
                width: useMaxWidth(),
                height: 350
            }
        }
    });

    const typed = [["t1", "Original", 0], ["t2", "Trying", 0], ["t3", "持續試錯", 1], ["t4", "保持單純", 1]];
    let t_obj = [];
    let worldObj = [];

    for (var i = 0; i < typed.length; i++) {
        const _div = document.createElement("div");
        const _p = document.createElement("p");
        const _text = document.createTextNode(typed[i][1]);
        _p.setAttribute("class", typed[i][2] == 0 ? "title is-3 has-text-background-primary" : "title is-3 has-text-background-link")
        _div.setAttribute("id", typed[i][0]);
        _div.appendChild(_p);
        _p.appendChild(_text);
        document.getElementById("canv").appendChild(_div);
        const t = {
            body: Matter.Bodies.rectangle( 250 + i * 150 > useMaxWidth() ? useMaxWidth() - i : 250 + i * 150, 0, 180, 55),
            elem: _div,
            render() {
                const {x, y} = this.body.position;
                this.elem.style.top = `${y + 60}px`;
                this.elem.style.left = `${x - 180 /2 }px`;
                this.elem.style.transform = `rotate(${this.body.angle}rad)`;
            },
        };
        t_obj.push(t);
        worldObj.push(t.body);
    }

    const box = {
        body: Matter.Bodies.rectangle(150, 0, 145, 183),
        elem: document.querySelector("#box"),
        render() {
            const {x, y} = this.body.position;
            this.elem.style.top = `${y}px`;
            this.elem.style.left = `${x - 145 / 2}px`;
            this.elem.style.transform = `rotate(${this.body.angle}rad)`;
        },
    };

    const box2 = {
        body: Matter.Bodies.rectangle(useMaxWidth() - 150, 0, 145, 215),
        elem: document.querySelector("#box2"),
        render() {
            const {x, y} = this.body.position;
            this.elem.style.top = `${y}px`;
            this.elem.style.left = `${x - 145 / 2}px`;
            this.elem.style.transform = `rotate(${this.body.angle}rad)`;
        },
    };

    const box4 = {
        body: Matter.Bodies.rectangle(useMaxWidth() - 205, 0, 150, 150),
        elem: document.querySelector("#box4"),
        render() {
            const {x, y} = this.body.position;
            this.elem.style.top = `${y +10}px`;
            this.elem.style.left = `${x - 150 / 2}px`;
            this.elem.style.transform = `rotate(${this.body.angle}rad)`;
        },
    };

    const box5 = {
        body: Matter.Bodies.rectangle(useMaxWidth() - 185, 0, 150, 150),
        elem: document.querySelector("#box5"),
        render() {
            const {x, y} = this.body.position;
            this.elem.style.top = `${y + 10}px`;
            this.elem.style.left = `${x - 150 / 2}px`;
            this.elem.style.transform = `rotate(${this.body.angle}rad)`;
        },
    };

    const groundbtm = Matter.Bodies.rectangle(
        0, 400, useMaxWidth() * 2, 50, {isStatic: true}
    );

    const groundleft = Matter.Bodies.rectangle(
        0, 0, 10, 1000, {isStatic: true}
    );

    const groundright = Matter.Bodies.rectangle(
        useMaxWidth(), 0, 10, 1000, {isStatic: true}
    );

    const mouse = Matter.Mouse.create(document.getElementById("canv"));
    const mouseConstraint = Matter.MouseConstraint.create(
        engine,  {
            mouse: mouse,
            constraint: {
                stiffness: 0.2,
                render: {
                  visible: false
                }
            }
        }
    );

    // allow scroll through the canvas
    mouseConstraint.mouse.element.removeEventListener(
        "mousewheel",
        mouseConstraint.mouse.mousewheel
    );
    mouseConstraint.mouse.element.removeEventListener(
        "DOMMouseScroll",
        mouseConstraint.mouse.mousewheel
    );

    mouseConstraint.mouse.element.removeEventListener('touchstart', mouseConstraint.mouse.mousedown);
    mouseConstraint.mouse.element.removeEventListener('touchmove', mouseConstraint.mouse.mousemove);
    mouseConstraint.mouse.element.removeEventListener('touchend', mouseConstraint.mouse.mouseup);

    mouseConstraint.mouse.element.addEventListener('touchstart', mouseConstraint.mouse.mousedown, { passive: true });
    mouseConstraint.mouse.element.addEventListener('touchmove', (e) => {
        if (mouseConstraint.body) {
            mouseConstraint.mouse.mousemove(e);
        }
    });
    mouseConstraint.mouse.element.addEventListener('touchend', (e) => {
        if (mouseConstraint.body) {
            mouseConstraint.mouse.mouseup(e);
        }
    });

    worldObj.push(groundbtm);
    worldObj.push(groundleft);
    worldObj.push(groundright);
    worldObj.push(box.body);
    worldObj.push(box2.body);
    worldObj.push(box4.body);
    worldObj.push(box5.body);
    worldObj.push(mouseConstraint);

    Matter.Composite.add(
        engine.world, worldObj
    );

    (function rerender() {
        box.render();
        box2.render();
        box4.render();
        box5.render();
        for(var i = 0; i < t_obj.length; i++) {
            t_obj[i].render();
        }
        Matter.Engine.update(engine);
        requestAnimationFrame(rerender);
    })();

}
