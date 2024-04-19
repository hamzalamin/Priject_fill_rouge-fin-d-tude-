

document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);

    axios.post('/search-books', formData)
        .then(response => {
            const books = response.data.books;

            const dataElement = document.getElementById('data');

            // Clear previous content
            dataElement.innerHTML = '';

            // Iterate over the books array and create card elements for each book
            books.forEach(book => {
                const card = document.createElement('div');
                card.classList.add('card');

                const img = document.createElement('img');
                img.src = 'storage/'+book.image; // Assuming book object has an image property
                img.alt = 'Image here XXX';
                card.appendChild(img);

                const details = document.createElement('div');
                details.classList.add('details');

                const title = document.createElement('h2');
                title.textContent = book.name; // Assuming book object has a name property
                details.appendChild(title);

                const writer = document.createElement('p');
                writer.textContent = book.writer; // Assuming book object has a writer property
                details.appendChild(writer);

                const ratings = document.createElement('div');
                ratings.classList.add('ratings');

                // Assuming you want to display 5 stars, with 4 filled and 1 empty based on a rating property
                for (let i = 0; i < 5; i++) {
                    const star = document.createElement('span');
                    star.classList.add('star');
                    if (i < book.rating) {
                        star.textContent = '★'; // Filled star
                    } else {
                        star.textContent = '☆'; // Empty star
                    }
                    ratings.appendChild(star);
                }

                details.appendChild(ratings);

                const button = document.createElement('button');
                const buyNowLink = document.createElement('a');
                buyNowLink.href = '/single/Page/' + book.id;
                buyNowLink.textContent = 'Buy Now';
                buyNowLink.style.textDecoration = 'none';
                buyNowLink.style.color = 'white';
                button.appendChild(buyNowLink);
                details.appendChild(button);

                card.appendChild(details);
                dataElement.appendChild(card);
            });
        })
        .catch(error => {
            console.error(error);
        });
});


