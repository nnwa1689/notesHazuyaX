/**
 * Name : cursorjs
 * 滑鼠
 * Author : 
 */

const cursorTag =  `
    <div class="kursor kursor--3" style="--k-color: 6,74,203;"></div>
    <div class="kursorChild" style="--k-color: 6,74,203;"></div>
`;

document.body.insertAdjacentHTML("afterbegin", cursorTag);
const cursorBig = document.querySelector(".kursor");
const cursorChild = document.querySelector(".kursorChild");

// 滑鼠移動
window.addEventListener("mousemove", onMouseMove);
//滑鼠點下
window.addEventListener("mousedown", onMouseDown);

/**
 * 
 * @param {*} e
 * 滑鼠移動函數 
 */
const onMouseMove = (e) => 
{
    gsap.to(cursorBig,
        {
            x:e.x - 15,
            y:e.y - 15,
            duration: 0.4,
        }
    );

    gsap.to(cursorChild,
        {
            x:e.x - 15,
            y:e.y - 15,
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

}