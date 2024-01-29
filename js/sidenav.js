function openNav() {
    document.getElementById("sidebar").style.width = "250px";
    document.getElementById("main-content").classList.add('toggled');
}

function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("main-content").classList.remove('toggled');
}