<pre>
    {{ print_r(session()->all()) }}
    </pre>
{{ dd($customer) }}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{Session:: get('customersUserName')}}:Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .profile-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 20px;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .profile-image img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 50%;
        }
        .profile-info {
            text-align: center;
        }
        .profile-name {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .profile-email {
            font-size: 14px;
            color: #666666;
            margin-bottom: 20px;
        }
        .profile-details {
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 4px;
        }
        .profile-details label {
            font-weight: bold;
            color: #333333;
        }
        .profile-details span {
            color: #666666;
        }
    </style>
</head>
<body>
    <div class="profile-container">
    <div class="profile-image">
        {{-- <img src="{{ $customer->photo }}" alt="Profile Image"> --}}
    </div>
    <div class="profile-info">
        <div class="profile-name">{{ $customers->firstName }} {{ $customers->lastName }}</div>
        <div class="profile-email">{{ $customer->email }}</div>
        <div class="profile-details">
            <p><label>Username:</label> <span>{{ $customer->username }}</span></p>
            <p><label>Birthday:</label> <span>{{ $customer->birthday }}</span></p>
            <p><label>Gender:</label> <span>{{ $customer->gender ? 'Male' : 'Female' }}</span></p>
            <p><label>Phone Number:</label> <span>{{ $customer->phoneNumber }}</span></p>
            <p><label>Address:</label> <span>{{ $customer->address }}</span></p>
        </div>
    </div>
</div>
</body>
</html>
