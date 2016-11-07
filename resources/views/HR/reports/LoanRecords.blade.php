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

<h3 style="text-align: center">Maternity Leaves Report</h3>
<div>
    <table class="table">
        <thead>
        <tr>
            <th>NO</th>
            <th>EMPLOYEE NIC </th>
            <th>NAME</th>
            <th>POSITION</th>
            <th>GRADE</th>
            <th>LOAN REQUESTED DATE</th>
            <th>Request Letter</th>
            <th>Special Notes</th>
        </tr>
        </thead>
        <tbody>
        @foreach($loans as $e)
        <tr>
            <td>{{$e->id}}</td>
            <td>{{$e->Emp_Id}}</td>
            <td>{{$e->Emp_Name}}</td>
            <td>{{$e->Emp_Pos}}</td>
            <td>{{$e->Emp_Grade}}</td>
            <td>{{$e->Loan_request_date}}</td>
            <td>{{$e->Ldoc}}</td>
            <td>{{$e->Special_notes}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div><!-- /.col -->
