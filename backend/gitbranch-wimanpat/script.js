function ClockUP(){

if(localStorage.timer){  
    //time remaining clock    
    let RemainClock = new Date(localStorage.getItem("timer") - new Date().valueOf());

    //to do, this -2 should NOT need to be here.
    let hour = RemainClock.getHours() - 2;
    let min = RemainClock.getMinutes();
    let sec = RemainClock.getSeconds();
    let day = RemainClock.getDay() + " day";

    if(hour < 10){
        hour = "0" + hour;
    }
    if(min < 10){
        min = "0" + min;
    }
    if(sec < 10){
        sec = "0" + sec;
    }
    if(day > 1){
        day += "s";
    }
    document.getElementById("RemainClock").innerText = `the date happens in: ${day} ${hour}:${min}:${sec}`;
}
}

let today = new Date();
let weekday = today.getDay();
let month = today.getMonth();
let date = today.getDate();

startDate = new Date(today.getFullYear(), 0, 1);
let days = Math.floor((today - startDate) /
    (24 * 60 * 60 * 1000));
let week = Math.ceil(days / 7);

let dayNames = ["monday","tuesday","wednesday","thursday","friday","saturday","sunday"];
weekday = dayNames[weekday - 1];

let monthNames = ["jan","feb","mar","apr","may","june","july","aug","sept","oct","nov","dec"];
month = monthNames[month];

document.getElementById("currDate").innerText = `it is ${weekday} the ${date} of ${month} week ${week}`;

ClockUP();
setInterval(ClockUP, 1000);

function SetDate(a){
    if(typeof a !== "number"){
        alert("NaN");
    }
    else if(a < new Date().valueOf()){
        alert("the date already passed")
    }
    else{
        localStorage.setItem("timer", a);
    }
}

if(localStorage.user){
    document.getElementById("ProfName").innerHTML = `<p>welcome ${localStorage.getItem("user")}</p>`
    document.getElementById("ProfPic").innerHTML = `<img src="./uploads/${localStorage.getItem("user")}.jpg">`
}