<!DOCTYPE html>
<html>
<head>
    <title>Data Matakuliah</title>
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
    <h1>Tambah Matakuliah</h1>
    <form method="POST" action="/matakuliah">
        @csrf
        <input type="text" name="nama_matkul" placeholder="Nama Matakuliah">
        <input type="text" name="deskripsi" placeholder="Deskripsi">
        <button type="submit">Simpan</button>
    </form>

<h2>List Matakuliah</h2>
<ul>
    @foreach($data as $matkul)
        <li>
            Nama Matakuliah : {{ $matkul->nama_matkul }} <br>
            Deskripsi       : {{ $matkul->deskripsi }}
        </li>
    @endforeach
</ul>
</body>
</html>
