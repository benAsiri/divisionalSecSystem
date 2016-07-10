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

<h3 style="text-align: center">Monthly Report</h3>
<div>
    <table class="table">
        <thead>
        <tr>
            <th>Employee ID</th>
            <th>Duty</th>
            <th>HandOver Date</th>
            <th>Approved Date</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($advance_pro as $ad_pro)
        <tr>
            <td>{{ $ad_pro->emp_id }}</td>
            <td>{{ $ad_pro->Duty }}</td>
            <td>{{ $ad_pro->handOverDate }}</td>
            <td>{{ $ad_pro->approvedDate }}</td>
            <td align="center">{{ $ad_pro->Status }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div><!-- /.col -->
