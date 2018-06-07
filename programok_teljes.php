<?php




$result_locales = mysql_query("SELECT * FROM locales");
?>
<div id="accordion" class="ui-accordion ui-widget ui-helper-reset">
<?php
while ($locale = mysql_fetch_array($result_locales, MYSQL_ASSOC)) {
		$wrapperId = strtolower($locale['name']);
		$raplaceChar = array("á");
		$wrapperId = str_replace($raplaceChar, "a", $wrapperId);
		$raplaceChar = array("é");
		$wrapperId = str_replace($raplaceChar, "e", $wrapperId);
		$raplaceChar = array("í");
		$wrapperId = str_replace($raplaceChar, "i", $wrapperId);
		$raplaceChar = array("ü","ű","ú");
		$wrapperId = str_replace($raplaceChar, "u", $wrapperId);
		$raplaceChar = array("ö","ő","ó");
		$wrapperId = str_replace($raplaceChar, "o", $wrapperId);
		$raplaceChar = array(" ");
		$wrapperId = str_replace($raplaceChar, "-", $wrapperId);
		$raplaceChar = array("(",")","?",".",",",";","\"","'","!");
		$wrapperId = str_replace($raplaceChar, "", $wrapperId);
    $days = array();
    $days[1] = array();     //Friday
    $days[2] = array();     //Saturday
    $days[3] = array();     //Sunday

    print "<h3 class=\"programs-wrapper programs-wrapper ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons\" id=\"".$wrapperId."\"><span class=\"ui-accordion-header-icon ui-icon ui-icon-triangle-1-e\"></span>".$locale['name']. "</h3>";

    $result = mysql_query("SELECT * FROM programs WHERE locale_id = " . $locale['id'] . " ORDER BY start_time ASC");

    while ($program = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $days[$program['day']][] = $program;
    }

    $act_row = 1;
    $max_row = max(count($days[1]), count($days[2]), count($days[3]));
    ?>
		<div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active	">
    <table id="programs-table-<?php print $locale['id']; ?>" class="programs-table table programs-full" data-locale="<?php print $locale['id']; ?>">
        <thead>
            <tr>
                <th><?php print $day_names[1]; ?></th>
                <th><?php print $day_names[2]; ?></th>
                <th><?php print $day_names[3]; ?></th>
            </tr>
        </thead>
        <tbody>
        <?php
        for ($i=0; $i < $max_row; $i++) {
            ?>
            <tr data-rownum="<?php print $i; ?>">
                <?php
                if (isset($days[1][$i])) {
                    print '<td id="program-item" data-id="' . $days[1][$i]['id'] .'">';
                    $endTime = NULL;
                    if (isset($days[1][$i]['end_time'])) {
                        $endTime = '-'.substr($days[1][$i]['end_time'], 0, -3);
                    }
                    print '<div class="time">'.substr($days[1][$i]['start_time'], 0, -3) . $endTime . '</div>';
                    print '<div class="name">'. $days[1][$i]['name'] . '</div>';
                }
                else print '<td>';
                print '</td>';
                ?>
                <?php
                if (isset($days[2][$i])) {
                    print '<td id="program-item" data-id="' . $days[2][$i]['id'] .'">';
                    $endTime = NULL;
                    if ($days[2][$i]['end_time']) {
                        $endTime = '-'.substr($days[2][$i]['end_time'], 0, -3);
                    }
                    print '<div class="time">'.substr($days[2][$i]['start_time'], 0, -3) . $endTime . '</div>';
                    print '<div class="name">'. $days[2][$i]['name'] . '</div>';
                }
                else print '<td>';
                print '</td>';
                ?>
                <?php
                if (isset($days[3][$i])) {
                    print '<td id="program-item" data-id="' . $days[3][$i]['id'] .'">';
                    $endTime = NULL;
                    if ($days[3][$i]['end_time']) {
                        $endTime = '-'.substr($days[3][$i]['end_time'], 0, -3);
                    }
                    print '<div class="time">'.substr($days[3][$i]['start_time'], 0, -3) . $endTime . '</div>';
                    print '<div class="name">'. $days[3][$i]['name'] . '</div>';
                }
                else print '<td>';
                print '</td>';
                ?>
            </tr>
            <?php
            print '<tr class="desc-row-' . $i . '"><td colspan="3">';

            for ($j = 1; $j <=3; $j++) {
                if (isset($days[$j][$i])) {
                    if ($days[$j][$i]['description']) {
                        $desc = $days[$j][$i]['description'];
                    }
                    else {
                        $desc = "Ennek a programnak nincs részletes leírása.";
                    }
                    print '<div id="description-' . $days[$j][$i]['id'] . '" class="description">' . $desc . '</div>';
                }
            }
            print '</td></tr>';
        }
        ?>
        </tbody>
    </table>
		</div>
<?php
}

?>
</div>