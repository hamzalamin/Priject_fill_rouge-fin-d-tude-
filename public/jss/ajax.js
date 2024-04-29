

document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);

    axios.post('/search-books', formData)
        .then(response => {
            const books = response.data.books;

            const dataElement = document.getElementById('data');

            //
            dataElement.innerHTML = '';

            // 
            if (books.length === 0) {
                const noResultMessage = document.createElement('p');
                noResultMessage.textContent = 'No books found.';
                dataElement.appendChild(noResultMessage);
            } else {
            books.forEach(book => {
                const card = document.createElement('div');
                card.classList.add('card');

                const img = document.createElement('img');
                img.src = 'storage/'+book.image;
                img.alt = 'IXXX';
                card.appendChild(img);

                const details = document.createElement('div');
                details.classList.add('details');

                const title = document.createElement('h2');
                title.textContent = book.name; 
                details.appendChild(title);

                const writer = document.createElement('p');
                writer.textContent = book.writer; 
                details.appendChild(writer);

                const ratings = document.createElement('div');
                ratings.classList.add('ratings');

                
                for (let i = 0; i < 5; i++) {
                    const star = document.createElement('span');
                    star.classList.add('star');
                    if (i < book.rating) {
                        star.textContent = '★'; 
                    } else {
                        star.textContent = '☆'; 
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
            }
        })
        .catch(error => {
            console.error(error);
        });
});


