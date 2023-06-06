<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invoice->invoice_number }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .w-100{width: 100%;}
        .bg-primary{background-color: #F4F9F1;}

        table, td, th {
            border-bottom: 1px, solid #ddd;
            text-align: left;
        }
        th, td {
            padding: 8px;
            vertical-align: top;
        }
    </style>
</head>
<body>
    

  

    <table class="table">
    <thead>
    <h1>{{ $invoice->invoice_number }}</h1>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Invoice Number</th>
    <th scope="col">Invoice date</th>
    <th scope="col">Expiration date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>{{ $invoice->invoice_number }}</td>
      <td>{{ $invoice->invoice_date->format('d-m-Y') }}</td>
      <td>{{ $invoice->expiration_date->format('d-m-Y') }}</td>
    </tr>
    
  </tbody>
</table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>