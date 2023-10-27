const aboutInit = () => {
    var titletype = new Typed("#titleText", {
        strings:["關於<span class=\"has-text-hollow-link ml-2\">About.</span>",],
        stringsElement: '#typed-strings',
        typeSpeed: 20,
        startDelay: 1000,
        loop: false,
    });

    canvas = document.getElementById("canvas");
    canvas.height = 300;
    canvas.width = document.body.clientWidth > 1200 ? 1200 : document.body.clientWidth - 24;
    const engine = Matter.Engine.create({
        render: {
            element: document.body,
            canvas: canvas,
            options: {
                width: document.body.clientWidth > 1200 ? 1200 : document.body.clientWidth - 24,
                height: 300
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
        document.body.appendChild(_div);
        const t = {
            body: Matter.Bodies.rectangle( 250 + i * 150 > document.body.clientWidth ? document.body.clientWidth - i : 250 + i * 150, 0, 180, 55),
            elem: _div,
            render() {
                const {x, y} = this.body.position;
                this.elem.style.top = `${y - 55 / 2}px`;
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
            this.elem.style.top = `${y - 183 / 2}px`;
            this.elem.style.left = `${x - 145 / 2}px`;
            this.elem.style.transform = `rotate(${this.body.angle}rad)`;
        },
    };

    const box2 = {
        body: Matter.Bodies.rectangle(document.body.clientWidth - 150, 0, 145, 215),
        elem: document.querySelector("#box2"),
        render() {
            const {x, y} = this.body.position;
            this.elem.style.top = `${y - 215 / 2}px`;
            this.elem.style.left = `${x - 145 / 2}px`;
            this.elem.style.transform = `rotate(${this.body.angle}rad)`;
        },
    };

    const box3 = {
        body: Matter.Bodies.rectangle(document.body.clientWidth - 200 - 200, 100, 200, 100),
        elem: document.querySelector("#box3"),
        render() {
            const {x, y} = this.body.position;
            this.elem.style.top = `${y - 100 / 2}px`;
            this.elem.style.left = `${x - 200 / 2}px`;
            this.elem.style.transform = `rotate(${this.body.angle}rad)`;
        },
    };

    const groundbtm = Matter.Bodies.rectangle(
        0, 500, 5000, 50, {isStatic: true}
    );

    const groundleft = Matter.Bodies.rectangle(
        0, 0, 10, 1000, {isStatic: true}
    );

    const groundright = Matter.Bodies.rectangle(
        document.body.clientWidth, 0, 10, 1000, {isStatic: true}
    );

    const mouseConstraint = Matter.MouseConstraint.create(
        engine, {element: document.getElementById("canv")}
    );

    worldObj.push(groundbtm);
    worldObj.push(groundleft);
    worldObj.push(groundright);
    worldObj.push(box.body);
    worldObj.push(box2.body);
    worldObj.push(box3.body);
    worldObj.push(mouseConstraint);

    Matter.Composite.add(
        engine.world, worldObj
    );

    (function rerender() {
        box.render();
        box2.render();
        box3.render();
        for(var i = 0; i < t_obj.length; i++) {
            t_obj[i].render();
        }
        engine.run(engine);
        Matter.Engine.update(engine);
        requestAnimationFrame(rerender);
    })();

}
