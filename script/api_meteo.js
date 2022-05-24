//! Weather API
let meteoJ = document.getElementById("meteoJ");
let displayMeteo = document.getElementById("displayMeteo");
//* Link Weather API
const url = `https://www.prevision-meteo.ch/services/json/toulouse`;

//* Asynchronous function to retrieve json format and display it on web page
async function requestApi(){
    let response = await fetch(url);
    let data = await response.json();

    let {
        date,
        hour,
        tmp,
        condition,
        icon_big
    } = data.current_condition;

    let { day_long } = data['fcst_day_0'];

    let jourJ = document.createElement("h3");
    let dateJ = document.createElement("p");
    let heureJ = document.createElement("p");
    let conditionJ = document.createElement("p");
    let tempJ = document.createElement("p");
    let iconJ = document.createElement("img");

    jourJ.textContent = `${day_long}`;
    dateJ.textContent = `${date} à ${hour}`;
    conditionJ.textContent = `${condition}`;
    tempJ.textContent = `Température : ${tmp}°C`;
    iconJ.setAttribute("src", icon_big);

    meteoJ.appendChild(jourJ);
    meteoJ.appendChild(dateJ);
    meteoJ.appendChild(heureJ);
    meteoJ.appendChild(iconJ);
    meteoJ.appendChild(conditionJ);
    meteoJ.appendChild(tempJ);

    hourByHour(data.fcst_day_0);
};

requestApi();

//* Function display the weather hour by hour
function hourByHour(element){
    let dayHour = element.hourly_data
    let list = document.getElementById("displayMeteo");
    let cptId = 0;

    for (let hour of Object.keys(dayHour)) {
        let divHour = document.createElement("div");
        divHour.setAttribute("id", cptId);
        let conditionHour = dayHour[hour].CONDITION
        let iconHour = dayHour[hour].ICON
        let newOl = document.createElement("div");

        newOl.innerHTML = `<p>${hour} : ${conditionHour}` + ` <img src= ${iconHour} /></p>`;
        divHour.appendChild(newOl);

        list.appendChild(divHour);

        if(cptId == 2 || cptId == 8 || cptId == 14 || cptId == 20){
            divHour.style.display = 'block';
        } else {
            divHour.style.display = 'none';
        }
        cptId++
    };
};