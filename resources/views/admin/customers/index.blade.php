<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>
</head>

<body>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Customers</h4>
                    <table class="table-container" border="2">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>name</th>
                                <th>address</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>password</th>
                                <th>action</th>

                            </tr>
                        </thead>
                        @foreach ($customers as $key => $customer)
                            <tbody>
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>
                                        <span class="password-hidden">{{ $hashedPassword }}</span>
                                        <button class="toggle-password">Xem</button>
                                    </td>
                                    
                                    <td></td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <table>
        <tr>
        </tr>
    </table>
</body>

</html>
<style>
    .password-hidden {
        display: none;
    }

    .show-password {
        display: inline;
    }
</style>

<script>
    const toggleButtons = document.querySelectorAll('.toggle-password');

    toggleButtons.forEach(button => {
        button.addEventListener('click', () => {
            const passwordSpan = button.previousElementSibling;
            passwordSpan.classList.toggle('password-hidden');
            button.textContent = passwordSpan.classList.contains('password-hidden') ? 'Xem' : 'Ẩn';
        });
    });
</script>
