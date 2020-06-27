const form = document.querySelector('.add');
const addd = document.querySelector('.todos');
const search = document.querySelector('.search input')

const generate = todos =>{
  const html =  `
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <span>${todos}</span>
    <i class="far fa-trash-alt delete"></i>
  </li>
  `;
  addd.innerHTML += html;
}
form.addEventListener('submit', e =>{
  e.preventDefault();
  const todos = form.add.value.trim()
  if (todos.length > 0) {
    generate(todos);
     form.reset(); // resets everything in the form
  }
  else {
    alert('please enter somththing');
  }
});
// deleting todos by event delegation
addd.addEventListener('click', e =>{
  if(e.target.classList.contains('delete')){
    e.target.parentElement.remove();
  }
});
// key up event for searching

    const filterTodos = term =>{
      //console.log(addd.children);
      Array.from(addd.children)
      .filter((li) =>!li.textContent.includes(term))
      .forEach(li =>li.classList.add('filtered'));

      Array.from(addd.children)
      .filter((li) =>li.textContent.includes(term))
      .forEach(li =>li.classList.remove('filtered'));

    }
    // key up event
 search.addEventListener('keyup', ()=>{
    const term = search.value.trim();
    filterTodos(term);
})