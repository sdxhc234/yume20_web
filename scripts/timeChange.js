// JavaScript Document
var termTime =[
    {name:"青色", timeS:9, timeE:12, class:"blue"},
    {name:"赤色", timeS:12, timeE:15, class:"red"},
    {name:"緑色", timeS:15, timeE:18, class:"green"}
]


window.onload = function(){
    console.log("worked");
    var tName = document.getElementById("ticketName");
    var eTime = document.getElementById("endTime");
    var background = document.getElementById("bg");
    var now = new Date();
    console.log(now.getHours());
    termTime.forEach(function(value){
        console.log(value.timeS, value.timeE, now.getHours());
        if(value.timeS <= now.getHours() && now.getHours() < value.timeE){
            background.classList.add(value.class);
            tName.textContent = "只今 "+value.name+"チケット の時間です";
            eTime.textContent = (value.timeE-1)+"時50分まで有効です";
        }

    });

}