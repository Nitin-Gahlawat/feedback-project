<?php
require_once dirname(__FILE__, 3) . '/php/GrievanceOperation.php';
$roll = $_GET['roll'];
$to = $_GET['to'];
$from = $_GET['from'];
$allrecord = GrievanceOperation::AdminFromTo($to, $from);
if (count($allrecord) == 0)
     echo "<div style='margin: 1.7vh'>No FeedBack found</div>";
else {
     echo "<thead>
          <tr>
          <th>roll</th>
          <th>Type</th>
          <th>Topic</th>
          <th>Subject</th>
          <th>rate</th>
          <th>Date of Feedback</th>
          <th>FeedBack message</th>
          </tr>
          </thead>
          <tbody>
          ";
     for ($i = 0; $i < count($allrecord); $i++) {
          echo "<tr>";
          for ($j = 0; $j < count($allrecord[$i]); $j++) {
               echo  "<td>" . $allrecord[$i][$j] . "</td>";
          }
          echo "</tr>";
     }
     echo "<tbody></table>";
}

?>