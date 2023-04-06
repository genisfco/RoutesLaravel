<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Calculadora de Idade</title>
  </head>
  <body>
    <form action="/calcularidade" method="GET">
      <label for="ano">Digite o ano de nascimento:</label>
      <input type="number" id="ano" name="ano" min="1900" max="2099" required>
      <br>
      <label for="mes">Digite o mês de nascimento:</label>
      <input type="number" id="mes" name="mes" min="1" max="12">
      <br>
      <label for="dia">Digite o dia de nascimento:</label>
      <input type="number" id="dia" name="dia" min="1" max="31">
      <br>
      <button type="submit">Calcular idade</button>
    </form>
  </body>
</html>
<?php /**PATH C:\ProjetosWeb\ROTAS\resources\views/idade.blade.php ENDPATH**/ ?>