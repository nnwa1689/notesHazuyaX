/**
 * Name : cursorjs
 * 滑鼠JS
 * Author : 
 * Update : 20230923
 */

const cursorTag =  `
    <div class="kursor kursor--3" style="--k-color: 6,74,203;"></div>
    <div class="kursorChild" style="--k-color: 6,74,203;"></div>
`;

let cursorBig = null;
let cursorChild = null;

const cursorInit = () => 
{
    document.body.insertAdjacentHTML("afterbegin", cursorTag);
    cursorBig = document.querySelector(".kursor");
    cursorChild = document.querySelector(".kursorChild");

    // 滑鼠移動
    window.addEventListener("mousemove", onMouseMove);
    //滑鼠點下
    window.addEventListener("mousedown", onMouseDown);
    //滑鼠放開
    window.addEventListener("mouseup", onMouseDefault);
}

/**
 * 
 * @param {*} e
 * 滑鼠移動函數 
 */
const onMouseMove = (e) => 
{
    gsap.to(cursorBig,
        {
            x:e.x,
            y:e.y + 109,
            duration: 0.2,
        }
    );

    gsap.to(cursorChild,
        {
            x:e.x,
            y:e.y + 109,
            duration: 0.1,
        }
    );

    if(e.target.closest('a'))
    {
        onMouseScale();
    }
    else
    {
        onMouseDefault();
    }
}

/**
 * 
 * @param {*} e 
 * 滑鼠按下動畫
 */
const onMouseDown = (e) =>
{
    gsap.to(cursorBig,
        {
            scale: 0.5,
            duration: 0.1,
        }
    );

    gsap.to(cursorChild,
        {
            scale: 3,
            duration: 0.1,
        }
    );
}

/**
 * 
 * @param {*} e
 * 滑鼠恢復狀態動畫
 */
const onMouseDefault = (e) =>
{
    gsap.to(cursorBig,
        {
            scale: 1,
            duration: 0.1,
        }
    );

    gsap.to(cursorChild,
        {
            scale: 1,
            duration: 0.1,
        }
    );
}

/**
 * 滑鼠碰到連結後放大
 */
const onMouseScale = () =>
{
    gsap.to(cursorBig,
        {
            scale: 2.5,
            duration: 0.1,
        }
    );

    gsap.to(cursorChild,
        {
            scale: 2.5,
            duration: 0.1,
        }
    );
}