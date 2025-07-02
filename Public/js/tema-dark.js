// CSS do botão e do tema, direto no JS
const css = `
  body {
    background-color: #ffffff;
    color: #181A1B;
    transition: background-color 0.3s, color 0.3s;
    font-family: sans-serif;
  }

  body.dark-mode {
    background-color: #181A1B;
    color: #e8eaed;
  }

  .toggle-switch {
    position: relative;
    width: 60px;
    height: 30px;
    background: #ccc;
    border-radius: 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 8px;
    box-sizing: border-box;
    cursor: pointer;
  }


  .toggle-switch .icon {
    font-size: 16px;
    z-index: 1;
    pointer-events: none;
    user-select: none;
  }

  .toggle-thumb {
    position: absolute;
    top: 3px;
    left: 3px;
    width: 24px;
    height: 24px;
    background: white;
    border-radius: 50%;
    transition: left 0.3s;
    z-index: 0;
  }

  .toggle-switch.active .toggle-thumb {
    left: 33px;
  }

  #toggle-container {
    display: flex;
    align-items: center;
    padding-left: 1rem;
  }
  
  .toggle-switch {
    margin-left: auto;
  }
  a
`;

// Adiciona o CSS na página
const styleTag = document.createElement('style');
styleTag.textContent = css;
document.head.appendChild(styleTag);

// Espera a página carregar
window.onload = () => {
  // Cria o botão e adiciona no topo da tela
  const container = document.getElementById('toggle-container');

if (container) {
  container.innerHTML = `
    <div class="toggle-switch" id="toggle-tema">
      <span class="icon">☀️</span>
      <span class="icon">🌙</span>
      <div class="toggle-thumb"></div>
    </div>
  `;
}


  const toggle = document.getElementById('toggle-tema');
  const thumb = toggle.querySelector('.toggle-thumb');

  function aplicarTema(tema) {
    if (tema === 'escuro') {
      document.body.classList.add('dark-mode');
      toggle.classList.add('active');
    } else {
      document.body.classList.remove('dark-mode');
      toggle.classList.remove('active');
    }
  }

  function alternarTema() {
    const temaAtual = localStorage.getItem('tema') === 'escuro' ? 'claro' : 'escuro';
    localStorage.setItem('tema', temaAtual);
    aplicarTema(temaAtual);
  }

  // Clica no botão
  toggle.addEventListener('click', alternarTema);

  // Aplica o tema salvo
  const temaSalvo = localStorage.getItem('tema') || 'claro';
  aplicarTema(temaSalvo);
};
