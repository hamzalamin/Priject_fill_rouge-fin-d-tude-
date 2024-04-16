//cart desplaying 
  
var bookBorderVisible = false; // Variable to track the visibility of the book border
  
function displayBookBorder() {
  if (!bookBorderVisible) {
    // Create a container for the books
    var bookBorder = document.createElement("div");
    bookBorder.className = "book-border";

    // Add books to the container (You can add your book details here)
    var books = ["Book 1", "Book 2", "Book 3"];
    books.forEach(function(book) {
      var bookElement = document.createElement("p");
      bookElement.textContent = book;
      bookBorder.appendChild(bookElement);
    });
    document.body.appendChild(bookBorder);

    bookBorderVisible = true; // Set visibility flag to true
  } else {
    // If the book border is already visible, remove it
    var existingBookBorder = document.querySelector(".book-border");
    if (existingBookBorder) {
      existingBookBorder.remove();
    }
    bookBorderVisible = false; // Set visibility flag to false
  }
}

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

// Function to animate counting up
function countUp(target, duration, id) {
    let currentCount = parseInt(document.getElementById(id).textContent);
    const steps = 50; // Number of steps for smooth animation
    const increment = (target - currentCount) / steps; // Calculate increment for each step
    const intervalDuration = duration / steps; // Duration for each step

    // Update count at regular intervals
    setInterval(() => {
        currentCount += increment;
        document.getElementById(id).textContent = Math.round(currentCount); // Round to nearest whole number

        if (currentCount >= target) {
            document.getElementById(id).textContent = target; // Ensure final count matches target exactly
        }
    }, intervalDuration);
}

countUp(10000, 4000, 'bookCount'); 
countUp(5000, 4000, 'peopleCountValue'); 



// Get the current year
const currentYear = new Date().getFullYear();

// Update the content of the span element with the current year
document.getElementById('currentYear').textContent = currentYear;


