<h1>List of participants</h1>
<a href="/main">Back to form</a>
<div class="panel panel-default">
    <table class="table">
        <tr>
            <td><b>Photo</b></td>
            <td><b>Name</b></td>
            <td><b>Subject</b></td>
            <td><b>email</b></td>
        </tr>
<?php foreach ($data as $row) {?>
    <tr>
        <td><img width="50" src="application/images/<?=$row->photo?>"></td>
        <td><?=$row->firstname . ' ' . $row->lastname?></td>
        <td><?=$row->report_subject?></td>
        <td><a href="<?=$row->email?>"><?=$row->email?></a><br></td>
    </tr>
<?}
?>
    </table>
</div>