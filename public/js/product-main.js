function readMore() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");
    var bpnarrow= document.querySelector(".read-more-button-block img")
    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = "Read more"; 
      moreText.style.display = "none";
      bpnarrow.style.transform = "rotate(0deg)";
    } else {
      dots.style.display = "none";
      btnText.innerHTML = "Read less"; 
      moreText.style.display = "inline";
      bpnarrow.style.transform = "rotate(180deg)";
    }
  }

function scrollChange() {
  var productHeader = document.querySelector(".profile-header");
  var scrollSection = document.querySelector(".overview-section");
  var scrollPosition = scrollSection.getBoundingClientRect().top;
  var screenPosition = window.innerHeight;
  if (scrollPosition < screenPosition - screenPosition + 118) {
    productHeader.style.opacity="0";
    productHeader.style.top="-118px";
    productHeader.style.height="0";
  }
  else{
    productHeader.style.opacity="1";
    productHeader.style.top="0px";
    productHeader.style.height="118px";
  }
}
window.addEventListener('scroll', scrollChange);
var screenPosition = window.innerHeight;

var overviewList = document.querySelector(".overview-button");
var optionList = document.querySelector(".options-button");
var locationList = document.querySelector(".location-button");
var amenitiesList = document.querySelector(".amenities-button");

function scrollList(){
  var screenPosition = window.innerHeight;
  // overview
  var scrollSection = document.querySelector(".overview-section");
  var scrollPosition = scrollSection.getBoundingClientRect().top;

  if (scrollPosition < screenPosition - screenPosition + 218){
    overviewList.classList.add("active"); 
    amenitiesList.classList.remove("active"); 
    optionList.classList.remove("active");
    locationList.classList.remove("active");
  }
}
window.addEventListener('scroll', scrollList);

function scrollAmenities() {
  var amenitiesSection = document.querySelector(".amenities-section");
  var amenitiesSectionPosition = amenitiesSection.getBoundingClientRect().top;

  if (amenitiesSectionPosition < screenPosition - screenPosition + 218){

    overviewList.classList.remove("active"); 
    amenitiesList.classList.add("active"); 
    optionList.classList.remove("active");
    locationList.classList.remove("active");
  }
}
window.addEventListener('scroll', scrollAmenities);

function scrolloptions() {
  var optionSection = document.querySelector(".options-section");
  var optionSectionPosition = optionSection.getBoundingClientRect().top;

  if (optionSectionPosition < screenPosition - screenPosition + 218){
    optionList.classList.add("active");
    overviewList.classList.remove("active"); 
    amenitiesList.classList.remove("active"); 
    locationList.classList.remove("active");
  }
}
window.addEventListener('scroll', scrolloptions);

function scrollLocation() {
  var locationSection = document.querySelector(".location-section");
  var locationSectionPosition = locationSection.getBoundingClientRect().top;

  if (locationSectionPosition < screenPosition - screenPosition + 218){
    optionList.classList.remove("active");
    overviewList.classList.remove("active"); 
    amenitiesList.classList.remove("active"); 
    locationList.classList.add("active");
  }
}
window.addEventListener('scroll', scrollLocation);


function scrollToAmenities() {
  var amenitiesSection = document.querySelector(".amenities-section");
  var amenitiesSectionPosition = amenitiesSection.getBoundingClientRect().top;
  window.scrollBy(0,amenitiesSectionPosition - 142);
}
function scrollToOverview() {
  var scrollSection = document.querySelector(".overview-section");
  var scrollPosition = scrollSection.getBoundingClientRect().top;
  window.scrollBy(0,scrollPosition - 112);
}
function scrollToOptions() {
  var optionSection = document.querySelector(".options-section");
  var optionSectionPosition = optionSection.getBoundingClientRect().top;
  window.scrollBy(0,optionSectionPosition - 142);
}
function scrollToLocation() {
  var locationSection = document.querySelector(".location-section");
  var locationSectionPosition = locationSection.getBoundingClientRect().top;
  window.scrollBy(0,locationSectionPosition - 142);
}
function scrollChangePrice() {
  var productPrice = document.querySelector(".product-page-header-price-detals");
  var scrollSectionPrice = document.querySelector(".options-section");
  var scrollPositionPrice = scrollSectionPrice.getBoundingClientRect().top;
  if (scrollPositionPrice > screenPosition - screenPosition + 218) {
    productPrice.style.opacity="0";
    productPrice.style.top="-118px";
    productPrice.style.height="0";
  }
  else{
    productPrice.style.opacity="1";
    productPrice.style.top="0px";
    productPrice.style.height="118px";
  }
}
window.addEventListener('scroll', scrollChangePrice);

    function incrementValueMinuse()
    {
        var value = parseInt(document.getElementById('number9').value, 10);
        value = isNaN(value) ? 0 : value;
        value--;
        document.getElementById('number9').value = value;
    }
    function incrementValue()
    {
        var value = parseInt(document.getElementById('number9').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number9').value = value;
    }
    function incrementValueMinuse8()
    {
        var value = parseInt(document.getElementById('number8').value, 10);
        value = isNaN(value) ? 0 : value;
        value--;
        document.getElementById('number8').value = value;
    }
    function incrementValue8()
    {
        var value = parseInt(document.getElementById('number8').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number8').value = value;
    }
    function incrementValueMinuse7()
    {
        var value = parseInt(document.getElementById('number7').value, 10);
        value = isNaN(value) ? 0 : value;
        value--;
        document.getElementById('number7').value = value;
    }
    function incrementValue7()
    {
        var value = parseInt(document.getElementById('number7').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number7').value = value;
    }