<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
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
            background-color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            color: blue; 
            text-decoration: none; 
        }

        img.logo {
            width: 100px; 
            
            height: auto; 
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

.container {
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
            <a href="show-details">Log User</a>
            <a href="login-logs">All Connexions</a>
        </div>
    </header>
    <div class="container">
        <form method="GET" action="{{ route('filter_login_activities') }}" class="filter-form">
            <div class="form-group">
                <input type="hidden" name="account_id" value="{{ $account->id }}"> 
                
                <label for="start_date">From:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
                
                <label for="end_date">To:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
                
                <button type="submit" class="btn btn-filter">Filter</button>
            </div>
        </form>
    </div>
    
        

            
        </form>
    <h1>User Details</h1>
    @if(count($users) > 0)
        <p style="text-align: center; font-size: 24px;">Account Name: {{ $users[0]->account_name }}</p>
        <table>
            <tr>
                <th>ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>User_Name</th>
                <th>Connexion</th>
                <th>User Info</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->username }}</td>
                    <td>2</td>
                    <td><a href="{{ route('login_logs', ['id_user' => $user->id]) }}">View Details</a></td>
                </tr>
            @endforeach
        </table>
        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('show_database') }}">Return</a>
        </div>
    @else
        <p style="text-align: center;">No user information available.</p>
    @endif
</body>
</html>
