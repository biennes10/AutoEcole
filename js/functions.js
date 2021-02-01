function Valider() 

{ 
    

    $.ajax 

    ( 

        { 

            type:"GET", 

            url:"./php/valider.php", 

            data:"vehicule="+$('#sltVehicules').val()+"&eleve="+$('#sltEleves').val()+"&moniteur="+$('#sltMoniteurs').val()+"&idLecon="+$('#txtCodeLecon').val()+"&date="+$('#txtDateLecon').val()+"&heure="+$('#txtHeureLecon').val()+":00", 

            success:function(data) 
            { 
                alert("Lecon inséré !!")                

            }, 

            error:function() 

            { 

                alert("Erreur de récupération des eleves"); 

            } 

        } 

    ); 

} 


function GetEleves() 

{ 
    

    $.ajax 

    ( 

        { 

            type:"GET", 

            url:"./php/GetElevesDispos.php", 

            data:"date="+$('#txtDateLecon').val()+"&heure="+$('#txtHeureLecon').val()+":00", 

            success:function(data) 

            { 
                $('#sltEeves').empty(); 

                $('#sltEleves').append(data); 

                

            }, 

            error:function() 

            { 

                alert("Erreur de récupération des eleves"); 

            } 

        } 

    ); 

} 

function GetVehiculesDispos() 

{ 

    $.ajax 

    ( 

        { 

            type:"GET", 

            url:"./php/GetVehiculesDispos.php", 

            data:"date="+$('#txtDateLecon').val()+"&heure="+$('#txtHeureLecon').val()+":00", 

            success:function(data) 

            { 
                $('#sltVehicules').empty(); 

                $('#sltVehicules').append(data); 

                GetEleves();

            }, 

            error:function() 

            { 

                alert("Erreur de récupération des vehicules"); 

            } 

        } 

    ); 

} 

function GetMoniteursDispos() 

{ 

    $.ajax 

    ( 

        { 

            type:"GET", 

            url:"./php/GetMoniteursDispos.php", 

            data:"categorie="+$('input[type=radio]:checked').val()+"&date="+$('#txtDateLecon').val()+"&heure="+$('#txtHeureLecon').val()+":00", 

            success:function(data) 

            { 

                $('#sltMoniteurs').empty(); 

                $('#sltMoniteurs').append(data); 

                GetVehiculesDispos(); 

            }, 

            error:function() 

            { 

                alert("Erreur de récupération des moniteurs"); 

            } 

        } 

    ); 

} 
$("#btnRechercher").click(function() {
   
    if($("#txtDateLecon").val() != ""){
        if($("#txtHeureLecon").val()!= ""){
            if($('input[type=radio]:checked').val() != null){
                
                GetMoniteursDispos();
            }else{
                alert('Veuillez saisir une catégorie');
            }
        }else{
            alert('Veuillez saisir une heure');
        }
    }else{
        alert('Veuillez saisir une date');
    }
    
  });

  $("#btnValider").click(function() {
   
    Valider();
    
  });
