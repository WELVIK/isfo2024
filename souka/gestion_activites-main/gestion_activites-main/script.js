class Activites_stagiaires {
    constructor (id,prenom,nom,nb_jours,activite,date_activite,valide){
        this.id = id;
        this.prenom = prenom ;
        this.nom = nom ;
        this.nb_jours = nb_jours ;
        this.activite = activite ;
        this.date_activite = date_activite ;
        this.valide = valide ;
    }
}
// activite1 = new Activites_stagiaires()

// declaration
let stagiairesArray = [];
let activitesArray = [];
let activites_stagiaires = [];
let selected_activite ="";
let table_activites = document.getElementById("stagiare_activite_table")

let selectedRow ;
// events
document.addEventListener("DOMContentLoaded",chargement);

document.querySelector("#btn_search").addEventListener("click",search)

document.getElementById("ajouter").addEventListener("click",ajouter_activite)

document.getElementById("supprimer").addEventListener("click",supprimer);

document.getElementById("modifier").addEventListener("click",modifier);

// functions

function chargement(){
    const request = new XMLHttpRequest();
    request.open("GET","data.json",true);
    request.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            let responseData = JSON.parse(this.responseText);
            stagiairesArray = responseData.stagiaires;
            activitesArray = responseData.activites;
            let activitesOption = "";
            for(let i = 0 ; i < activitesArray.length ; i++){
                activitesOption += `<option value =" ${activitesArray[i].libelle}" >${activitesArray[i].libelle} </option> `
            }
            document.getElementById("activite").innerHTML = activitesOption;

        }
    }
    request.send();
}

let searchedStagiaire;
function search(){
    searchedStagiaire = stagiairesArray.find(function(itemValue){
        let searchInput = document.getElementById("searchText").value;
        return itemValue.nom == searchInput;

    }) 
    if(!searchedStagiaire){
        console.log("not found")
    }
    // console.log(searchedStagiaire)

}




function ajouter_activite(e){
    e.preventDefault();
    let nom = searchedStagiaire.nom,
        id =searchedStagiaire.id ,
        prenom = searchedStagiaire.prenom,
        activite = document.getElementById("activite").value,
        nb_jours = document.getElementById("jours").value,
        date_activite = document.getElementById("date_debut").value,
        valide = document.getElementById("valideCheckbox").checked;

    let activite_stagiaire = new Activites_stagiaires(id,prenom,nom,nb_jours,activite,date_activite,valide);

    activites_stagiaires.push(activite_stagiaire);
    console.log(activites_stagiaires);
    console.log(date_activite);
    console.log(valide)
    afficher_activites();

}



function afficher_activites(){
    let content_data = "";
    for(let i = 0 ; i < activites_stagiaires.length ; i++){
        content_data += `<tr>
                            <td>${activites_stagiaires[i].id}</td>
                            <td>${activites_stagiaires[i].prenom}</td>
                            <td>${activites_stagiaires[i].nom}</td>
                            <td>${activites_stagiaires[i].activite}</td>
                            <td>${activites_stagiaires[i].nb_jours}</td>
                            <td>${activites_stagiaires[i].date_activite}</td>
                            <td><input type ="checkbox" checked=${activites_stagiaires[i].valide}/></td>
                        </tr>`
    }
    document.getElementById("tdata").innerHTML = content_data;
    // let table_activites = document.getElementById("stagiare_activite_table")
    console.log(table_activites.rows.length)
    for (let i = 1 ; i < table_activites.rows.length ; i++){
        table_activites.rows[i].onclick = function(){
            for (let j = 1 ; j < table_activites.rows.length ; j++){
                table_activites.rows[j].classList.remove("table-success")
            } 
            table_activites.rows[i].classList.add("table-success")
            selected_activite = table_activites.rows[i].getElementsByTagName("td")[0].textContent;
            console.log(selected_activite);
        }  
    }
}


function supprimer (){
    activites_stagiaires = activites_stagiaires.filter(function(itemValue){
        return itemValue.id != selected_activite
    })
    afficher_activites();
}

function modifier() {
    const selectedRow = document.querySelector('tr.table-success');
    const tdElements = selectedRow.querySelectorAll('td');
    const tdContents = Array.from(tdElements).map(td => td.innerText) 

    document.getElementById("searchText").value = tdContents[2]
    document.getElementById("activite").value = tdContents[3]
    document.getElementById("jours").value = tdContents[4]
    document.getElementById("date_debut").value = tdContents[5]
    
    
}
