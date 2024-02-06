/* Site-wide JS i den här filen (t.ex. huvudmenyn) */

//language check
console.log(navigator.userAgent);
var userLang = navigator.language || navigator.userLanguage; 
console.log("The browser language is: " + userLang);

//window size check
var w = window.innerWidth;
var h = window.innerHeight;
console.log(w + "px * "+h+"px")

//geolocation
if(!localStorage.player){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(PrintPos, DeclinedPos);
    } 
    else {
        console.log("Geolocation is not supported by this browser.");
    }

    function PrintPos(loc){
        console.log(loc.coords.latitude +" , "+ loc.coords.longitude );
    }
    function DeclinedPos(){
        console.log("user declined Geolocation");
    }
}


console.log('main.js init'); // För att se att skriptet laddats in

let LoadClock = new Date();
let LoadDay = LoadClock.getDay();
let Player;

let time;
let hour;
let min;
let sec;

let Adress = window.location.href;
let adrFin = Adress.slice(-10);


if(!localStorage.player){
    document.getElementById("CasSel").innerHTML = `<a class="dropdown-item disabled" href="Casino.html">Gambling</a>`
}
//check day and close
if((LoadDay == 0 || LoadDay == 6) && adrFin != `index.html`){
    alert("the casino is closed on weekends, please come back later");
    window.location.replace("index.html");
}
//check if player
else if(!localStorage.player && adrFin != `index.html`){
    alert("error: no player data. please register before entering the main casino.")
    window.location.replace("index.html");
}
//if player found, else do nothing.
else if(localStorage.player){
    let playermed = localStorage.getItem("player");
    Player = JSON.parse(playermed);
    alert(Player.ID + Player.Name + Player.Cash + Player.GPlayed + Player.Time);

    console.log("player data found and init");
    document.getElementById("CasSel").innerHTML = `<a class="dropdown-item" href="Casino.html">Gambling</a>`
}

clockUP();
setInterval(clockUP, 1000);

function clockUP(){
    time = new Date();
    hour = time.getHours();
    min = time.getMinutes();
    sec = time.getSeconds();

    if(hour < 10){
        hour = "0" + hour;
    }
    if(min < 10){
        min = "0" + min;
    }
    if(sec < 10){
        sec = "0" + sec;
    }

    let days = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];

    document.getElementById("clockText").innerHTML = `${days[time.getDay()]} ${time.getDate()}.${(time.getMonth() + 1)}.${time.getFullYear()} kl. ${hour}:${min}:${sec}`;
    document.getElementById("dateText").innerHTML = ``

//if player, do LOGIC things
    if(localStorage.player){   
        //time remaining clock    
        let PTime = new Date(Player.Time);
        let RemainClock = new Date(Player.Time - new Date().valueOf());

        //to do, this -2 should NOT need to be here.
        hour = RemainClock.getHours() - 2;
        min = RemainClock.getMinutes();
        sec = RemainClock.getSeconds();

        if(hour < 10){
            hour = "0" + hour;
        }
        if(min < 10){
            min = "0" + min;
        }
        if(sec < 10){
            sec = "0" + sec;
        }


        document.getElementById("RemainClock").innerText = `session ends in: ${hour}:${min}:${sec}`
        

        hour = PTime.getHours();
        min = PTime.getMinutes();
        sec = PTime.getSeconds();

        if(hour < 10){
            hour = "0" + hour;
        }
        if(min < 10){
            min = "0" + min;
        }
        if(sec < 10){
            sec = "0" + sec;
        }

        document.getElementById("EndText").innerText = `session ends at: ${hour}:${min}:${sec}`;
        //save player data if it changed.
        localStorage.setItem("player", JSON.stringify(Player));

        //end session
        if(Player.Time < new Date().valueOf()){
            alert(`your time is up, you played ${Player.GPlayed} times and ended with ${Player.Cash}$`);
            localStorage.clear();
            window.location.replace("index.html");
        }
    }

}

function Theme(x){
    console.log(x);
    localStorage.setItem("Theme", JSON.stringify(x))
}

function Clear(){
    localStorage.clear();
}