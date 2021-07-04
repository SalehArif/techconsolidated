
//CART remove and calc cost
const prices = document.querySelectorAll('.price');
const quantities = document.querySelectorAll(`input[type='number']`);

document.onload = cost();
quantities.forEach(quantity => quantity.addEventListener('input',cost));

function cost(){   
    let count = 0;
    let ship = 30;
    let discount = 20;
    for(let i=0;i<quantities.length;i++)
        count += parseFloat(quantities[i].value) * parseFloat(prices[i].innerText);
    document.querySelector('#add').innerText = parseInt(count);
    document.querySelector('#ship').innerText = ship;
    document.querySelector('#discount').innerText = discount;
    document.querySelector('#total').innerText = parseInt(count) + parseInt(ship) - parseInt(discount); 
}

// const remove = document.querySelectorAll('.remove');
// remove.forEach(btn => btn.addEventListener('click', () => {
//     const parent = event.target.parentNode.parentNode; 
//     parent.remove();
//     const price = parent.querySelector('.price').innerText
//     const quantity = parent.querySelector(`input[type='number']`).value ;
//     document.querySelector('#add').innerText -= parseInt(price) * parseInt(quantity);
//     document.querySelector('#total').innerText -= parseInt(price) * parseInt(quantity); 
// }));