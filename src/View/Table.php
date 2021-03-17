
<html>
<head> <link rel="stylesheet" href="View\css.css" <meta charset="utf-8"> </head>
<body>
<table class="darkTable">
   <thead>
   <tr>
   <th>Hero Orderus Stats</th>
   <th>Beast Stats</th>
   </tr>
   </thead>
   <tbody>
   <tr>
   <td><?php echo "Health: " , $heroHealth ?></td>
   <td><?php echo "Health: " , $beastHealth ?></td>
   </tr>
   <tr>
   <td><?php echo  "Strength: " , $heroStrength ?></td>
   <td><?php echo  "Strength: " , $beastStrength ?></td>
   </tr>
   <tr>
   <td><?php echo "Defense: " , $heroDefense ?></td>
   <td><?php echo "Defense: " , $beastDefense ?></td>
   </tr>
   <tr>
   <td><?php echo  "Speed: " , $heroSpeed ?></td>
   <td><?php echo  "Speed: " , $beastSpeed ?></td>
   </tr>
   <tr>
   <td><?php echo  "Luck: " , $heroLuck ?></td>
   <td><?php echo  "Luck: " , $beastLuck ?></td>
   </tr>
   </tbody>
   </table>
 </body>
</html>
