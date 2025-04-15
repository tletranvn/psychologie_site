//Implémenter le JS de la page contact

const inputPrenom = document.getElementById("prenom-input");
const inputNom = document.getElementById("nom-input");
const inputMessage = document.getElementById("message-input");
const inputEmail = document.getElementById("email-input");
const btnValidation = document.getElementById("btn-validation"); 

inputPrenom.addEventListener("keyup", validateForm);
inputNom.addEventListener("keyup", validateForm);
inputMessage.addEventListener("keyup", validateForm);
inputEmail.addEventListener("keyup", validateForm);

// Function permettant de valider tous les formulaires
function validateForm(){
    const prenomOK = validateRequired(inputPrenom);
    const nomOK = validateRequired(inputNom);
    const messageOK = validateRequired(inputMessage);
    const emailOK = validateEmail(inputEmail);

    if(prenomOK && nomOK && messageOK && emailOK){
        btnValidation.disabled = false;
    }
    else{
        btnValidation.disabled = true;
    }
}

//Fuction permettant de valider le champs de l'email
function validateEmail(input){
    //Définir mon regex
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const mailUser = input.value;
    if(mailUser.match(emailRegex)){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid"); 
        return true;
    }
    else{
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        return false;
    }
}

//Fuction permettant de valider les champs de texte
function validateRequired(input){
    if(input.value != ''){
        //C'est ok
        input.classList.add("is-valid");
        input.classList.remove("is-invalid");
        return true;
    }
    else{
        //C'est pas ok
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        return false;
    }
}

