<!DOCTYPE html>
<html>
<head>
    <title>Ruangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            display: block;       
            margin-bottom: 20px; 
            padding: 8px;        
            width: 200px;        
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 8px 15px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>Tambah Ruangan</h1>
    <form method="POST" action="/ruangan">
        @csrf
        <input type="text" name="nama_ruangan" placeholder="Nama ruangan">
        <input type="text" name="kapasitas" placeholder="kapasitas">
        <button type="submit">Simpan</button>
    </form>

    <h2>List Ruangan</h2>
<ul>
    @foreach($data as $ruangan)
        <li>
            Nama Ruangan : {{ $ruangan->nama_ruangan }} <br>
            kapasitas    : {{ $ruangan->kapasitas}} Orang
        </li>
    @endforeach
</ul>
</body>
</html>
