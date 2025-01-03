'use strict';

/**
 * element toggle function
 */

const elemToggleFunc = function (elem) { elem.classList.toggle("active"); }



/**
 * navbar variables
 */

const navbar = document.querySelector("[data-nav]");
const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navCloseBtn = document.querySelector("[data-nav-close-btn]");
const overlay = document.querySelector("[data-overlay]");

const navElemArr = [navOpenBtn, navCloseBtn, overlay];

for (let i = 0; i < navElemArr.length; i++) {

  navElemArr[i].addEventListener("click", function () {
    elemToggleFunc(navbar);
    elemToggleFunc(overlay);
    elemToggleFunc(document.body);
  })

}



/**
 * go top
 */

const goTopBtn = document.querySelector("[data-go-top]");

window.addEventListener("scroll", function () {

  if (window.scrollY >= 800) {
    goTopBtn.classList.add("active");
  } else {
    goTopBtn.classList.remove("active");
  }

})

// newsletter section 
document.getElementById('newsletterForm').addEventListener('submit', function(e) {
  e.preventDefault();
  
  const formData = new FormData(this);
  const messageDiv = document.getElementById('message');
  
  fetch('{{ route("newsletter.subscribe") }}', {
      method: 'POST',
      body: formData,
      headers: {
          'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
      }
  })
  .then(response => response.json())
  .then(data => {
      messageDiv.textContent = data.message;
      messageDiv.style.color = data.status === 'success' ? 'green' : 'red';
      if (data.status === 'success') {
          this.reset();
      }
  })
  .catch(error => {
      messageDiv.textContent = 'An error occurred. Please try again.';
      messageDiv.style.color = 'red';
  });
});