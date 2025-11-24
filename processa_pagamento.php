<?php
if(!isset($_SESSION)) session_start();
if(isset($_SESSION['id'])){
  include ("include/conexao.php");
  include ("include/chave_abacatepay.php");
  $nome  = $_SESSION['nome']; //pegando os dados do banco de dados
  $cell  = $_SESSION['telefone'];
  $email = $_SESSION['email'];
  $cpf   = $_SESSION['cpf'];
  $id = $_SESSION['id_banco'];
  

      $curl = curl_init();
      $sql = "SELECT * FROM `cursos` WHERE " . $_GET['id'];
      $response_sql = $conn->query($sql);
      $result_sql = $response_sql->fetch_assoc();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://api.abacatepay.com/v1/billing/create",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode([
        'frequency' => 'ONE_TIME',
        'methods' => [
            'PIX'
        ],
        'products' => [
            [
                    'externalId' =>  $_GET['id'], //id do produto
                    'name' => $result_sql["curso"],
                    'description' => $result_sql["descricao"],
                    'quantity' => 1,
                    'price' => $result_sql['preco']*100 //preço em centavos (*100)
            ]
        ],
        'returnUrl' => 'http://localhost/PIC/curso.php?id=' . $_GET["id"], //onde sera direcionado ao clicar em voltar
        'completionUrl' => 'http://localhost/PIC/index.php', //onde sera direcionado ao finalizar o pagamento
        'customerId' => $id, //id do cliente *(criado pelo banco)*
        'customer' => [ //informação do cliente para a cobrança
            'name' => $nome,
            'cellphone' => $cell,
            'email' => $email,
            'taxId' => $cpf
        ],
        'allowCoupons' => null, //sem cupons
        'coupons' => [
            'ABKT10',
            'ABKT5',
            'PROMO10'
        ],
        'externalId' => ''
      ]),
      CURLOPT_HTTPHEADER => [
        "Authorization: " . $chave,
        "Content-Type: application/json"
      ],
    ]);

    $response2 = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
    $data2 = json_decode($response2,true);
    if(isset($data2['data']['url'])) {
      $url = $data2['data']['url'];
      header('Location: ' . $url);
    }
    }
      //fim da cobrança
  } else echo "<script>alert('Não foi possível recuperar o ID do cliente. Tente novamente!'); window.location.href='login.php';</script>"; //Ao não conseguir identificar o id do cliente criado
?>