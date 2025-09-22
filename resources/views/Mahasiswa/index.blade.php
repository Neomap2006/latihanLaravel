<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
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
    <h1>Tambah Mahasiswa</h1>
    <form method="POST" action="/mahasiswa">
        @csrf
        <input type="text" name="nama" placeholder="Nama">
        <input type="text" name="nim" placeholder="NIM">
        <input type="text" name="jurusan" placeholder="Jurusan">
        <button type="submit">Simpan</button>
    </form>

    <h2>List Mahasiswa</h2>
<ul>
    @foreach($data as $mhs)
        <li>
            Nama    : {{ $mhs->nama }} <br>
            NIM     : {{ $mhs->nim }} <br>
            Jurusan : {{ $mhs->jurusan }}
        </li>
    @endforeach
</ul>
</body>
</html>
