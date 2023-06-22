
var colcplayer = document.getElementById("player");
var colloading = document.getElementById("music_loading");

window.onload = function() {
    try {
        colloading.style.opacity = "0";
        window.setTimeout(function() {
            colloading.style.display = "none";
            colcplayer.style.display = "block";
        },500);
    } catch (e) {
        
    }
}