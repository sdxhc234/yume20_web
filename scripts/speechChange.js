const initialPos = 9.6;
const bottomPos = 119.4;
const startTime = ( 9 *60)+ 30;
const endTime = ( 15  *60) +00;
var pinPos = 0;

var changePinPos = function(){
    const now = new Date();
    const nowM = now.getMinutes() + (now.getHours()*60);
    const minPerPos = (bottomPos-initialPos) / (endTime-startTime);
    var pin = document.getElementById("pin");

    if(checkEventDate()){
        pin.removeAttribute("display");
        if(startTime<nowM && nowM<endTime){
            pinPos =(initialPos+ minPerPos * (nowM-startTime));
        } else if(nowM <= startTime){
            pinPos = initialPos;
        } else if(endTime <= nowM){
            pinPos = bottomPos;
        }    
        pin.style.top = pinPos+"vw";
   }else{
       pin.style.display="none";
   }
}

window.onload = function(){
    changePinPos();
    setInterval(changePinPos, 60000);
}