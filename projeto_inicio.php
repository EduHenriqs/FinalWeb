<title>Mercado MELB | Início</title>
<?php
session_name('mercado');
session_start();

if ($_SESSION == array()) {
  $msg = urlencode("Sess�o Encerrada");

  header("Location: index.php?mensagem=$msg");
}
include "includes/cabecalho.php"; ?>
<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Página Inicial</h1>
    <br>

    <div class="row">
      <div class="col-xl-12">
        <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-chart-area me-1"></i>
            Lucros Mensais
          </div>
          <div class="card-body">
            <div class="text-xs font-weight-bold text-dark mb-1">Tipo de Gr&aacute;fico</div>
            <select name="chartType_cidade" id="chartType_cidade" class="form-control" onchange="updatechartType_cidade()">
              <option value="line">Linha</option>
              <option value="bar">Barra</option>
              <option value="radar">Radar</option>
              <option value="polarArea">Polar</option>
              <option value="doughnut">Rosquinha</option>
            </select>

            <br><br>

            <canvas id="myChart_cidade" style="max-height:700px;"></canvas>
          </div>
        </div>
      </div>

    </div>
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Funcionários
      </div>
      <div class="card-body">
        <?php
        include "includes/conect.php";
        $query = "SELECT id,nome,cargo,departamento,salario,data_admissao,data_nascimento FROM funcionarios";

        $sql_query_produtos = mysqli_query($conect, $query);
        $num_result = mysqli_num_rows($sql_query_produtos);
        ?>
        <table class="table table-bordered table-hover" id="dados_func">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nome</th>
              <th scope="col">Cargo</th>
              <th scope="col">Departamento</th>
              <th scope="col">Salario</th>
              <th scope="col">Data de Admissão</th>
              <th scope="col">Data de Nascimento</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($num_result == 0) { ?>

              <tr>
                <td colspan="7">Não existem funcionários cadastrados</td>
              </tr>
              <?php
            } else {
              while ($dados = mysqli_fetch_array($sql_query_produtos)) {
              ?>
                <tr>
                  <th scope="row"><?php print $dados['id']; ?></th>
                  <td><?php print $dados['nome']; ?></td>
                  <td><?php print $dados['cargo']; ?></td>
                  <td><?php print $dados['departamento']; ?></td>
                  <td>R$ <?php print str_replace(".", ",", $dados['salario']); ?></td>
                  <td><?php print date("d/m/Y", strtotime($dados['data_admissao'])); ?></td>
                  <td><?php print  date("d/m/Y", strtotime($dados['data_nascimento'])); ?></td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</main>
</div>
</div>
</body>

<?php
$query = "SELECT SUM(valor_total) AS total_vendas, 
CASE 
    WHEN Month(data_venda) = 1 THEN 'Janeiro'
    WHEN Month(data_venda) = 2 THEN 'Fevereiro'
    WHEN Month(data_venda) = 3 THEN 'Março'
    WHEN Month(data_venda) = 4 THEN 'Abril'
    WHEN Month(data_venda) = 5 THEN 'Maio'
    WHEN Month(data_venda) = 6 THEN 'Junho'
    WHEN Month(data_venda) = 7 THEN 'Julho'
    WHEN Month(data_venda) = 8 THEN 'Agosto'
    WHEN Month(data_venda) = 9 THEN 'Setembro'
    WHEN Month(data_venda) = 10 THEN 'Outubro'
    WHEN Month(data_venda) = 11 THEN 'Novembro'
    WHEN Month(data_venda) = 12 THEN 'Dezembro'
END AS mes_nome
FROM vendas
GROUP BY Month(data_venda)
ORDER BY Month(data_venda)
";
$result = mysqli_query($conect, $query);
$xValues = array();
$yValues = array();
$cont = 0;
while ($dados = mysqli_fetch_array($result)) {
  $xValues[$cont] = $dados['mes_nome'];
  $yValues[$cont] = $dados['total_vendas'];
  $cont++;
}

$xValuesJSON = json_encode($xValues);
$yValuesJSON = json_encode($yValues);


?>


<script>
  var xValues = <?php print $xValuesJSON ?>;
  var yValues = <?php print $yValuesJSON ?>;

  myData_cidade = {
    labels: xValues,
    datasets: [{
      label: "Total Vendas",
      data: yValues,
      borderWidth: 2,
      weight: 1,
      backgroundColor: [
        "#B7DFFD",
        "#9AC4FC",
        "#7CA9FA",
        "#5E8EF9",
        "#4164F7",
        "#2349F5",
        "#162EE4",
        "#0E24C3",
        "#081A9E",
        "#040F79",
        "#020954",
        "#010433"
      ]
    }],
    options: {
      responsive: true,
      maintainAspectRatio: false,
      locale: 'br-BR',
      scales: {
        y: {

          ticks: {
            callback: (value, index, values) => {
              return new Intl.NumberFormat('br-BR', {
                style: 'currency',
                currency: 'BRL',
                maximumSignificantDigits: 3
              }).format(value);
            }
          }
        }
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: function(tooltipItem, data) {
              var label = myChart_cidade.data.labels[tooltipItem.datasetIndex];
              var value = myChart_cidade.data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
              return label + ": R$ " + value;
            }
          }
        }
      }
    }
  };

  // Default chart defined with type: 'line'

  var ctx_cidade = document.getElementById('myChart_cidade').getContext('2d');
  var myChart_cidade = new Chart(ctx_cidade, {
    type: 'line',
    data: myData_cidade,
    options: {
      responsive: true,
      maintainAspectRatio: false,
      locale: 'br-BR',
      scales: {
        y: {

          ticks: {
            callback: (value, index, values) => {
              return new Intl.NumberFormat('br-BR', {
                style: 'currency',
                currency: 'BRL',
                maximumSignificantDigits: 3
              }).format(value);
            }
          }
        }
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: function(tooltipItem, data) {
              // var label = myChart_cidade.data.labels[tooltipItem.dataIndex];
              var label = "Total Vendas"
              var value = myChart_cidade.data.datasets[tooltipItem.datasetIndex].data[tooltipItem.dataIndex];
              return label + ": R$ " + value;
            }
          }
        }
      }
    }
  });

  // Function runs on chart type select update
  function updatechartType_cidade() {
    // Since you can't update chart type directly in Charts JS you must destroy original chart and rebuild
    if (document.getElementById("chartType_cidade").value == "line" || document.getElementById("chartType_cidade").value == "bar") {
      myChart_cidade.destroy();
      myChart_cidade = new Chart(ctx_cidade, {
        type: document.getElementById("chartType_cidade").value,
        data: myData_cidade,
        options: {
          responsive: true,
          maintainAspectRatio: false,
          locale: 'br-BR',
          scales: {
            y: {

              ticks: {
                callback: (value, index, values) => {
                  return new Intl.NumberFormat('br-BR', {
                    style: 'currency',
                    currency: 'BRL',
                    maximumSignificantDigits: 3
                  }).format(value);
                }
              }
            }
          },
          plugins: {
            tooltip: {
              callbacks: {
                label: function(tooltipItem, data) {
                  // var label = myChart_cidade.data.labels[tooltipItem.dataIndex];
                  var label = "Total Vendas"
                  var value = myChart_cidade.data.datasets[tooltipItem.datasetIndex].data[tooltipItem.dataIndex];
                  return label + ": R$ " + value;
                }
              }
            }
          }
        }
      });
    } else if (document.getElementById("chartType_cidade").value == "doughnut") {
      myChart_cidade.destroy();
      myChart_cidade = new Chart(ctx_cidade, {
        type: document.getElementById("chartType_cidade").value,
        data: myData_cidade,
        options: {
          responsive: true,
          maintainAspectRatio: false,

          plugins: {
            tooltip: {
              callbacks: {
                label: function(tooltipItem, data) {
                  // var label = myChart_cidade.data.labels[tooltipItem.dataIndex];
                  var label = "Total Vendas"
                  var value = myChart_cidade.data.datasets[tooltipItem.datasetIndex].data[tooltipItem.dataIndex];
                  return label + ": R$ " + value;
                }
              }
            }
          }
        }
      });
    } else {
      myChart_cidade.destroy();
      myChart_cidade = new Chart(ctx_cidade, {
        type: document.getElementById("chartType_cidade").value,
        data: myData_cidade,
        options: {
          responsive: true,
          maintainAspectRatio: false,

          plugins: {
            tooltip: {
              callbacks: {
                label: function(tooltipItem, data) {
                  // var label = myChart_cidade.data.labels[tooltipItem.dataIndex];
                  var label = "Total Vendas"
                  var value = myChart_cidade.data.datasets[tooltipItem.datasetIndex].data[tooltipItem.dataIndex];
                  return label + ": R$ " + value;
                }
              }
            }
          },
          scales: {
            r: {
              ticks: {
                callback: (value, tick, values) => {
                  return "R$ " + value;
                }
              }
            }
          }
        }
      });
    }
  };
</script>


<script>
    $('#dados_func').DataTable({
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
        },
        "columns": [
            null,
            null,
            null,
            null,
            null,
            {
                "type": "date-eu"
            },
            {
                "type": "date-eu"
            }

        ]
    });
</script>