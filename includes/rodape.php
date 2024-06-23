<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/datatables.min.js"></script>
<script src="js/pt-BR.js"></script>
<script src="js/sweetalert2.all.min.js"></script>

<script>
    $('#dados').DataTable({
        "language": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sEmptyTable": "Sem dados disponíveis nesta tabela",
            "sInfo": "Mostrando registros de _START_ a _END_ em um total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros de 0 a 0 de um total de 0 registros",
            "sInfoFiltered": "(filtrado de um total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Carregando...",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sLast": "Último",
                "sNext": "Seguinte",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Ordenar de forma crescente",
                "sSortDescending": ": Ordenar de forma decrescente"
            }
        }
    });

    editar = (id, tipo) => {


    }

    deletar = (id, tipo) => {
        Swal.fire({

            text: "Tem certeza da Exclusão?",
            icon: 'question',
            showDenyButton: true,
            denyButtonText: "Cancelar",
            confirmButtonText: 'Confirmar',
            reverseButtons: true

        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'delete',

                })
            }
        })
    }
</script>

<?php 

