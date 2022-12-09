if(document.URL.includes("index.php")){
    document.getElementById("btn-login").onclick = function () {
        location.href = "../php/login.php";
    };

    document.getElementById("btn-register").onclick = function () {
        location.href = "../php/register_user.php";
    };
}

if(document.URL.includes("login.php")){
    document.getElementById("btn-login-admin").onclick = function () {
        location.href = "../php/admin.php";
    };
}

if(document.URL.includes("admin.php")){
    document.getElementById("btn-register_recipe").onclick = function () {
        location.href = "../php/register_recipe.php";
    };
}

if(document.URL.includes("_recipes_edit.php")){
    document.getElementById("btn-close-registerRecipe").onclick = function () {
        location.href = "../php/admin.php";
    };
}