// JavaScript code for handling the dropdown menu
const dropdownMenu = document.getElementById('dropdownMenu');
const toggleButton = document.getElementById('toggleButton');
const toggleIcon = document.getElementById('toggleIcon');

// Function to toggle the class for the dropdown menu based on the window width
function toggleDropdownMenu() {
  if (window.innerWidth <= 950) {
    dropdownMenu.classList.add('open');
    toggleIcon.classList.remove('fa-bars');
    toggleIcon.classList.add('fa-times'); // Replace 'fa-bars' with the class for your closed icon
  } else {
    dropdownMenu.classList.remove('open');
    toggleIcon.classList.remove('fa-times');
    toggleIcon.classList.add('fa-bars'); // Replace 'fa-times' with the class for your open icon
  }
}

// Function to close the dropdown menu
function closeDropdownMenu() {
  dropdownMenu.classList.remove('open');
  toggleIcon.classList.remove('fa-times');
  toggleIcon.classList.add('fa-bars'); // Replace 'fa-times' with the class for your open icon
}

// Initial check on page load
toggleDropdownMenu();

// Event listener for window resize
window.addEventListener('resize', toggleDropdownMenu);

// Event listener for the toggle button
toggleButton.addEventListener('click', function () {
  if (dropdownMenu.classList.contains('open')) {
    closeDropdownMenu();
  } else {
    dropdownMenu.classList.add('open');
    toggleIcon.classList.remove('fa-bars');
    toggleIcon.classList.add('fa-times'); // Replace 'fa-bars' with the class for your closed icon
  }
});

// Event listener for the dropdown menu links to close the dropdown when a link is clicked
const dropdownLinks = document.querySelectorAll('.dropdown_menu ul li a');
dropdownLinks.forEach(link => {
  link.addEventListener('click', closeDropdownMenu);
});
