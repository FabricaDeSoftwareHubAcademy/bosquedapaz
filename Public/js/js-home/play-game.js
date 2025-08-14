var unityInstance = null;
var container = document.querySelector("#unity-container");
var canvas = document.querySelector("#unity-canvas");
var loadingBar = document.querySelector("#unity-loading-bar");
var progressBarFull = document.querySelector("#unity-progress-bar-full");
var warningBanner = document.querySelector("#unity-warning");

// Função para mostrar banners do Unity
function unityShowBanner(msg, type) {
    function updateBannerVisibility() {
        warningBanner.style.display = warningBanner.children.length ? 'block' : 'none';
    }
    var div = document.createElement('div');
    div.innerHTML = msg;
    warningBanner.appendChild(div);
    if (type == 'error') div.style = 'background: red; padding: 10px;';
    else {
        if (type == 'warning') div.style = 'background: yellow; padding: 10px;';
        setTimeout(function() {
            div.remove();
            updateBannerVisibility();
        }, 5000);
    }
    updateBannerVisibility();
}

// Configuração do Unity
var buildUrl = "Build"; // Ajuste se a pasta Build estiver em outro local
var loaderUrl = buildUrl + "/mapa-feira-2d.loader.js";
var config = {
    dataUrl: buildUrl + "/mapa-feira-2d.data",
    frameworkUrl: buildUrl + "/mapa-feira-2d.framework.js",
    codeUrl: buildUrl + "/mapa-feira-2d.wasm",
    streamingAssetsUrl: "StreamingAssets",
    companyName: "",
    productName: "mapa-feira-2d",
    productVersion: "1.0",
    showBanner: unityShowBanner,
    devicePixelRatio: 0
};

// Detecção de dispositivo
var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent) || window.innerWidth <= 768;

// Ajustes para mobile (do original)
if (isMobile) {
    container.className = "unity-mobile";
    canvas.className = "unity-mobile";
    var meta = document.createElement('meta');
    meta.name = 'viewport';
    meta.content = 'width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, shrink-to-fit=yes';
    document.getElementsByTagName('head')[0].appendChild(meta);
}

function showError(msg) {
    // Removido o console.error e a manipulação do error-message
}

function startGame() {
    document.getElementById('section_game').style.display = 'block';
    document.getElementById('section_game').scrollIntoView({ behavior: 'smooth' });
    loadingBar.style.display = "block";

    if (!unityInstance) {
        var script = document.createElement("script");
        script.src = loaderUrl;
        script.onload = () => {
            createUnityInstance(canvas, config, (progress) => {
                progressBarFull.style.width = 100 * progress + "%";
            }).then((instance) => {
                unityInstance = instance;
                loadingBar.style.display = "none";
                setTimeout(() => {
                    // Ativar fullscreen para todos os dispositivos
                    unityInstance.SetFullscreen(1);
                    if (document.documentElement.requestFullscreen) {
                        document.documentElement.requestFullscreen().catch((err) => {
                            console.warn('Fallback fullscreen falhou:', err);
                        });
                    }

                    // Forçar paisagem e fullscreen em mobile
                    if (isMobile) {
                        if (screen.orientation && screen.orientation.lock) {
                            screen.orientation.lock('landscape').catch((err) => {
                                console.warn('Erro ao bloquear paisagem:', err);
                                showError('Por favor, gire o dispositivo para o modo paisagem.');
                            });
                        } else {
                            showError('Seu navegador não suporta bloqueio de orientação. Gire o dispositivo manualmente.');
                        }
                    }
                }, 1000); // Atraso para garantir carregamento completo
            }).catch((message) => {
                showError('Erro ao carregar o jogo: ' + message);
            });
        };
        script.onerror = () => {
            showError('Erro ao carregar o loader do Unity. Verifique o caminho: ' + loaderUrl);
        };
        document.body.appendChild(script);
    } else {
        setTimeout(() => {
            unityInstance.SetFullscreen(1);
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen().catch((err) => {
                    console.warn('Fallback fullscreen falhou:', err);
                });
            }
            if (isMobile && screen.orientation && screen.orientation.lock) {
                screen.orientation.lock('landscape').catch((err) => {
                    console.warn('Erro ao bloquear paisagem:', err);
                    showError('Por favor, gire o dispositivo para o modo paisagem.');
                });
            }
        }, 500);
    }
}

function closeGame() {
    document.getElementById('section_game').style.display = 'none';
    if (unityInstance) {
        unityInstance.SetFullscreen(0);
    }
    if (document.exitFullscreen) {
        document.exitFullscreen().catch((err) => {
            console.warn('Erro ao sair do fullscreen:', err);
        });
    }
    if (screen.orientation && screen.orientation.unlock) {
        screen.orientation.unlock().catch((err) => {
            console.warn('Erro ao desbloquear orientação:', err);
        });
    }
}