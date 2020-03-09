// function addPrenom() 
// {
//     let new_prenom = parseInt($('#total_prenom').val()) + 1;
//     let new_input_prenom = "<input class='form-control' type='text' name='title' id='new" + new_prenom + "'><br>";
//     $('#new_prenom').append(new_input_prenom);
//     $('#total_prenom').val(new_prenom)
// }
// function addNom() 
// {
//     let new_nom = parseInt($('#total_nom').val()) + 1;
//     let new_input_nom = "<input class='form-control' type='text' name='title' id='new" + new_nom + "'><br>";
//     $('#new_nom').append(new_input_nom);
//     $('#total_nom').val(new_nom)
// }

// function addRole() 
// {
//     let new_role = parseInt($('#total_role').val()) + 1;
//     let new_input_role = "<input class='form-control' type='text' name='title' id='new" + new_role + "'><br>";
//     $('#new_role').append(new_input_role);
//     $('#total_role').val(new_role)
// }

// function removePrenom() 
// {
//     let last_prenom = $('#total_prenom').val();
//     if (last_prenom > 1) 
//     {
//         $('#new' + last_prenom).remove();
//         $('#total_prenom').val(last_prenom - 1);
//     }
// }

// function removeNom() 
// {
//     let last_nom = $('#total_nom').val();
//     if (last_nom > 1) 
//     {
//         $('#new' + last_nom).remove();
//         $('#total_nom').val(last_nom - 1);
//     }
// }

// function removeRole() 
// {
//     let last_role = $('#total_role').val();
//     if (last_role > 1) 
//     {
//         $('#new' + last_role).remove();
//         $('#total_role').val(last_role - 1);
//     }
// }



if (document.getElementById("btnActeur") != null) {
    const btnActeur = document.getElementById("btnActeur");
    
    btnActeur.addEventListener("click", function() {
      let item = document.querySelector(".addRoleActeur");
      let clone = item.cloneNode(true);
      let parent = document.getElementById("parent");
    //   let input = clone.getElementsByTagName("input");
      
    //   input[0].setAttribute("name", "name"+i);
    //   input[1].setAttribute("name", "prenom"+i);
    //   input[2].setAttribute("name", "role"+i);
      //console.log(input);
      parent.insertBefore(clone, item.nextSibling.lastChild);
    });
    };
    
    
    