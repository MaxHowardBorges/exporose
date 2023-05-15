let popup = document.getElementById("popup");

function openPopup() {
  popup.classList.add("open-popup");
}

function closePopup() {
  popup.classList.remove("open-popup");
}

function openPopupTable(classe) {
  var messageElement = document.getElementById("message-confirm");

  if (classe === "ajout") {
    messageElement.innerHTML =
      "Etes-vous sur de vouloir ajouter la nouvelle ligne ?";
  }
  if (classe === "supp") {
    messageElement.innerHTML = "Etes-vous sur de vouloir supprimer la ligne ?";
  }
  if (classe === "modif") {
    messageElement.innerHTML =
      "Etes-vous sur de vouloir enregistrer les modification ?";
  }
  popup.classList.add("open-popup");
}
