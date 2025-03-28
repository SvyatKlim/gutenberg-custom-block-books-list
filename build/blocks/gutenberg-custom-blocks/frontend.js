/******/ (() => { // webpackBootstrap
/*!********************************************************!*\
  !*** ./src/blocks/gutenberg-custom-blocks/frontend.js ***!
  \********************************************************/
document.addEventListener('DOMContentLoaded', () => {
  const fetchBtn = document.querySelector('.js-fetch-btn');
  const booksListContainer = document.querySelector('.js-books-list');
  fetchBtn.addEventListener('click', async () => {
    booksListContainer.innerHTML = '';
    await fetch(`/wp-json/custom-plugin/v1/books`).then(res => res.json()).then(books => renderBooks(books)).catch(err => console.log(err));
  });
  function renderBooks(data) {
    data.forEach(book => {
      console.log(book);
      const li = document.createElement('li');
      li.innerHTML = `<strong>${book.title}</strong> - ${book.author} - ${book.date}`;
      booksListContainer.appendChild(li);
    });
  }
});
/******/ })()
;
//# sourceMappingURL=frontend.js.map