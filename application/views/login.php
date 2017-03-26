<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect(localhost, "chelseafccsut_toomastoomas", "D,,}?]m_Z[R,", "chelseafccsut_Users");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"chelseafccsut_Users");
$sql="select users.name, Offers.title, Offers.type 
from Offers join users 
on Offers.addedby = users.id 
where Offers.type = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>name</th>
<th>title</th>
<th>type</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>