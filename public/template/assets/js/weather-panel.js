// https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/37.8267,-122.4233
//https://darksky.net/dev/img/attribution/poweredby-oneline-darkbackground.png
//https://darksky.net/dev/img/attribution/poweredby-oneline.png
//https://cors-anywhere.herokuapp.com/https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/37.8267,-122.4233?'
// console.clear();
$(document).ready(function() {
    var metric = true;
    var date;
    var json;
    var jsonRegion;
    //check that geolocation feature supported by browser
    if ("geolocation" in navigator) {
        console.log("Геолокация поддерживается");
    } else {
        console.log("Геолокация не поддерживается");
        throw new Error("Пользователь не поддерживает геолокацию");
    }

    //get location
    // navigator.geolocation.getCurrentPosition(success, error, {
    //     timeout: 20000,
    //     maximumAge: 0,
    //     enableHighAccuracy: false
    // });

    // extract longitude and latitude
    // function success(position) {
        $(".loading-display").css("visibility", "hidden");
        // var longitude = position.coords.longitude.toFixed(4);
        // var latitude = position.coords.latitude.toFixed(4);

        var latitude = 41.315514;
        var longitude = 69.246097;
        console.log(
            "Координаты - долгота: " + longitude + " широта: " + latitude
        );

        //get weather data from DarkSky as JSON array
        var darkSkyURL =
            // "https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/";
            "http://www.meteo.uz/api/v2/weather/current.json?city=tashkent&language=ru";
        var callback = "?callback=?"; // makes it a jsonP request

        var requestURL = darkSkyURL;// + latitude + "," + longitude + callback;
        console.log(requestURL);
        // fetch json data from Dark Sky API
        $.getJSON(requestURL, function(result) {
            json = result;
            // split timezone array, format is Country/city
            // var locArray = json.timezone.split("/");

            // $(".loc-name").html(locArray[1] + ", " + locArray[0]);
            $(".coordinates").html(
                "Широта: " + latitude + " и долгота: " + longitude
            );
            //show icons
            $(".small-icon").css("visibility", "visible");
            //get temperature
            setTemp(json.air_t, metric);

            //get description
            var currDesc = json.cloud_amount;
            $(".curr-description").html(currDesc);

            var iconDesc = json.weather_code;
            console.log("DS: " + iconDesc);
            switch (iconDesc) {
                case "clear":
                    {
                        iconDesc = "day-sunny";
                        $(".wi").css("color", "rgb(246, 195, 87)");
                        break;
                    }
                case "mostly-clear":
                {
                    iconDesc = "day-cloudy";
                    $(".wi").css("color", "rgb(246, 195, 87)");
                    break;
                }
                case "partly-cloudy":
                {
                    iconDesc = "day-cloudy";
                    break;
                }
                case "mostly-cloudy":
                {
                    iconDesc = "day-cloudy";
                    break;
                }
                case "overcast":
                {
                    iconDesc = "cloudy";
                    break;
                }
                case "fog":
                {
                    iconDesc = "fog";
                    break;
                }
                case "light-rain":
                {
                    iconDesc = "rain";
                    break;
                }
                case "rain":
                {
                    iconDesc = "rain";
                    break;
                }
                case "heavy-rain":
                {
                    iconDesc = "rain";
                    break;
                }
                case "heavy-rain":
                {
                    iconDesc = "rain";
                    break;
                }
                case "thunderstorm":
                {
                    iconDesc = "thunderstorm";
                    break;
                }
                case "light-sleet":
                {
                    iconDesc = "sleet";
                    break;
                }
                case "sleet":
                {
                    iconDesc = "sleet";
                    break;
                }
                case "heavy-sleet":
                {
                    iconDesc = "sleet";
                    break;
                }
                case "heavy-sleet":
                {
                    iconDesc = "sleet";
                    break;
                }
                case "light-snow":
                {
                    iconDesc = "now";
                    break;
                }
                case "snow":
                {
                    iconDesc = "now";
                    break;
                }
                case "heavy-snow":
                {
                    iconDesc = "now";
                    break;
                }
                default:
                    iconDesc = "day-sunny";
            }
            $(".wi-wi").addClass("wi-" + iconDesc);
            $(".wi-wi").css("visibility", "visible");
            $(".hour-description").html(json.time_of_day);

            //get time
            date = new Date(json.datetime);
            var month = date.getMonth();
            var monthNames = [
                "Январь",
                "Февраль",
                "Март",
                "Апрель",
                "Май",
                "Июнь",
                "Июль",
                "Август",
                "Сентябрь",
                "Октябрь",
                "Ноябрь",
                "Декабрь"
            ];
            $(".time").html(
                date.getDay() + " " + monthNames[month] + " " + date.getFullYear()
            );

            // get chance of rain
            // $(".precip").html(
            //     json.currently.precipProbability.toFixed(1) * 100 + "%"
            // );

            // wind speed
            // $(".wind").html((json.currently.windSpeed / 3.6).toFixed(1) + " м/с");

            //sunset time
            // var sunsetTime = new Date(json.daily.data[0].sunsetTime * 1000);
            // $(".sunset").html(
            //     (sunsetTime.getHours() % 12) + ":" + sunsetTime.getMinutes()
            // );
            //
            // //cloud cover
            // $(".clouds").html(json.currently.cloudCover.toFixed(1) * 100 + "%");

            // Create Weather Chart
            if($('#temp-chart').length > 0 && $('#rain-chart').length > 0 && $('#wind-chart').length > 0)
                createChart();

            // reveal chart labels
            $(".graph-legend").css("visibility", "visible");

            // when F button pressed, change to Farenheight
            $(".faren").on("click", function() {
                metric = false;
                $(".faren").css({ color: "grey", "pointer-events": "none" });
                $(".celsius").css({ color: "#b3b3b3", "pointer-events": "auto" });
                setTemp(json.air_t, metric);
                createChart();
            });

            // when C button pressed, change to Celsius
            $(".celsius").on("click", function() {
                metric = true;
                $(".celsius").css({ color: "grey", "pointer-events": "none" });
                $(".faren").css({ color: "#b3b3b3", "pointer-events": "auto" });
                setTemp(json.air_t, metric);
                createChart();
            });
        });
    // }

    function error(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
        $(".loading-display").html(
            "<br>Не могу найти ваше местоположение, <br> Пожалуйста, включите отслеживание местоположения <br> <a href='javascript:window.location.href=window.location.href'>Обновить страницу</a>"
        );
    }

    // function that toggles temperature display for selected temp scale.
    function setTemp(temp, metric) {
        if (metric) {
            temp = Math.floor(temp) + "°C";
        } else {
            temp = (((temp - 32) * 5) / 9).toFixed(0) + "°C";
        }
        $(".current-temp").html(temp);
        $(".current-temp-andijan").html(getRegionWeather('gulistan') + '°C');
        $(".temp-format").css("visibility", "visible");
    }

    function getRegionWeather(city) {
        $.getJSON("http://www.meteo.uz/api/v2/weather/current.json?city="+ city +"&language=ru", function(result) {
           return  result;
        });

    }

    function createChart() {
        var hour = date.getHours();
        var hourLabels = [0, 0, 0, 0, 0, 0, 0, 0];
        var tempData = [0, 0, 0, 0, 0, 0, 0, 0];
        var rainData = [0, 0, 0, 0, 0, 0, 0, 0];
        var windData = [0, 0, 0, 0, 0, 0, 0, 0];

        for (var i = 0; i < hourLabels.length; i++) {
            var tfhour = (hour + i) % 24;
            var twhour = tfhour % 12;
            if (tfhour > 11 && tfhour != 24) twhour += " pm";
            else {
                if (tfhour == 0) twhour = 12;
                twhour += " am";
            }
            hourLabels[i] = twhour;
            // var hTemp = json.hourly.data[i].temperature;
            // if (metric) {
            //     hTemp = ((hTemp - 32) * 5) / 9;
            // }
            // tempData[i] = hTemp.toFixed(2);
            // rainData[i] = json.hourly.data[i].precipProbability * 100;
            // windData[i] = (json.hourly.data[i].windSpeed / 3.6).toFixed(3);
        }
        var tempEl = document.getElementById("temp-chart");
        var rainEl = document.getElementById("rain-chart");
        var windEl = document.getElementById("wind-chart");

        var tempChart = new Chart(tempEl, {
            type: "line",
            data: {
                labels: hourLabels,
                datasets: [{
                    label: "temp",
                    data: tempData,
                    borderColor: "rgb(246 ,  191 ,  77 )",
                    borderWidth: 1,
                    backgroundColor: "rgba(246 ,191 ,  77 , 0.2)"
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    boxWidth: 0,
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontSize: 10
                        },
                        scaleLabel: {
                            display: true,
                            labelString: " ",
                            fontSize: 10
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontSize: 10
                        }
                    }]
                }
            }
        });
        var rainChart = new Chart(rainEl, {
            type: "line",
            data: {
                labels: hourLabels,
                datasets: [{
                    label: "Дождь",
                    data: rainData,
                    borderColor: "#55AADD",
                    borderWidth: 1,
                    backgroundColor: "rgba(85,170,221, 0.2)"
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    boxWidth: 0,
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontSize: 10
                        },
                        scaleLabel: {
                            display: true,
                            labelString: "%",
                            fontSize: 10
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontSize: 10
                        }
                    }]
                }
            }
        });
        var windChart = new Chart(windEl, {
            type: "line",
            data: {
                labels: hourLabels,
                datasets: [{
                    label: "Ветер",
                    data: windData,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    boxWidth: 0,
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontSize: 10,
                            stepSize: 1
                        },
                        scaleLabel: {
                            display: true,
                            labelString: "м/с",
                            fontSize: 10
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontSize: 10
                        }
                    }]
                }
            }
        });
    }

    // toggle visibility of graphs in bottom container
    $(".wind-label").on("click", function() {
        $(".temp-label, .rain-label").addClass("label-off"); // unselect other labels
        $(".wind-label").removeClass("label-off");
        $(".temp-chart, .rain-chart").addClass("chart-hidden"); // hide other charts
        $(".wind-chart").removeClass("chart-hidden");
    });
    $(".rain-label").on("click", function() {
        $(".temp-label, .wind-label").addClass("label-off"); // unselect other labels
        $(".rain-label").removeClass("label-off");
        $(".temp-chart, .wind-chart").addClass("chart-hidden"); // hide other charts
        $(".rain-chart").removeClass("chart-hidden");
    });
    $(".temp-label").on("click", function() {
        $(".rain-label, .wind-label").addClass("label-off"); // unselect other labels
        $(".temp-label").removeClass("label-off");
        $(".rain-chart, .wind-chart").addClass("chart-hidden"); // hide other charts
        $(".temp-chart").removeClass("chart-hidden");
    });
});
