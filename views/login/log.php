<h1>Login Log</h1>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th width="50%">Email</th>
        <th width="50%">Date and time</th>
    </tr>
    </thead>
    <tbody>
    <?
    foreach($this->loginsList as $key => $value) {
        echo '<tr>';
        echo '<td>'. $value['email'] . '</td>';
        echo '<td>'. $value['date'] . '</td>';
        echo '</tr>';

    }
    ?>
    </tbody>
</table>
