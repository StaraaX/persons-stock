// document.getElementsByClassName("disclaimer")[0].style.visibility = "hidden";

var lines = document.getElementById("p1");
var totalPoints = document.getElementById("p3");

var points = document.getElementsByClassName("center_p");

var comptP = 0;
var compt = 0;
for (let index = 0; index < points.length; index++) {
    const element = points[index].innerText;
    comptP = comptP + parseInt(element);
    compt++;
}

totalPoints.innerText = "points total : " + comptP;
lines.innerText = compt + " lignes";


