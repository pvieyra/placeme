$(document).ready(function () {
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
                required: true,
                email: true,
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
                required: "El correo es obligatorio.",
                email: "Debes colocar un correo valido.",
            },
            phone:{
                required: "El telefono del cliente es obligatorio.",
                number: "Debes colocar solo numeros",
                minlength:"El numero telefonico debe ser minimo a 10 digitos",
                maxlength:"El numero telefonico no puede ser mayor a 10 digitos",
            },
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
            console.log('cambio de pestaña');
            $('.info-validation').show(1000, 'linear');
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
            const  operation_id = "";

            $.ajax({
               url:'/seguimiento',
               type: "POST",
                dataType: 'json',
               data : {
                   _token: _token,
                   name: name,
                   last_name: last_name,
                   operation_id: operation_id,
               },
               success: function( data ){
                 if($.isEmptyObject( data.error )){
                     let $toastContent = $('<span class="">El seguimiento ha sido creado correctamente.</span>');
                     Materialize.toast($toastContent, 7000,'green accent-3');
                 }else {
                     const card = $('.card-validation');
                     let errorHtml = '';
                     $('.info-validation').fadeOut(500, 'linear');
                     card.removeClass('hide').addClass('deep-orange lighten-2');
                     card.find('span').append('Hay campos por llenar para continuar');
                     $.each( data.error, function( key, value){
                        errorHtml += "<p class='text-black'>"+ value +"</p>";
                     });
                     card.find('.card-title').after(errorHtml);
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

    $(".wizard .actions ul li a").addClass("waves-effect waves-orange btn-flat m-b-xs");
    $(".wizard .steps ul").addClass("tabs z-depth-1");
    $(".wizard .steps ul li").addClass("tab");
    $('ul.tabs').tabs();
    $('select').material_select();
    $('.select-wrapper.initialized').prev("ul").remove();
    $('.select-wrapper.initialized').prev("input").remove();
    $('.select-wrapper.initialized').prev("span").remove();
});