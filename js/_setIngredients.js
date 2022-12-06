document.querySelector('#add-ingredient').addEventListener('click', function (){


    event.preventDefault();
    let ingredient = document.createElement("div");
    let id = "ingredient-"+Date.now();
    ingredient.id = id;
    document.querySelector("#ingredients").appendChild(ingredient)

    let label = document.createElement("label");
    label.innerText = "Ingredient";
    label.setAttribute('for', 'ingredient');
    document.querySelector('#' + id).appendChild(label);

    let input = document.createElement("input");
    input.type = "text";
    //value como array, hace automaticamente la funciones de quienes entran y quienes salen
    input.setAttribute('name', "ingredients[]");
    document.querySelector('#' + id).appendChild(input);


    let btn = document.createElement("button");
    btn.innerText = "remove";
    btn.addEventListener("click", function (){
        document.querySelector('#' + id).remove();
    });
    document.querySelector('#' + id).appendChild(btn)

});