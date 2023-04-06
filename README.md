//COMO TESTAR AS ROTAS:

//ROTA 1 NOME - abra o http://localhost:8000/nome digite o nome e envie, você será direcionado a rota 'hello'.

//ROTA 2 CALCULADORA - abra o http://localhost:8000/calculadora/num1/num2/operacao

//ROTA 3 IDADE - abra o http://localhost:8000/idade/ano/mes/dia


Route::get('/nome', function () {
    return view('nome');
});

Route::get('/hello', function () {
    $name = request()->query('nome');
    return view('hello', ['name' => $name]);
})->name('hello');


Route::get('/calculadora/{num1}/{num2}/{operation?}', function ($num1, $num2, $operation = null) {
    $result = null;

    if ($num2 == 0) {
        return "O segundo número é Zero (0).<br>
        O valor da soma e subtração será igual ao primeiro número: $num1.<br>
        O valor da multiplicação por 0 é sempre: 0.<br>
        E desculpe, não é possível fazer uma divisão por 0.<br>
        Recomendo que escolha outro número.";
    }

    switch ($operation) {
        case 'soma':
            $result = $num1 + $num2;
            break;
        case 'subtracao':
            $result = $num1 - $num2;
            break;
        case 'multiplicacao':
            if ($num2 == 0) {
                return ' O valor da multiplicação por 0 é sempre: 0.';
            }      
            $result = $num1 * $num2;
            break;
        case 'divisao':
            if ($num2 == 0) {
                return 'Desculpe, não é possível fazer uma divisão por Zero (0).';
            }           
            $result = $num1 / $num2;
            break;
        default:
            $results = [
                'soma' => $num1 + $num2,
                'subtraçao' => $num1 - $num2,
                'multiplicação' => $num1 * $num2,
                'divisão' => $num1 / $num2,
            ];
            break;
    }
    if ($result) {
        return "Resultado da operação $operation: $result";
    } else {
        $resultString = '';
        foreach ($results as $op => $res) {
            $resultString .= "Resultado da operação $op: $res<br>";
        }
        return $resultString;
    }
})->where(['num1' => '[0-9]+', 'num2' => '[0-9]+'])->name('calculator');




Route::get('/idade/{ano}/{mes?}/{dia?}', function ($ano, $mes = null, $dia = null) {

    if (!preg_match('/^\d{4}$/', $ano)) {
        return 'O ano deve ter 4 dígitos.';
    }
    if (($mes && !preg_match('/^\d{1,2}$/', $mes)) || ($mes && ($mes < 1 || $mes > 12))) {
        return 'O mês deve ser um número entre 1 e 12.';
    }
    if (($dia && !preg_match('/^\d{1,2}$/', $dia)) || ($dia && ($dia < 1 || $dia > 31))) {
        return 'O dia deve ser um número entre 1 e 31.';
    }
    if ($mes && $dia && !checkdate($mes, $dia, $ano)) {
        return 'A data informada é inválida.';
    }

    $data = new DateTime("$ano-" . ($mes ?? '01') . "-" . ($dia ?? '01'));
    $hoje = new DateTime();
    if ($data > $hoje) {
        return 'A data informada está no futuro. Informe a data correta.';
    }

    $idade = $hoje->diff($data)->y;

    if ($mes && $dia) {
        return "Você nasceu em $dia/$mes/$ano e tem $idade anos.";
    } elseif ($mes) {
        return "Você nasceu em $mes/$ano e tem $idade anos.";
    } else {
        return "Você nasceu em $ano e tem $idade anos.";
    }
})->name('calcular_idade');

