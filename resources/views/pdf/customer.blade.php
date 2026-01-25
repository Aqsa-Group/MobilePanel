<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>مشخصات مشتری</title>
    <style>
        @font-face {
            font-family: 'Vazir';
            src: url("{{ storage_path('fonts/Vazir-Regular.ttf') }}") format('truetype');
        }
        body {
            font-family: 'Vazir', sans-serif;
            direction: rtl;
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
        }
        th {
            background-color: #f0f0f0;
        }
        h2 {
            text-align: center;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>مشخصات مشتری</h2>
    <table>
        <tr>
            <th>نام</th>
            <td>{{ $customer->first_name }}</td>
        </tr>
        <tr>
            <th>تخلص</th>
            <td>{{ $customer->last_name }}</td>
        </tr>
        <tr>
            <th>شماره تماس</th>
            <td>{{ $customer->customer_number }}</td>
        </tr>
        <tr>
            <th>آدرس</th>
            <td>{{ $customer->address }}</td>
        </tr>
        <tr>
            <th>نوع مشتری</th>
            <td>{{ $customer->customer_type }}</td>
        </tr>
        <tr>
            <th>شماره تذکره</th>
            <td>{{ $customer->id_card }}</td>
        </tr>
        @if($customer->image)
        <tr>
            <th>عکس</th>
            <td><img src="{{ public_path('storage/'.$customer->image) }}" alt="عکس مشتری"></td>
        </tr>
        @endif
    </table>
</body>
</html>
