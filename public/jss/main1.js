
function toggleMenu() {
  const navbarLinks = document.querySelector('.navbar-links');
  const isOpen = navbarLinks.style.display === 'flex';

  if (isOpen) {
    navbarLinks.style.display = 'none';
  } else {
    navbarLinks.style.display = 'flex';
    navbarLinks.style.flexDirection = 'column'; 
    navbarLinks.style.alignItems = 'flex-end'; 
  }
}




// transition dyal about 
const cards = document.querySelectorAll('.card');

// Loop through each card
cards.forEach(card => {
  card.addEventListener('mouseover', () => {
    card.style.transform = 'scale(1.05)';
    card.style.transition = 'transform 0.3s ease';
  });

  card.addEventListener('mouseout', () => {
    card.style.transform = 'scale(1)';
    card.style.transition = 'transform 0.3s ease';
  });
});

// transition dyal lktoba
const bookCards = document.querySelectorAll('.book_card');

// Loop through each book card
bookCards.forEach(bookCard => {
  // Add mouseover event listener
  bookCard.addEventListener('mouseover', () => {
    // Apply the scale transformation on mouseover
    bookCard.style.transform = 'scale(1.05)';
    bookCard.style.transition = 'transform 0.3s ease';
  });

  // Add mouseout event listener
  bookCard.addEventListener('mouseout', () => {
    // Revert back to the original scale on mouseout
    bookCard.style.transform = 'scale(1)';
    bookCard.style.transition = 'transform 0.3s ease';
  });
});

// Ensure that the bookCountElement exists before accessing it
const bookCountElement = document.getElementById('bookCount');
const peopleCountElement = document.getElementById('peopleCountValue');

if (bookCountElement && peopleCountElement) {
    // Define the target values to increment to
    const bookCountTarget = 1000000;
    const peopleCountTarget = 1000;

    // Define the increment step
    const incrementStep = 2;

    // Function to increment numbers
    function incrementNumbers(currentCount, targetCount, element) {
        if (currentCount < targetCount) {
            currentCount += incrementStep;
            element.innerText = currentCount;
            // Schedule the next increment after a short delay
            setTimeout(() => {
                incrementNumbers(currentCount, targetCount, element);
            }, 10);
        }
    }

    // Call the function to start incrementing for book count
    incrementNumbers(0, bookCountTarget, bookCountElement);

    // Call the function to start incrementing for people count
    incrementNumbers(0, peopleCountTarget, peopleCountElement);
}

// Rest of your code...





// // Get the current year
// const currentYear = new Date().getFullYear();

// // Update the content of the span element with the current year
// document.getElementById('currentYear').textContent = currentYear;

// ajax search badi men hena 







// ajax search mssali hena 


