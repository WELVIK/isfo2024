// declaration

const form = document.getElementById("form");
const matricule = document.getElementById("matricule");
const marque = document.getElementById("marque");
const modele = document.getElementById("modele");
const anneeProd = document.getElementById("anneeProd");
const carburant = document.getElementById("carburant");
const prix = document.getElementById("prix");



const Voitures =[]


//fonction qui permet de vider et reinitialiser le formulaire

function vider(){
    matricule.value = "";
    marque.value = "";
    modele.value = "";
    anneeProd.value = "";
    carburant.value = "";
    prix.value = "";
}



// expression reguliere pour valider le matricule de la voiture saisi (exemple: 3456-A-6)

const exp_reg_matricule = /^[1-8]{4}-[A-Z]-[0-9]{1,2}$/



// expression reguliere pour valider les marques et les carburants

const exp_reg_marq_carb =/^[A-Z]{4,15}$/


//exp reg pour le prix 

const exp_reg_prix = /^[1-9][0-9]*$/



// fonction js qui renvoie true ou false selon la validite des données saisies

function validation(){
    

    if(exp_reg_marq_carb.test(marque.value.trim()) &&
     exp_reg_marq_carb.test(carburant.value.trim()) &&
     exp_reg_prix.test(prix.value.trim()) &&
     exp_reg_matricule.test(matricule.value.trim())){

        return true
    } else{
        return false
    }

}

// click sur Enregistrer

form.addEventListener("submit",function(e){
    e.preventDefault()
    if(validation()){
        const voiture1 = {
            matricule: matricule.value.trim(),
            marque: marque.value.trim(),
            modele: modele.value.trim(),
            anneeProd: anneeProd.value.trim(),
            carburant: carburant.value.trim(),
            prix: prix.value.trim()
        }
        Voitures.push(voiture1);

        vider();

        alert("Les données ont été enregistrées avec succès !")


    } else{
        alert("Veuillez remplir correctement tous les champs de saisis !")

        if (!exp_reg_matricule.test(matricule.value.trim())) {
            matricule.style.backgroundColor = "orange";
        }
        if (!exp_reg_marq_carb.test(marque.value.trim())) {
            marque.style.backgroundColor = "orange";
        }
        if (!exp_reg_marq_carb.test(carburant.value.trim())) {
            carburant.style.backgroundColor = "orange";
        }
        if (!exp_reg_prix.test(prix.value.trim())) {
            prix.style.backgroundColor = "orange";
        }
    
    }
})

