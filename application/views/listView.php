<h1>List of participants</h1>
<a href="/main">Back to form</a>
<div class="panel panel-default">
    <table class="table" style="table-layout: fixed;">
        <tr>
            <td><b>Photo</b></td>
            <td><b>Name</b></td>
            <td><b>Subject</b></td>
            <td><b>email</b></td>
        </tr>

<?php

foreach ($data as $row) {?>
    <tr>
        <td><img height="50" src="application/images/<?=$row->photo?>"></td>
        <td style="overflow-wrap: break-word;"><?=escape_html($row->firstname) . ' ' . escape_html($row->lastname)?></td>
        <td style="overflow-wrap: break-word;"><?=escape_html($row->report_subject)?></td>
        <td style="overflow-wrap: break-word;"><a href="<?=escape_html($row->email)?>"><?=escape_html($row->email)?></a><br></td>
    </tr>
<?}
?>
    </table>
</div>