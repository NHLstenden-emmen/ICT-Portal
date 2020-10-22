// check for saved 'darkMode' in localStorage
let darkMode = localStorage.getItem("darkMode");

const darkModeToggleDestkop = document.querySelector(".darkmodeSwitch");
const darkModeToggleMobile = document.querySelector(".darkmodeSwitchMobile");

const enableDarkMode = () => {
	// 1. Add the class to the body
	$("body").addClass("darkmode");
	$("input").addClass("darkmode");
	$(".inputWithIcon").addClass("darkmode");
	$("button").addClass("darkmode");

	// 2. Update darkMode in localStorage
	localStorage.setItem("darkMode", "enabled");
};

const disableDarkMode = () => {
	// 1. Remove the class from the body
	$("body").removeClass("darkmode");
	$("input").removeClass("darkmode");
	$(".inputWithIcon").removeClass("darkmode");
	$("button").removeClass("darkmode");

	// 2. Update darkMode in localStorage
	localStorage.setItem("darkMode", null);
};

// If the user already visited and enabled darkMode
// start things off with it on
if (darkMode === "enabled") {
	enableDarkMode();
}

// When someone clicks the button
darkModeToggleDestkop.addEventListener("click", () => {
	// get their darkMode setting
	darkMode = localStorage.getItem("darkMode");

	// if it not current enabled, enable it
	if (darkMode !== "enabled") {
		enableDarkMode();
		// if it has been enabled, turn it off
	} else {
		disableDarkMode();
	}
});

// When someone clicks the button
darkModeToggleMobile.addEventListener("click", () => {
	// get their darkMode setting
	darkMode = localStorage.getItem("darkMode");

	// if it not current enabled, enable it
	if (darkMode !== "enabled") {
		enableDarkMode();
		// if it has been enabled, turn it off
	} else {
		disableDarkMode();
	}
});
