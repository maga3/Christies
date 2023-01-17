let theId = document.getElementsByClassName('theId');
for (let i = 0; i < theId.length; i++) {
    theId[i].addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        console.log(e);
    })
}