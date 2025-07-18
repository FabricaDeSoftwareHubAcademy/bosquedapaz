<section class="expositor" id="expositor">
    <div class="bar-title-expositor">
        <div class="conteiner-title-expo">
            <div class="line-before"></div>
            <h2 class="all-titles title-expositor">nossos expositores</h2>
            <div class="line-after"></div>
        </div>
        <p class="para-title-expo all-para">
            Veja como são nossos expositores e venha explorar, apoiar e compartilhar uma experiência inesquecível conosco!
        </p>
        <div class="content-seja-expositor">
            <button class="btn-seja-expositor" id="btn-seja-expositor">
                <a href="./escolher-cadastro.php" class="all-links link-seja-exposior">seja um expositor</a>
            </button>
        </div>
    </div>

    <div class="listar-expositor">
        <div class="content-listar-expositor" area-all-cards id="expositores-container">
        </div>

        <?php include '../../../Public/include/home/perfil-expositor.html'; ?>

        <div class="content-seja-expositor content-mais-expositor">
            <button class="btn-seja-expositor btn-mais-expositor" id="btn-seja-expositor">
                <a href="./todos-expositores.php" class="all-links link-seja-exposior">ver outros expositores</a>
            </button>
        </div>
    </div>
</section>


<script src="../../../Public/js/js-home/js-listar-expositor.js"></script>
