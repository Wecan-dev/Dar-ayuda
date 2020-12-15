$(document).ready(function() {


    //Filtro nuestra red : Fundaciones
    $('.filtro-colunga').click(function(event){
        event.preventDefault();
        filtro = $(this).data('filtro');
        if(filtro=='area'){
            $('.filtro-area').removeClass('uso').css('opacity','.5');
            $(this).addClass('uso');
            var area = $(this).data('area');
            var tipo = $('#lista-tipo .uso').data('tipo');
        }
        if(filtro=='tipo'){
            $('.filtro-tipo').removeClass('uso').css('opacity','.5');;
            $(this).addClass('uso');
            var tipo = $(this).data('tipo');
            var area = $('#lista-area .uso').data('area');
        }

        parametros = {
        area : area,
        tipo : tipo
        }
        $.ajax({
          data :parametros,
          url :SITE_URL+'/procesa-filtro',
          type :'POST',
          success : function(html)
          {

            $('#lista-fundaciones').html('');
            respuesta = JSON.parse(html);

            var vez_fundacion = 0;
            //var num_row = 1;
            if(respuesta.listado == null){
              $('#lista-fundaciones').append('<h3>No se han encontrado resultados con los parámetros seleccionados.</h3>');
            }else{
              var cantidad_fundaciones = 4; //Cantidad de fundaciones a mostrar a primera vista
              var clase_fundacion = '';
              $.each(respuesta.listado, function( key, value){
                vez_fundacion++;
                if(vez_fundacion>cantidad_fundaciones){clase_fundacion='hide'; }

                $('#lista-fundaciones').append('<li class="'+clase_fundacion+'"><a href="'+value.url_fundacion+'"><div class="bg-img-fundacion" style="background-image: url('+value.url_image+')"><div class="capa-color"></div><div class="fundacion-name"><strong>'+value.titulo+'</strong><br>Apoyo: '+value.tipo_proyecto+'<br>'+value.anio_de_apoyo+'</div></div></a><div id="fundacion_'+vez_fundacion+'" class="info-fundacion"><h4 class="proyecto-title light-green">Área de trabajo: '+value.area+'</h4>'+value.descripcion_corta+'</div></li>');
                if(value.email){
                  $('#fundacion_'+vez_fundacion).append('<h4>Email: <a class="link" href="mailto:'+value.email+'">'+value.email+'</a></h4>');
                }
                $('#fundacion_'+vez_fundacion).append('<a href="'+value.url_fundacion+'" class="btn btn-xs btn-grey">Conoce la fundación</a>');

              });

              if(vez_fundacion>cantidad_fundaciones){
                $('.js-cargar-mas-fundaciones').removeClass('hide');
                $('.js-cargar-mas-fundaciones').show();
              }else{
                $('.js-cargar-mas-fundaciones').addClass('hide');
                $('.js-cargar-mas-fundaciones').hide();
              }

            }

          }
        });

    });

    //Cargar mas fundaciones
    $('.js-cargar-mas-fundaciones').click(function(event){
      event.preventDefault();
      $('#lista-fundaciones li.hide:lt(4)').removeClass('hide').addClass('').stop().slideDown();
      if($('#lista-fundaciones li.hide').length == 0){
            $('.js-cargar-mas-fundaciones').addClass('hide');
      }
    });


    //Buscador predictivo fundaciones
    $("#buscador_fundaciones").select2({
      language: "es",
      placeholder: "Buscar fundación por nombre.",
      allowClear: true,
    });

    $('#buscador_fundaciones').on("select2:select", function(e) {
        var id_fundacion = e.params.data.id;
        $('.filtro-area').removeClass('uso').css('opacity','.5');
        $('.filtro-tipo').removeClass('uso').css('opacity','.5');
        parametros = {
          area : null,
          tipo : null,
          id_fundacion : id_fundacion
        }

        $.ajax({
          data :parametros,
          url :SITE_URL+'/procesa-filtro',
          type :'POST',
          success : function(html)
          {

            $('#lista-fundaciones').html('');
            respuesta = JSON.parse(html);

            var vez_fundacion = 0;
            if(respuesta.listado == null){
              $('#lista-fundaciones').append('<h3>No se han encontrado resultados con los parámetros seleccionados.</h3>');
            }else{
              var cantidad_fundaciones = 4; //Cantidad de fundaciones a mostrar a primera vista
              var clase_fundacion = '';
              $.each(respuesta.listado, function( key, value){
                vez_fundacion++;
                if(vez_fundacion>cantidad_fundaciones){clase_fundacion='hide'; }

                $('#lista-fundaciones').append('<li class="'+clase_fundacion+'"><a href="'+value.url_fundacion+'"><div class="bg-img-fundacion" style="background-image: url('+value.url_image+')"><div class="capa-color"></div><div class="fundacion-name"><strong>'+value.titulo+'</strong><br>Apoyo: '+value.tipo_proyecto+'<br>'+value.anio_de_apoyo+'</div></div></a><div id="fundacion_'+vez_fundacion+'" class="info-fundacion"><h4 class="proyecto-title light-green">Área de trabajo: '+value.area+'</h4>'+value.descripcion_corta+'</div></li>');
                if(value.email){
                  $('#fundacion_'+vez_fundacion).append('<h4>Email: <a class="link" href="mailto:'+value.email+'">'+value.email+'</a></h4>');
                }
                $('#fundacion_'+vez_fundacion).append('<a href="'+value.url_fundacion+'" class="btn btn-xs btn-grey">Conoce la fundación</a>');

              });

              if(vez_fundacion>cantidad_fundaciones){
                $('.js-cargar-mas-fundaciones').removeClass('hide');
              }else{
                $('.js-cargar-mas-fundaciones').addClass('hide');
              }

            }


          }
        });


    });


    // ARCHIVOS DE INTERES

    // Filtro archivos de interés
    $('.filtro-archivos-interes').click(function(event){
        event.preventDefault();
        filtro = $(this).data('filtro');
        if(filtro=='categoria'){
            $('.filtro-categoria').removeClass('uso').css('opacity','.5');
            $(this).addClass('uso');
            var categoria = $(this).data('categoria');
        }
        parametros = {
          categoria : categoria,
          id_archivo: null
        }
        $.ajax({
          data :parametros,
          url :SITE_URL+'/procesa-filtro-archivos-interes',
          type :'POST',
          success : function(html)
          {

            $('#page-content').html('');
            respuesta = JSON.parse(html);

            if(respuesta.listado == null){
              $('#page-content').append('<h3>No se han encontrado documentos con los parámetros seleccionados.</h3>');
            }else{
              var vez_interes = 1;
              var cant_ai = 4; //Cantidad de documentos a mostrar a primera vista
              var clase = '';
              $.each(respuesta.listado, function( key, value){
                if(vez_interes>cant_ai){clase='hide'; }
                  if(value.link != null){
                    $('#page-content').append('<li class="'+clase+'"><div class="circle-green-content -pdf">URL</div><div class="txt-content -pdf"><h4 class="light-green">'+value.categorias+'</h4><h3 class="title">'+value.nombre+'</h3><a target="_blank" href="'+value.link+'" class="btn btn-xs btn-grey">Visitar</a></div></li>');
                  }else{
                    $('#page-content').append('<li class="'+clase+'"><div class="circle-green-content -pdf">PDF</div><div class="txt-content -pdf"><h4 class="light-green">'+value.categorias+'</h4><h3 class="title">'+value.nombre+'</h3><a href="'+value.pdf+'" class="btn btn-xs btn-grey">Descargar documento</a></div></li>');
                  }
                 vez_interes++;
              });
              if(vez_interes>cant_ai){
                $('.js-cargar-mas-archivos').removeClass('hide');
              }else{;
                $('.js-cargar-mas-archivos').addClass('hide');
              }

            }

          }
        });

    });

    // Filtro archivos de interés
    $('.borrar-filtro-interes').click(function(event){
        event.preventDefault();
        $('.filtro-categoria').removeClass('uso').css('opacity','.5');
        parametros = {
          categoria : null,
          id_archivo: null,
          todos: true
        }
        $.ajax({
          data :parametros,
          url :SITE_URL+'/procesa-filtro-archivos-interes',
          type :'POST',
          success : function(html)
          {

            $('#page-content').html('');
            respuesta = JSON.parse(html);

            if(respuesta.listado == null){
              $('#page-content').append('<h3>No se han encontrado documentos con los parámetros seleccionados.</h3>');
            }else{
              var vez_interes = 1;
              var cant_ai = 4; //Cantidad de archivos a mostrar a primera vista
              var clase = '';
              $.each(respuesta.listado, function( key, value){
                if(vez_interes>cant_ai){clase='hide'; }

                if(value.link != null){
                  $('#page-content').append('<li class="'+clase+'"><div class="circle-green-content -pdf">URL</div><div class="txt-content -pdf"><h4 class="light-green">'+value.categorias+'</h4><h3 class="title">'+value.nombre+'</h3><a target="_blank" href="'+value.link+'" class="btn btn-xs btn-grey">Visitar</a></div></li>');
                }else{
                  $('#page-content').append('<li class="'+clase+'"><div class="circle-green-content -pdf">PDF</div><div class="txt-content -pdf"><h4 class="light-green">'+value.categorias+'</h4><h3 class="title">'+value.nombre+'</h3><a href="'+value.pdf+'" class="btn btn-xs btn-grey">Descargar documento</a></div></li>');
                }
                vez_interes++;

              });
              if(vez_interes>cant_ai){
                $('.js-cargar-mas-archivos').removeClass('hide');
              }else{;
                $('.js-cargar-mas-archivos').addClass('hide');
              }

            }

          }
        });

    });


    //Cargar mas archivos de interés
    $('.js-cargar-mas-archivos').click(function(event){
      event.preventDefault();
      $('#page-content li.hide:lt(3)').removeClass('hide').addClass('').stop().slideDown();
      if($('#page-content li.hide').length == 0){
            $('.js-cargar-mas-archivos').addClass('hide');
      }
    });

    //Buscador predictivo archivos de interés
    $("#buscador_archivos").select2({
      language: "es",
      placeholder: "Buscar documento por nombre.",
      allowClear: true,
    });

    $('#buscador_archivos').on("select2:select", function(e) {
        var id_archivo = e.params.data.id;
        //console.log(id_archivo);
        parametros = {
          categoria : null,
          id_archivo : id_archivo
        }

        $.ajax({
          data :parametros,
          url :SITE_URL+'/procesa-filtro-archivos-interes',
          type :'POST',
          success : function(html)
          {

            $('#page-content').html('');
            respuesta = JSON.parse(html);

            if(respuesta.listado == null){
              $('#page-content').append('<h3>No se han encontrado documentos con los parámetros seleccionados.</h3>');
            }else{
              var vez_interes = 1;
              var cant_ai = 4; //Cantidad de archivos a mostrar a primera vista
              var clase = '';
              $.each(respuesta.listado, function( key, value){
                if(vez_interes>cant_ai){clase='hide'; }

                 if(value.link != null){
                  $('#page-content').append('<li class="'+clase+'"><div class="circle-green-content -pdf">URL</div><div class="txt-content -pdf"><h4 class="light-green">'+value.categorias+'</h4><h3 class="title">'+value.nombre+'</h3><a target="_blank" href="'+value.link+'" class="btn btn-xs btn-grey">Visitar</a></div></li>');
                }else{
                  $('#page-content').append('<li class="'+clase+'"><div class="circle-green-content -pdf">PDF</div><div class="txt-content -pdf"><h4 class="light-green">'+value.categorias+'</h4><h3 class="title">'+value.nombre+'</h3><a href="'+value.pdf+'" class="btn btn-xs btn-grey">Descargar documento</a></div></li>');
                }
                vez_interes++;


              });
              if(vez_interes>cant_ai){
                $('.js-cargar-mas-archivos').removeClass('hide');
              }else{;
                $('.js-cargar-mas-archivos').addClass('hide');
              }

            }

          }
        });


    });



    //#TRANSPARENCIA

    // Filtro archivos de transparencia
    $('.filtro-archivos-transparencia').click(function(event){
        event.preventDefault();
        filtro = $(this).data('filtro');
        if(filtro=='categoria'){
            $('.filtro-categoria').removeClass('uso').css('opacity','.5');
            $(this).addClass('uso');
            var categoria = $(this).data('categoria');
        }
        parametros = {
          categoria : categoria,
          id_archivo: null
        }
        $.ajax({
          data :parametros,
          url :SITE_URL+'/procesa-filtro-archivos-transparencia',
          type :'POST',
          success : function(html)
          {

            $('#page-content').html('');
            $('.js-cargar-mas-archivos').addClass('hide');
            respuesta = JSON.parse(html);

            if(respuesta.listado == null){
              $('#page-content').append('<h3>No se han encontrado documentos con los parámetros seleccionados.</h3>');
            }else{
              var vez_transparencia = 0;
              var cant_at = 4; //Cantidad de archivos a mostrar a primera vista
              var clase = '';
              $.each(respuesta.listado, function( key, value){
                vez_transparencia++;
                if(vez_transparencia>cant_at){clase='hide'; }
                 $('#page-content').append('<li class="'+clase+'"><div class="circle-green-content -pdf">PDF</div><div class="txt-content -pdf"><h4 class="light-green">'+value.categorias+'</h4><h3 class="title">'+value.nombre+'</h3><a href="'+value.url+'" class="btn btn-xs btn-grey">Descargar documento</a></div></li>');
              });

              if(vez_transparencia>cant_at){
                $('.js-cargar-mas-archivos').removeClass('hide');
              }else{;
                $('.js-cargar-mas-archivos').addClass('hide');
              }

            }

          }
        });

    });

    // Filtro archivos de transparencia
    $('.borrar-filtro-transparencia').click(function(event){
        event.preventDefault();
        $('.filtro-categoria').removeClass('uso').css('opacity','.5');
        parametros = {
          categoria : null,
          id_archivo: null,
          todos: true
        }
        $.ajax({
          data :parametros,
          url :SITE_URL+'/procesa-filtro-archivos-transparencia',
          type :'POST',
          success : function(html)
          {

            $('#page-content').html('');
            $('.js-cargar-mas-archivos').addClass('hide');
            respuesta = JSON.parse(html);


            if(respuesta.listado == null){
              $('#page-content').append('<h3>No se han encontrado documentos con los parámetros seleccionados.</h3>');
            }else{
              var vez_transparencia = 1;
              var cant_at = 4; //Cantidad de archivos a mostrar a primera vista
              var clase = '';
              $.each(respuesta.listado, function( key, value){
                if(vez_transparencia>cant_at){clase='hide'; }

                 $('#page-content').append('<li class="'+clase+'"><div class="circle-green-content -pdf">PDF</div><div class="txt-content -pdf"><h4 class="light-green">'+value.categorias+'</h4><h3 class="title">'+value.nombre+'</h3><a href="'+value.url+'" class="btn btn-xs btn-grey">Descargar documento</a></div></li>');
                 vez_transparencia++;
              });
              if(vez_transparencia>cant_at){
                $('.js-cargar-mas-archivos').removeClass('hide');
              }else{;
                $('.js-cargar-mas-archivos').addClass('hide');
              }

            }

          }
        });

    });


    //Cargar mas archivos de transparencia
    $('.js-cargar-mas-archivos').click(function(event){
      event.preventDefault();
      $('#page-content li.hide:lt(3)').removeClass('hide').addClass('show').stop().slideDown();
      if($('#page-content li.hide').length == 0){
            $('.js-cargar-mas-archivos').addClass('hide');
      }
    });

    //Buscador predictivo archivos de transparencia
    $("#buscador_archivos_transparencia").select2({
      language: "es",
      placeholder: "Buscar documento por nombre.",
      allowClear: true,
    });

    $('#buscador_archivos_transparencia').on("select2:select", function(e) {
        $('.filtro-categoria').removeClass('uso').css('opacity','.5');
        var id_archivo = e.params.data.id;

        parametros = {
          categoria : null,
          id_archivo : id_archivo
        }

        $.ajax({
          data :parametros,
          url :SITE_URL+'/procesa-filtro-archivos-transparencia',
          type :'POST',
          success : function(html)
          {

            $('#page-content').html('');
            respuesta = JSON.parse(html);

            if(respuesta.listado == null){
              $('#page-content').append('<h3>No se han encontrado documentos con los parámetros seleccionados.</h3>');
            }else{
              var vez_transparencia = 1;
              var cant_at = 4; //Cantidad de archivos a mostrar a primera vista
              var clase = '';
              $.each(respuesta.listado, function( key, value){
                if(vez_transparencia>cant_at){clase='hide'; }

                 $('#page-content').append('<li class="'+clase+'"><div class="circle-green-content -pdf">PDF</div><div class="txt-content -pdf"><h4 class="light-green">'+value.categorias+'</h4><h3 class="title">'+value.nombre+'</h3><a href="'+value.url+'" class="btn btn-xs btn-grey">Descargar documento</a></div></li>');
                 vez_transparencia++;
              });
              if(vez_transparencia>cant_at){
                $('.js-cargar-mas-archivos').removeClass('hide');
              }else{;
                $('.js-cargar-mas-archivos').addClass('hide');
              }

            }

          }
        });


    });


    //Cargar mas noticias
    $('.js-cargar-mas-noticias').click(function(event){
      event.preventDefault();
      $('#todas-las-noticias .fila-noticia.hide:lt(2)').removeClass('hide').addClass('mostrar').stop().slideDown();
      if($('#todas-las-noticias .fila-noticia.hide').length == 0){
            $('.js-cargar-mas-noticias').hide();
      }
      $('.grid').masonry( 'reloadItems' );
      $('.grid').masonry( 'layout' );
    });



    //Filtro Eventos
    $('.js-filtro-eventos').click(function(event){
        event.preventDefault();
        var todos = false;
        var pasados = false;

        filtro = $(this).data('filtro');
        if(filtro=='fecha_exacta'){
            $('.filtro-fecha').removeClass('uso').css('opacity','.5');
            $(this).addClass('uso');
            var fecha_exacta = $(this).data('fecha');

        }

        if(filtro=='proximo_mes'){
            $('.filtro-fecha').removeClass('uso').css('opacity','.5');
            $(this).addClass('uso');
            var fecha_inicio = $(this).data('fecha-inicio');
            var fecha_fin = $(this).data('fecha-fin');


        }else if(filtro=='todos'){
            $('.filtro-fecha').removeClass('uso').css('opacity','.5');
            $(this).addClass('uso');
            var todos = true;
            var pasados = false;
            //console.log(todos);
        }else if(filtro=='pasados'){
            $('.filtro-fecha').removeClass('uso').css('opacity','.5');
            $(this).addClass('uso');
            var pasados = true;
            var todos = false;

        }else if(filtro=='limpiar'){
            $('.filtro-fecha').removeClass('uso').css('opacity','.5');
            var todos = true;

        }

        parametros = {
          fecha_exacta : fecha_exacta,
          fecha_inicio : fecha_inicio,
          fecha_fin : fecha_fin,
          todos: todos,
          pasados: pasados
        }


        $.ajax({
          data :parametros,
          url :SITE_URL+'/procesa-filtro-eventos',
          type :'POST',
          success : function(html)
          {

            $('.list-eventos').html('');
            $('.msg-eventos').html('');
            respuesta = JSON.parse(html);

            var vez = 1;
            var num_row = 1;
            if(respuesta.listado == null){
              $('.list-eventos').append('<h3>No se han encontrado eventos en la fecha seleccionada.</h3>');
              $('.js-cargar-mas-eventos').addClass('hide');
            }else{

              var vez_evento = 1;
              var cant_ev = 4; //Cantidad de eventos a mostrar a primera vista
              var clase = '';
              $.each(respuesta.listado, function( key, value){
                if(vez_evento>cant_ev){clase='hide'; }

                 $('.list-eventos').append('<li class="'+clase+'"><a href="'+value.url+'"><div class="destacado -evento"><h1 class="title">'+value.titulo+'</h1><ul class="fecha-evento d-block"><li>'+value.ubicacion+'</li><li>'+value.fecha+'</li><li>'+value.hora+' horas</li><li><h4 class="link-pink">Ver evento</h4></li></ul></div></a></li>');
                 vez_evento++;
              });
              if(vez_evento>cant_ev){
                //$('.js-cargar-mas-eventos').show();
                $('.js-cargar-mas-eventos').removeClass('hide');
              }else{
                //$('.js-cargar-mas-eventos').hide();
                $('.js-cargar-mas-eventos').addClass('hide');
              }


            }

          }
        });

    });


    $( "#datepicker" ).datepicker({
      dateFormat:"yymmdd",
      onSelect: function(date) {
        var fecha_exacta = date;
        parametros = {
          fecha_exacta : fecha_exacta
        }


        $.ajax({
          data :parametros,
          url :SITE_URL+'/procesa-filtro-eventos',
          type :'POST',
          success : function(html)
          {

            $('.list-eventos').html('');
            respuesta = JSON.parse(html);

            var vez = 1;
            var num_row = 1;
            if(respuesta.listado == null){
              $('.list-eventos').append('<h3>No se han encontrado eventos en la fecha seleccionada.</h3>');
              $('.js-cargar-mas-eventos').addClass('hide');
            }else{

              var vez_evento = 1;
              var cant_ev = 4; //Cantidad de eventos a mostrar a primera vista
              var clase = '';
              $.each(respuesta.listado, function( key, value){
                if(vez_evento>cant_ev){clase='hide'; }

                 $('.list-eventos').append('<li class="'+clase+'"><a href="'+value.url+'"><div class="destacado -evento"><h1 class="title">'+value.titulo+'</h1><ul class="fecha-evento d-block"><li>'+value.ubicacion+'</li><li>'+value.fecha+'</li><li>'+value.hora+' horas</li><li><h4 class="link-pink">Ver evento</h4></li></ul</div></a></li>');
                 vez_evento++;
              });
              if(vez_evento>cant_ev){
                //$('.js-cargar-mas-eventos').show();
                $('.js-cargar-mas-eventos').removeClass('hide');
              }else{
                //$('.js-cargar-mas-eventos').hide();
                $('.js-cargar-mas-eventos').addClass('hide');
              }


            }

          }
        });

    }
    });



    //Cargar mas eventos
    $('.js-cargar-mas-eventos').click(function(event){
      event.preventDefault();
      $('#todos-los-eventos div.hide:lt(6)').removeClass('hide').addClass('').stop().slideDown();
      if($('#todos-los-eventos div.hide').length == 0){
            $('.js-cargar-mas-eventos').removeClass('show').addClass('hide');
      }
      $('.grid').masonry( 'reloadItems' );
      $('.grid').masonry( 'layout' );

    });



    // CONVOCATORIAS

    if(window.location.hash == "#cerradas") {
      $('#tab-cerradas').click();
    }

    // Eventos filtrados
    if(window.location.hash == "#proximos") {
      $('#proximos').click();
    }

    if(window.location.hash == "#pasados") {
      $('#pasados').click();
    }

    if(window.location.hash == "#hoy") {
      $('#hoy').click();
    }



    // Filtro convocatorias abiertas
    $('.filtro-convocatorias-abiertas').click(function(event){
        event.preventDefault();
        filtro = $(this).data('filtro');
        if(filtro=='categoria'){
            $('.filtro-convocatorias-abiertas').removeClass('active');
            $(this).addClass('active');
            var categoria = $(this).data('categoria');
            var todos = false;
        }else if(filtro=='todos'){
            $('.filtro-convocatorias-abiertas').removeClass('active');
            $(this).addClass('active');
            var categoria = null;
            var todos = true;
        }
        parametros = {
          categoria : categoria,
          todos: todos
        }
        $.ajax({
          data :parametros,
          url :SITE_URL+'/procesa-filtro-convocatorias-abiertas',
          type :'POST',
          success : function(html)
          {


            $('#lista-convocatorias-abiertas').html('');
            respuesta = JSON.parse(html);

            if(respuesta.listado == null){
              $('#lista-convocatorias-abiertas').append('<h3>No se han encontrado resultados con los parámetros seleccionados.</h3>');
            }else{
              var vez_convocatoria_abierta = 1;
              var cantidad_convocatorias_abiertas = 8; //Cantidad de archivos a mostrar a primera vista
              var clase_convocatoria_abierta = '';
              $.each(respuesta.listado, function( key, value){
                if(vez_convocatoria_abierta>cantidad_convocatorias_abiertas){clase_convocatoria_abierta='hide'; }

                $('#lista-convocatorias-abiertas').append('<li class="'+clase_convocatoria_abierta+'"><a href="'+value.url_single+'" class="box-proyecto"><img class="box-proyecto__img" src="'+value.url_imagen+'" alt="'+value.titulo+'"><div class="box-proyecto__category">'+value.categoria+'</div><p class="box-proyecto__title">'+value.titulo+'</p><p class="box-proyecto__text">'+value.descripcion_corta+'</p><p class="estado-convocatoria">Convocatoria Abierta</p><p class="btn-convocatoria">¡Postula ahora!</p></a></li>');
                vez_convocatoria_abierta++;

              });

              if(vez_convocatoria_abierta>cantidad_convocatorias_abiertas){
                $('.js-cargar-mas-convocatorias-abiertas').removeClass('hide');
                //$('.js-cargar-mas-convocatorias-abiertas').addClass('show');
              }else{
                //$('.js-cargar-mas-convocatorias-abiertas').removeClass('show');
                $('.js-cargar-mas-convocatorias-abiertas').addClass('hide');
              }

            }

          }
        });

    });

    //Cargar mas convocatorias abiertas
    $('.js-cargar-mas-convocatorias-abiertas').click(function(event){
      event.preventDefault();
      $('#lista-convocatorias-abiertas li.hide:lt(4)').removeClass('hide').addClass('').stop().slideDown();
      if($('#lista-convocatorias-abiertas li.hide').length == 0){
          $('.js-cargar-mas-convocatorias-abiertas').addClass('hide');
      }
    });


    // Filtro convocatorias cerradas
    $('.filtro-convocatorias-cerradas').click(function(event){
        event.preventDefault();
        filtro = $(this).data('filtro');
        if(filtro=='categoria'){
            $('.filtro-convocatorias-cerradas').removeClass('active');
            $(this).addClass('active');
            var categoria = $(this).data('categoria');
            var todos = false;
        }else if(filtro=='todos'){
            $('.filtro-convocatorias-cerradas').removeClass('active');
            $(this).addClass('active');
            var categoria = null;
            var todos = true;
        }
        parametros = {
          categoria : categoria,
          todos: todos
        }
        $.ajax({
          data :parametros,
          url :SITE_URL+'/procesa-filtro-convocatorias-cerradas',
          type :'POST',
          success : function(html)
          {

            $('#lista-convocatorias-cerradas').html('');
            respuesta = JSON.parse(html);


            //var num_row = 1;
            if(respuesta.listado == null){
              $('#lista-convocatorias-cerradas').append('<h3>No se han encontrado resultados con los parámetros seleccionados.</h3>');
            }else{
              var vez_convocatoria_cerrada = 1;
              var cantidad_convocatorias_cerradas = 8; //Cantidad de archivos a mostrar a primera vista
              var clase_convocatoria_cerrada = '';
              $.each(respuesta.listado, function( key, value){

                if(vez_convocatoria_cerrada>cantidad_convocatorias_cerradas){clase_convocatoria_cerrada='hide'; }

                $('#lista-convocatorias-cerradas').append('<li class="'+clase_convocatoria_cerrada+'"><a href="'+value.url_single+'" class="box-proyecto"><img class="box-proyecto__img" src="'+value.url_imagen+'" alt="'+value.titulo+'"><div class="box-proyecto__category">'+value.categoria+'</div><p class="box-proyecto__title">'+value.titulo+'</p><p class="box-proyecto__text">'+value.descripcion_corta+'</p><p class="estado-convocatoria">Convocatoria Cerrada</p><p class="btn-convocatoria">Ver detalles</p></a></li>');
                vez_convocatoria_cerrada++;

              });

              if(vez_convocatoria_cerrada>cantidad_convocatorias_cerradas){
                $('.js-cargar-mas-convocatorias-cerradas').removeClass('hide');
              }else{
                $('.js-cargar-mas-convocatorias-cerradas').addClass('hide');
              }


            }

          }
        });

    });

    //Cargar mas convocatorias cerradas
    $('.js-cargar-mas-convocatorias-cerradas').click(function(event){
      event.preventDefault();
      $('#lista-convocatorias-cerradas li.hide:lt(4)').removeClass('hide').addClass('').stop().slideDown();
      if($('#lista-convocatorias-cerradas li.hide').length == 0){
            $('.js-cargar-mas-convocatorias-cerradas').addClass('hide');
      }
    });


    //Eventos en archivos .pdf
    //abrir pdf en _blank
    $('a[href$=".pdf"]').prop('target', '_blank');
    console.log('v1.1')

    /* ============== tageo GA ================= */
    var targetGa = $('a[href$=".pdf"]');
    targetGa.on('click', function (event){

        var category = "PDF";
        var action = "click";
        var label = $(this).attr('href');
        var value = "0";
        // gtag('event', action, {
        //     'event_category': category,
        //     'event_label': label,
        //     'value': value
        // });
        ga('send', {
            hitType: 'event',
            eventCategory: category,
            eventAction: action,
            eventLabel: label
        });
    });







});
