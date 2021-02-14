var answers = [
    "Yes", 
    "No",
    "n",
    "Maybe", 
    "cll",
    "done by", 
    "2_G0",
    "_w4", 
    "It was", 
    "M3",
    "something", 
    "V3r",
    "goverment",
    "?", 
    "{1t",
    "Flag",
    "t}"];
// Since you are here... You can just rearange that :')
function ballClick() {
    random = Math.floor(Math.random() * (answers.length)) + 0;
    console.log(random);
    var styleElem = document.body.appendChild(document.createElement("style"));
    styleElem.innerHTML = "#eight:before {content: '" + answers[random] + "'; font-size: 1.2em; font-weight: bold;}";
}

function shake(){
    var ball= document.querySelector(".ball");
    ball.classList.add("shake");
    setTimeout(function(){ ball.classList.remove("shake"); }, 1000);
 }