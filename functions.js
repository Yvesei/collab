function createTable() {
    document.getElementById('table').style.display = 'flex';
}

function Edit() {
    document.getElementById('edit').style.display = 'flex';


    
    // console.log(value);


}


function hide(){
    var table = document.getElementById('table');
    var edit = document.getElementById('edit');
    var useradd = document.getElementById('usradd');
    if(table.style.display == 'flex'){
        table.style.display = 'none';
    }

    if(edit.style.display == 'flex'){
        edit.style.display = 'none';
    }

    if(useradd.style.display == 'flex'){
        useradd.style.display = 'none';
    }
}


var i = 0;
function duplicate() {
    var original = document.getElementById('table0');
    var input = document.getElementById('table-input');
    var clone = original.cloneNode(true);
    clone.id = "table" + ++i; 
    clone.getElementsByTagName('p')[0].innerHTML = input.value;
    name.id = "table-name" + ++i;
    original.parentNode.appendChild(clone);

}

function hideMenu(){
    var menu = document.getElementById('menu');
    if(menu.style.display == 'none' ){
        menu.style.display = 'block';
    }else{
        menu.style.display = 'none';
    }

}





var j = 0;
function usr() {
    var original = document.getElementById('user' + j);
    var email = document.getElementById('user-email');
    var pass = document.getElementById('user-pass');
    var nameNew = document.getElementById('user-name');
    var clone = original.cloneNode(true);
    clone.id = "user" + ++j; 
    clone.getElementsByTagName('span')[0].id = "user-name" + j;
    clone.getElementsByTagName('span')[0].innerHTML = nameNew.value;
    original.parentNode.appendChild(clone);

}

// k = 0;
// function Org(){
//     var orgName = document.getElementById('orga');
//     var login = document.getElementById('login');
//     var pass = document.getElementById('pass');
//     var input = document.getElementById('orgN');
//     var clone1 = orgName.cloneNode(true);
//     var clone2 = login.cloneNode(true);
//     var clone3 = pass.cloneNode(true);

//     clone1.innerHTML = input.value;

//     orgName.parentNode.appendChild(clone1);
//     login.parentNode.appendChild(clone2);
//     pass.parentNode.appendChild(clone3);
 

// }

function createLine(){
    var line = document.getElementById('line');
    var clone = line.cloneNode(true);
    line.parentNode.appendChild(clone);
    clone.style.display = '';
}


function deleteLine(){
    
}


function site(){


}




