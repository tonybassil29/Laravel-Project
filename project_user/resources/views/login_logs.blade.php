<!DOCTYPE html>
<html>
<head>
    <title>Historique de connexions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: white; 
            color: black; 
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #ddd;
        }

        .header-links {
            display: flex;
            align-items: center;
            justify-content: flex-end; 
            flex-grow: 1; 
        }

        .header-links a {
            color: black; 
            text-decoration: none;
            margin-left: 20px;
        }

        .header-links div {
            padding-left: 10px;
            margin-left: 20px;
            cursor: pointer; 
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        table {
            width: 90%;
            margin: 0 auto;
            margin-top: 50px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid black;
        }

        th {
            background-color: black;
            color: white;
        }

        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: white;
        }
        a {
            color: blue; 
            text-decoration: none; 
        }

        img.logo {
            width: 100px; 
            height: auto; 
        }

        .return-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
        }

        .filter-form {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    color: #333333;
}

input[type="date"] {
    padding: 12px;
    border: 1px solid #cccccc;
    border-radius: 6px;
    outline: none;
}

.btn-filter {
    padding: 14px 24px;
    background-color: black;
    color: #ffffff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    outline: none;
    transition: background-color 0.2s ease-in-out;
}

.btn-filter:hover {
    background-color: black;
}

.container1 {
    margin-top: 20px;
    margin-right: 40px;
}
    </style>
</head>
<body>
    <header>
        <img src="{{ asset('images/download.png') }}" alt="Logo" class="logo">
        <div class="header-links">
            <a href="show-database">Log by Account</a>
            <a href="show-details">Log by User</a>
            <a href="login-logs">All Connexions</a>
        </div>
    </header>
       
    <div style="margin-top: 30px;"></div> 
    <div class="container1">
        <form method="GET" action="{{ route('filter_login_activities') }}" class="filter-form">
            <div class="form-group">
                <label for="start_date">From:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
                <label for="end_date">To :</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
                <button type="submit" class="btn btn-filter">Filtrer</button>
            </div>

        

            
        </form>
    <div class="container">
        <h1>Historique de connexions de : {{ $logins->first()->username }}</h1>


        <table>
            <thead>
                <tr>
                    <th>Login Début</th>
                    <th>Login Fin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logins as $login)
                <tr>
                    <td>{{ $login->login_debut }}</td>
                    <td>{{ $login->login_fin }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="return-link">
        <a href="{{ route('show.details', ['accountId' => $logins->first()->user_id]) }}">Return</a>
    </div>

</body>
</html>
