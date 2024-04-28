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

// transition for card elements
const cards = document.querySelectorAll('.card');

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

// transition for book card elements
const bookCards = document.querySelectorAll('.book_card');

bookCards.forEach(bookCard => {
  bookCard.addEventListener('mouseover', () => {
    bookCard.style.transform = 'scale(1.05)';
    bookCard.style.transition = 'transform 0.3s ease';
  });

  bookCard.addEventListener('mouseout', () => {
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

