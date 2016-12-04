
<h1>Events of the day !</h1>


<table>

    <tr>
        <th>Name </th>
        <th>x</th>
        <th>y</th>
        <th>date</th>
       
    </tr>

 <?php foreach ($allEvents as $event): ?>
    <tr>
        
      

            <td><?= $event->name?></td>
            <td><?= $event->coordinate_x ?></td>
            <td><?= $event->coordinate_y?></td>
            <td><?= $event->date?></td>
            
        
            
 <?php endforeach; ?>
</table>