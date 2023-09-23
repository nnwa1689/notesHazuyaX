/**
 * Name : cursorjs
 * 滑鼠
 * Author : 
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
    windows.addEventListener("mouseup", onMouseUp);
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
            y:e.y,
            duration: 0.2,
        }
    );

    gsap.to(cursorChild,
        {
            x:e.x,
            y:e.y - 128,
            duration: 0.1,
        }
    );
}

/**
 * 
 * @param {*} e 
 * 滑鼠按下函數
 */
const onMouseDown = (e) =>
{
    //cursorBig.addClass('kursor--down');
    //cursorChild.addClass('kursor--down');
    gsap.to(cursorBig,
        {
            scale: 0.5,
            duration: 0.5,
        }
    );

    gsap.to(cursorChild,
        {
            scale: 1.5,
            duration: 0.5,
        }
    );
}

/**
 * 
 * @param {*} e
 * 滑鼠放開函數 
 */
const onMouseUp = (e) =>
{
    //cursorBig.removeClass('kursor--down');
    //cursorChild.removeClass('kursor--down');
    gsap.to(cursorBig,
        {
            scale: 1,
            duration: 0.5,
        }
    );

    gsap.to(cursorChild,
        {
            scale: 1,
            duration: 0.5,
        }
    );
}