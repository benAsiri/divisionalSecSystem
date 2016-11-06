
<style>
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        color: #4a4a4d;
        font: 12px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
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


<h3 style="text-align: center">

    <div class="row">
        <div class="col-md-12">
            <img src="./dist/img/letterHead.jpg" class="user-image" alt="HeaderImage" width="780">
            Employee Details Report
        </div>
    </div>



</h3>

<div>
    <table class="table">
        <thead>
        <tr>
            <th>Employee ID</th>
            <th>Full Nane</th>
            <th>NIC</th>
            <th>Gender</th>
            <th>SAppointment Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employee as $emp)
            <tr>
                <td>{{ $emp->id }}</td>
                <td>{{ $emp->fullname }}</td>
                <td>{{ $emp->id_num }}</td>
                <td>{{ $emp->gender}}</td>
                <td>{{ $emp->appointment_no}}</td>
                {{--<td>{{ $emp->handOverDate }}</td>--}}
                {{--<td>{{ $emp->approvedDate }}</td>--}}
                {{--<td align="center">{{ $ad_pro->Status }}</td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div><!-- /.col -->
