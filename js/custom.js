
/* bind filter button click
var filtersElem = document.querySelector('.filters-button-group');
filtersElem.addEventListener( 'click', function( event ) {
  // only work with buttons
  if ( !matchesSelector( event.target, 'button' ) ) {
    return;
  }
  var filterValue = event.target.getAttribute('data-filter');
  // use matching filter function
  //filterValue = filterFns[ filterValue ] || filterValue;
  iso.arrange({ filter: filterValue });
  filtersElem.querySelector('.active').classList.remove('active');
  event.target.classList.add('active');
});*/



    // Optional: Add support for browsers that do not support showPicker method
    document.addEventListener('DOMContentLoaded', function() {
      const dateInput = document.getElementById('dob');
      const calendarIcon = document.querySelector('.fa-calendar-days');

      if (dateInput && calendarIcon) {
          calendarIcon.addEventListener('click', function() {
              dateInput.focus();
              dateInput.click();
          });
      }
  });