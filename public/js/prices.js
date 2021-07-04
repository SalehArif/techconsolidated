const prices = document.querySelectorAll('.price');
const quantity = document.querySelectorAll(`.quantity`);
const total = document.querySelectorAll('.total');

document.onload = cost();
function cost(){
    let count = 0, price = 0, ship = 30, discount = 20;

    for(let i=0;i<prices.length;i++){
        price = parseFloat(quantity[i].innerText) * parseFloat(prices[i].innerText);
        total[i].innerText = price; 
        count += price;
    }
    document.querySelector('#add').innerText = parseInt(count);
    document.querySelector('#ship').innerText = ship;
    document.querySelector('#discount').innerText = discount;
    document.querySelector('#total').innerText = parseInt(count) + parseInt(ship) - parseInt(discount); 
}