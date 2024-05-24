<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-border {
            border: 1px solid #ccc; 
            border-radius: 10px; 
            padding: 20px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-4">
                <div class="custom-border">
                    <h1 class="text-center mb-4">Form Register</h1>
                    <form action="{{ route('register_user') }}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Masukkan Password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="gender">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="male">Laki-laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputNumber" class="form-label">Umur</label>
                            <input type="number" class="form-control" id="exampleInputNumber" name="age" placeholder="Masukkan Umur">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDate1" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="exampleInputDate1" name="birth" placeholder="Masukkan Tanggal Lahir">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address" placeholder="Masukkan Alamat"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
