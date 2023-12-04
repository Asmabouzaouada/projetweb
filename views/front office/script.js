let openShopping = document.querySelector('.shopping1');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

let products = [
    {
        id: 1,
        name: 'modéle 1',
        images: 'glass1.JPG',
        price: 120000
    },
    {
        id: 2,
        name: 'modéle 2',
        images: 'glass2.JPG',
        price: 120000
    },
    {
        id: 3,
        name: 'modéle 3',
        images: 'glass3.JPG',
        price: 220000
    },
    {
        id: 4,
        name: 'modéle 4',
        images: 'glass4.JPG',
        price: 123000
    },
    {
        id: 5,
        name: 'modéle 5',
        images: 'glass5.JPG',
        price: 320000
    },
    {
        id: 6,
        name: 'modéle 6',
        images: 'glass6.JPG',
        price: 120000
    },
    {
        id: 7,
        name: 'modéle 7',
        images: 'glass7.JPG',
        price: 120000
    },
    {
        id: 8,
        name: 'modéle 8',
        images: 'glass8.JPG',
        price: 120000
    }
];
let listCards  = [];
function initApp(){
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            
            <img src="images/${value.images}">
            <div class="title" name="nom">${value.name}</div>
            <div class="price" name="prix">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
        list.appendChild(newDiv);
    })
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if(value != null){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="images/${value.images}"/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count" name="quan">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>`;
                    
                listCard.appendChild(newDiv);
        }
    })
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}
function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}