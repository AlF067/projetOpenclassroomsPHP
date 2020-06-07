//Menu hamburger

$(function(){
    $('.menu-icon').click(function(e){
        e.preventDefault();
        $this = $(this);
        if($this.hasClass('is-opened')){
            $this.addClass('is-closed').removeClass('is-opened');
            $('#menuList').css("display","none");
        }else{
            $this.removeClass('is-closed').addClass('is-opened');
            $('#menuList').css("display","flex");
        }
    })
});

//pagination commentaires

let commentairesAfficher = document.getElementsByClassName("commentairesAfficher");
let numeroPage = document.getElementsByClassName("numeroPage");
let messageSignalement = document.getElementById("messageSignalement");
let i = 0;
let pageNum = 0;
/* au chargement de la page */
while (i < commentairesAfficher.length) {
    commentairesAfficher[i].style.display = "none";
    i++;
}
i = 0;

commentairesAfficher[i].style.display = "flex";
commentairesAfficher[i + 1].style.display = "flex";
commentairesAfficher[i + 2].style.display = "flex";
numeroPage[pageNum].style.backgroundColor = "rgb(168, 168, 216)";

let suivant = document.getElementById("suivant");
let precedent = document.getElementById("precedent");

/* click fleche droite */
suivant.addEventListener("click", function () {
    if (i + 3 < commentairesAfficher.length) {
        commentairesAfficher[i].style.display = "none";
        commentairesAfficher[i + 1].style.display = "none";
        commentairesAfficher[i + 2].style.display = "none";
        numeroPage[pageNum].style.backgroundColor = "gray";
        i += 3;
        pageNum++;
        if (i <= commentairesAfficher.length) {
            commentairesAfficher[i].style.display = "flex";
        }
        if (i + 1 < commentairesAfficher.length) {
            commentairesAfficher[i + 1].style.display = "flex";
        }
        if (i + 2 < commentairesAfficher.length) {
            commentairesAfficher[i + 2].style.display = "flex";
        }
        if (!(messageSignalement == null)) {
            messageSignalement.style.display = "none";
        }

        numeroPage[pageNum].style.backgroundColor = "rgb(168, 168, 216)";

    }

})
/* click fleche gauche */
precedent.addEventListener("click", function () {
    if (i > 0) {
        if (i <= commentairesAfficher.length) {
            commentairesAfficher[i].style.display = "none";
        }
        if (i + 1 < commentairesAfficher.length) {
            commentairesAfficher[i + 1].style.display = "none";
        }
        if (i + 2 < commentairesAfficher.length) {
            commentairesAfficher[i + 2].style.display = "none";
        }
        numeroPage[pageNum].style.backgroundColor = "gray";
        i -= 3;
        pageNum--;
        commentairesAfficher[i].style.display = "flex";
        commentairesAfficher[i + 1].style.display = "flex";
        commentairesAfficher[i + 2].style.display = "flex";

        if (!(messageSignalement == null)) {
            messageSignalement.style.display = "none";
        }
        numeroPage[pageNum].style.backgroundColor = "rgb(168, 168, 216)";
    }

})


/* Click sur le numéro de page des commentaires */
document.getElementById("pages").addEventListener("click", function (clic) {
    
    i = (Number(clic.target.innerHTML) - 1) * 3;
    pageNum = i / 3;
    
    if (i < commentairesAfficher.length) {
        let b = 0
        while (b < numeroPage.length) {
            numeroPage[b].style.backgroundColor = "gray"; //met tous les numero de pages en backgroundColor = gray
            b++;
        }
        numeroPage[pageNum].style.backgroundColor = "rgb(168, 168, 216)";
        b = 0;
        while (b < commentairesAfficher.length) {
            commentairesAfficher[b].style.display = "none";
            b++;
        }
        if (i <= commentairesAfficher.length) {
            commentairesAfficher[i].style.display = "flex";
        }
        if (i + 1 < commentairesAfficher.length) {
            commentairesAfficher[i + 1].style.display = "flex";
        }
        if (i + 2 < commentairesAfficher.length) {
            commentairesAfficher[i + 2].style.display = "flex";
        }
    }
    if (!(messageSignalement == null)) {
        messageSignalement.style.display = "none";
    }
    


});





