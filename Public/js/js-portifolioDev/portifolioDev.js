window.revelar = ScrollReveal({reset:true});

revelar.reveal('.efeito-txt-topo',
    {
        origin: 'left',
        duration: 2000,
        distance: '1000px',
        // delay: 500
    })
revelar.reveal('.efeito-txt-topo2',
    {
        origin: 'right',
        duration: 2000,
        distance: '1000px',
        delay: 500
    })

revelar.reveal('.efeito-title',{
    origin: 'bottom',
    duration: 2000,
    distance: '200px',
    delay: 500
})