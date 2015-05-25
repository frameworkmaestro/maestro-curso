
function trocaVisibleIdSetorPai(){
    if (manager.getElementById('exibirIdSetorPai').checked){
        jQuery('#baseGroupSetorPai').show();
    }
    else{
        jQuery('#baseGroupSetorPai').hide();   
    }

}


//executar no onload
trocaVisibleIdSetorPai();