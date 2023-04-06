<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
  </head>
  <body>
    <form action="/calculadora/{num1}/{num2}/{operacao}" method="GET">
      <label for="num1">Digite o primeiro número:</label>
      <input type="number" id="num1" name="num1" required>
      <br>
      <label for="num2">Digite o segundo número:</label>
      <input type="number" id="num2" name="num2" required>
      <br>
      <label for="operacao">Escolha a operação:</label>
      <select id="operacao" name="operacao">
        <option value="soma">Soma</option>
        <option value="subtracao">Subtração</option>
        <option value="multiplicacao">Multiplicação</option>
        <option value="divisao">Divisão</option>
      </select>
      <br>
      <button type="submit">Calcular</button>
    </form>    
  </body>
</html>

<?php /**PATH C:\ProjetosWeb\ROTAS\resources\views/calculator.blade.php ENDPATH**/ ?>