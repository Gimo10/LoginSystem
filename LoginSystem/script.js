
//scrolling animation

const observer = new IntersectionObserver((entries) => {
	entries.forEach((entry) => {
		if(entry.isIntersecting){
			entry.target.classList.add("show-items");
		}else{
			entry.target.classList.remove("show-items");
		}
	});
});

const scrollScale = document.querySelectorAll(".scroll-scale");
scrollScale.forEach((el) => observer.observe(el));

const scrollBottom = document.querySelectorAll(".scroll-bottom");
scrollBottom.forEach((el) => observer.observe(el));

const scrollTop = document.querySelectorAll(".scroll-top");
scrollTop.forEach((el) => observer.observe(el));




// Get the modal and the button that opens it
const openModalBtns = document.querySelectorAll('.openModalBtn');
const closeModalBtns = document.querySelectorAll('.close');

// Function to open the modal
function openModal(modalId) {
  const modal = document.getElementById(modalId);
  modal.style.display = 'block';
}

// Function to close the modal
function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  modal.style.display = 'none';
}

// Event listeners to open the corresponding modal for each button
openModalBtns.forEach(button => {
  button.addEventListener('click', function () {
    const modalId = button.getAttribute('data-modal-target');
    openModal(modalId);
  });
});

// Event listeners to close the corresponding modal for each close button
closeModalBtns.forEach(button => {
  button.addEventListener('click', function () {
    const modalId = button.getAttribute('data-modal-close');
    closeModal(modalId);
  });
});