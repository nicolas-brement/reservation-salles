<?php
for ($i = 0; $i < $col; $i++) {
	for ($j = 0; $j < $row; $j++){
        if ($i == 0) {
            $array[$i][] = (string)($j + 7) . ":00";
        }else{
            $date = new DateTime("last sunday 7am $week week", new DateTimeZone ("Europe/Paris");
            $date->add(new DateInterval('P')) . ($i . 'D' . 'T' .  $j . 'H'));
            $array[$i][] = $date->format("d/m/Y H:i");
}
?>

<?php
for ($i = 0, $i < 13; $i ++) : ?>
<tr>
   <?php ($j = 0, $j < 8; $i ++) : ?>
    <?php if ($i == 0) : ?>
        <td><?= $days[$j] ?> </td>
</tr>

--------------------------------------------------------------------
<?php
for ($i = 0; $i < $col; $i++) {
	for ($j = 0; $j < $row; $j++){
            $date = date('N G:i' , strtotime("last monday 7am $week week $i day $j hours"))
            $day = displayDay($date[0]);
            $date = substr($date, 1, strlen($date));
            $date = $day . $date;
            $array[$i][] = $date;

            $db  mysqli_connect('localhost', 'root' , 'root');
            $queryString = "SELECT debut FROM reservations WHERE id = 3";
            $query = $db->query($queryString);
            $result = $query->fetch_assoc();

            $date = date('N G:i' , strtotime($result[debut]));
            $day = displayDay($date[0]);
            $date = substr($date, 1, strlen($date));
?>

----------------------------------------------------------

<table>
<?php
    $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
    $month = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre']
?>
   <?php for($i=7; $i<20; $i++): ?>
    <tr>
        <?php for($j=0; $j<7; $j++): ?>
        <?php  if ($i==7) : ?>
            <td> <?= $days[$j] ?> </td>
            <?php else: ?>
            <td><?= $i. ":00"." ".$days[$j]?></td>
            <?php endif; ?>
            <?php endfor ; ?>
    </tr>
         <?php endfor ; ?>
    </table>
</body>
</html>

<!---------------------------------------------------------------------->

<?php include "bdd.php";
include "header.php";
$session=$_SESSION['login'];
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8>
        <meta http-equiv="X-UA-Compatinble" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <title>Planning</title>
</head>

<body>

<div class="tableau">
<table>
<?php
    $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
    $date = new DateTime (date("01-01-2023"));
    $interval = new DateInterval ('P1D');
?>
   <?php for($i=7; $i<20; $i++): ?>
    <tr>
        <?php for($j=0; $j<7; $j++): ?>
            <?php $date->add($interval)?>
        <?php  if ($i==7) : ?>
            <th> <?= $days[$j] . "" . ($date->format("d.m.Y"))?> </th>
            <?php else: ?>
            <td><?= $i. ":00"." "?></td>
            <?php endif; ?>
            <?php endfor ; ?>
    </tr>
         <?php endfor ; ?>

 </div>
    </table>
</body>
</html>
