
const botaoRecusar = document.getElementById("botao_recusar");
const botaoValidar = document.getElementById("botao_validar");

const modalRecusar1 = document.getElementById("modal_recusar_expositor_1");
const modalRecusar2 = document.getElementById("modal_recusar_expositor_2");
// const modalRecusar3 = document.getElementById("modal_recusar_expositor_3");

const botaoCancelarRecusar1 = document.getElementById("botao_cancelar_recusar_expositor_1");
const botaoConfirmarRecusar1 = document.getElementById("botao_confirmar_recusar_expositor_1");

const botaoCancelarRecusar2 = document.getElementById("botao_cancelar_recusar_expositor_2");
const botaoConfirmarRecusar2 = document.getElementById("botao_confirmar_recusar_expositor_2");

const botaoOkRecusar = document.getElementById("botao_ok_recusar");

const modalValidar1 = document.getElementById("modal_validar_expositor_1");
const modalValidar2 = document.getElementById("modal_validar_expositor_2");
// const modalValidar3 = document.getElementById("modal_validar_expositor_3");

const botaoCancelarValidar1 = document.getElementById("botao_cancelar_validar_expositor_1");
const botaoConfirmarValidar1 = document.getElementById("botao_confirmar_validar_expositor_1");

const botaoCancelarValidar2 = document.getElementById("botao_cancelar_validar_expositor_2");
const botaoConfirmarValidar2 = document.getElementById("botao_confirmar_validar_expositor_2");

const botaoOkValidar = document.getElementById("botao_ok_validar");

botaoRecusar.addEventListener("click", () => {
    modalRecusar1.style.display = "flex";
    document.body.classList.add("modal-aberto");
});

botaoCancelarRecusar1.addEventListener("click", () => {
    modalRecusar1.style.display = "none";
    document.body.classList.remove("modal-aberto");
});

botaoConfirmarRecusar1.addEventListener("click", () => {
    modalRecusar1.style.display = "none";
    modalRecusar2.style.display = "flex";

});

botaoCancelarRecusar2.addEventListener("click", () => {
    modalRecusar2.style.display = "none";
    document.body.classList.remove("modal-aberto");
});

botaoConfirmarRecusar2.addEventListener("click", () => {
    modalRecusar2.style.display = "none";

});

// botaoOkRecusar.addEventListener("click", () => {
//     modalRecusar3.style.display = "none";
//     document.body.classList.remove("modal-aberto");
// });

botaoValidar.addEventListener("click", () => {
    modalValidar1.style.display = "flex";
    document.body.classList.add("modal-aberto");
});

botaoCancelarValidar1.addEventListener("click", () => {
    modalValidar1.style.display = "none";
    document.body.classList.remove("modal-aberto");
});

botaoConfirmarValidar1.addEventListener("click", () => {
    modalValidar1.style.display = "none";
    modalValidar2.style.display = "flex";
});

botaoCancelarValidar2.addEventListener("click", () => {
    modalValidar2.style.display = "none";
    document.body.classList.remove("modal-aberto");
});

botaoConfirmarValidar2.addEventListener("click", () => {
    modalValidar2.style.display = "none";
});

// botaoOkValidar.addEventListener("click", () => {
//     modalValidar3.style.display = "none";
//     document.body.classList.remove("modal-aberto");
// });

// window.addEventListener("DOMContentLoaded", () => {
//     if (typeof mostrarModalRecusar3 !== "undefined" && mostrarModalRecusar3) {
//         if (modalRecusar3) {
//             modalRecusar3.style.display = "flex";
//             document.body.classList.add("modal-aberto");
//         }
//     }
// });

// window.addEventListener("DOMContentLoaded", () => {
//     if (typeof mostrarModalValidar3 !== "undefined" && mostrarModalValidar3) {
//         if (modalValidar3) {
//             modalValidar3.style.display = "flex";
//             document.body.classList.add("modal-aberto");
//         }
//     }
// });