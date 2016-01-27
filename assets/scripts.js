$(document).ready(function(){
    $('#form_upload').validate({
        errorLabelContainer: "#alertError",
        wrapper: "li",
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            group: {
                required: true,
            },
            participant1: "required",
            title:"required",
            lyric:"required",
            file:{
                required: true,
                accept:'mp4'
            },
            acceptance:"required"
        },
        messages:{
            name: "Digite seu nome completo",
            email: "O email é obrigatório",
            group: "Escolha um nome para identificar o seu grupo",
            participant1: "Pelo menos um participante é obrigatório",
            title: "Dê um nome para a sua marchinha",
            lyric: "Coloque a letra da sua marchinha para cantarmos juntos",
            file: "Envie seu vídeo para nós!",
            acceptance: "Para participar do concurso é preciso aceitar os termos."
        }
    });
    $("#enviar").on("click",function(){
        $("#enviar").html("AGUARDE...");
    });
});