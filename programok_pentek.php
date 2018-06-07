<?php
$locales = array();
$result_locales = $mysqli->query("SELECT * FROM locales");
while ($locale = mysqli_fetch_array($result_locales, MYSQLI_ASSOC)) {
    $locales[$locale['number']] = $locale['name'];
}
?>


<h3><?php print $day_names[$actDay] ?></h3>

<table class="programs-table table-hover programs-one">
    <thead>
    <tr>
        <th>Program</th>
        <th>Helyszín</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $result = $mysqli->query("SELECT * FROM programs WHERE day = " . $actDay . " ORDER BY start_time ASC");
        while ($program = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $endTime = NULL;
            if (isset($program['end_time'])) {
                $endTime = '-'.substr($program['end_time'], 0, -3);
            }
            if ($program['description']) {
                $desc = $program['description'];
            }
            else {
                $desc = "Ennek a programnak nincs részletes leírása.";
            }

            print '<tr id="program-item" data-id="' . $program['id'] . '"><td><div class="time">'.substr($program['start_time'], 0, -3) . $endTime . '</div>';
            print '<div class="name">'. $program['name'] . '</div></td>';
            print '<td><div class="locale">' . $locales[$program['locale_id']] . '</div></td></tr>';
            print '</tr>';
            print '<tr><td id="description-' . $program['id'] . '" class="description" colspan="2">' . $desc . '</td></tr>';
        }
    ?>

    </tbody>
</table>