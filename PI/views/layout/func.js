

document.body.onresize = function(){
    largura = window.innerWidth;
    menu = document.getElementById("menu");
    if(largura >=700){
        console.log("Asdasd")
        menu.style.display = 'block';
    }
    else{
        menu.style.display = 'none';
    }

};

function showMenu(){
    console.log("asdadsad");
    menu = document.getElementsByTagName("nav")[0];
    if(menu.style.display == 'block')
      menu.style.display = 'none';
    else
      menu.style.display = 'block';
}

