function ready(fn) {
    if (document.addEventListener) { //标准浏览器
        document.addEventListener('DOMContentLoaded', function() {
            //注销时间，避免重复触发
            document.removeEventListener('DOMContentLoaded', arguments.callee, false);
            fn(); //运行函数
        }, false);
    } else if (document.attachEvent) { //IE浏览器
        document.attachEvent('onreadystatechange', function() {
            if (document.readyState == 'complete') {
                document.detachEvent('onreadystatechange', arguments.callee);
                fn(); //函数运行
            }
        });
    }
}

ready(function() {
    getRem(1920, 100)
})

window.onresize = function() {
    getRem(1920, 100)
};
/*720代表设计师给的设计稿的宽度，你的设计稿是多少，就写多少;100代表换算比例，这里写100是
     为了以后好算,比如，你测量的一个宽度是100px,就可以写为1rem,以及1px=0.01rem等等*/
function getRem(pwidth, prem) {
    var html = document.getElementsByTagName("html")[0];
    var oWidth = document.body.clientWidth || document.documentElement.clientWidth;
    html.style.fontSize = oWidth / pwidth * prem + "px";
}