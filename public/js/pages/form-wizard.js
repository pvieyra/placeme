$(document).ready(function () {
    var form = $("#tracking-form");
    var validator = $("#tracking-form").validate({
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
            //console.log(form.validate().settings);
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        }, /*
        onFinishing: function (event, currentIndex) {
            //form.validate().settings.ignore = ":disabled";
            //return form.valid();
        },*/
        onFinished: function (event, currentIndex) {
            //mandar submit del formulario
            //console.log("envio del formulario");
            form.submit();
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
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
});