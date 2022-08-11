const resizeContent = () => {
    const contents = [document.getElementById("gym"),
                    document.getElementById("out"),
                    document.getElementById("atrium")
    ]
    var noneClasses = [];
    for (var i = 0; i < contents.length ; i++){
            var content = contents[i];
            if (content.classList.contains("none")) {
                noneClasses.push(content.id);
            }
    }
    if (noneClasses.length != contents.length) {
        var sHeight = 100 /(contents.length-noneClasses.length);
        for (var i = 0; i < contents.length; i++) {
            var content = contents[i];
            if (content.classList.contains("none")==false) {
                content.style.height = sHeight + "vh";
            }
        }
    }
}
window.onload = () => {
    
    resizeContent();
    setInterval(()=>{location.reload()}, 6000000);

}