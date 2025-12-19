<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .general{
            background-color: rgb(211, 243, 164);
            width: 2000px;
            height: 4000px;  
        }
        .all{
            margin-top: 10px;
        }
        .header{
            background-color: white;
            width: 650px;
            height: 4000px;
            display: flex;
            border-radius: 20px;
            margin-left: 500px;   
        }
        input{
            width: 380px;
            height: 30px;
            border-radius: 10px;
            margin-left: 50px;
        }
        .foods{
            width: 120px;
            height: 30px;
            border-radius: 7px;
            border: solid 1px;
        }
        h1{
            margin-left: 50px;
            color: rgb(75, 106, 13);
        }
        .all{
            flex-direction: column;
        }
        .buttons{
            margin-left: 50px;
            gap: 10px;
        }
        .menu {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 50px;
            max-width: 500px;
            margin: 20px auto;
            font-family: sans-serif;
            margin-left: 50px;
        }
        .food {
            border: 1px solid #eee;
            border-radius: 10px;
            text-align: center;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            background: #fff;
            color: rgb(75, 106, 13);
        }
        .food img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }
        .meal{
            margin-left: 50px;
            color: rgb(4, 123, 63);
        }
        button{
            width: 100px;
            height: 30px;
            border-radius: 10px;
        }
        img{
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }
        .profil{
            display: flex;
            gap: 350px;
            padding: 50px;
        }
    
    </style>
</head>
<body>
    <div class="general">
        <div class="header">
            <div class="all">
                <div class="profil">
                    <img src="settings.png" alt="">
                    <img src="profile.jpg" alt="">
                </div>
                <h1 class="meal">Find your food</h1>
                <p style="margin-left: 50px; font-weight: bold; color: rgb(75, 106, 13);">
                  Salam, 
                  <?php 
                    $email = $_SESSION['user_email'];
                    $name = explode('@', $email)[0];
                    echo htmlspecialchars($name); 
                  ?>!
                </p>

            <form onsubmit="searchFood(); return false;">
                <input type="text" name="search" placeholder="Yemək adı yaz..." />
                <button type="button" onclick="searchFood()">Axtar</button>
            </form><br><br>
            <div class="buttons">
                <button onclick="filterMeals('food')" class="foods"><b>Food</b></button>
                <button onclick="filterMeals('desert')" class="foods"><b>Desert</b></button>
                <button onclick="filterMeals('drink')" class="foods"><b>Drink</b></button>
                <button onclick="filterMeals('fruit')" class="foods"><b>Fruit</b></button>
            </div><br><br><br><br><br>
            <div class="menu">
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="food1-removebg-preview.png" alt="Indian Jollof Rice">
                    <h3>Indian Jollof Rice</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Spaghetti" data-price="12">
                    <img src="food2-removebg-preview.png" alt="Spaghetti">
                    <h3>Spaghetti</h3>
                    <p>15mins ⭐4.3</p>
                    <span class="price">$12.00</span>
                </div>
                <div class="food" data-name="Fried Rice" data-price="15">
                    <img src="food3-removebg-preview.png" alt="Fried Rice">
                    <h3>Fried Rice</h3>
                    <p>20mins ⭐4.7</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Royal Burger" data-price="11">
                   <img src="food4-removebg-preview.png" alt="Royal Burger">
                   <h3>Royal Burger</h3>
                   <p>20mins ⭐4.8</p>
                   <span class="price">$11.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="pizza.jpg" alt="Indian Jollof Rice">
                    <h3>pizza</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="magnolia.jpg" alt="Indian Jollof Rice">
                    <h3>magnolia</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="macaron.jpg" alt="Indian Jollof Rice">
                    <h3>macaron</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="limonad.jpg" alt="Indian Jollof Rice">
                    <h3>limonad</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="latte.jpg" alt="Indian Jollof Rice">
                    <h3>latte</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="lahmacun.jpg" alt="Indian Jollof Rice">
                    <h3>lahmacun</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="kiwi.jpg" alt="Indian Jollof Rice">
                    <h3>kiwi</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="kebab.jpg" alt="Indian Jollof Rice">
                    <h3>kebab</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="hot chocolate.jpg" alt="Indian Jollof Rice">
                    <h3>hot chocolate</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="cola.jpg" alt="Indian Jollof Rice">
                    <h3>cola</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="chocolate cake.jpg" alt="Indian Jollof Rice">
                    <h3>chocolate cake</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="cheese cake.jpg" alt="Indian Jollof Rice">
                    <h3>cheese cake</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="burger.jpg" alt="Indian Jollof Rice">
                    <h3>burger</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="banana.jpg" alt="Indian Jollof Rice">
                    <h3>banana</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="avacado.jpg" alt="Indian Jollof Rice">
                    <h3>avacado</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
                <div class="food" data-name="Indian Jollof Rice" data-price="15">
                    <img src="apple.jpg" alt="Indian Jollof Rice">
                    <h3>apple</h3>
                    <p>20mins ⭐4.8</p>
                    <span class="price">$15.00</span>
                </div>
            </div>
            </div>  
        </div>
    </div>
    <script>
 function filterMeals(category) {
    const foods = document.querySelectorAll('.food');
    
    foods.forEach(food => {
        const name = food.querySelector('h3').innerText.toLowerCase();
        if (category === 'all') {
            food.style.display = 'block';
        } else if (
            (category === 'food' && ['kebab','burger','lahmacun','indian jollof rice','pizza','royal burger','fried rice','spaghetti'].includes(name)) ||
            (category === 'drink' && ['cola','latte','limonad','hot chocolate'].includes(name)) ||
            (category === 'fruit' && ['banana','apple','kiwi','avacado'].includes(name)) ||
            (category === 'desert' && ['cheese cake','chocolate cake','macaron','magnolia'].includes(name))
        ) {
            food.style.display = 'block';
        } else {
            food.style.display = 'none';
        }
    });
}

function searchFood() {
    let input = document.querySelector("input[name='search']").value.toLowerCase();
    let foods = document.querySelectorAll(".food");

    foods.forEach(food => {
        let name = food.querySelector("h3").innerText.toLowerCase();

        if (name.includes(input)) {
            food.style.display = "block";
        } else {
            food.style.display = "none";
        }
    });
}
</script>
</body>
</html>