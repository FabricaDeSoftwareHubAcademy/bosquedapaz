const inputFile = document.querySelector('#imagens-input');

const pictureImage = document.querySelector('.text-up-imgs');
pictureImage.innerHTML = '<i class="fa-solid fa-upload up-img"></i>';

inputFile.addEventListener('change', function(e) {
    const inputTarget = e.target;
    const file = inputTarget.files[0];
    
    if (file) {
        pictureImage.innerHTML = '';
        
        const reader = new FileReader();
        reader.addEventListener('load', function(e) {
            const thisReader = e.target;

            const img = document.createElement('img');
            img.src = thisReader.result;
            img.classList.add('imagen-img');

            pictureImage.appendChild(img)
        })

        reader.readAsDataURL(file);
    }else {
        pictureImage.innerHTML = '<i class="fa-solid fa-upload up-img"></i>';
    }
});