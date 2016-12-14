$(function(){







    $('#importxml').click(function(){
		console.log('hola');
		$('#modalimport').modal('show');});


    $('#btnUpImport').on('click', function() {
        readBlob();
    });




    function readBlob() {
        var my_timer;
        var e = null;
        var contenido = "";
        var files = document.getElementById('files').files;
        if (!files.length) {

            $('#contenido').hide().append('<br/><div class="alert alert-danger"><strong>Advertencia!</strong> Elija un archivo XML.</div>').fadeIn(1000);
            clearTimeout(my_timer);
            my_timer = setTimeout(function() {
                $('#contenido').hide(2000);
            }, 3000); //Mostrar mensaje de error
            return;
        }

        var file = files[0];


        var $reader = new FileReader();

        $reader.onloadend = function(evt) {
            if (evt.target.readyState == FileReader.DONE) {
                contenido = evt.target.result;
                //console.log(contenido); //Imprime el contenido del archivo
                try {
                    xmlDoc = $.parseXML(contenido);
                    $xml = $(xmlDoc);
                    $title = $xml.find("Fruits")
                    console.log(($title).text().length);

                    if ($title.length > 0) {
                        $title.each(function() {
                            var name = $(this).find('Nombre').text(),
                                origen = $(this).find('Origen').text();



                            $.ajax({
                                data: {
                                    NombreFruta: name,
                                    Origen: origen
                                },
                                url: '/TPAProyectoIntegrador/controller/Frutas.php',
                                type: 'post',
                                beforeSend: function() {
                                    $("#resultado").html("Procesando, espere por favor...");
                                },
                                success: function(response) {

                                    console.log('Fruta: ' + name + ' ' + 'Origen: ' + origen + response);

                                }
                            });

                        });
                        $('#contenido').hide().append('<br/><div class="alert alert-success"><strong>Aviso!</strong> Se inserto correctamente el archivo XML.</div>').fadeIn(1000);
                        clearTimeout(my_timer);
                        my_timer = setTimeout(function() {
                            $('#contenido').hide(2000);
                        }, 3000); //Mensaje


                    } else {
                        $('#contenido').hide().append('<br/><div class="alert alert-danger"><strong>Advertencia!</strong> Inserte un archivo XML correcto.</div>').fadeIn(1000);
                        clearTimeout(my_timer);
                        my_timer = setTimeout(function() {
                            $('#contenido').hide(2000);
                        }, 3000); //Mensaje

                    }

                } catch (e) {
                    //console.log(e);
                    $('#contenido').hide().append('<br/><div class="alert alert-danger"><strong>Advertencia!</strong> El archivo que selecciono no parece ser XML.</div>').fadeIn(1000);
                    clearTimeout(my_timer);
                    my_timer = setTimeout(function() {
                        $('#contenido').hide(2000);
                    }, 3000); //Mensaje
                }
            } //if
        };
        $reader.readAsBinaryString(file);

    }




});