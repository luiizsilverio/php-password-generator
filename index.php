<?php

  if (isset($_POST['generate'])) {
    $length     = intval($_POST['length']);
    $lowercase  = isset($_POST['lowercase']);
    $uppercase  = isset($_POST['uppercase']);
    $symbol     = isset($_POST['symbol']);
    $number     = isset($_POST['number']);
    $password   = "";

    if (!$lowercase && !$lowercase && !$uppercase && !$symbol && !$number) {
      echo ("Selecione pelo menos uma opção de senha");
    }

    $lower_chars  = "abcdefghijklmnopqrstuvwxyz";
    $upper_chars  = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $number_chars = "0123456789";
    $symbol_chars = "!@#$%&*()_+=";

    $valid_options = "";

    if ($lowercase) $valid_options .= $lower_chars;
    if ($uppercase) $valid_options .= $upper_chars;
    if ($number) $valid_options .= $number_chars;
    if ($symbol) $valid_options .= $symbol_chars;

    for ($k = 0; $k < $length; $k++) {
      $random_number = rand(0, strlen($valid_options) - 1);
      $password .= $valid_options[$random_number];
    }

  }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Password Generator</title>
</head>
<body>
  <form action="" method="POST">
    <p>
      <label for="length">Password Length</label>
      <input type="number" name="length" id="length" value="16" min="6" required />
    </p>
    <p>
      <label for="lowercase">Include Lowercase</label>
      <input type="checkbox" name="lowercase" id="lowercase" value="1" checked />
    </p>
    <p>
      <label for="uppercase">Include Uppercase</label>
      <input type="checkbox" name="uppercase" id="uppercase" value="1" checked />
    </p>
    <p>
      <label for="symbol">Include Symbols</label>
      <input type="checkbox" name="symbol" id="symbol" value="1" checked />
    </p>
    <p>
      <label for="number">Include Numbers</label>
      <input type="checkbox" name="number" id="number" value="1" checked />
    </p>
    <button type="submit" name="generate">Generate!</button>
  </form>

  <?php if (isset($password)) { ?>
    <h4>Generated Password</h4>
    <input type="text" readonly value="<?= $password; ?>">
  <?php } ?>
</body>
</html>