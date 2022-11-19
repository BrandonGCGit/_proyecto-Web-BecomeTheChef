document.querySelector('#add-step').addEventListener('click', function (){


    event.preventDefault();
    let step = document.createElement("div");
    let id = "step-"+Date.now();
    step.id = id;
    document.querySelector("#steps").appendChild(step)

    let label = document.createElement("label");
    label.innerText = "Step";
    label.setAttribute('for', 'step');
    document.querySelector('#' + id).appendChild(label);

    let input = document.createElement("input");
    input.type = "text";
    //value como array, hace automaticamente la funciones de quienes entran y quienes salen
    input.setAttribute('name', "steps[]");
    document.querySelector('#' + id).appendChild(input);


    let btn = document.createElement("button");
    btn.innerText = "remove";
    btn.addEventListener("click", function (){
        document.querySelector('#' + id).remove();
    });
    document.querySelector('#' + id).appendChild(btn)

});