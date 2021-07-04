const post = document.querySelector('.post');
post.addEventListener('click',()=>{
    const col = event.target.parentNode;
    col.querySelector('h4').innerHTML = `<span class="name">${col.querySelector('.name').innerText}</span>`

    const review = col.querySelector('#review')
    const p = document.createElement('p');
    p.innerText = review.value;
    p.className = 'col-6';
    col.replaceChild(p,review);

    const rating = col.querySelector(`input[name="rating"]:checked`).value;
    const replace = col.querySelector('.rating');
    let add = []
    for(let i=1;i<=5;i++){
        add[i-1] = document.createElement('span')
        if(i<=rating)
            add[i-1].className = 'fa fa-star checked'
        else
            add[i-1].className = 'fa fa-star'
    }
    let stars = ""
    for(let i=0;i<5;i++){
        stars+= add[i].outerHTML;
        console.log(add[i]);
    }
    replace.remove();
    post.remove();
    col.innerHTML += stars;
})