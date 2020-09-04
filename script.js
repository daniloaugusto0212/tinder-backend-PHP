
function getLocation(){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition)
    }
}

function showPosition(position){
    $('p.lat-text').html('Latitude: ' + position.coords.latitude)
    $('p.long-text').html('Longitude: ' + position.coords.longitude);

    //Passando via AJAX para atualizar no banco de dados.
    atualizarCoordenadas(position.coords.latitude,position.coords.longitude);
}

function atualizarCoordenadas(latitudePar,longitudePar){
    $.ajax({
        url:'/tinder/atualizar-coord.php',
        method:'post',
        data:{latitude:latitudePar,longitude:longitudePar}
    }).done(function(){
        alert("Atualizado com sucesso")
    })
}