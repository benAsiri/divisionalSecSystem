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
            <th>Index No</th>
            <th>FEMALE EMPLOYEE NIC</th>
            <th>MEDICAL CERTIFICATE</th>
            <th>CHILD BIRTH CERTIFICATE</th>
            <th>START LEAVE DATE</th>
            <th>END LEAVE DATE</th>
            <th>Reasons and Comments</th>
            <th>Number of Childs</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mleaves as $e)
            <tr>
                <td>{{$e->id}}</td>
                <td>{{$e->Emp_Id}}</td>
                <td>{{$e->chkMedicalCertificate}}</td>
                <td>{{$e->chkChildBirthCertificate}}</td>
                <td>{{$e->StartLeaveDate}}</td>
                <td>{{$e->EndLeaveDate}}</td>
                <td>{{$e->reason}}</td>
                <td>{{$e->noOfChilds}}</td>
                <td>{{$e->status}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div><!-- /.col -->
