<!DOCTYPE html>

<html>

<head>

    <title>Reservation report of {{ count($reservation)>0?$reservation[0]['event_name']:"..." }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style>
        @page {
            margin: 180px 50px;
        }

        #header {
            position: fixed;
            left: 0px;
            top: -180px;
            right: 0px;
            text-align: center;
            padding: 3px;
            height: 55px;
        }

        #footer {
            position: fixed;
            left: 0px;
            bottom: -180px;
            right: 0px;
            display: inline;
            padding-bottom: 10px;
        }

        #footer .page:after {
            content: counter(page, upper-roman);
        }
    </style>
</head>
<body>
<div id="header" class="alert alert-primary">
    <p style="font-family:arial,system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-size:20px;">
        Reservation report of {{ count($reservation)>0?$reservation[0]['event_name']:"..." }}
        <br><span
            style="font-size:10px">Starting time: {{ count($reservation)>0?$reservation[0]['event_kikoff']:"..." }}</span>
    </p>
</div>
<table class="table table-bordered" style="margin-top:-15%">
    <thead>
    <tr class="table-primary">
        <td>Reserver name</td>
        <td>Email</td>
        <td>Phone Number</td>
        <td>Reserved on</td>
    </tr>
    </thead>
    <tbody>
    @foreach ($reservation as $data)
        <tr>
            <td>{{ $data->reserver_name }}</td>
            <td>{{ $data->reserver_email }}</td>
            <td>{{ $data->reserver_phone }}</td>
            <td style="font-size:12px">{{ $data->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div id="footer">
    <div style="font-size:9px;">Prepared by :{{ count($reservation)>0?$reservation[0]['business_name']:"..." }}</div>
    <div style="font-size:9px;margin-left:60%;margin-top:-30px">Report generated on <?= date("D,M d,Y H:i:s") ?></div>
</div>
</body>

</html>
