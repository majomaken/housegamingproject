var mascara = document.getElementById('lamascara');
var btn = document.getElementById("modal");
var cerrar = document.getElementsByClassName("cerrar")[0];

btn.onclick = function() {
 mascara.style.display = "block";
}
cerrar.onclick = function() {
 mascara.style.display = "none";
}
window.onclick = function(event) {
 if (event.target == mascara) {
 mascara.style.display = "none";
 }
}