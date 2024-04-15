//cart desplaying 
  
var bookBorderVisible = false; // Variable to track the visibility of the book border
  


// document.querySelectorAll("cartIcon").addEventListener("click", function() {
//   displayBookBorder();
// });




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

   /*
    This is a multi-line comment.
    It spans multiple lines and will be ignored by the JavaScript interpreter.
    */
    
    let stars = document.getElementsByClassName("star");
    let output = document.getElementById("output");
    
    function gfg(n) {
        remove();
        for (let i = 0; i < n; i++) {
            if (n == 1) cls = "one";
            else if (n == 2) cls = "two";
            else if (n == 3) cls = "three";
            else if (n == 4) cls = "four";
            else if (n == 5) cls = "five";
            stars[i].className = "star " + cls;
        }
        output.innerHTML = `<input type="text" id="num" name="rating" value="${n}" style="display: none">`;
        console.log(n);
    }
    
    // To remove the pre-applied styling
    function remove() {
        let i = 0;
        while (i < 5) {
            stars[i].className = "star";
            i++;
        }
    }
    

console.log(";,nbvcjh")