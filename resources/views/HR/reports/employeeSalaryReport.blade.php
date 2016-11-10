
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
            <img src="./dist/img/letterHead.png" class="user-image" alt="HeaderImage" width="780">
            Employee Salary Details Report
        </div>
    </div>



</h3>

<div>
    <table class="table">
        <thead>
        <tr>
            <th>NO</th>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>NIC Number</th>
            <th>Basic Salary(LKR)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($salary as $sal)
            <tr>
                <td>{{$sal->id}}</td>
                <td>{{$sal->emp_id}}</td>
                <td>{{$sal->fullname}}</td>
                <td>{{$sal->id_num}}</td>
                <td>{{$sal->basic_salary}}.00</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div><!-- /.col -->
