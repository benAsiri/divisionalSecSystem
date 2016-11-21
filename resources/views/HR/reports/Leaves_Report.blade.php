<style>
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        color: #4a4a4d;
        font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    th,
    td {
        width: 20%;
        padding: 10px 15px;
        vertical-align: middle;
    }
    td{
        font-size: 12px;
    }
    thead {
        background: #395870;
        color: #fff;
    }
    th {
        font-weight: bold;
    }
    th:first-child {
        text-align: left;
    }
    tbody tr:nth-child(even) {
        background: #f0f0f2;
    }
    td {
        border-bottom: 1px solid #cecfd5;
        border-right: 1px solid #cecfd5;
    }
    td:first-child {
        border-left: 1px solid #cecfd5;
    }
    tfoot {
        text-align: right;
    }
    tfoot tr:last-child {
        background: #f0f0f2;
    }
</style>
<h3 style="text-align: center"><img src="./dist/img/letterHead.png" class="user-image" alt="HeaderImage" width="780"></h3>
</br>
<h3 style="text-align: center">Leaves Details Report</h3>
</br>
<h4 style="text-align: center">{{$year}} - {{$monthname}}</h4>










<div>
    <table class="table">
        <thead>
        <tr>
        <th>Name</th>
        <th>NIC</th>
        <th>Casual Leaves</th>
        <th>Vacation leaves</th>
        <th>Other Leaves</th>


        </tr>
        </thead>
        <tbody>

        @foreach($LeaveArray as $arr)
            <tr class="row-of-data">
                <td><?php echo $arr[0]; ?></td>
                <td><?php echo $arr[1]; ?></td>
                <td><?php echo $arr[2]; ?></td>
                <td><?php echo $arr[3]; ?></td>
                <td><?php echo $arr[4]; ?></td>

                </td>
            </tr>
        @endforeach




        </tbody>

    </table>
</div><!-- /.col -->
