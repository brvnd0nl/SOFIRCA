

function activarPermisoInstitucion(){
    var TipoUsuario = document.getElementById("LBX_sNivelAcceso").value;
    var PermisoInstitucion = document.getElementById("DivPermisosInstitucion");

    if(TipoUsuario == "3"){
        $("#LBX_sInstitucionPermiso").attr('required', '');
        PermisoInstitucion.hidden = false;
    }else{        
        $("#LBX_sInstitucionPermiso").removeAttr('required');
        PermisoInstitucion.hidden = true; 
    }
}

function BuscarPrograma(){
    var BTN_sBuscarPrograma = document.getElementById("BTN_sBuscarPrograma");
    var BTN_sVolverABuscarPrograma = document.getElementById("BTN_sVolverABuscarPrograma");
    var TXT_sBuscarPrograma = document.getElementById("TXT_sBuscarPrograma");
    var ListaProgramas = document.getElementById("LBX_sPrograma");

    BTN_sBuscarPrograma.hidden = true;
    TXT_sBuscarPrograma.hidden = true;
    ListaProgramas.hidden = false;
    BTN_sVolverABuscarPrograma.hidden = false;
    $("#LBX_sPrograma").attr('required', '');
}

function regresarBuscarPrograma(){
    var BTN_sBuscarPrograma = document.getElementById("BTN_sBuscarPrograma");
    var BTN_sVolverABuscarPrograma = document.getElementById("BTN_sVolverABuscarPrograma");
    var TXT_sBuscarPrograma = document.getElementById("TXT_sBuscarPrograma");
    var ListaCompetencia = document.getElementById("LBX_sPrograma");

    BTN_sBuscarPrograma.hidden = false;
    TXT_sBuscarPrograma.hidden = false;
    ListaCompetencia.hidden = true;
    BTN_sVolverABuscarPrograma.hidden = true;
    $("#LBX_sPrograma").removeAttr('required');
}

function BuscarInstitucion(){
    var TXT_sBuscarInstitucion = document.getElementById("TXT_sBuscarInstitucion");
    var BTN_sBuscarInstitucion = document.getElementById("BTN_sBuscarInstitucion");
    var ListaProgramas = document.getElementById("LBX_sInstitucion");
    var BTN_sVolverABuscarInstitucion = document.getElementById("BTN_sVolverABuscarInstitucion");

    TXT_sBuscarInstitucion.hidden = true;
    BTN_sBuscarInstitucion.hidden = true;
    ListaProgramas.hidden = false;
    BTN_sVolverABuscarInstitucion.hidden = false;
    $("#LBX_sInstitucion").attr('required', '');
}

function regresarBuscarInstitucion(){
    var TXT_sBuscarInstitucion = document.getElementById("TXT_sBuscarInstitucion");
    var BTN_sBuscarInstitucion = document.getElementById("BTN_sBuscarInstitucion");
    var ListaProgramas = document.getElementById("LBX_sInstitucion");
    var BTN_sVolverABuscarInstitucion = document.getElementById("BTN_sVolverABuscarInstitucion");

    TXT_sBuscarInstitucion.hidden = false;
    BTN_sBuscarInstitucion.hidden = false;
    ListaProgramas.hidden = true;
    BTN_sVolverABuscarInstitucion.hidden = true;
    $("#LBX_Institucion").removeAttr('required');
}

function BuscarCompetencia(){
    var BTN_sBuscarCompetencia = document.getElementById("BTN_sBuscarCompetencia");
    var BTN_sVolverABuscarCompetencia = document.getElementById("BTN_sVolverABuscarCompetencia");
    var TXT_sBuscarCompetencia = document.getElementById("TXT_sBuscarCompetencia");
    var ListaCompetencia = document.getElementById("LBX_sCompetencia");

    BTN_sBuscarCompetencia.hidden = true;
    TXT_sBuscarCompetencia.hidden = true;
    ListaCompetencia.hidden = false;
    BTN_sVolverABuscarCompetencia.hidden = false;
    $("#LBX_sCompetencia").attr('required', '');
}

function regresarBuscarCompetencia(){
    var BTN_sBuscarCompetencia = document.getElementById("BTN_sBuscarCompetencia");
    var BTN_sVolverABuscarCompetencia = document.getElementById("BTN_sVolverABuscarCompetencia");
    var TXT_sBuscarCompetencia = document.getElementById("TXT_sBuscarCompetencia");
    var ListaCompetencia = document.getElementById("LBX_sCompetencia");

    BTN_sBuscarCompetencia.hidden = false;
    TXT_sBuscarCompetencia.hidden = false;
    ListaCompetencia.hidden = true;
    BTN_sVolverABuscarCompetencia.hidden = true;
    $("#LBX_sCompetencia").removeAttr('required');
}

$(document).on("click","#BTN_sBuscarInstitucion",function(event){
    try{
        event.preventDefault();
        var Datos =  $("#TXT_sBuscarInstitucion").val();
        if(Datos === "" || Datos == null){
            return;
        }
        var jqxhr = $.post("../ajax/Eventos.php",{NombreEvento: 'BuscarInstitucion', Datos: Datos }, function(data){
        cmb = $("#LBX_sInstitucion");
        cmb.html(data);
        cmb.change();
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.error("The following error occurred: "+ textStatus + ' : ' +  jqXHR.responseText + ' : ' + errorThrown );
            return;
        });
        BuscarInstitucion();
    }catch(e){
        console.error('Error: ' + e);
    }
  });

$(document).on("click","#BTN_sBuscarPrograma",function(event){
    try{
        event.preventDefault();
        var Datos =  $("#TXT_sBuscarPrograma").val();
        if(Datos === "" || Datos == null){
            return;
        }
        var jqxhr = $.post("../ajax/Eventos.php",{NombreEvento: 'BuscarPrograma', Datos: Datos }, function(data){
            cmb = $("#LBX_sPrograma");
            cmb.html(data);
            cmb.change();
        })
            .fail(function (jqXHR1, textStatus, errorThrown) {
                console.error("The following error occurred: "+ textStatus + ' : ' +  jqXHR1.responseText + ' : ' + errorThrown );
                return;
            });
        BuscarPrograma();
    }catch(e){
        console.error('Error: ' + e);
    }
});

$(document).on("click","#BTN_sBuscarCompetencia",function(event){
    try{
        event.preventDefault();
        var Datos =  $("#TXT_sBuscarCompetencia").val();
        if(Datos === "" || Datos == null){
            return;
        }
        var jqxhr = $.post("../ajax/Eventos.php",{NombreEvento: 'BuscarCompetencia', Datos: Datos }, function(data){
            cmb = $("#LBX_sCompetencia");
            cmb.html(data);
            cmb.change();
        })
            .fail(function (jqXHR1, textStatus, errorThrown) {
                console.error("The following error occurred: "+ textStatus + ' : ' +  jqXHR1.responseText + ' : ' + errorThrown );
                return;
            });
        BuscarCompetencia();
    }catch(e){
        console.error('Error: ' + e);
    }
});

$(document).on("change",".regional",function(event){
    event.preventDefault();
    var Datos =  $(this).val();
    if(Datos === "" || Datos == null){
        return;
    }
    var jqxhr = $.post("../ajax/Eventos.php",{NombreEvento: 'BuscarPrograma', Datos: Datos }, function(data){
        cmb = $("#LBX_sPrograma");
        cmb.html(data);
        cmb.change();
    })
        .fail(function (jqXHR1, textStatus, errorThrown) {
            console.error("The following error occurred: "+ textStatus + ' : ' +  jqXHR1.responseText + ' : ' + errorThrown );
            return;
        });
});

  