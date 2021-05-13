$(document).ready(function (){
    $('#formNovo').submit(function(e) {
      e.preventDefault();

      var pnome = $('#nome').val();
      var pemail = $('#email').val();
      var pcategoria = $('#categoria').val();

      $.ajax({
          method: "POST",
          url: "inclusao.php",
          data: { nome: pnome, email: pemail, categoria: pcategoria },
          success: function(data, textStatus) {
          
          if (data == 'erro') 
              swal(data, "Clique para retornar", "warning");  
          else
              swal(data, "Clique para retornar", "success");  
              getLista();
          }
      })
    });

    $('#formAlterar').submit(function(e) {
      e.preventDefault();

      var pcodigo = $('#codigo2').val(); 
      var pnome = $('#nome2').val();
      var pemail = $('#email2').val();
      var pcategoria = $('#categoria2').val();

      $.ajax({
          method: "POST",
          url: "alterar.php",
          data: { codigo: pcodigo, nome: pnome, email: pemail, categoria: pcategoria },
          success: function(data, textStatus) {
          
          if (data == 'erro') 
              swal(data, "Clique para retornar", "warning");  
          else
              console.log(data);
              swal(data, "Clique para retornar", "success");  
              getLista();
          }
      })
    });
})

function getSeleciona(codigo) {
  $('#modalalterar').modal('show');
  $.ajax({
    method: "GET",
    contentType: 'text/json',
    dataType: "json",
    data: {codigo: codigo},
    url: "selecionar.php",
    success: function(data, textStatus) {
    
      var dados=data['aaData'];

      $('#codigo2').val(dados[0]);
      $('#nome2').val(dados[1]);
      $('#email2').val(dados[2]);
      $('#categoria2').val(dados[3])

    }
  })
}

function getSelecionaExcluir(codigo) {
  swal({
    title: "Confirma Exclusão ?",
    text: "Uma vez deletado, esse registro não poderá ser recuperado!",
    icon: "warning",
    buttons: true,
  })
    .then((willDelete) => {
       if (willDelete) {
        $.ajax({
          method: "POST",
         // contentType: 'text/json',
         // dataType: "json",
          data: {codigo: codigo},
          url: "excluir.php",
          success: function(data, textStatus) {
              if (data = 1) {
                swal("Registro excluído com sucesso!", {
                  icon: "success",
                });
                getLista();
              }
            }  
        })             
      };
  });
}

function getLista() {
  table=$('#example').DataTable({
    retrieve: true,
    paging: false
  })
  
  table.destroy();

  $.ajax({
    method: "GET",
    contentType: 'text/json',
    dataType: "json",
    url: "listagem.php",
    success: function(data, textStatus) {
      
      var dados=JSON.stringify(data);

      $('#example').DataTable( {
        ajax: {
          "url": "listagem.php",
          "type": "POST"
        },
        //deferRender: false,
        //scrollY: 400,
        //scrollCollapse: false,
        //scroller: false,
        //select: true, 
        "language": {
            "lengthMenu": "Exibindo _MENU_ registros por página",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "sSearch": "Filtrar"
        }
      });  
    }
  })
}

getLista();
