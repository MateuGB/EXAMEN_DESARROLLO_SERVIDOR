<?php
$titulo = "Superhéroes";

require 'encabezado.php';

if ($_SESSION['usuario'] === "DC") {
    $editorial = "DC Comics";
} else {
    $editorial = "Marvel Comics";
}

$lineas = file('heroes.csv');

$cabecera = explode(";", trim($lineas[0]));

$heroes = [];
for ($i = 1; $i < count($lineas); $i++) {
    $linea = trim($lineas[$i]);
    if ($linea === "") {
        continue;
    }

    $campos = explode(";", $linea);

    $heroe = [];
    for ($j = 0; $j < count($cabecera); $j++) {
        $heroe[$cabecera[$j]] = $campos[$j];
    }
    $heroes[] = $heroe;
}
?>
<link rel="stylesheet" href="../css/estilos.css">
<h2>Personajes de <?= $editorial ?></h2>

<?php foreach ($heroes as $heroe) { ?>
    <?php if ($heroe['publisher'] === $editorial) { ?>
        <div class="heroe">
            <img src="<?= $heroe['picture'] ?>" alt="<?= $heroe['superhero'] ?>">
            <h3><?= $heroe['superhero'] ?></h3>
            <p>Editorial: <?= $heroe['publisher'] ?></p>
            <p>Alter ego: <?= $heroe['alter_ego'] ?></p>
            <p>Primera aparición: <?= $heroe['first_appearance'] ?></p>
        </div>
    <?php } ?>
<?php } ?>

<?php include 'pie.php'; ?>
</body>
</html>