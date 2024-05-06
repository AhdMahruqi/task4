// set the index at 0 to start:
let photo_index = 0;
// call the function:
showSlides();

function showSlides() {
    // set a counter:
    let x;
    // get all the photos that use photos class so it included in the gallery:
    let photo = document.getElementsByClassName("photos");
    // for starting go through all photos and sit display as none (hidden):
    for (x = 0; x < photo.length; x++) 
        photo[x].style.display = "none";  
    // increase the index to compare the number of photos with the lenght of the phostos list:
    photo_index++;
    // if all photos has appear loop again to the first photo:
    if (photo_index > photo.length)
        photo_index = 1    
    // make the photo appear:
    photo[photo_index-1].style.display = "block";  
    // change the photos each three seconds:
    setTimeout(showSlides, 3000); 
    }