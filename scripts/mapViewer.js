const viewerMode = true;
//true:vertical false: horizontal

window.onload = () => {
    adjustViewer();
}
window.addEventListener("resize", () => {
    adjustViewer();
})

const adjustViewer = () => {
    const client = document.getElementById("client");
    const height = client.clientHeight;
    const width = client.clientWidth;
}