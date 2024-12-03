function toggleStatus(element) {
    
    if (element.classList.contains("ativo")) {
      element.classList.remove("ativo");
      element.classList.add("inativo");
      element.textContent = "Inativo";
    } 
   
    else if (element.classList.contains("inativo")) {
      element.classList.remove("inativo");
      element.classList.add("ativo");
      element.textContent = "Ativo";
    }
  }