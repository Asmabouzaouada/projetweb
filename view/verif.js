function valider(){
    var nom = document.getElementById('nom')

    var nomPattern = /^[a-z]{8}$/

    var msg = document.getElementById('msg')

    if(telephone.value.match(nomPattern)){
        // msg.innerHTML="<i>Paragraphe à modifier</i>"
        msg.innerHTML = '<span style="color:green">Correct</span>'
    } else{
        msg.innerHTML = '<span style="color:red"> incorrect</span>'
    }
}

var form = document.getElementById('myForm')

form.addEventListener('submit', function(e) {
    e.preventDefault()
    valider()
})