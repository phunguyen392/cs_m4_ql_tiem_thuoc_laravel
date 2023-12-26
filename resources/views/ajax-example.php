<!DOCTYPE html>
<html>
<head>
    <title>AJAX Example</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <h1>Example Form</h1>

    <form id="ajax-form">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>

    <div id="response"></div>

    <script>
        $(document).ready(function() {
            // Xử lý sự kiện khi form được submit
            $("#ajax-form").submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                // Gửi yêu cầu AJAX
                $.ajax({
                    url: "{{ route('ajax.store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        // Xử lý dữ liệu trả về từ API
                        $("#response").html("<p>Name: " + response.name + "</p><p>Email: " + response.email + "</p>");
                    },
                    error: function(xhr, status, error) {
                        // Xử lý lỗi nếu có
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>