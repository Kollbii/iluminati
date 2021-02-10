window.onload = function () {
    // alert("YOUR IP IS EXPOSED\nTURN OF THIS WEBPAGE");
}

var cesarCipher = function (str, ammount){
    if (ammount < 0) {
        return cesarCipher(str, ammount + 26);
    }
    let coded = "";
    for (let i = 0 ; i < str.length ; i++) {
        let char = str[i];
        if (char.match(/[a-z]/i)) {
            let charCode = str.charCodeAt(i);
            if (charCode >= 65 && charCode <= 90) {
                char = String.fromCharCode(((charCode - 65 + ammount) % 26) + 65);
            }else if (charCode >= 97 && charCode <= 122) {
                char = String.fromCharCode(((charCode - 97 + ammount) % 26) + 97);
            }
        }
        coded += char;
    }
    console.log(coded)
}
