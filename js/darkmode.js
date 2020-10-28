// check for saved 'darkMode' in localStorage

const darkModeToggleDestkop = document.querySelector('.darkmodeSwitch');
const darkModeToggleMobile = document.querySelector('.darkmodeSwitchMobile');


const enableDarkMode = () => {
  // 1. Add the class to the body
  


  $('body').addClass('darkmode');
  $('input').addClass('darkmode');
  $('textarea').addClass('darkmode');
  $('button').addClass('darkmode');
  $('select').addClass('darkmode');
  $('option').addClass('darkmode');

  // 2. Update darkMode in localStorage
  document.cookie = "darkmode=enabled;max-age=31536000; path=/";

}

const disableDarkMode = () => {
  // 1. Remove the class from elements

  $('body').removeClass('darkmode');
  $('input').removeClass('darkmode');
  $('textarea').removeClass('darkmode');
  $('button').removeClass('darkmode');
  $('select').removeClass('darkmode');
  $('option').removeClass('darkmode');

  // 2. Update darkMode in cookies 
  document.cookie = "darkmode=disabled;max-age=31536000; path=/";

}



darkModeToggleDestkop.addEventListener('click', () => {
   // get their darkMode setting
   darkMode = getCookieValue('darkmode'); 
  
   // if it not current enabled, enable it
   if (darkMode !== 'enabled') {
     enableDarkMode();
   // if it has been enabled, turn it off  
   } else {  
     disableDarkMode(); 
   }
});


// When someone clicks the button
darkModeToggleMobile.addEventListener('click', () => {
  // get their darkMode setting
  darkMode = getCookieValue('darkmode'); 
  
  // if it not current enabled, enable it
  if (darkMode !== 'enabled') {
    enableDarkMode();
  // if it has been enabled, turn it off  
  } else {  
    disableDarkMode(); 
  }
});


function getCookieValue(a) {
  var b = document.cookie.match('(^|;)\\s*' + a + '\\s*=\\s*([^;]+)');
  return b ? b.pop() : '';
}