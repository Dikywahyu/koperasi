<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Kwitansi')</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #000;
            line-height: 1.4;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th,
        .table td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }

        .footer {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
        }

        .signature {
            text-align: center;
        }

        .highlight {
            font-weight: bold;
            font-size: 14px;
        }

        .text-right {
            text-align: right;
        }

        .terbilang {
            margin-top: 15px;
            font-weight: bold;
        }

        .info {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    @yield('content')
</body>

</html>