<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpact Online Services</title>
    <style>
        .table-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .table-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .ii a {
            color: #000;
        }
        .table {
            border-collapse: collapse;
            width: 50%;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            margin: 10px;
            border-radius: 8px;
        }
        .table th {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }
        .table td {
            background-color: #edecec;
            color: #000;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="table-header">
        <div> Simpact Online Services</div>
        <div> Contact Form Data</div>
    </div>
<div class="table-container">

    <table class="table">
        <tr>
            <th>Name</th>
            <td>{{ $formData['name']}}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $formData['phone']}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $formData['email']}}</td>
        </tr>
        <tr>
            <th>Subject</th>
            <td>{{ $formData['subject']}}</td>
        </tr>
        <tr>
            <th>Message</th>
            <td>{{ $formData['message']}}</td>
        </tr>
    </table>
</div>
</body>
</html>
