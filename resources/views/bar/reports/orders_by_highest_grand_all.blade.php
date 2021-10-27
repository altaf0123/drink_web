<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Invoice</title>
<style>
body {
  color: #666;
  font: 14px/24px "Open Sans", "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", Sans-Serif;
}
table {
  border-collapse: separate;
  border-spacing: 0;
  width: 100%;
}
th,
td {
  padding: 6px 15px;
}
th {
  background: #42444e;
  color: #fff;
  text-align: left;
}
tr:first-child th:first-child {
  border-top-left-radius: 6px;
}
tr:first-child th:last-child {
  border-top-right-radius: 6px;
}
td {
  border-right: 1px solid #c6c9cc;
  border-bottom: 1px solid #c6c9cc;
}
td:first-child {
  border-left: 1px solid #c6c9cc;
}
tr:nth-child(even) td {
  background: #eaeaed;
}
tr:last-child td:first-child {
  border-bottom-left-radius: 6px;
}
tr:last-child td:last-child {
  border-bottom-right-radius: 6px;
}
</style>
</head>
<body class="bg-grey">
<table>
  <thead>
    <tr>
      <th>Order ID</th>
      <th>User </th>
      <th>Grand Total</th>
    </tr>
  </thead>
  <tbody>
    @foreach($records as $row)
    <tr>
      <td>{{ $row->id }}</td>
      <td>{{ getUserNameById($row->user_id) }}</td>
      <td>{{ $row->grand_total }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>