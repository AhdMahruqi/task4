// function that update the banner when it called:
function updateBanner() {
    // get the banner element using it's id:
    var banner = document.getElementById("banner");
    // set the compony name, the current date, and the current time:
    var companyName = "BioTeck Kits";
    var currentDate = new Date().toLocaleDateString();
    var currentTime = new Date().toLocaleTimeString();
    // add all information to the banner:
    banner.textContent = "Welcome to the " + companyName + " website! Today is " + currentDate + ", and the time is " + currentTime;
    }
// call the function:
updateBanner();
// update the banner:
setInterval(updateBanner, 1000);
    
