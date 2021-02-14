known = {
    "hi" : "Hello, are you Admin?",
    "hello" : "Hello, are you Admin?",
    "no" : "Hmm...",
    "who are you" : "I'm everything",
    "how are you" : "I'm everything",
    "agh" : "I like this one",
    "uj" : "F*# them...",
    "ok" : "*wink*",
    "what is this site about" : "It ...",
    "how" : "How what?",
    "who" : "Who, who? Like Dr. Who?",
    "learn how" : "Ask wisely...",
    "learn how" : "Ask wisely...",
};

function talk(){
    var user = document.getElementById("question").value;
    document.getElementById("question").value = "";
    document.querySelector("#chat").innerHTML += user+"<br>";
    console.log(user);
    if(user in known){
        document.querySelector("#chat").innerHTML += known[user]+"<br>";
    }else{
        document.querySelector("#chat").innerHTML += "Maybe you are robot...<br>"
    }
}

