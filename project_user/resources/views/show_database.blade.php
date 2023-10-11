    <!DOCTYPE html>
    <html>
    <head>
        <title>Show Database Records</title>
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
 <head>
    <title>Show Database Records</title>
    <!-- Include Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <img src="{{ asset('images/download.png') }}" alt="Logo" class="logo">

        <div class="header-links">
            <a href="show-database">Log by Account</a>
            <a href="show-details">Log by User</a>
            <a href="login-logs">All Connexion</a>
        </div>
    </header>
    <div class="container">
        <form method="GET" action="{{ route('filter_login_activities') }}" class="filter-form">
            <div class="form-group">
                <label for="start_date">From:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
                <label for="end_date">To :</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
                <button type="submit" class="btn btn-filter">Filtrer</button>
            </div>

        

            
        </form>
    </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Account ID</th>
                    <th>Account Name</th>
                    <th>Login Count</th>
                    <th>User Info</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loginActivities as $activity)
                <tr>
                    <td>{{ $activity->account_id }}</td>
                    <td>{{ $activity->account_name }}</td>
                    <td>{{ $activity->login_count }}</td>
                    <td><a href="{{ route('show.details', ['accountId' => $activity->account_id]) }}" class="btn btn-info">View Details</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>