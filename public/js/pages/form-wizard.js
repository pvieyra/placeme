$(document).ready(function () {
    $.validator.addMethod('domainEmailEqualTo', function(value){
        return !/@dev.com/.test(value)
    },"No puedes utilizar un correo con dominio dev.com");

    let form = $("#tracking-form");
    form.validate({
        rules: {
            name: {
              required:true,
              number:false,
            },
            last_name:{
              required:true
            },
            email: {
                //required: true,
                email: true,
                domainEmailEqualTo:true
            },
            phone: {
                required:true,
                number:true,
                minlength: 10,
                maxlength:10,
            },
            building_id:{
                required:true
            },
            operation_id:{
                required:true
            },
            contact_type: {
                required:true,
            },
            celular_asesor: {
                number:true,
                minlength: 10,
                maxlength:10,
            },
            comments: {
                required:true
            }

        },
        messages: {
            name:{
                required: "Debes ingresar el nombre del cliente.",
                number: "No puede contener numeros",
            },
            last_name: {
                required: "Debes ingresar el apellido paterno."
            },
            email: {
                //required: "El correo es obligatorio.",
                email: "Debes colocar un correo valido.",
            },
            phone:{
                required: "El telefono del cliente es obligatorio.",
                number: "Debes colocar solo numeros",
                minlength:"El numero telefonico debe ser minimo a 10 digitos",
                maxlength:"El numero telefonico no puede ser mayor a 10 digitos",
            },
            building_id:{
                required:"Debes seleccionar una propiedad",
            },
            celular_asesor:{
                number: "Debes colocar solo numeros",
                minlength:"El numero telefonico debe ser minimo a 10 digitos",
                maxlength:"El numero telefonico no puede ser mayor a 10 digitos",
            },
            comments:{
                required: "Debes colocar los primeros comentarios del seguimiento."
            }
        },
        errorPlacement: function errorPlacement(error, element) {
            element.after(error);
        },
    });
    form.children("div").steps({
        /* Labels */
        labels: {
            cancel: "Cancelar",
            finish: "Guardar",
            next: "Siguiente",
            previous: "Anterior",
        },
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "fade",
      onStepChanging: function (event, currentIndex, newIndex) {
            //Quitar los errores mostrar nuevaente los mensajes.
            $('.info-validation').show(1000, 'linear');
            $('.card-validation').addClass('hide');
            $('.card-validation').find('.card-content-errors').empty();
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinished: function () {
            form.submit(function(e){
                e.preventDefault();
            });

            const _token = $("input[name='_token']").val();
            const name = $("#name").val();
            const last_name = $("#last_name").val();
            const second_last_name = $("#second_last_name").val();
            const email = $("#email").val();
            const phone = $("#phone").val();
            const building_id = $("#buildings-data").val();
            const numero_interior_unidad = $("#numero_interior_unidad").val();
            const operation_id = $("#operation_id").val();
            const contact_type = $("input[name*='contact_type']:checked").val();
            const inmobiliaria_name = $("#inmobiliaria_name").val();
            const nombre_asesor = $("#nombre_asesor").val();
            const celular_asesor = $("#celular_asesor").val();
            const comments = $("#comments").val();

            $.ajax({
               url:'/seguimiento',
               type: "POST",
                dataType: 'json',
               data : {
                   _token: _token,
                   name: name,
                   last_name: last_name,
                   second_last_name: second_last_name,
                   email: email,
                   phone: phone,
                   building_id:building_id,
                   numero_interior_unidad: numero_interior_unidad,
                   operation_id: operation_id,
                   contact_type: contact_type,
                   inmobiliaria_name: inmobiliaria_name,
                   nombre_asesor: nombre_asesor,
                   celular_asesor: celular_asesor,
                   comments: comments
               },
               success: function( data ){
                 if($.isEmptyObject( data.error )){
                     console.log(data.tracking);
                     document.getElementById('tracking-form').reset();
                     $('.info-validation').fadeOut(500, 'linear');
                     $('.actions-tracking').remove();
                     $('.message-success-tracking').append('<div class="card-panel teal lighten-2">Se ha creado correctamente el seguimiento. Ahora lo puedes encontrar en el menu de tus seguimientos. Da click <a href="seguimiento/">aqui</a> para ir. <p>En 10 segundos se cargara la nueva pagina</p></div>');
                     let $toastContent = $('<span class="">El seguimiento ha sido creado correctamente.</span>');
                     Materialize.toast($toastContent, 7000,'teal lighten-2');
                     //ir a este seguimiento
                     setTimeout( "location.href='/seguimiento/'", 10000);
                 }else {
                     const card = $('.card-validation');
                     let errorHtml = '';
                     $('.info-validation').fadeOut(500, 'linear');
                     card.removeClass('hide').addClass('deep-orange lighten-2');
                     $.each( data.error, function( key, value){
                        errorHtml += "<p class='text-black'>"+ value +"</p>";
                     });
                     card.find('.card-content-errors').append(errorHtml);
                     let $toastContent = $('<span class="bold italic">Revisa de nuevamente el formulario, hay campos obligatorios por llenar.</span>');
                     Materialize.toast($toastContent, 8000,'red lighten-1');
                 }
               },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    let $toastContent = $('<span class="">Hay ocurrido un error inesperado.'+ errorThrown +'</span>');
                    Materialize.toast($toastContent, 7000,'red accent-3');
                }
            });
        },
    });

    $("input:radio[name=contact_type]").click(function(){
        if($("input[name='contact_type']:checked").val() === 'Directo'){
            msgInputDisabled();
            fieldsDisabled(true);
        }
        if($("input[name='contact_type']:checked").val() === 'Otra Inmobiliaria'){
            fieldsDisabled(false);
        }
    });

    $(".wizard .actions ul li a").addClass("waves-effect waves-orange btn-flat m-b-xs actions-tracking");
    $(".wizard .steps ul").addClass("tabs z-depth-1");
    $(".wizard .steps ul li").addClass("tab");
    $('ul.tabs').tabs();
    $('select').material_select();
    $('.select-wrapper.initialized').prev("ul").remove();
    $('.select-wrapper.initialized').prev("input").remove();
    $('.select-wrapper.initialized').prev("span").remove();
});

function fieldsDisabled( value ){
    $('#inmobiliaria_name').prop('disabled', value);
    $('#nombre_asesor').prop('disabled', value);
    $('#celular_asesor').prop('disabled', value);
}
function msgInputDisabled(){
    $('#inmobiliaria_name').val('');
    $('#nombre_asesor').val('');
    $('#celular_asesor').val('');
}