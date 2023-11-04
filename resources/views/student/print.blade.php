<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $registrar->nim }}</title>
    <style>
        @media screen {
            body {}
        }
        @media print {
            @page {
                size: A4 potrait;
            }

            @page :left {
                margin-left: 3cm;
            }

            @page :right {
                margin-left: 4cm;
            }

            body {}

            .page {
                page-break-before: always;
            }
            .photo {
                width: 3cm;
                height: 4cm;
            }

            table{
                border:none;
            }
            
            footer {
                display:flex;
                justify-content:right; 
                font-weight:bold;               
            }

            footer div {
                height:100px;                
            }
                           
            
        }
    </style>
</head>

<body>

    <section class="page">
        <header>
            <h1><center>PENDAFTARAN WISUDA</center></h1>
            <h1 style="text-transform: uppercase"><center>{{ $quota->name }}</center></h1>
        </header>
        <main>
            <section>                
                <img class="photo" src="{{ $registrar->photo_url  }}" alt="">
            </section>
            <table>
                <tbody>           
                    <tr><td><h3>Nama</h3></td> <td><h3>: {{ $registrar->name }} <h3></td></tr>                
            
                    <tr><td><h3>NIM</h3></td> <td><h3>: {{ $registrar->nim }}</h3></td></tr>                
           
                    <tr><td><h3>NIK</h3></td> <td><h3>: {{ $registrar->nik }}</h3></td></tr>              

                    <tr><td><h3>Tempat Lahir</h3></td> <td><h3>: {{ $registrar->pob }}</h3></td></tr>
           
                    <tr><td><h3>Tanggal Lahir</h3></td> <td><h3>: {{ $registrar->dob_id }}</h3></td></tr>
         
                    <tr><td><h3>Jenis Kelamin</h3></td> <td><h3>: {{ trans($registrar->gender) }}</h3></td><tr>
          
                   <tr><td><h3>Fakultas</h3></td> <td><h3>: {{ $registrar->faculty }}</h3></td></tr>                
            
                   <tr><td><h3>Jurusan</h3></td> <td><h3>: {{ $registrar->study_program }}</h3></td></tr>
            
                   <tr><td><h3>IPK</h3></td> <td><h3>: {{ $registrar->ipk }}</h3></td></tr>
                   
                </tbody>
            </table>            
         </main>
        <footer>
            <div>
            <div>Gowa, ...../......./....... </div>
            {{ $registrar->name }} 
                </div>
        </footer>
    </section>

</body>

</html>
