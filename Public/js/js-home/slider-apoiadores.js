document.addEventListener("DOMContentLoaded", function () {
    const track = document.querySelector(".carrosselTrack");
    const clone = track.innerHTML;
    track.innerHTML += clone;

});
