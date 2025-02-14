const label = document.querySelectorAll('#label')

function onEnter (l){
    l.classList.add('active')
}
function onLeave (l){
    l.classList.remove('active')
}

label[0].addEventListener('dragenter', onEnter(label[0]))
label[0].addEventListener('drop', onLeave(label[0]))
label[0].addEventListener('dragend', onLeave(label[0]))
label[0].addEventListener('dragleave', onLeave(label[0]))