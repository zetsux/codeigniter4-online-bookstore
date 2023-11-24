<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            background: linear-gradient(90deg, #3498db, #825fd2);
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            font-size: 4rem;
            margin: 20px 0;
            text-shadow: 2px 2px 4px #333;
        }

        p {
            font-size: 1.8rem;
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #e74c3c;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 25px;
            font-size: 1.5rem;
            transition: background 0.3s, transform 0.2s;
            box-shadow: 3px 3px 6px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background: #c0392b;
            transform: scale(1.05);
        }

        .btn:focus {
            outline: none;
        }

        .btn:active {
            transform: scale(0.95);
        }

        .data_var {
            font-weight: 600;
            color: wheat;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Hello World from CodeIgniter4</h1>
        <p>
            By : <span class="data_var"><?php echo $name; ?></span> 
            ( <span class="data_var"><?php echo $nrp; ?></span> )
        </p>
        <p>
            [ <span class="data_var"><?php echo $class; ?></span> - 
            <span class="data_var"><?php echo $period; ?></span> ]
        </p><br>
        <a href="#" class="btn">Start Programming</a>
    </div>
</body>
</html>
