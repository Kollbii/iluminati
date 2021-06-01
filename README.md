# *Illuminati site :alien: - *VERY* basic ctf-like*
## Made with fun for fun!

Site is simple and has a lot of vulnerabilities.  
There is some flags in _cllFlag{}_ format.
I'll write what you can find on this site.  

Site is hosted on my university site.  
Link: [Illuminati](http://student.agh.edu.pl/~kollbek/)

### Main page
The background is a gif. Don't get scared!  
Also there is first flag hidden in a plain sight.
But... you have to find a way to decipher it!

![Main Page](/images-site/main-page.gif)

### There are hints!
Explore assets and sources. Maybe you will find out how to use this _brilliant cipher somone ga[...]_.  

```css
/* CODE */
.footer {
    color: azure;
    display: grid;
    width: 100%;
    height: 5%;
    grid: auto / auto;
    position: absolute;
    bottom: 0;
    /* Once i had 12 somone gave me this brilian ciph[...] but with minus[...]*/
}
/* CODE */
```
What about JS?
```javascript
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
```
It shouldn't be hard anymore!

### Flag Submisions
With achieved flag you can submit it!
Submision system is very simple. On server site there is a table with all flags you can get.  

![Flags DB](/images-site/flags-db.jpg)

Flags are subbmited on subpage with flags. Put your nickname and flag -> place yourself on leaderboard!  
(You should always write the same nickname! If you wrote _KoLLibson_ it is not the same as _koLLibson_ (php script is also basic!))  

![Flags site](/images-site/flags.png)  

What is more. I collect every CORRECT submision in DB so i can check how many flags each user submited! (It is used in leaderboard count)  
![Flags DB Submited](/images-site/flags-submited-db.jpg)

Fell free to explore and give hints if something could have been done beter!

### Galery
![](/images-site/ball.png)
![](/images-site/learn-me.png)
![](/images-site/admin-page.png)

