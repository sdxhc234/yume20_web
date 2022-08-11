// JavaScript Document
const pictures = [
{src:"img/stage.jpg",message:"ステージ演目",url:"https://yumekosai-2020.studio.site/booths_places#stage"},
{src:"img/club.jpg",message:"部活出展",url:"https://yumekosai-2020.studio.site/booths_group#etc"},
{src:"img/booth.jpg",message:"学年出展",url:"https://yumekosai-2020.studio.site/booths_group"},
]
var portUsage = false;
var nextImg = 1;
var insertStr = "";

window.onload = function(){
    const viewPort1 = document.getElementById("place1");
    const messageBox = document.getElementById('message');
    const body = document.getElementById('content');
    viewPort1.classList.add('zoomout');
    viewPort1.classList.add("fadein");

    messageBox.innerText = pictures[0].message;


    
    messageBox.addEventListener("animationend",function(){
        if(messageBox.classList.contains('fadeout')){
            messageBox.classList.remove('fadeout');
            messageBox.innerText= insertStr;
            messageBox.classList.add('fadein');
        }
    }) 
    body.addEventListener('click',function(){
        var refIndex = nextImg-1;
        if(Math.sign(refIndex) ==-1){
            refIndex = pictures.length-1;
        }
        window.open(pictures[refIndex].url,"_top")
    })

    setInterval(replaceContent,5000);
    
	
}

const replaceContent = function(){
    var newHolder = document.createElement('div');
    newHolder.className="imgHolder fadein";

    var newView = document.createElement('img');
    newView.className = "place zoomout"

    var genPort =(Number(!portUsage)+1);
    var usingPort =(Number(portUsage)+1);
    portUsage=!portUsage;

    var insertImg = "";
    
    insertImg = pictures[nextImg].src;
    insertStr = pictures[nextImg].message;

    if(nextImg==pictures.length-1){ nextImg=0}
    else{ nextImg++;}
    console.log("update to "+nextImg);

    newHolder.setAttribute('id',"holder"+genPort);
    newView.src=insertImg;

    newHolder.appendChild(newView);
    document.getElementById('content').appendChild(newHolder); //generate new 

    var nowHolder=document.getElementById('holder'+usingPort);
    setInterval(function(){
        nowHolder.remove();
    },600);

    const messageBox = document.getElementById('message');
    messageBox.classList.remove('fadein');
    messageBox.classList.add('fadeout');

}
