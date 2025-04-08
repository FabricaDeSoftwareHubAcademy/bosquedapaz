function toggleStatus(element) {
    
    if (element.classList.contains("boleto-botao-pago")) {
      element.classList.remove("boleto-botao-pago");
      element.classList.add("boleto-botao-pendente");
      element.textContent = "Pendente";
    } 
   
    else if (element.classList.contains("boleto-botao-pendente")) {
      element.classList.remove("boleto-botao-pendente");
      element.classList.add("boleto-botao-pago");
      element.textContent = "Pago";
    }
  }