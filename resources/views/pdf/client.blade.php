<!DOCTYPE html>
<html>
<head>
    <title>Union-Bank Summary</title>
    <style>
        * {
            font-family: 'Arial', sans-serif;
            font-size: 12pt;
        }

        h1 {
            font-size: 28pt;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .logo {
            display: block;
            margin: 0 auto;
            width: 200px;
        }

        .address {
            text-align: center;
            margin-bottom: 24pt;
        }

        .address p {
            font-size: 12pt;
            margin-bottom: 6px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
        }

        .footer {
            margin-top: 24pt;
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>
<p style="text-align: center; margin-bottom: 18pt">
        <img src="{{public_path('images/union-logo.png')}}" style="width: 200px;" alt=""> <br>
        {{-- <strong style="font-size: 16pt">Union-Bank Banking, Inc.</strong> <br> --}}
        #445 Ill Fortune St., Merrycormic <br>
        Tagbilaran city, Bohol <br>
        Tel. No.: 555-666-7890, 223-129-9089
    </p>


        <h1>Union-Bank Summary</h1>

        <table>
            <tr>
                <th>Name</th>
                <td>{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$client->address}}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{$client->phone_number}}</td>
            </tr>
        </table>

        <hr>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Deposit</th>
                    <th>Withdrawal</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3">Beginning Balance</td>
                    <td style="text-align: right">{{number_format($client->initial_deposit, 2)}}</td>
                </tr>
                <?php $bal = $client->initial_deposit; ?>
                @foreach($client->transactions as $txn)
                <tr>
                    <td>{{$txn->date}}</td>
                    <td style="text-align: right">{{$txn->deposit ? number_format($txn->amount, 2): ''}}</td>
                    <td style="text-align: right">{{!$txn->deposit ? number_format($txn->amount, 2): ''}}</td>
                    <td style="text-align: right">{{ number_format($bal += $txn->deposit ? $txn->amount : (0-$txn->amount), 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>Powered by Your Company</p>
        </div>
    </div>
</body>
</html>
