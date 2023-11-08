
let filter_button = document.querySelector('#filter_button')
let checkbox = document.querySelector('.checkbox')
console.log(filter_button, checkbox);
filter_button.addEventListener('click', (e)=>{
    e.preventDefault();
    if (checkbox.className == "checkbox") {
   
        checkbox.classList.add('hidden')
        console.log("((",checkbox.className);
        filter_button.classList.add('filter_button')
        filter_button.innerHTML = "Фильтр"
    }
    else{
        checkbox.classList.remove('hidden')    
        filter_button.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M1 1L10 10M19 19L10 10M10 10L19 1L1 19" stroke="#122947" stroke-width="2"/></svg>'
        filter_button.classList.remove('filter_button')    

    }
})

    let out = document.querySelector('.out').addEventListener('click', (e) => {
        e.preventDefault();
        let check = document.querySelectorAll('input.input');
        for (let item = 0; item < check.length; item++) {
            const element = check[item];
            element.checked = false;
            
        }

    });




