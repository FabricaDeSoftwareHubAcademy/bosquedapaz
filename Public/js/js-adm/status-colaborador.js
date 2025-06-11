document.addEventListener("click", async (event) => {

  event.preventDefault();

  let modal = document.getElementById("modal");

  console.log(modal)


  let dados_php = await fetch("../../../actions/action-colaborador.php?id=1");

  let response = await dados_php.json()

  console.log(response)

  if(response.status == 200){
     modal.classList.remove("oculta");
     modal.classList.add("chama");
  }


  // if (event.target.classList.contains("status")) {
  //   event.target.classList.toggle("active");
  //   event.target.classList.toggle("inactive");
  //   event.target.textContent = event.target.classList.contains("active") ? "Ativo" : "Inativo";
    
  // }

  // console.log("KKKKKKK")
});

